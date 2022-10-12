<?php
namespace App\Imports;
use App\CarFeatures;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;

class CarFeaturesImport implements ToModel
{
	
	public function model(array $row)
	{
		$pathinfo	=	explode("\\",$row[1]);
		copy($row[1],"upload-icon/".$pathinfo[4]);
		
		return new CarFeatures([
			'name'   		=> $row[0],
			'name_somali'   => $row[0],
            'icon'   		=> $pathinfo[4], 
            'status' 		=> 1,
			]);
	}

}