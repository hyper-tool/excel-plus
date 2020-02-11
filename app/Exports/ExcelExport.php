<?php

namespace App\Exports;

//use App\Models\Excel;
use Maatwebsite\Excel\Concerns\FromArray;

class ExcelExport implements FromArray
{
    protected $invoices;

    public function __construct(array $invoices)
    {
        $this->invoices = $invoices;
    }

    public function array(): array
    {
        return $this->invoices;
    }
}
