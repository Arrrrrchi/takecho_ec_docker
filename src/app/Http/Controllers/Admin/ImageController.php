<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UploadImageRequest;
use InterventionImage;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::orderBy('updated_at', 'desc')->paginate(20);
        return view('admin.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UploadImageRequest $request)
    {
        $imageFiles = $request->file('files');

        

        if (!is_null($imageFiles)) {
            foreach ($imageFiles as $imageFile) {
                $post = new Post;

                $fileName = uniqid(rand() . '_');
                $extension = $imageFile['image']->extension();
                $fileNameToStore = $fileName . '.' . $extension;

                $path = Storage::disk('s3')->putFile('product', $imageFiles, 'public');
                $post->image_path = Storage::disk('s3')->url($path);
                $post->save();

                $resizedImage =InterventionImage::make($imageFile['image'])->resize(1920, 1080)->encode();

                // ローカルのpublic/products/フォルダ内に保存
                // Storage::put('public/products/' . $fileNameToStore, $resizedImage);

                 // S3へのアップロード
                Storage::disk('s3')->put('products/' . $fileNameToStore, $resizedImage, 'public');

                Image::create([
                    'admin_id' => Auth::id(),
                    'filename' => $fileNameToStore,
                ]);
            }
        }

        return redirect()
        ->route('admin.images.index')
        ->with([
            'message' => '画像を登録しました',
            'status' => 'info'
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $image = Image::findOrFail($id);

        return view('admin.images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'string|max:50'
        ]);

        $image = Image::findOrFail($id);
        $image->title = $request->title;
        $image->save();

        return redirect()
        ->route('admin.images.index')
        ->with([
            'message' => '画像情報を更新しました',
            'status' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Image::findOrFail($id);
        $filePath = 'public/products' . $image->filename;

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }

        $image->delete();

        return redirect()
        ->route('admin.images.index')
        ->with([
            'message' => '画像を削除しました',
            'status' => 'alert'
        ]);


    }
}
