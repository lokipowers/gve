<div class="card ">
    <div class="card-header card-header-primary">
        <h4 class="card-title">{{ $title }}</h4>
        @if(isset($category))
           <p class="card-category">{{ $category }}</p>
        @endif
    </div>
    <div class="card-body">
