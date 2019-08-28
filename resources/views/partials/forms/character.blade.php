
<form method="post" action="{{ route($route ?? '') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    @method('post')

    @include('partials.cards.open', ['title' => 'Character Information', 'category' => 'Choose wisely. You can only have one active character'])
            @if (session('status'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                            <span>{{ session('status') }}</span>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <h6>Character Avatar</h6>
                    @include('partials.form-elements.image-upload', ['name' => 'character_avatar'])
                </div>
                <div class="col-md-6">
                    @include('partials.form-elements.input', ['label' => 'Character Name', 'name' => 'name', 'required' => true])
                    @include('partials.form-elements.textarea', ['label' => 'Description', 'name' => 'description'])
                    @include('partials.form-elements.check-radio', ['label' => 'Choose your side', 'required' => true, 'name' => 'side', 'type' => 'radio', 'inline' => true, 'options' => [
                        'GOOD' => 'Good',
                        'BAD' => 'Bad',
                        'MIDDLE' => 'On the fence'
                    ]])
                </div>
            </div>

    @include('partials.cards.close', ['footer' => '<button type="submit" class="btn btn-primary">Create Character</button>'])
</form>

