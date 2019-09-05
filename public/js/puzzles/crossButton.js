(function(window, document, undefined){
    var 	image = new Image(),
        div = document.getElementById("puzzle"),
        container = document.getElementById("container"),
        statusP,
        scale = 80,
        border = 10,
        invScale = 1.0 / scale,
        ROWS = 3,
        COLS = 3,
        tiles = [],
        UP = 0,
        DOWN = 1,
        SPRITE_SHEET_UP = "url('/images/puzzles/buttonup.png')",
        SPRITE_SHEET_DOWN = "url('/images/puzzles/buttondown.png')",
        SPRITE_SHEETS = [SPRITE_SHEET_UP, SPRITE_SHEET_DOWN],
        mouseX,
        mouseY,
        offsetX,
        offsetY;

    /* Sprite
     *
     * A css Sprite:
     * sheet is the sprite-sheet which this object will be using to render the
     * sprite. So sheetX and sheetY is the top left hand corner of the area we're
     * grabbing. dx and dy are used optionally to place the sprite off-center
     */
    function Sprite(x, y, sheet, sheetX, sheetY, width, height, dx, dy, maskRect){
        this.x = x;
        this.y = y;
        this.sheetX = sheetX;
        this.sheetY = sheetY;
        this.width = width;
        this.height = height;
        this.dx = dx || 0;
        this.dy = dy || 0;
        this.div = document.createElement("div");
        this.div.style.backgroundImage = sheet;
        this.div.style.backgroundPosition = (-sheetX) + "px " + (-sheetY) + "px";
        this.div.style.position = "absolute";
        this.div.style.width = width;
        this.div.style.height = height;
        this.maskRect = maskRect;
    }
    Sprite.prototype = {
        // updates the sprite position
        update: function(x, y){
            x = x ? parseInt(x) : this.x;
            y = y ? parseInt(y) : this.y;
            var posX = this.dx + x;
            var posY = this.dy + y;
            if(this.maskRect){

                // if inside the masking area - business as usual
                if(posX >= this.maskRect.x && posY >= this.maskRect.y && posX + this.width < this.maskRect.x + this.maskRect.width && posY + this.height < this.maskRect.x + this.maskRect.height){
                    this.div.style.backgroundPosition = (-this.sheetX) + "px " + (-this.sheetY) + "px";
                    this.div.style.width = this.width;
                    this.div.style.height = this.height;

                    // else clip the width and move the sheet reference to mask the
                    // sprite with in the rectangle maskRect
                } else {
                    this.div.style.width = Math.abs(Math.max(this.maskRect.x, posX) - Math.min(this.maskRect.x + this.maskRect.width, posX + this.width));
                    this.div.style.height = Math.abs(Math.max(this.maskRect.y, posY) - Math.min(this.maskRect.y + this.maskRect.height, posY + this.height));
                    var sheetPosX = -this.sheetX + (posX < this.maskRect.x ? posX - maskRect.x : 0);
                    var sheetPosY = -this.sheetY + (posY < this.maskRect.y ? posY - maskRect.y: 0);
                    this.div.style.backgroundPosition = sheetPosX + "px " + sheetPosY + "px";
                    if(posX < this.maskRect.x) posX = this.maskRect.x;
                    if(posY < this.maskRect.y) posY = this.maskRect.y;
                }
            }
            this.div.style.left = offsetX + posX;
            this.div.style.top = offsetY + posY;
        }
    }
    // calculates offset (needed to render relative to an element)
    function getOffset(element){
        offsetX = offsetY = 0;
        if(element.offsetParent){
            do{
                offsetX += element.offsetLeft;
                offsetY += element.offsetTop;
            } while ((element = element.offsetParent));
        }
    }
    /* Tile
     *
     * A tile in a sliding tile puzzle
     */
    Tile.prototype = new Sprite();
    Tile.prototype.constructor = Tile;
    Tile.prototype.parent = Sprite.prototype;
    function Tile(r, c, sheet, maskRect){
        Sprite.call(this, c * scale, r * scale, sheet, c * scale, r * scale, scale, scale, 0, 0, maskRect);
        this.pX = this.x;
        this.pY = this.y;
        this.r = r;
        this.c = c;
        this.state = 0;
    }
    Tile.prototype.copy = function(){
        var tile = new Tile(this.r, this.c, this.div.style.backgroundImage, this.maskRect);
        tile.x = this.x;
        tile.y = this.y;
        tile.slideX = this.slideX;
        tile.slideY = this.slideY;
        return tile;
    }

    /* TileButton
     *
     * A clickable tile with different states
     */
    TileButton.prototype = new Tile();
    TileButton.prototype.constructor = TileButton;
    TileButton.prototype.parent = Tile.prototype;
    function TileButton(r, c, state){
        Tile.call(this, r, c, SPRITE_SHEETS[state]);
        this.state = state || 0;
    }
    TileButton.prototype.setState = function(n){
        this.state = n;
        this.div.style.backgroundImage = SPRITE_SHEETS[n];
    }

    // mouse listeners
    function mouseDown(e){
        var x = ((mouseX - offsetX) * invScale) >> 0;
        var y = ((mouseY - offsetY) * invScale) >> 0;
        // swap state of clicked tile and tiles vertically and horizontally adjacent
        tiles[y][x].setState(tiles[y][x].state ^ 1);
        if(y > 0) tiles[y - 1][x].setState(tiles[y - 1][x].state ^ 1);
        if(x > 0) tiles[y][x - 1].setState(tiles[y][x - 1].state ^ 1);
        if(y < ROWS - 1) tiles[y + 1][x].setState(tiles[y + 1][x].state ^ 1);
        if(x < COLS - 1) tiles[y][x + 1].setState(tiles[y][x + 1].state ^ 1);
        var c = complete();
        if(c == ROWS * COLS){
            statusP.innerHTML = "Great Success!";
        } else {
            var p = ((100 / (ROWS * COLS)) * c) >> 0;
            statusP.innerHTML = p + "% Complete";
        }
    }
    function mouseMove(e){
        mouseX = 0;
        mouseY = 0;
        e = e || window.event;
        if(e.pageX || e.pageY){
            mouseX = e.pageX;
            mouseY = e.pageY;
        } else if (e.clientX || e.clientY){
            mouseX = e.clientX + document.body.scrollLeft
                + document.documentElement.scrollLeft;
            mouseY = e.clientY + document.body.scrollTop
                + document.documentElement.scrollTop;
        }
    }

    // Called to prep the tiles
    function initTiles(){
        getOffset(div);
        var r, c, button;
        for(r = 0; r < ROWS; r++){
            tiles[r] = [];
            for(c = 0; c < COLS; c++){
                button = new TileButton(r, c, UP);
                button.update();
                div.appendChild(button.div);
                tiles.push(button);
                tiles[r][c] = button;
            }
        }
    }

    // Returns the number of tiles that are in their home position
    function complete(){
        var r, c;
        var total = 0;
        for(r = 0; r < ROWS; r++){
            for(c = 0; c < COLS; c++){
                if(tiles[r][c].state == DOWN) total++;
            }
        }
        return total
    }

    // Initialisation from this point in
    function init(){
        if(imageList.length){
            image.src = imageList.shift();
            image.onload = init;
            return;
        }
        div.innerHTML = "";
        div.style.width = COLS * scale;
        div.style.height = ROWS * scale;
        container.style.paddingLeft = border;
        container.style.paddingTop = border;
        container.style.width = border + COLS * scale;
        container.style.height = border + ROWS * scale;
        initTiles();
        div.addEventListener("mousedown", mouseDown, false);
        div.addEventListener("mousemove", mouseMove, false);
        statusP = document.createElement("p");
        container.parentNode.appendChild(statusP);
        var p = ((100 / (ROWS * COLS)) * complete()) >> 0;
        statusP.innerHTML = p + "% Complete";
    }
    var imageList = ["/images/puzzles/buttonup.png", "/images/puzzles/buttondown.png"];
    image.onload = init;
    image.src = imageList.shift();

}(this, this.document));
