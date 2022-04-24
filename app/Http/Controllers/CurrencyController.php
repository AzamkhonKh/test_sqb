<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Services\CBru\CBrepo;
use Carbon\Carbon;
use App\Http\Requests\currency\rangeRequest;

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
            $data = $data->orderBy('сharCode');
        }else{
            $data = $data->whereDate('when','>=',now()->firstOfMonth()->format('Y-m-d'))->orderBy('сharCode');

        }
        return view('currency.table',[
            'currencies' => $data->get()
        ]);
    }

    public function currency_by_range(rangeRequest $req){
        $data = Currency::query();
        $data = $data->whereDate('when','>=',$req->input('from'));
        $data = $data->whereDate('when','<=',$req->input('to'));
        return response()->json($data->orderBy('сharCode')->get(),201);
    }
    public function log_currency_by_range(rangeRequest $req){
        $cb = new CBrepo();
        $from = Carbon::createFromFormat('Y-m-d',$req->input('from'));
        $to = Carbon::createFromFormat('Y-m-d',$req->input('to'));
        $cb->getCurrencyDateRange($from,$to);
        return response()->json(true,201);
    }

}
