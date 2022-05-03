<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDrug extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'drug_id',
        'quantity',
    ];
    /**
     * User
     *
     * @return Collection
     */
    public function drug()
    {
        return $this->belongsTo(Drug::class, 'drug_id', 'id');
    }
}
