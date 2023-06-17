<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\MateriDeleteEvent;
use App\Models\Materi;
use Illuminate\Support\Str;
use DomDocument;
use Illuminate\Support\Facades\File;

class MateriDeleteListener
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

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(MateriDeleteEvent $event)
    {
        $materi = $event->materi;
        
        File::delete(public_path('uploads/img/materi/'.$materi->thumbnail));
        
        $content = $materi->deskripsi;
        $dom = new DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');

        foreach($images as $img){
            $data = $img->getAttribute('src'); 
            File::delete(public_path($data));
        }
    }
}