/**
 * Wordfind.js 0.0.1
 * (c) 2012 Bill, BunKat LLC.
 * Wordfind is freely distributable under the MIT license.
 * For all details and documentation:
 *     https://github.com/bunkat/wordfind
 */

(function () {

    'use strict';

    /**
     * Generates a new word find (word search) puzzle provided a set of words.
     * Can automatically determine the smallest puzzle size in which all words
     * fit, or the puzzle size can be manually configured.  Will automatically
     * increase puzzle size until a valid puzzle is found.
     *
     * WordFind has no dependencies.
     */

    /**
     * Initializes the WordFind object.
     *
     * @api private
     */
    var WordFind = function () {

        // Letters used to fill blank spots in the puzzle
        var letters = 'abcdefghijklmnoprstuvwy';

        /**
         * Definitions for all the different orientations in which words can be
         * placed within a puzzle. New orientation definitions can be added and they
         * will be automatically available.
         */

            // The list of all the possible orientations
        var allOrientations = ['horizontal','horizontalBack','vertical','verticalUp',
                'diagonal','diagonalUp','diagonalBack','diagonalUpBack'];

        // The definition of the orientation, calculates the next square given a
        // starting square (x,y) and distance (i) from that square.
        var orientations = {
            horizontal:     function(x,y,i) { return {x: x+i, y: y  }; },
            horizontalBack: function(x,y,i) { return {x: x-i, y: y  }; },
            vertical:       function(x,y,i) { return {x: x,   y: y+i}; },
            verticalUp:     function(x,y,i) { return {x: x,   y: y-i}; },
            diagonal:       function(x,y,i) { return {x: x+i, y: y+i}; },
            diagonalBack:   function(x,y,i) { return {x: x-i, y: y+i}; },
            diagonalUp:     function(x,y,i) { return {x: x+i, y: y-i}; },
            diagonalUpBack: function(x,y,i) { return {x: x-i, y: y-i}; }
        };

        // Determines if an orientation is possible given the starting square (x,y),
        // the height (h) and width (w) of the puzzle, and the length of the word (l).
        // Returns true if the word will fit starting at the square provided using
        // the specified orientation.
        var checkOrientations = {
            horizontal:     function(x,y,h,w,l) { return w >= x + l; },
            horizontalBack: function(x,y,h,w,l) { return x + 1 >= l; },
            vertical:       function(x,y,h,w,l) { return h >= y + l; },
            verticalUp:     function(x,y,h,w,l) { return y + 1 >= l; },
            diagonal:       function(x,y,h,w,l) { return (w >= x + l) && (h >= y + l); },
            diagonalBack:   function(x,y,h,w,l) { return (x + 1 >= l) && (h >= y + l); },
            diagonalUp:     function(x,y,h,w,l) { return (w >= x + l) && (y + 1 >= l); },
            diagonalUpBack: function(x,y,h,w,l) { return (x + 1 >= l) && (y + 1 >= l); }
        };

        // Determines the next possible valid square given the square (x,y) was ]
        // invalid and a word lenght of (l).  This greatly reduces the number of
        // squares that must be checked. Returning {x: x+1, y: y} will always work
        // but will not be optimal.
        var skipOrientations = {
            horizontal:     function(x,y,l) { return {x: 0,   y: y+1  }; },
            horizontalBack: function(x,y,l) { return {x: l-1, y: y    }; },
            vertical:       function(x,y,l) { return {x: 0,   y: y+100}; },
            verticalUp:     function(x,y,l) { return {x: 0,   y: l-1  }; },
            diagonal:       function(x,y,l) { return {x: 0,   y: y+1  }; },
            diagonalBack:   function(x,y,l) { return {x: l-1, y: x>=l-1?y+1:y    }; },
            diagonalUp:     function(x,y,l) { return {x: 0,   y: y<l-1?l-1:y+1  }; },
            diagonalUpBack: function(x,y,l) { return {x: l-1, y: x>=l-1?y+1:y  }; }
        };

        /**
         * Initializes the puzzle and places words in the puzzle one at a time.
         *
         * Returns either a valid puzzle with all of the words or null if a valid
         * puzzle was not found.
         *
         * @param {[String]} words: The list of words to fit into the puzzle
         * @param {[Options]} options: The options to use when filling the puzzle
         */
        var fillPuzzle = function (words, options) {

            var puzzle = [], i, j, len;

            // initialize the puzzle with blanks
            for (i = 0; i < options.height; i++) {
                puzzle.push([]);
                for (j = 0; j < options.width; j++) {
                    puzzle[i].push('');
                }
            }

            // add each word into the puzzle one at a time
            for (i = 0, len = words.length; i < len; i++) {
                if (!placeWordInPuzzle(puzzle, options, words[i])) {
                    // if a word didn't fit in the puzzle, give up
                    return null;
                }
            }

            // return the puzzle
            return puzzle;
        };

        /**
         * Adds the specified word to the puzzle by finding all of the possible
         * locations where the word will fit and then randomly selecting one. Options
         * controls whether or not word overlap should be maximized.
         *
         * Returns true if the word was successfully placed, false otherwise.
         *
         * @param {[[String]]} puzzle: The current state of the puzzle
         * @param {[Options]} options: The options to use when filling the puzzle
         * @param {String} word: The word to fit into the puzzle.
         */
        var placeWordInPuzzle = function (puzzle, options, word) {

            // find all of the best locations where this word would fit
            var locations = findBestLocations(puzzle, options, word);

            if (locations.length === 0) {
                return false;
            }

            // select a location at random and place the word there
            var sel = locations[Math.floor(Math.random() * locations.length)];
            placeWord(puzzle, word, sel.x, sel.y, orientations[sel.orientation]);

            return true;
        };

        /**
         * Iterates through the puzzle and determines all of the locations where
         * the word will fit. Options determines if overlap should be maximized or
         * not.
         *
         * Returns a list of location objects which contain an x,y cooridinate
         * indicating the start of the word, the orientation of the word, and the
         * number of letters that overlapped with existing letter.
         *
         * @param {[[String]]} puzzle: The current state of the puzzle
         * @param {[Options]} options: The options to use when filling the puzzle
         * @param {String} word: The word to fit into the puzzle.
         */
        var findBestLocations = function (puzzle, options, word) {

            var locations = [],
                height = options.height,
                width = options.width,
                wordLength = word.length,
                maxOverlap = 0; // we'll start looking at overlap = 0

            // loop through all of the possible orientations at this position
            for (var k = 0, len = options.orientations.length; k < len; k++) {

                var orientation = options.orientations[k],
                    check = checkOrientations[orientation],
                    next = orientations[orientation],
                    skipTo = skipOrientations[orientation],
                    x = 0, y = 0;

                // loop through every position on the board
                while( y < height ) {

                    // see if this orientation is even possible at this location
                    if (check(x, y, height, width, wordLength)) {

                        // determine if the word fits at the current position
                        var overlap = calcOverlap(word, puzzle, x, y, next);

                        // if the overlap was bigger than previous overlaps that we've seen
                        if (overlap >= maxOverlap || (!options.preferOverlap && overlap > -1)) {
                            maxOverlap = overlap;
                            locations.push({x: x, y: y, orientation: orientation, overlap: overlap});
                        }

                        x++;
                        if (x >= width) {
                            x = 0;
                            y++;
                        }
                    }
                    else {
                        // if current cell is invalid, then skip to the next cell where
                        // this orientation is possible. this greatly reduces the number
                        // of checks that we have to do overall
                        var nextPossible = skipTo(x,y,wordLength);
                        x = nextPossible.x;
                        y = nextPossible.y;
                    }

                }
            }

            // finally prune down all of the possible locations we found by
            // only using the ones with the maximum overlap that we calculated
            return options.preferOverlap ?
                pruneLocations(locations, maxOverlap) :
                locations;
        };

        /**
         * Determines whether or not a particular word fits in a particular
         * orientation within the puzzle.
         *
         * Returns the number of letters overlapped with existing words if the word
         * fits in the specified position, -1 if the word does not fit.
         *
         * @param {String} word: The word to fit into the puzzle.
         * @param {[[String]]} puzzle: The current state of the puzzle
         * @param {int} x: The x position to check
         * @param {int} y: The y position to check
         * @param {function} fnGetSquare: Function that returns the next square
         */
        var calcOverlap = function (word, puzzle, x, y, fnGetSquare) {
            var overlap = 0;

            // traverse the squares to determine if the word fits
            for (var i = 0, len = word.length; i < len; i++) {

                var next = fnGetSquare(x, y, i),
                    square = puzzle[next.y][next.x];

                // if the puzzle square already contains the letter we
                // are looking for, then count it as an overlap square
                if (square === word[i]) {
                    overlap++;
                }
                // if it contains a different letter, than our word doesn't fit
                // here, return -1
                else if (square !== '' ) {
                    return -1;
                }
            }

            // if the entire word is overlapping, skip it to ensure words aren't
            // hidden in other words
            return overlap;
        };

        /**
         * If overlap maximization was indicated, this function is used to prune the
         * list of valid locations down to the ones that contain the maximum overlap
         * that was previously calculated.
         *
         * Returns the pruned set of locations.
         *
         * @param {[Location]} locations: The set of locations to prune
         * @param {int} overlap: The required level of overlap
         */
        var pruneLocations = function (locations, overlap) {

            var pruned = [];
            for(var i = 0, len = locations.length; i < len; i++) {
                if (locations[i].overlap >= overlap) {
                    pruned.push(locations[i]);
                }
            }

            return pruned;
        };

        /**
         * Places a word in the puzzle given a starting position and orientation.
         *
         * @param {[[String]]} puzzle: The current state of the puzzle
         * @param {String} word: The word to fit into the puzzle.
         * @param {int} x: The x position to check
         * @param {int} y: The y position to check
         * @param {function} fnGetSquare: Function that returns the next square
         */
        var placeWord = function (puzzle, word, x, y, fnGetSquare) {
            for (var i = 0, len = word.length; i < len; i++) {
                var next = fnGetSquare(x, y, i);
                puzzle[next.y][next.x] = word[i];
            }
        };

        return {

            /**
             * Returns the list of all of the possible orientations.
             * @api public
             */
            validOrientations: allOrientations,

            /**
             * Returns the orientation functions for traversing words.
             * @api public
             */
            orientations: orientations,

            /**
             * Generates a new word find (word search) puzzle.
             *
             * Settings:
             *
             * height: desired height of the puzzle, default: smallest possible
             * width:  desired width of the puzzle, default: smallest possible
             * orientations: list of orientations to use, default: all orientations
             * fillBlanks: true to fill in the blanks, default: true
             * maxAttempts: number of tries before increasing puzzle size, default:3
             * preferOverlap: maximize word overlap or not, default: true
             *
             * Returns the puzzle that was created.
             *
             * @param {[String]} words: List of words to include in the puzzle
             * @param {options} settings: The options to use for this puzzle
             * @api public
             */
            newPuzzle: function(words, settings) {
                var wordList, puzzle, attempts = 0, opts = settings || {};

                //console.log('newPuzzle() :: settings = ', settings);

                // copy and sort the words by length, inserting words into the puzzle
                // from longest to shortest works out the best
                wordList = words.slice(0).sort( function (a,b) {
                    return (a.length < b.length) ? 1 : 0;
                });

                // initialize the options
                var options = {
                    height:       opts.height || wordList[0].length,
                    width:        opts.width || wordList[0].length,
                    orientations: opts.orientations || allOrientations,
                    fillBlanks:   opts.fillBlanks !== undefined ? opts.fillBlanks : true,
                    maxAttempts:  opts.maxAttempts || 3,
                    preferOverlap: opts.preferOverlap !== undefined ? opts.preferOverlap : true
                };

                // add the words to the puzzle
                // since puzzles are random, attempt to create a valid one up to
                // maxAttempts and then increase the puzzle size and try again
                while (!puzzle) {
                    while (!puzzle && attempts++ < options.maxAttempts) {
                        puzzle = fillPuzzle(wordList, options);
                    }

                    if (!puzzle) {
                        options.height++;
                        options.width++;
                        attempts = 0;
                    }
                }

                // fill in empty spaces with random letters
                if (options.fillBlanks) {
                    this.fillBlanks(puzzle, options);
                }

                return puzzle;
            },

            /**
             * Fills in any empty spaces in the puzzle with random letters.
             *
             * @param {[[String]]} puzzle: The current state of the puzzle
             * @api public
             */
            fillBlanks: function (puzzle) {
                for (var i = 0, height = puzzle.length; i < height; i++) {
                    var row = puzzle[i];
                    for (var j = 0, width = row.length; j < width; j++) {

                        if (!puzzle[i][j]) {
                            var randomLetter = Math.floor(Math.random() * letters.length);
                            puzzle[i][j] = letters[randomLetter];
                        }
                    }
                }
            },

            /**
             * Returns the starting location and orientation of the specified words
             * within the puzzle. Any words that are not found are returned in the
             * notFound array.
             *
             * Returns
             *   x position of start of word
             *   y position of start of word
             *   orientation of word
             *   word
             *   overlap (always equal to word.length)
             *
             * @param {[[String]]} puzzle: The current state of the puzzle
             * @param {[String]} words: The list of words to find
             * @api public
             */
            solve: function (puzzle, words) {
                var options = {
                        height:       puzzle.length,
                        width:        puzzle[0].length,
                        orientations: allOrientations,
                        preferOverlap: true
                    },
                    found = [],
                    notFound = [];

                for(var i = 0, len = words.length; i < len; i++) {
                    var word = words[i],
                        locations = findBestLocations(puzzle, options, word);

                    if (locations.length > 0 && locations[0].overlap === word.length) {
                        locations[0].word = word;
                        found.push(locations[0]);
                    }
                    else {
                        notFound.push(word);
                    }
                }

                return { found: found, notFound: notFound };
            },

            /**
             * Outputs a puzzle to the console, useful for debugging.
             * Returns a formatted string representing the puzzle.
             *
             * @param {[[String]]} puzzle: The current state of the puzzle
             * @api public
             */
            print: function (puzzle) {
                var puzzleString = '';
                for (var i = 0, height = puzzle.length; i < height; i++) {
                    var row = puzzle[i];
                    for (var j = 0, width = row.length; j < width; j++) {
                        puzzleString += (row[j] === '' ? ' ' : row[j]) + ' ';
                    }
                    puzzleString += '\n';
                }

                //console.log(puzzleString);
                return puzzleString;
            }
        };
    };

    /**
     * Allow library to be used within both the browser and node.js
     */
    var root = typeof exports !== "undefined" && exports !== null ? exports : window;
    root.wordfind = WordFind();

}).call(this);

/**
 ===========================================================================
 ===========================================================================
 ===========================================================================
 ===========================================================================
 ===========================================================================
 ===========================================================================
 ===========================================================================
 ===========================================================================
 ===========================================================================
 ===========================================================================
 ===========================================================================
 ===========================================================================
 ===========================================================================
 ===========================================================================
 ===========================================================================
 ===========================================================================
 ===========================================================================
 ===========================================================================
 */

/**
 * Wordfind.js 0.0.1
 * (c) 2012 Bill, BunKat LLC.
 * Wordfind is freely distributable under the MIT license.
 * For all details and documentation:
 *     https://github.com/bunkat/wordfind
 */

(function (document, $, wordfind) {

    'use strict';

    /**
     * An example game using the puzzles created from wordfind.js. Click and drag
     * to highlight words.
     *
     * WordFindGame requires wordfind.js and jQuery.
     */

    /**
     * Initializes the WordFindGame object.
     *
     * @api private
     */
    var WordFindGame = function() {

        // List of words for this game
        var wordList;

        /**
         * Draws the puzzle by inserting rows of buttons into el.
         *
         * @param {String} el: The jQuery element to write the puzzle to
         * @param {[[String]]} puzzle: The puzzle to draw
         */
        var drawPuzzle = function (el, puzzle) {
            //console.log('drawPuzzle()');
            var output = '';
            // for each row in the puzzle
            for (var i = 0, height = puzzle.length; i < height; i++) {
                // append a div to represent a row in the puzzle
                var row = puzzle[i];
                output += '<div>';
                // for each element in that row
                for (var j = 0, width = row.length; j < width; j++) {
                    // append our button with the appropriate class
                    output += '<button class="puzzleSquare" x="' + j + '" y="' + i + '">';
                    output += row[j] || '&nbsp;';
                    output += '</button>';
                }
                // close our div that represents a row
                output += '</div>';
            }

            $(el).html(output);
        };

        /**
         * Draws the words by inserting an unordered list into el.
         *
         * @param {String} el: The jQuery element to write the words to
         * @param {[String]} words: The words to draw
         */
        var drawWords = function (el, words) {

            var output = '<ul>';
            for (var i = 0, len = words.length; i < len; i++) {
                var word = words[i];
                output += '<li class="word ' + word + '">' + word;
            }
            output += '</ul>';

            $(el).prepend(output);
        };


        /**
         * Game play events.
         *
         * The following events handle the turns, word selection, word finding, and
         * game end.
         *
         */

            // Game state
        var startSquare, selectedSquares = [], curOrientation, curWord = '';

        /**
         * Event that handles mouse down on a new square. Initializes the game state
         * to the letter that was selected.
         *
         */
        var startTurn = function () {
            $(this).addClass('selected');
            startSquare = this;
            selectedSquares.push(this);
            curWord = $(this).text();
        };



        /**
         * Event that handles mouse over on a new square. Ensures that the new square
         * is adjacent to the previous square and the new square is along the path
         * of an actual word.
         *
         */
        var select = function (target) {
            // if the user hasn't started a word yet, just return
            if (!startSquare) {
                return;
            }

            // if the new square is actually the previous square, just return
            var lastSquare = selectedSquares[selectedSquares.length-1];
            if (lastSquare == target) {
                return;
            }

            // see if the user backed up and correct the selectedSquares state if
            // they did
            var backTo;
            for (var i = 0, len = selectedSquares.length; i < len; i++) {
                if (selectedSquares[i] == target) {
                    backTo = i+1;
                    break;
                }
            }

            while (backTo < selectedSquares.length) {
                $(selectedSquares[selectedSquares.length-1]).removeClass('selected');
                selectedSquares.splice(backTo,1);
                curWord = curWord.substr(0, curWord.length-1);
            }


            // see if this is just a new orientation from the first square
            // this is needed to make selecting diagonal words easier
            var newOrientation = calcOrientation(
                $(startSquare).attr('x')-0,
                $(startSquare).attr('y')-0,
                $(target).attr('x')-0,
                $(target).attr('y')-0
            );

            if (newOrientation) {
                selectedSquares = [startSquare];
                curWord = $(startSquare).text();
                if (lastSquare !== startSquare) {
                    $(lastSquare).removeClass('selected');
                    lastSquare = startSquare;
                }
                curOrientation = newOrientation;
            }

            // see if the move is along the same orientation as the last move
            var orientation = calcOrientation(
                $(lastSquare).attr('x')-0,
                $(lastSquare).attr('y')-0,
                $(target).attr('x')-0,
                $(target).attr('y')-0
            );

            // if the new square isn't along a valid orientation, just ignore it.
            // this makes selecting diagonal words less frustrating
            if (!orientation) {
                return;
            }

            // finally, if there was no previous orientation or this move is along
            // the same orientation as the last move then play the move
            if (!curOrientation || curOrientation === orientation) {
                curOrientation = orientation;
                playTurn(target);
            }

        };

        var touchMove = function(e) {
            var xPos = e.originalEvent.touches[0].pageX;
            var yPos = e.originalEvent.touches[0].pageY;
            var targetElement = document.elementFromPoint(xPos, yPos);
            select(targetElement)
        };

        var mouseMove = function() {
            select(this);
        };

        /**
         * Updates the game state when the previous selection was valid.
         *
         * @param {el} square: The jQuery element that was played
         */
        var playTurn = function (square) {

            // make sure we are still forming a valid word
            for (var i = 0, len = wordList.length; i < len; i++) {
                if (wordList[i].indexOf(curWord + $(square).text()) === 0) {
                    $(square).addClass('selected');
                    selectedSquares.push(square);
                    curWord += $(square).text();
                    break;
                }
            }
        };

        /**
         * Event that handles mouse up on a square. Checks to see if a valid word
         * was created and updates the class of the letters and word if it was. Then
         * resets the game state to start a new word.
         *
         */
        var endTurn = function () {

            // see if we formed a valid word
            for (var i = 0, len = wordList.length; i < len; i++) {

                if (wordList[i] === curWord) {
                    $('.selected').addClass('found');
                    wordList.splice(i,1);
                    $('.' + curWord).addClass('wordFound');
                }

                if (wordList.length === 0) {
                    complete();
                }
            }

            // reset the turn
            $('.selected').removeClass('selected');
            startSquare = null;
            selectedSquares = [];
            curWord = '';
            curOrientation = null;
        };

        /**
         * Given two points, ensure that they are adjacent and determine what
         * orientation the second point is relative to the first
         *
         * @param {int} x1: The x coordinate of the first point
         * @param {int} y1: The y coordinate of the first point
         * @param {int} x2: The x coordinate of the second point
         * @param {int} y2: The y coordinate of the second point
         */
        var calcOrientation = function (x1, y1, x2, y2) {

            for (var orientation in wordfind.orientations) {
                var nextFn = wordfind.orientations[orientation];
                var nextPos = nextFn(x1, y1, 1);

                if (nextPos.x === x2 && nextPos.y === y2) {
                    return orientation;
                }
            }

            return null;
        };

        var complete = function(){
            $('.puzzleSquare').addClass('complete');
            $.ajax({
                type: "POST",
                beforeSend: function(request) {
                    request.setRequestHeader("Authorization", "Bearer " + token);
                },
                url: "/api/puzzle/wordsearch",
                data: JSON.stringify({
                    unique_id:gvePuzzleId
                }),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                processData: false,
                success: function(msg) {
                    showNotification('top', 'center');
                }
            });
        };

        return {

            /**
             * Creates a new word find game and draws the board and words.
             *
             * Returns the puzzle that was created.
             *
             * @param {[String]} words: The words to add to the puzzle
             * @param {String} puzzleEl: Selector to use when inserting the puzzle
             * @param {String} wordsEl: Selector to use when inserting the word list
             * @param {Options} options: WordFind options to use when creating the puzzle
             */
            create: function(words, puzzleEl, wordsEl, options) {

                wordList = words.slice(0).sort();

                var puzzle = wordfind.newPuzzle(words, options);

                //console.log('puzzle = ', puzzle);

                // draw out all of the words
                drawPuzzle(puzzleEl, puzzle);
                drawWords(wordsEl, wordList);

                // attach events to the buttons
                // optimistically add events for windows 8 touch
                if (window.navigator.msPointerEnabled) {
                    $('.puzzleSquare').on('MSPointerDown', startTurn);
                    $('.puzzleSquare').on('MSPointerOver', select);
                    $('.puzzleSquare').on('MSPointerUp', endTurn);
                }
                else {
                    $('.puzzleSquare').mousedown(startTurn);
                    $('.puzzleSquare').mouseenter(mouseMove);
                    $('.puzzleSquare').mouseup(endTurn);
                    $('.puzzleSquare').on("touchstart", startTurn);
                    $('.puzzleSquare').on("touchmove", touchMove);
                    $('.puzzleSquare').on("touchend", endTurn);
                }

                return puzzle;
            },

            /**
             * Solves an existing puzzle.
             *
             * @param {[[String]]} puzzle: The puzzle to solve
             * @param {[String]} words: The words to solve for
             */
            solve: function(puzzle, words) {

                var solution = wordfind.solve(puzzle, words).found;

                for( var i = 0, len = solution.length; i < len; i++) {
                    var word = solution[i].word,
                        orientation = solution[i].orientation,
                        x = solution[i].x,
                        y = solution[i].y,
                        next = wordfind.orientations[orientation];

                    if (!$('.' + word).hasClass('wordFound')) {
                        for (var j = 0, size = word.length; j < size; j++) {
                            var nextPos = next(x, y, j);
                            $('[x="' + nextPos.x + '"][y="' + nextPos.y + '"]').addClass('solved');
                        }

                        $('.' + word).addClass('wordFound');
                    }
                }

                $('#solve').addClass('gameSolved');
                //$.post('/api/puzzle/wordsearch');


            }
        };
    };


    /**
     * Allow game to be used within the browser
     */
    window.wordfindgame = WordFindGame();

}(document, jQuery, wordfind));

$(function () {
    wordGen();
    //var words = ['save', 'earn'];
    // start a word find game
    var gamePuzzle = wordfindgame.create(
        wordList,
        '#puzzle',
        '#words',
        { height: gvePuzzleHeight,
    width:gvePuzzleWidth,
    fillBlanks: true
});
    $('#solve').click( function() {
        wordfindgame.solve(gamePuzzle, wordList);
    });
    // create just a puzzle, without filling in the blanks and print to console
    var puzzle = wordfind.newPuzzle(
        wordList,
        {height: 5, width:15, fillBlanks: true}
    );
    wordfind.print(puzzle);
});

var rwords=["abandon","abandoned","abattoir","abducted","abduction","abilities","ability","abnormal","abnormality","abnormally","abomination","above","aboveground","abrasive","absence","absent","absently","absentness","absolution","absorb","absorbable","absorbing","abstinence","abstinent","abstract","abstractly","absurd","absurdities","absurdity","absurdly","abuse","abusive","academic","academy","accepting","accessories","accident","accidental","accommodation","accomplice","accord","accountable","accuracy","accursed","ache","acid","acidic","acoustic","acrobat","acrobatic","action","actor","actress","actuality","acute","adaptive","addict","addiction","addictive","address","adequate","adherence","adhesive","adjustable","admiral","admission","adopter","adoption","adorable","adornment","adrenaline","adsorbable","adult","advancement","advantage","adventure","advertisement","advisor","advocate","aerial","aerobatic","aerodynamic","affair","affliction","affordable","aficionado","afraid","after","afterlife","aftermath","afternoon","aftershock","aftertaste","afterwards","afterworld","again","against","age","aged","ageless","agency","agenda","agent","aggression","aggressive","agility","agitator","agonizing","agony","agreeable","aim","aimless","air","airport","airship","airspace","airtight","alarm","alarming","alcohol","alcoholic","alibi","alien","alienate","align","alignment","allergenic","alley","alliance","allied","alligator","allotment","allow","allowable","almighty","almond","almost","alphabet","alphabetic","alphabetical","already","also","altercation","alternate","aluminium","always","amateur","amazement","amazing","amazingly","amber","ambidextrous","ambient","ambiguous","ambition","ambitious","ambivalent","ambulance","ambulatory","ambush","american","americana","ammonia","ammunition","amnesia","amnesiac","amoeba","amoebic","among","amongst","amoral","amphibian","amplitude","amputate","amputation","amulet","amuse","amusement","amusing","analysis","analyst","analytical","analyze","anatomy","ancestor","anchovies","androgynous","angel","anger","angriest","angry","anguish","animal","animalistic","animatronic","ankh","ankle","annihilate","annoying","annual","anonymous","answer","anteater","antelope","antelopes","anticlimactic","antidemocratic","antique","antiviral","anxiety","anxious","any","anybody","anyone","anyplace","anything","anytime","anyways","anywhere","apartment","ape","apocalypse","apocalyptic","apology","appalling","apparatus","apparent","apparently","apparition","appeal","appear","appearance","appetite","applause","apple","application","applied","appointment","approaching","approximation","apricot","aquamarine","aquarium","aquatic","arbitrary","arcane","arch","archer","architect","archive","area","ark","arm","armchair","armor","arms","army","aroma","arrival","arrogant","arrow","arrows","arson","arsonist","art","artificial","artist","ash","ashes","assassin","assassination","assault","assembly","associate","association","astounding","astronaut","atmosphere","atomic","atonement","atrocities","atrocity","attachment","attack","attacker","attacking","attempt","attic","attitude","attribute","auction","audacity","audience","audio","augmentation","authentic","authority","automatic","automatons","autonomous","autopilot","autopsy","auxiliary","available","avenging","average","aversion","aviator","avocado","avoid","awakening","award","awesome","awesomeness","awful","awkward","axe","axiom","axis","babble","babbling","baboon","baby","babysitter","bachelor","back","backbone","background","backward","backyard","bacon","bacteria","bad","badge","badger","badlands","badmouth","baffling","bag","bags","bait","bake","balance","balcony","bald","ball","ballerina","ballet","ballistic","ballistics","balloon","ballroom","baloney","bamboo","banana","bananas","bandsaw","bang","bank","bankroll","banquet","baptism","bar","barbarian","barbaric","barbell","barber","barbershop","barbwire","bare","bareknuckle","barge","bark","barn","barnacle","barnburner","barnyard","baron","barren","barricade","bars","barter","base","baseline","basement","bases","bash","basic","basin","basket","baster","bastion","bat","batch","battalion","battery","battle","battleground","bauble","bawling","bayonet","bazooka","beach","beacon","bead","beads","beak","beam","bean","bear","beard","bearskin","beast","beastly","beat","beaten","beautiful","beauty","beaver","became","because","become","becoming","bed","bedtime","beefcake","beehive","beekeeper","beeswax","beggar","begging","begin","beginner","beginning","behavior","behead","behind","behold","beholder","being","believable","believe","believer","believing","bell","belly","bellyache","bellybutton","bellyful","belong","belongings","below","belt","bench","bend","beneath","benefit","benevolent","bent","berserk","berserker","best","bestial","bet","betray","betrayal","better","between","bewitching","beyond","bible","biblical","big","biggest","bighead","bigmouth","bigwig","bike","bikini","billion","billionaire","bin","binding","binge","binocular","biological","biology","bionic","biplane","bird","birthday","birthmark","birthplace","bit","bite","biter","bitter","bitterness","bittersweet","bizarre","blabbermouth","black","blackheart","blacklist","blackmail","blackness","blackout","blackwater","bladder","blade","blame","bland","blank","blankly","blankness","blast","blasted","blaster","blasting","blaze","bleak","bleakly","bleakness","bleed","bleeder","bleeding","bleep","blemish","blend","blended","blender","bless","blessing","blimp","blind","blindfold","blinding","blindly","blindness","blink","blinking","blinks","blip","bliss","blissfully","blister","blizzard","bloat","blob","block","blockade","blocker","blockhead","bloke","blonde","blood","bloodlust","bloodsport","bloodstain","bloodstream","bloodsucker","bloodthirsty","bloody","bloom","blooper","blossom","blouse","blow","blowgun","blowtorch","blubber","bludgeon","blue","blueberry","blueprint","bluff","bluish","blunder","blunt","bluntness","blur","blurb","blurry","blurt","blush","blushing","bluster","boa","boar","boarder","boardinghouse","boardroom","boast","bodies","body","bogeyman","bold","boldly","bomb","bombastic","bomber","bone","bonus","boom","bootlegger","booze","border","born","bottle","bottom","bottomless","boulevard","bounce","bouncy","boundary","boutique","bovine","bowyer","box","brain","braincase","brainwash","brainwasher","branch","brand","brass","brave","brawler","breakable","breakaway","breakwater","breath","breathless","bribery","brick","bridge","brigade","bright","brightly","brilliant","brimstone","bring","bringer","broken","bronze","brood","brother","brown","brush","brutal","brutally","brute","brutish","bubble","bucket","buffer","buffet","bug","bughouse","building","bulging","bull","bulldog","bulldozer","bullet","bulletin","bullwhip","bully","bumble","bump","bumper","bunny","burden","burglary","burial","buried","burn","burning","burnt","business","butcher","buzz","bye","cable","cadaver","cage","calculation","calendar","calibration","call","calling","camel","candle","candy","candymaker","cannibal","cannibalism","cannon","canvas","canyon","capsule","captain","captive","captivity","capture","captured","caramel","caravan","carbon","carcass","carcinogenic","cardinal","caregiver","careless","caress","cargo","caribou","carnal","carnies","carnival","carnivore","carnivorous","carriage","carrion","carrot","cartel","carver","case","cashbox","casino","casket","cast","castle","cat","catch","category","caterpillar","cathedral","cattle","cave","cavity","ceaseless","celebration","celebrity","cell","cellblock","cellular","cement","centaur","center","central","century","ceramic","ceremonial","ceremony","chain","chair","chalk","challenge","chamber","chameleon","champion","channel","chant","chaos","chaotic","chapter","chapterhouse","charade","chargeable","charisma","charismatic","charm","charming","chart","checkpoint","cheerful","chef","chemical","cherry","chewable","chicken","chief","chieftain","child","childish","children","chill","chilly","chisel","choke","choker","choking","cholera","chop","chops","chromatic","chromosome","chronological","chunk","chunky","church","cinder","cinnamon","circle","circling","circuit","circuitry","circus","citizen","city","civilization","clairvoyant","clam","classic","claw","clay","clean","cleanup","clear","clever","climax","clinic","clock","closeup","closing","clot","cloth","cloud","clover","club","clubfoot","clubhouse","cluster","coal","coast","coastal","coat","cobra","coconut","cocoon","coddle","code","coercion","coffin","cognitive","coil","coincidence","coincidental","cola","cold","collar","collarbone","collectable","collection","collide","collider","collision","colonel","colony","color","colors","colt","column","coma","comatose","combat","combatant","combustible","comet","comfortable","command","commando","commercial","committee","common","communication","communion","compact","companion","company","compartment","compassionate","compelling","complete","complicated","composite","compound","compulsion","compulsive","computation","computer","comrade","concave","concept","conceptual","concert","conclusion","concrete","concussion","condemn","condemned","condition","condo","confidence","confident","confidential","conflict","confrontational","confuse","confused","confusion","connectedness","connection","connectivity","conqueror","conquest","conscious","conservative","console","conspiracy","constant","consultant","consumer","consumption","contagious","container","contaminant","contamination","contempt","content","contest","contestant","continental","continuous","contortionist","contractual","contradiction","contrast","control","controller","controversial","conversation","conversion","convertible","convext","convict","convulsion","copper","cords","corduroy","corporation","corpse","correlation","corrosion","corrosive","corruption","cortex","cosmetic","cosmic","cosmically","cosmonaut","costume","costumed","contemporary","cottage","cotton","couch","cougar","cough","council","country","countryside","couple","courage","courageous","coward","cows","coyotes","crab","crabs","crack","crackdown","crackpot","cradle","crafty","cranberry","crash","crasher","crater","crawl","crawler","crawling","crayon","crazy","creation","creative","creator","creature","credenza","creep","creeper","creepy","crew","cricket","crime","criminal","crimson","crisis","crisp","crispy","critical","crocodile","crook","crooked","crop","crossfire","crowd","crown","crucifier","crucifix","crucifixion","crude","cruel","cruelty","cruise","crumply","crunch","crush","crusher","crushing","crust","crutch","cry","crypt","cryptic","crystal","cube","cuddle","cuddly","cultish","cultural","cunning","curator","curfew","curiosities","curious","curse","cursed","curve","curved","cut","cuteness","cyanide","cybernetic","cyclical","cyclops","cynic","cynical","daddy","daisies","daisy","damage","damn","damnation","dancer","dancing","danger","dangerous","daredevil","daring","dark","dart","data","daughter","day","daydream","daydreamer","daylight","days","daytime","dazzling","dead","deadbeat","deadly","death","deathly","deathtrap","debate","debauchery","debug","decade","decadence","decadent","decapitation","decay","deceit","decent","deception","decipherer","decode","decoder","decomposition","decontamination","deduction","deep","deepwater","deer","defect","defection","defector","definitive","deformer","deformity","degenerate","degeneration","degrader","degrading","delete","deletion","delicacy","delicate","delicatessen","delicious","delight","deliverance","democracy","democratic","demolishment","demolition","demon","demonstration","dense","dent","department","dependent","deplorable","depression","derelict","describes","description","design","desire","desolate","despair","desperate","despisable","destiny","destroy","destruction","destructive","detachable","details","detainee","determined","detonator","detox","devastation","develop","devices","devil","devoid","devour","devout","dexterity","diabolatry","diabolic","diagonal","dial","diametric","diamond","diary","dictator","different","difficult","digital","dignitary","dilemma","dimension","dimensional","diminished","dinner","dinosaur","diplomacy","diplomat","diplomatic","direct","direction","director","dirt","dirty","disaster","disbeliever","disc","discharge","disciple","discipline","disclosure","disconnect","discontent","discord","discovery","discussion","disease","disfigured","disfigurement","disgusting","dishonest","disintegration","disk","dislikable","dismember","dismemberment","dismissal","disobey","disorientation","dispatch","disputed","disrupt","disrupter","dissolve","distancing","distant","distilery","distinct","distort","distortion","distribution","district","disturbance","ditch","diva","diversion","divine","divinity","division","divorce","dizzy","doberman","doctor","document","dog","dogs","dogtooth","doll","dolphin","dolphins","dome","domesticated","dominant","domination","domino","donation","donkey","donut","doom","doomsday","door","dope","dormant","dosage","dot","double","doubtless","dove","down","downcast","downfall","downhill","downriver","downtown","downward","dozen","dozens","drag","drain","drama","dramatic","dread","dream","dreamer","dreamland","dreamless","drench","dress","drift","drifter","drifting","drill","drimys","drink","drip","drive","driver","drone","drop","droplet","dropping","droppings","drops","drown","drowned","drowsy","drug","drugstore","drum","drumbeat","drunk","drunken","dry","dual","duck","duel","duke","dumb","dump","duplicate","dusk","dust","dynamic","dynamite","dynasty","eagle","ear","early","earthborn","earthmen","easier","east","eastern","easy","eat","eating","ebony","echo","edge","edit","eel","eerie","effective","egg","ego","egocentric","eigenvector","eight","elaborate","elastic","elbow","electric","electrode","electron","elegant","element","elephant","elephants","elevation","elevator","eliminate","elimination","elite","elongation","elsewhere","embrace","emerge","emergency","emotion","emotional","empathic","emperor","empire","empirical","empowerment","empty","encounter","encrypt","encryption","end","endless","endorsement","enemies","enemy","energy","enforcer","engine","enjoy","enlarge","enlighten","enormous","enrage","enter","enterprise","entertain","entity","entrance","entropy","envelope","enzyme","ephemeral","episode","equal","equation","equipment","equivalent","eraser","erotic","erotica","error","eruption","escalator","escape","escapist","esoteric","essence","essential","establishment","estate","estimate","eternal","eternity","ether","ethical","eunuch","evacuate","evacuation","evaluate","evectional","even","event","eventual","everlasting","every","everyday","everyone","evidence","evil","evoke","evolution","exact","examiner","excellent","exception","excess","excessive","exchange","excitement","exclusive","excuse","execute","executioner","executive","exhibit","exhibition","exile","existent","existing","exit","exorcism","expansion","experiment","expert","explicit","explosion","export","expose","exposition","expression","expressive","exquisite","extensive","external","extortion","extra","extract","extravagant","extreme","extremist","eye","eyes","eyetooth","fabric","fabrication","facade","face","faction","factory","factual","fade","fail","faint","fairytale","faith","faithless","fake","falcon","fall","falling","fallout","falls","false","family","famous","fanatic","fanatical","fancy","fang","fantastic","farm","fashion","fashionable","fast","fat","fatal","fatality","fate","fathead","father","favor","favorable","fear","fearless","fearsome","feast","feather","featherweight","feature","federal","federation","feed","feel","feeling","feelings","feet","fellow","felon","felony","felt","femur","fence","ferment","fermentation","ferocious","fertile","fertility","festival","fetish","feudal","fever","fiasco","fibreglass","fictional","field","fiend","fiendish","fierce","fiery","fight","fighter","fighting","figurehead","filament","film","filter","filth","filthy","fin","final","finale","financial","finch","find","finger","fingertip","finish","finishing","finite","fire","firearm","firecracker","firm","first","firstborn","fish","fist","fistfight","five","fix","fizz","flag","flags","flake","flamboyant","flamethrower","flaming","flammable","flap","flash","flat","flatness","flatten","flavor","flavoring","flaw","flawless","flesh","flicker","flight","flimsy","flinch","flip","flirt","flirtation","flood","flophouse","floppy","floral","flower","flowers","fluctuation","fluent","fluid","flunk","flush","flutter","flux","fly","flytrap","foam","focus","fog","foggy","fold","folding","folk","fool","foot","footwork","forbidden","force","forearm","foreign","forest","forger","forgery","forgiven","forgotten","fork","forlornness","form","formal","formula","formulation","fornicator","fort","fortress","fortunate","fortune","fortuneteller","forty","fossil","foul","foundation","founder","fountain","four","fraction","fracture","fragile","fragment","frame","frantic","fraud","fraudulent","freak","freakish","freaky","freckled","free","freedom","freewill","freeze","freezing","french","frequency","frequent","fresh","fried","friend","friendless","fright","frightening","frigid","fringe","frisky","frog","frogs","front","frontier","frost","frozen","frustration","frying","fuel","fugitive","fully","fumbling","functional","fundamental","funeral","funnel","furious","furry","fuse","future","futureless","futuristic","fuzz","fuzzy","gadget","galactic","gallery","galloping","gamble","gambler","game","gang","gangland","gaping","garage","garden","gargantuan","gargoyle","gasmask","gate","gateway","gaunt","gauntlet","gazelle","gear","gems","general","generation","genetic","genuine","geometric","geometrical","geometry","germ","gestural","getaway","ghetto","ghost","ghostly","ghoul","ghoulish","giant","gibberish","gift","gifted","gigantic","gimmick","ginger","giver","giving","glacial","glacier","gladness","glamor","glamorous","gland","glandular","glass","glider","glimmer","glitter","glittery","global","gloomy","glory","glossy","gloves","glow","glumly","glutton","gluttonous","goat","gobbling","god","godless","godsent","goggles","going","gold","goldbricker","goldfish","gone","good","goodbye","goofball","goon","gorgeous","gorilla","gossip","governor","grab","grabbing","graceful","grade","gradient","graffiti","grain","grainy","grand","grandiose","granite","granularity","grape","graphic","grappler","grasp","grasshopper","grateful","grave","gravel","graveyard","gravitational","gravy","gray","grease","greasy","great","greatest","greed","greedy","green","grenade","grey","grid","grieving","grill","grim","grin","grind","grinder","grinding","grinning","grip","gripping","grit","gritty","grizzly","groan","groaner","groaning","groove","groovy","gross","grotesque","ground","grounds","groundwave","group","growl","grunting","guaranteed","guard","guerilla","guest","guide","guidebook","guideline","guild","guillotine","guilt","guilty","gulf","gum","gun","gunk","gunplay","gunrunner","guns","gurgle","gurgling","guru","gushing","gutless","guts","gutsy","gutter","guzzling","gymnast","gymnastic","habit","habitual","hack","hacksaw","hairless","hairy","half","halfway","halloween","hallucination","halting","hammerhead","hamster","hand","handlebars","handler","hands","handsaw","hangar","hangman","hangover","happiness","happy","harbor","hard","harlot","harm","harmless","harmonic","harmony","harness","harplike","harpoon","harsh","harvest","hash","hat","hatch","hatchet","hate","haunt","haunting","hawk","haywire","hazard","hazy","head","headache","headlock","headphones","headquarters","headstrong","heal","healer","healing","healthy","hear","hearing","hearse","heart","heartbeat","heartbroken","heartless","hearts","heartsick","heat","heater","heating","heatstroke","heaven","heavenly","heaviest","heaving","heavy","heavyhearted","heavyset","heavyweight","hectic","heelbone","heist","helicopter","hell","hellfire","helmet","help","helpless","hemlock","herald","herb","herd","heretic","heretical","heritage","hermit","hero","heroes","heroic","hesitation","hex","hibernation","hickory","hidden","hide","hideaway","hideous","hideout","high","highway","hill","hills","hinge","hipbone","hippo","hirsute","hiss","historic","history","hit","hitchhiker","hive","hoax","hoaxer","hobby","hogtied","hogwash","hoist","hold","holding","holdup","holes","holiday","holiest","hollow","hollowness","holy","home","homeland","homeless","homemade","homesick","hometown","homewards","homicidal","homicide","honest","honesty","honey","honeybee","honeydew","honeymoon","honeypot","honor","honorary","hood","hoodwink","hoof","hoofs","hook","hooligan","hoop","hoopla","hooves","hop","hope","hopeless","hopper","hopscotch","horizon","horizontal","hormonal","horn","horoscope","horrible","horrific","horror","horrors","horse","horseback","horseplay","horsepower","horseradish","horses","hose","hospital","host","hostage","hostility","hot","hotel","hothead","hotly","hotter","hottest","hound","hour","house","houseguest","hover","how","however","howling","huffy","hug","huge","human","humanlike","humanly","humble","humid","humility","humming","hump","hunchback","hundred","hunger","hungry","hunk","hunt","hunter","hunting","hurdle","hush","hustle","hyaena","hybrid","hymn","hype","hypnotic","ideal","identical","identity","ignorant","iguana","illegal","imaginary","immunity","implant","imposter","imprint","improper","impure","indecent","industrial","industry","infinite","initial","injury","injustice","ink","inner","innocent","insane","insanity","insect","insecure","insurance","internal","intimate","intoxicant","intruder","invader","invention","inverse","invisible","invitation","iron","islamism","island","ivory","ivy","jackknife","jade","jagged","jar","jerid","jerk","jewel","jigsaw","joypop","joyride","joystick","judgment","juice","jump","junior","junk","junkyard","justice","juvenile","kangaroo","key","kick","kidnapper","kill","killjoy","kind","king","kingdom","kissing","kitten","knot","knowing","knuckle","knuckles","lady","ladybug","land","lands","landscape","lantern","large","largest","laser","lasso","last","lavender","leaf","leather","left","legend","legendary","legion","lemon","lethal","level","levitating","liberal","liberating","liberation","lick","licker","life","light","lightning","lights","lime","limitless","limousine","linear","link","lion","liqueur","liquid","liquor","little","live","liver","lizard","lock","lockbox","locus","locust","logic","logical","lollipop","loneliness","lonely","loner","lonesome","long","loop","loophole","lord","loser","lottery","love","lovesick","low","loyal","lubricant","luck","lucky","lullaby","luminous","lump","lurker","lust","lustre","luxurious","luxury","machine","mad","magic","magnet","magnetic","magnificent","major","marble","marginal","marsh","martingale","martini","martyr","mary","mask","massacre","massive","master","maximum","meat","mechanical","medicine","medusa","megacity","melody","melt","memory","menace","mental","messenger","messiah","metal","metallic","mightiest","mighty","military","milky","mind","mindless","minimal","minipill","mirror","miserable","misshapen","missing","mission","mistaken","mix","mixer","moan","moaning","mob","mobster","model","modern","mohawk","moist","molecular","molten","moment","momentary","monarchy","money","mongrel","monkey","monochrome","mood","moon","moonbeam","morbid","more","morsel","mortal","moth","mother","mountain","mouth","murder","murderer","murderous","murky","muscle","muscleman","muscular","mushroom","mustache","mutagen","mutant","mutation","mutilation","muzzle","mysterious","mystery","mystical","mythical","naive","naked","narcotic","nasty","national","natural","near","nebula","neck","necrotic","nectar","needle","negative","neon","nerve","nervous","neurotic","new","nice","night","nightfall","nightmare","nineteen","nitro","noble","noir","noise","noisemaker","nomad","nomadic","norm","normal","north","northern","nuclear","nude","number","numbskull","numeric","nurse","obey","object","observer","obsession","ocean","octopus","odd","offender","officer","official","old","omnivore","one","open","operatic","opposition","optimum","optional","orange","orangutang","orb","orchard","ordeal","original","ornamental","orphan","orphanage","orthodox","overt","owl","ox","pagan","pageant","pain","painkiller","painless","pale","pandemic","panic","paper","parachute","parade","paradise","paradox","parallel","paralysed","paralysis","parasite","parasitic","parcel","parrot","passenger","passion","paste","pastoral","patient","patrol","pattern","pavement","peach","pearl","peepshow","pelvic","penguin","peppermint","perception","percussive","perfect","perfection","perfume","perilous","periodic","perplexing","personal","pervert","perverted","pesky","pessimist","pest","phantom","pharaoh","phase","phenomena","phenomenal","philosophy","phonetic","phonograph","photograph","pick","picnic","pictorial","piece","pieces","pig","pigeon","pigsticker","pilgrim","pill","pillbox","pilot","pimp","pin","pinch","pineapple","pink","pinwheel","pipe","pipes","pistol","pitch","pity","plaid","planet","planetary","plant","plantation","plasma","plastic","play","playground","plaything","playtime","pleasant","plush","pneumatic","pocket","poet","poetic","poetry","poison","poisoner","poisonous","polar","polite","pony","poor","popular","pork","port","portal","portrait","position","positive","possess","possession","potential","pound","pounding","powder","power","powerful","powerless","practical","pragmatic","prank","prayer","predator","predatory","predict","prediction","prefab","present","preserve","president","pressure","presumed","pretend","primate","prime","primitive","prior","private","privilege","privileged","probe","process","production","profile","profound","program","project","projection","promise","promised","prong","proof","propaganda","propellant","propeller","proper","property","prophesy","prophet","prophetic","prophets","proposal","protect","protection","protest","proud","proven","provider","psycho","public","pull","pulse","punch","puppet","pure","purple","purpose","push","puzzle","pyramids","python","quantum","queen","quick","rabbit","racket","racoon","rage","raid","rain","rainfall","ranch","ransom","rapid","rare","raspberry","rassling","raster","rastle","rastled","rastling","rat","rattle","raven","raw","ray","really","rear","reason","rebel","recent","reckless","recluse","record","red","refugee","regional","regret","relearn","release","repeat","reptile","republic","rerun","research","retreat","revenge","reversal","reverse","revolt","rib","rich","riddle","right","rights","ring","riot","ripe","risky","rival","roast","robber","robbery","robot","robotic","rodent","room","root","rose","rot","rotten","rough","round","royal","royalty","rubber","ruby","rude","rum","rust","sabotage","sacred","sad","sadistic","sadness","saint","salt","salty","sand","sanitary","sauce","savage","sawdust","scanner","scar","scenic","scheme","schemer","scream","screamer","search","section","sector","seducer","seed","selfish","sentinel","serenity","series","serpent","serum","servant","settler","setup","seven","several","severe","sewage","sex","sexiest","sexless","sexual","shack","shackle","shadow","shag","shake","shaman","shameful","shark","sharp","shine","shipment","shock","shocking","short","shotgun","show","shrimp","sick","sideshow","sideways","signal","silence","silver","simple","sink","siren","sissy","six","skin","skull","sky","skyline","slap","slave","sleep","slippery","small","smallpox","smart","smile","smoke","smooth","smuggler","smut","snail","snake","social","soft","solid","solitary","some","someone","song","sonic","soon","sorrow","soul","sound","soup","source","south","southern","sparkle","sparkler","sparrow","speed","spell","sphere","spider","spike","spirit","spirits","sponge","sprite","sprites","square","stage","stallion","star","starfish","state","station","stealthy","steel","sticky","stiff","stone","strange","strong","stun","suave","subsonic","subway","suckle","sudden","sugar","sun","sunrise","super","surgeon","surgical","surreal","swamp","swarm","sweat","sweet","swindler","switch","swollen","symbol","symbolic","system","tactic","tactical","talk","tank","taste","teargas","teen","teeth","ten","tense","tenth","terminus","terrific","terror","thick","thief","thin","thing","things","think","threat","thumb","thunder","tiger","tight","time","timeless","timid","tin","tiny","tongue","tooth","top","torch","tornado","torpedo","total","toy","tragic","trap","trauma","treason","treasure","tree","treed","tremor","trial","triangle","true","trust","truth","twelve","twin","twisted","two","tyrant","ugly","ultimate","under","undersea","union","unit","unliving","unsure","uprising","uptown","urban","useless","vacant","vampire","vast","vibrator","victory","village","villain","vinyl","violence","violent","viper","virgin","virtual","vision","visitor","vixen","voice","void","volcanic","volcano","volume","vulture","wake","wall","war","warm","warmth","warning","warp","warrior","wartime","wasp","watch","water","waveform","wax","weak","wealthy","weapon","wearable","weasel","web","weed","weird","weirdo","wept","werewolf","west","western","westwork","wet","whale","whales","whip","whisper","wife","wig","wild","wilderness","willow","winter","wire","wisdom","wise","wish","witch","witness","wizard","wolf","wolves","wonder","world","worm","wreck","wreckage","wrong","young","zebra","zero","zipper","zombie","zoo"];


//Shuffle Array function
function shuffleWords(o) {
    for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
};

var wordList = [];

var numWords = gveWordCount;


function wordGen(){
    //numWords = numWords;
    rwords = shuffleWords(rwords);

    var a = 0;

    while(a < numWords){
        //arrStr = arrStr + ' <span class="savedWords" id="wordspan'+a+'">' + rwords[a] + '</span>';
        wordList.push(rwords[a]);
        a++;
    }
};

function showNotification(from, align){

    $.notify({
        icon: "done",
        message: "Well done for completing the Word Search. You have earned {{ $reward->symbol }} {{ $reward->converted }}"

    },{
        type: 'success',
        timer: 4000,
        placement: {
            from: from,
            align: align
        }
    });
}
