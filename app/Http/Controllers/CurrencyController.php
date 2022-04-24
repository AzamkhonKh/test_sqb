<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Services\CBru\CBrepo;
use Carbon\Carbon;

class CurrencyController extends Controller
{
    //
    public function index(){
        $data = Currency::query();
        if($givenDate = request('when')){
            $data = $data->whereDate('when','=',$givenDate);
            $count = $data->count();
            if($count == 0){
                $cb = new CBrepo();
                $cb->getDay(Carbon::createFromFormat('Y-m-d',$givenDate));
            }
            $data = $data->get();
        }else{
            $data = $data->whereDate('when','>=',now()->firstOfMonth()->format('Y-m-d'))->get();

        }
        return view('currency.table',[
            'currencies' => $data
        ]);
    }
}
