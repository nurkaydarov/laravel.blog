<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Category extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'background'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    public function setTitleAttribute($value)
    {

        $this->attributes['title'] = Str::title($value);
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public static function uploadImage(Request $request, $image = null)
    {
        if($request->hasFile('background'))
        {
            if($image)
            {
                Storage::delete('background');
                $folder = date('Y-m-d');
                return $request->file('background')->store("images/$folder");
            }
        }
        return null;
    }

    public function getImage():string
    {
        if(!$this->background)
        {
            return asset('assets/No_image_available.png');
        }
        return asset("uploads/$this->background");
    }
}

