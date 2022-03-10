<?php
namespace App\Helpers;

class UploadImage
{
    public static function upload($file, $path, $name, $resize = null)
    {
      $filename = $name .  '.' . $file->getClientOriginalName();
      $url = $file->storeAs($path, $filename);

      // resize cover to 800px
      // $img = Image::make("storage/" . $filename);
      // $img->resize($resize, null, function ($constraint) {
      //     $constraint->aspectRatio();
      // });
      // $img->save();

      return $url;
    }
}