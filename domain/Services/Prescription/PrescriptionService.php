<?php

namespace domain\Services\Prescription;

use App\Models\Prescription;
use Illuminate\Database\Eloquent\Collection;


/**
 * Prescription Service
 *
 * php version 8
 *
 * @category Service
 *
 * */
class PrescriptionService
{
    protected $prescription;

    public function __construct()
    {
        $this->prescription = new Prescription();
    }
    /**
     * Get prescription using ID
     *
     * @param  int $id
     */
    public function get(int $id)
    {
        return $this->prescription->find($id);
    }

    /**
     * Get all prescription
     *
     * @return Collection
     */
    public function all(): ?Collection
    {
        //Get all prescription
        return $this->prescription->all();
    }
    /**
     * Make prescription Array
     *
     * @param  Array $data
     * @return Prescription
     */
    public function make(array $data): ?Prescription
    {
        return $this->create($data);
    }
    /**
     * Store prescription Array In database
     *
     * @param  Array $data
     * @return Prescription
     */
    public function create(array $data): ?Prescription
    {
        return $this->prescription->create($data);
    }

    /**
     * Update prescription
     *
     * @param  Prescription $prescription
     * @param  array $data
     * @return void
     */
    public function update(Prescription $prescription, array $data): void
    {
        $prescription->update($this->edit($prescription, $data));
    }

    /**
     * Edit prescription
     *
     * @param  Prescription $prescription
     * @param  array $data
     * @return array
     */
    protected function edit(Prescription $prescription, array $data): array
    {
        return array_merge($prescription->toArray(), $data);
    }

    /**
     * Delete prescription
     *
     * @param  Prescription $prescription
     * @return void
     */
    public function delete(Prescription $prescription): void
    {
        $prescription->delete();
    }
}
