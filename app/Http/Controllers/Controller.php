<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home() {
      $albums = Album::all();

      return view('gallery', [
        'albums' => $albums
      ]);
    }

    public function latest() {
      $batch = Photo::max('batch');

      //get the albums with photos in the latest batch
      $albums = Album::whereHas('photos', function($query) {
        $query->where('batch', Photo::max('batch'));
      })->get();

      //remove any photos that are not in the latest batch
      foreach ($albums as $album) {
        $photos = array();

        foreach($album->photos as $photo) {
          if ($photo->batch == $batch) {
            array_push($photos, $photo);
          }
        }

        $album->photos = $photos;
      }

      return view('gallery', [
        'albums' => $albums
      ]);
    }

    public function upload() {
      $batch = Photo::max('batch') + 1;

      return view('upload', [
        'batch' => $batch
      ]);
    }
}
