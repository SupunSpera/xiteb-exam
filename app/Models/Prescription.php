<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'delivery_address',
        'delivery_time',
        'user_id',
    ];

    public function quotation()
    {
        return $this->hasOne(Quotation::class, 'prescription_id');
    }

    /**
     * get album images which belongs to album
     *
     * @return HasMany
     */
    public function prescriptionImages(): HasMany
    {
        return $this->hasMany(PrescriptionImage::class, 'prescription_id', 'id');
    }
}
