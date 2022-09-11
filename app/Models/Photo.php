<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model  {
    protected $table = 'photo';

    const TYPE_UPLOAD 	= 1;
    const TYPE_URL 		= 2;

    public function tags() {
        return $this->hasMany(Tag::class, 'photo_id');
    }
}