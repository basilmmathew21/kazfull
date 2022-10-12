<?php

namespace App\Exports;

use App\TopupCoupons;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TopupExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
		$allInput = TopupCoupons::select('id','topup_code','amount')
								->orderBy('topup_coupons.id','DESC')->get();
        return $allInput;
    }
	
	public function headings(): array
    {
        return [
            '#',
            'Topup Code',
            'Amount'
        ];
    }
}
