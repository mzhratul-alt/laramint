<?php

namespace App\Utility\File\Services;

use Illuminate\Support\Facades\Storage;

abstract class FileParent
{

    protected $file;
    protected string $view;


    private function temporayUrlGenerator($file): string
    {
        // dd('storage/' . $file->file);
        // if (Storage::missing('storage/public/' . $file))
        //     return '';

        return asset(Storage::url($file->file));
    }

    public function makeRenderFile()
    {
        return view($this->view, [
            'url' => $this->temporayUrlGenerator($this->file),
            'file' => $this->file
        ])->render();
    }
}
