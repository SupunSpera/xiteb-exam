<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    public $primaryKey = 'id';

    protected $fillable = [
        'name', 'url',
    ];
    protected $append = [
        'img_url',
    ];

    public function getImgUrlAttribute()
    {
        return Storage::url("{$this->url}");
    }
}
