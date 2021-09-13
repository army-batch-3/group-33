<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Transportation;
use App\DataTables\TransportationDataTableEditor;


class TransportationController extends Controller
{
    public function transportation(){
        return view("transportation");
    }
    public function storeTransportation(TransportationDataTableEditor $transportationData)
    {
      return $transportationData->process(request());
    }

    public function getTransportation()
    {
        $transportation = Transportation::all();
        return Datatables::of($transportation)->make(true);
    }
}