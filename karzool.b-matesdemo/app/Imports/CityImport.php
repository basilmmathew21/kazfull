<?php
namespace App\Imports;
use App\City;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;

class CityImport implements ToModel
{
	
	public function model(array $row)
	{
		
		return new City([
			'name'   => $row[0],
			'name_somali' => $row[0],
            'country_id'   => 21, 
            'status' => 1,
			]);

    }

}