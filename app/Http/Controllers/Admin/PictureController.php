<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function destroy(Picture $picture)
    {

        $picture->delete();
        return '';
    }
}
