<?php

namespace App\Traits;

use App\Http\Requests\LanguageRequest;

trait imageTrait
{
    public function addImage($folderName)
    {
        $image = request('image')->getClientOriginalName();
        $path = request('image')->storeAs($folderName , $image , 'public');
        return $path;
    }
}