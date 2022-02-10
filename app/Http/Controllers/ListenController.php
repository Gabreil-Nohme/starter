<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Models\Video;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ListenController extends Controller
{

    /*
    خطوات العمل
    1 model مع event ربط
    2 event مع listener ربط
    3 controller في event استتدعاء
    4 kernel في   listener&event ربط
    */
    public function get_vedio(){

        $video=Video::first();
        event(new VideoViewer($video));
        return view('offers.vedio',compact('video'));

    }
}
