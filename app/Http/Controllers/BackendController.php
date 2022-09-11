<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Photo;
use App\Models\Tag;

use Str;

class BackendController extends Controller
{
    public function home() {
        return view('upload');
    }

    public function doUpload() {
        $validated = Validator::make(request()->all(), [
            'provider' => 'required|max:255',
            'tags' => '',
            'file' =>  'required|mimes:png,jpg,bmp,gif,jpeg|max:2048',
        ]);

        if ($validated->fails()) {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }

        $photo = new Photo();
        $photo->name = request()->name;
        $photo->type = Photo::TYPE_UPLOAD;

        $filename = Str::random(16).".".request()->file('file')->getClientOriginalExtension();
        request()->file('file')->move($_SERVER['DOCUMENT_ROOT'].'/upload/', $filename);

        $photo->path = 'http://'.$_SERVER['REMOTE_ADDR'].'/upload/'.$filename;
        $photo->save();

        $tags = explode(',', request()->tags);
        foreach ($tags as $item) {
            $tag = new Tag();
            $tag->photo_id = $photo->id;
            $tag->name = trim($item);
            $tag->save();
        } 

        return redirect()->route('backend.home')->withAlert([
            'type' => 'info',
            'message' => 'Photo has been uploaded successfully.',
        ]);;
    }

    public function url() {
        return view('url');
    }

    public function doUrl() {
        $validated = Validator::make(request()->all(), [
            'provider' => 'required|max:255',
            'tags' => '',
            'url' =>  'required|url',
        ]);

        if ($validated->fails()) {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }

        $photo = new Photo();
        $photo->name = request()->name;
        $photo->type = Photo::TYPE_URL;
        $photo->path = request()->url;
        $photo->save();

        $tags = explode(',', request()->tags);
        foreach ($tags as $item) {
            $tag = new Tag();
            $tag->photo_id = $photo->id;
            $tag->name = trim($item);
            $tag->save();
        } 

        return redirect()->route('backend.url')->withAlert([
            'type' => 'info',
            'message' => 'Photo has been uploaded successfully.',
        ]);;
    }    
}
