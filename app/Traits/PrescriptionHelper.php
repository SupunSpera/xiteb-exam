<?php

namespace App\Traits;


trait PrescriptionHelper
{

    /**
     * getTimeSlot
     *
     * @param  mixed $id
     * @return string
     */
    public function getTimeSlot($id)
    {
        return config('timeslots.' . $id);
    }


    /**
     * dateFormat
     *
     * @param  mixed $date
     * @return void
     */
    public function dateFormat($date)
    {
        if ($date) {
            return date_format($date, 'M d Y - h:i a');
        }
    }
}
