<?php

namespace App\Exports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class PropertyExport implements FromCollection, WithHeadings, WithEvents, WithColumnFormatting
{
    protected $properties;

    function __construct($properties){
        $this->properties=$properties;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        foreach($this->properties as $key => $property)
        {
            $id = $property->id;
            $propertystatus = Property::find($id);
            $propertystatus->download_status = 'yess';
            $propertystatus->save();    
            $ClientCollection[$key]['address'] = $property->address;
            $ClientCollection[$key]['owner_name'] = $property->owner_name;
            $ClientCollection[$key]['owner_email'] = $property->owner_email;
            $ClientCollection[$key]['owner_no'] = $property->owner_no;
            $ClientCollection[$key]['scoutname'] = (!empty($property->user->name) ?  $property->user->name : 'N/A');
        }

        return collect($ClientCollection);
    }
    public function headings(): array
    {
        return [
            'Address',	
            'Owner Name',	
            'Owner Email',	
            'Owner No',
            'Scout Name',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:T1')->getFont()->setBold(true);
            },
        ];
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_TEXT
        ];
    }
}
