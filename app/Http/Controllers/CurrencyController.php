<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    //
    public function index(){
        return view('currency.table',[
            'currencies' => Currency::whereDate('when','>=',now()->firstOfMonth()->format('Y-m-d'))->get()
        ]);
    }
}
