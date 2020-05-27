@extends('layouts.layout')
@section('title', 'フォトギャラリー')
@section('css')
    <link href="{{ asset('css/photoGallery.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div id="photomain">

        {{-- 成功メッセージ --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- 画像一覧表示 --}}
        <div class="container">
            @foreach ($imagesAllPath as $image)
                <dl class="img">
                    <dd>
                        <img src="{{ $image['path'] }}">
                    </dd>
                    <dd>
                        {{ $image['name'] }}
                    </dd>
                    <dd class="delete" data-id="{{ $image['id'] }}">
                        削除
                    </dd>
                </dl>
                <form id="f_{{ $image['id'] }}" method="post" action="/{{ $image['id'] }}">
                    @csrf
                    {{ method_field('DELETE') }}
                </form>
            @endforeach
                @for ($i = 0; $i < $image['emptyColumn']; $i++)
                    <dl class="img">
                    </dl>
                @endfor
        </div>

        {{-- 画像アップロードフォーム --}}
        <form id="uploadForm" method="POST" action="" enctype="multipart/form-data">
            <input type="file" multiple name="photos[]">
            @csrf
            <input type="submit" value="アップロード">
        </form>

    </div>
@endsection
@section('js')
    <script src="{{ asset('js/photoGallery.js') }}"></script>
@endsection