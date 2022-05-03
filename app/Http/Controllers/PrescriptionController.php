<?php

namespace App\Http\Controllers;

use domain\Facades\Prescription\PrescriptionFacade;

class PrescriptionController extends Controller
{
    public function create()
    {
        return view('pages.pharmacy-user.prescription.create');
    }

    /**
     * index
     *
     * @return view
     */
    public function index()
    {
        return view('pages.pharmacy-user.prescription.index');
    }

    /**
     * Display a  customer messages using id
     *
     * @param  int $id
     *
     */
    public function view(int $id)
    {
        $response['prescription'] = PrescriptionFacade::get($id);
        return view('pages.pharmacy-user.prescription.view')->with($response);
    }
}
