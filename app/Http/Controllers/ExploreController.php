<?php

namespace App\Http\Controllers;

use App\Models\Resort;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExploreController extends Controller
{
    public function page($location, $resort, $resort_id){
        $resort_detail = Resort::find($resort_id);
        $views = resource_path() . "/views/pages/explore/index.blade.php";
        if (file_exists($views)) {
            $title = Str::title($resort);
            return view("pages.explore.index", ['title' => Str::replace('-', ' ', $title), 'resort_detail' => $resort_detail]);
        } else {
            abort(404);
        }
    }
}
