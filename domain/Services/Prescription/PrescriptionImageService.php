<?php

namespace domain\Services\Prescription;

use App\Models\Prescription;
use App\Models\PrescriptionImage;
use Illuminate\Database\Eloquent\Collection;


/**
 * Prescription Service
 *
 * php version 8
 *
 * @category Service
 *
 * */
class PrescriptionImageService
{
    protected $prescriptionImage;

    public function __construct()
    {
        $this->prescriptionImage = new PrescriptionImage();
    }

    /**
     * Get prescription using ID
     *
     * @param  int $id
     */
    public function get(int $id)
    {
        return $this->prescriptionImage->find($id);
    }
    /**
     * Get prescription  using md5 ID
     *
     * @param  string $id
     * @return Collection
     */
    public function getByMd5Id(string $id): ?PrescriptionImage
    {
        return $this->prescriptionImage->getByMd5Id($id);
    }

    /**
     * Get all prescription
     *
     * @return Collection
     */
    public function all(): ?Collection
    {
        //Get all prescription
        return $this->prescriptionImage->all();
    }
    /**
     * Make prescription Array
     *
     * @param  Array $data
     * @return PrescriptionImage
     */
    public function make(array $data): ?PrescriptionImage
    {
        return $this->create($data);
    }
    /**
     * Store prescription Array In database
     *
     * @param  Array $data
     * @return PrescriptionImage
     */
    public function create(array $data): ?PrescriptionImage
    {
        return $this->prescriptionImage->create($data);
    }



    /**
     * Update prescription
     *
     * @param  PrescriptionImage $prescription
     * @param  array $data
     * @return void
     */
    public function update(PrescriptionImage $prescriptionImage, array $data): void
    {
        $prescriptionImage->update($this->edit($prescriptionImage, $data));
    }

    /**
     * Edit prescription
     *
     * @param  PrescriptionImage $prescription
     * @param  array $data
     * @return array
     */
    protected function edit(PrescriptionImage $prescriptionImage, array $data): array
    {
        return array_merge($prescriptionImage->toArray(), $data);
    }

    /**
     * Delete prescription
     *
     * @param  PrescriptionImage $prescription
     * @return void
     */
    public function delete(PrescriptionImage $prescriptionImage): void
    {
        $prescriptionImage->delete();
    }
}
