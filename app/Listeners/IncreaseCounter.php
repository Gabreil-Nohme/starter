<?php

namespace App\Listeners;

use App\Events\VideoViewer;
use App\Models\Video;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use App\Models\View;
class IncreaseCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
                //الربط مع event
    public function handle(VideoViewer $event)
    {
        $this -> updateviewer($event -> video);
    }
    function updateviewer($video){
        $id = Auth::id();
        $select=View::find($id);
        if(!isset($select)){
        View::create([
            'user_id'=>$id,
            'video_id'=>$video->id,
        ]);
        $video ->viewers=$video ->viewers +1;
        $video->save();
    }

    }
}
