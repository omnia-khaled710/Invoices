<?php

namespace App\Exports;

use App\Models\invoices;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class InvoicesExport implements FromCollection
class InvoicesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return invoices::select('invoice_number as number')->get();
    // }
    public function view(): View
    {
        return view('exports.invoices', [
            'invoices' => Invoices::all()
        ]);
    }
}
