<?php

namespace domain\Services\Quotations;

use App\Models\Quotation;
use Illuminate\Database\Eloquent\Collection;


/**
 * Prescription Service
 *
 * php version 8
 *
 * @category Service
 *
 * */
class QuotationService
{
    protected $quotation;

    public function __construct()
    {
        $this->quotation = new Quotation();
    }
    /**
     * Get quotation using ID
     *
     * @param  int $id
     */
    public function get(int $id)
    {
        return $this->quotation->find($id);
    }

    public function getTotalById(int $id)
    {
        return $this->quotation->getTotalById($id);
    }

    /**
     * getByUser
     *
     * @return mixed
     */
    public function getByUser()
    {
        return $this->quotation->getByUser();
    }
    /**
     * getByPrescription
     *
     * @return mixed
     */
    public function getByPrescription($prescriptionId)
    {
        return $this->quotation->getByPrescription($prescriptionId);
    }

    /**
     * Get all quotation
     *
     * @return Collection
     */
    public function all(): ?Collection
    {
        //Get all quotation
        return $this->quotation->all();
    }
    /**
     * Make quotation Array
     *
     * @param  Array $data
     * @return Quotation
     */
    public function make(array $data): ?Quotation
    {
        return $this->create($data);
    }
    /**
     * Store quotation Array In database
     *
     * @param  Array $data
     * @return Quotation
     */
    public function create(array $data): ?Quotation
    {
        return $this->quotation->create($data);
    }

    /**
     * Update quotation
     *
     * @param  Quotation $quotation
     * @param  array $data
     * @return void
     */
    public function update(Quotation $quotation, array $data): void
    {
        $quotation->update($this->edit($quotation, $data));
    }

    /**
     * Edit quotation
     *
     * @param  Quotation $quotation
     * @param  array $data
     * @return array
     */
    protected function edit(Quotation $quotation, array $data): array
    {
        return array_merge($quotation->toArray(), $data);
    }

    /**
     * changeStatus
     *
     * @param  mixed $id
     * @return void
     */
    public function acceptQuotation($quotation)
    {
        return  $this->update($quotation, ['status' => Quotation::STATUS['ACCEPTED']]);
    }
    /**
     * changeStatus
     *
     * @param  mixed $id
     * @return void
     */
    public function rejectQuotation($quotation)
    {
        return  $this->update($quotation, ['status' => Quotation::STATUS['REJECTED']]);
    }

    /**
     * Delete quotation
     *
     * @param  Quotation $quotation
     * @return void
     */
    public function delete(Quotation $quotation): void
    {
        $quotation->delete();
    }
}
