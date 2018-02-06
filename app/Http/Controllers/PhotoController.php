<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    public function upload() {
      $albumTitle = request('albumTitle');
      $batch = request('batch');
      $photos = request('photos');

      $album = Album::findOrCreate($albumTitle);
      $album->title = $albumTitle;
      $album->createdByUserKey = Auth::user()->userKey;
      $album->save();

      foreach ($photos as $p) {
        if (! $p['caption']) {
          $p['caption'] = '&nbsp;';
        }
        
        $photo = new Photo();
        $photo->url = $p['url'];
        $photo->caption = $p['caption'];
        $photo->albumKey = $album->albumKey;
        $photo->batch = $batch;
        $photo->createdByUserKey = Auth::user()->userKey;
        $photo->save();
      }

      return redirect('/');
    }
}
