<?php
use App\Models\invoices;
use SebastianBergmann\CodeCoverage\Util\Percentage;
////////////////////////////////////////////
if (!function_exists('totalInvoices')) {
    function totalInvoices()
    {
        return number_format(invoices::sum('Total'), 2);
    }
}

if(!function_exists('totalInvoicesCount')){
    function totalInvoicesCount()
    {
        return invoices::count();
    }
}
////////////////////////////////////////
if (!function_exists('unpaidInvoices')) {
    function unpaidInvoices()
    {
        return number_format(invoices::where('Value_Status', '2')->sum('Total'), 2);
    }
}
if(!function_exists('unpaidInvoicesCount')){
    function unpaidInvoicesCount()
    {
        return invoices::where('Value_Status', '2')->count();
    }
}
if(!function_exists('unpaidInvoicesPerCentage')){
    function unpaidInvoicesPerCentage()
    {
        return number_format(unpaidInvoicesCount() / totalInvoicesCount() * 100);
    }
}
//////////////////////////////////////////////
if (!function_exists('paidInvoices')) {
    function paidInvoices()
    {
        return number_format(invoices::where('Value_Status', '1')->sum('Total'), 2);
    }
}
if(!function_exists('paidInvoicesCount')){
    function paidInvoicesCount()
    {
        return invoices::where('Value_Status', '1')->count();
    }
}
if(!function_exists('paidInvoicesPerCentage')){
    function paidInvoicesPerCentage()
    {
        return number_format(paidInvoicesCount() / totalInvoicesCount() * 100);
    }
}
////////////////////////////////////////////
if (!function_exists('partialInvoices')) {
    function partialInvoices()
    {
        return number_format(invoices::where('Value_Status', '3')->sum('Total'), 2);
    }
}
if(!function_exists('partialInvoicesCount')){
    function partialInvoicesCount()
    {
        return invoices::where('Value_Status', '3')->count();
    }
}
if(!function_exists('partialInvoicesPerCentage')){
    function partialInvoicesPerCentage()
    {
        return number_format(partialInvoicesCount() / totalInvoicesCount() * 100);
    }
}
///////////////////////////////////////////
