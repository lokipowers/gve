<div class="fileinput fileinput-new text-center" data-provides="fileinput">
    <input
        type="file"
        class="dropify"
        name="{{ $name }}"
        data-height="{{ $height ?? 300 }}"
    >
</div>

@push('js')
    <script src="{{ asset('vendors') }}/js/dropify.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.dropify').dropify();
        });
    </script>
@endpush

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors') }}/css/dropify.min.css" />
@endpush
