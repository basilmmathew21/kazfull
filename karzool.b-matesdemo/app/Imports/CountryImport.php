<?php
namespace App\Imports;
use App\Countries;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;

class CountryImport implements ToModel
{
	
	public function model(array $row)
	{
		$pathinfo	=	explode("\\",$row[1]);
		copy($row[1],"upload-flag/".$pathinfo[4]);
		
		return new Countries([
			'name'   => $row[0],
            'flag'   => $pathinfo[4], 
            'status' => 1,
			]);

    }

}