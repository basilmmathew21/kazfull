<?php
namespace App\Imports;
use App\Currency;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;

class CurrencyImport implements ToModel
{
	
	public function model(array $row)
	{
		$pathinfo	=	explode("\\",$row[1]);
		copy($row[1],"upload-icon/".$pathinfo[4]);
		
		return new Currency([
			'country_id' => 21,
			'currency'   => '$',
            'status' 	 => 1,
			]);
	}

}