@extends('layouts.layout')
@section('title', 'フォトギャラリー')
@section('css')
    <link href="{{ asset('css/photoGallery.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div id="photomain">

        <!-- 成功メッセージ-->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- 画像アップロードフォーム -->
        <form id="uploadForm" method="POST" action="" enctype="multipart/form-data">
            <input type="file" multiple name="photos[]">
            {{ csrf_field() }}
            <input type="submit" value="アップロード">
        </form>

    </div>
@endsection
@section('js')
    <script src="{{ asset('js/photoGallery.js') }}"></script>
@endsection