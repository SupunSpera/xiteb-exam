<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    const STATUS = [
        "DRAFT" => 0,
        "PUBLISHED" => 1,
        "SENT" => 2,
        "CANCELLED" => 3,
    ];


    protected $fillable = [
        'title', 'description', 'link', 'status', 'send_time'
    ];

    public function publishedNotifications()
    {
        return $this->where('status', self::STATUS['PUBLISHED'])->where('send_time', '<=', Carbon::now())->get();
    }
}
