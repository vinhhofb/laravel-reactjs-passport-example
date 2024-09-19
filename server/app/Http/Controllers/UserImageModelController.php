<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadImageModelRequest;
use App\Models\UserImageModel;
use Illuminate\Support\Facades\Auth;

class UserImageModelController extends Controller
{
    public function captureModel(UploadImageModelRequest $request)
    {
        $image = $request->input('image');
        list($type, $data) = explode(';', $image);
        list(, $data) = explode(',', $data);

        $data = base64_decode($data);

        $fileName = uniqid() . '.jpg';

        $uploadPath = public_path('user-image-models');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        file_put_contents($uploadPath . '/' . $fileName, $data);

        UserImageModel::create([
            'user_id' => Auth::id(),
            'file_name' => $fileName,
        ]);

        return response()->json(['message' => 'Image uploaded successfully', 'file' => $fileName]);
    }

    public function getUserImages() {
        $images = UserImageModel::where('user_id', auth()->id())->get(['file_name']);

        return response()->json(['images' => $images]);
    }
}
