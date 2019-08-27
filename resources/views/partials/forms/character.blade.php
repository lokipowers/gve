
<form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
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
            @include('partials.form-elements.input', ['label' => 'Character Name', 'name' => 'name', 'required' => true])
            @include('partials.form-elements.textarea', ['label' => 'Description', 'name' => 'description'])
            @include('partials.form-elements.check-radio', ['label' => 'Choose your side', 'name' => 'side', 'type' => 'radio', 'inline' => true, 'options' => [
                'GOOD' => 'Good',
                'BAD' => 'Bad',
                'MIDDLE' => 'On the fence'
            ]])
            @include('partials.form-elements.image-upload', ['name' => 'character_avatar'])
    @include('partials.cards.close', ['footer' => '<button type="submit" class="btn btn-primary">Create Character</button>'])
</form>

