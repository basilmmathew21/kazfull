<?php
namespace App\Imports;
use App\CarBrand;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;

class BrandsImport implements ToModel
{
	
	public function model(array $row)
	{
		$pathinfo	=	explode("\\",$row[1]);
		copy($row[1],"upload-brand/".$pathinfo[4]);
		
		return new CarBrand([
			'name'   => $row[0],
            'icon'   => $pathinfo[4], 
            'status' => 1,
			]);

    }

}