<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Photo;
use App\Models\Tag;

use Str;

class ApiController extends Controller
{
    public function search() {
		$provider = empty(request()->provider) ? '' : request()->provider;
    	$keyword = empty(request()->keyword) ? '' : request()->keyword;

        $tags = Tag::where('name', 'LIKE', $keyword.'%')->get()->toArray();
        $photoIds = array_column($tags, 'photo_id');
        if (empty($photoIds)) {
        	$photoIds = [0, ];
        }
        $photos = Photo::whereIn('id', $photoIds);
		if ($provider != '') {
			$photos = $photos->where('provider', $provider);
		}
		$photos = $photos->get();

        $results = [];
        foreach ($photos as $value) {
        	$tags = $value->tags->toArray();
        	$tags = array_column($tags, 'name');
        	$results[] = [
        		'id' => $value->id,
        		'path' => $value->path,
				'provider' => $value->provider,
        		'tags' => $tags,
        	];
        }
        return $results;
    }   
}
