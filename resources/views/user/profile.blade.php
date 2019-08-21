@extends('layouts.app')

@section('content')
    <user-profile :user="{{ json_encode( $profileUser ) }}"></user-profile>
@endsection

@section('footer-scripts')
<script src="/js/dropify.js"></script>
@endsection
