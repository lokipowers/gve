@if (\Session::has('success'))
    <div class="col-12 alert alert-success">
        <ul class="mb-0" style="padding-left:0;">
            @foreach(Session::get('success') as $success)
                <li style="list-style:none;">{!! $success !!}</li>
            @endforeach
        </ul>
    </div>
@endif
@if($errors->any())
    <div class="col-12 alert alert-danger">
        <ul class="mb-0" style="padding-left:0;">
            <li style="list-style:none;">{!! $errors->first() !!}</li>
        </ul>
    </div>
@endif
