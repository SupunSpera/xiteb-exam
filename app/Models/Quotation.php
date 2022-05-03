<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Quotation extends Model
{
    use HasFactory;

    const STATUS = [
        'PENDING' => 0,
        'ACCEPTED' => 1,
        'REJECTED' => 2,
    ];

    protected $fillable = [
        'user_id',
        'total',
        'prescription_id',
        'status',
    ];

    /**
     * get album images which belongs to album
     *
     * @return HasMany
     */
    public function quotationDrugs(): HasMany
    {
        return $this->hasMany(QuotationDrug::class, 'quotation_id', 'id');
    }

    /**
     * getByUser
     *
     */
    public function getByUser()
    {
        return $this->where('user_id', Auth::user()->id)->get();
    }
    /**
     * getByUser
     *
     */
    public function getByPrescription($prescriptionId)
    {
        return $this->where('prescription_id', $prescriptionId)->first();
    }

    /**
     * User
     *
     * @return Collection
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getTotalById($id)
    {
        return $this->total->where('id', $id);
    }
}
