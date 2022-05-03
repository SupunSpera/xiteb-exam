<?php

namespace App\Http\Controllers;

use domain\Facades\Prescription\PrescriptionFacade;
use domain\Facades\Quotations\QuotationFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuotationController extends Controller
{
    public function create($id)
    {
        $response['prescription'] = PrescriptionFacade::get($id);
        return view('pages.pharmacy.quotations.create')->with($response);
    }

    public function index()
    {
        $response['quotations'] = QuotationFacade::getByUser(Auth::user()->id);
        return view('pages.pharmacy-user.quotations.index')->with($response);
    }
}
