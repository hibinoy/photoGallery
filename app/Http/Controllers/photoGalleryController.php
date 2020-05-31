<?php

namespace App\Http\Controllers;

use App\photoGalleryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PhotoGalleryRequest;

class PhotoGalleryController extends Controller
{
    /**
     * 画像の表示
     *
     * @return Response
     */
    public function index()
    {
        $model = new photoGalleryModel;
        $imagesAllPath = $model->getAllImages();
        return view('photoGallery', compact('imagesAllPath'));
    }

    /**
     * 画像の保存
     *
     * @param $request
     * @return Response
     */
    public function store(PhotoGalleryRequest $request)
    {
        $images = $request->images;
        $model = new photoGalleryModel;
        $model->insertImages($images);
        return redirect('/')->with('success', '画像をアップロードしました。');
    }

    /**
     * 画像の削除
     *
     * @param string $id
     * @return Response
     */
    public function delete(string $id)
    {
        $model = new photoGalleryModel;
        $model->deleteImage($id);
        return redirect('/')->with('success', '画像を削除しました');
    }
}
