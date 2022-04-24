<?php
namespace App\Services\CBru;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Models\Currency;
use Illuminate\Support\Facades\DB;
use PHPUnit\Runner\Exception;

class CBrepo{
    public $endpoint;
    public function __construct(){
        $this->endpoint = config('cbru.endpoint');
    }
    public function getDay(Carbon $day = null){
        if(is_null($day)){
            $day = now();
        }

        $req = new Client();
        $res = $req->get($this->endpoint,[
            'query' => ['date_req' => $day->format('d/m/Y')],
            'version' => 1.0,
		    'headers' => [
		        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0',
		        'Accept'     => 'application/xml; charset=windows-1251',
		        'Accept-Language' => 'ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3',
		        'Accept-Encoding' => 'gzip, deflate, br',
		        'Content-Type' => 'application/x-www-form-urlencoded',
		        'X-Requested-With' => 'XMLHttpRequest',
		        'Sec-Fetch-Dest' => 'empty',
				'Sec-Fetch-Mode' => 'cors',
				'Sec-Fetch-Site' => 'same-origin', 
		    ],
        ]);
        $data = simplexml_load_string($res->getBody()->getContents());
        $date = $data->attributes()->Date;
        foreach($data->Valute as $cur){
            Currency::updateOrCreate([
                'valuteID' => (string)$cur->attributes()->ID,
                'from' => Currency::FROM_CB_RU,
                'when' => Carbon::createFromFormat('d.m.Y',$date)->format('Y-m-d')
            ],[
                'numCode' => $cur->NumCode,
                'сharCode' => $cur->CharCode,
                'nominal' => (int)$cur->Nominal,
                'name' => $cur->Name,
                'value' => floatval(str_replace(',','.',(string)$cur->Value)),
            ]);
        }
    }

    public function getCurrencyDateRange(Carbon $start, Carbon $end){
        if($start > $end){
            throw new Exception('given wrong date range');
        }

        DB::beginTransaction();
            while($start <= $end){
                $this->getDay($start);
                $start->addDay();
            }
        DB::commit();

    }
}

?>