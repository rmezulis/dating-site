<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{
    protected $fillable = [
        'location'
    ];

    public function getPicture()
    {
        if (Storage::exists($this->location)) {
            return Storage::url($this->location);
        }
        return $this->location;
    }
}
