<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\invoices_attachments;
use App\Models\invoices_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class InvoicesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoices_details  $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function show(invoices_details $invoices_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoices_details  $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoices=invoices::where('id',$id)->first();
        $invoiceDetails=invoices_details::where('id_Invoice',$id)->get();
        $invoiceAttatchment = invoices_attachments::where('invoice_id',$id)->get();
        return view('invoices.invoiceDetails',compact(['invoices','invoiceDetails','invoiceAttatchment']));
       }
       public function edit1($id)
    {
         $invoices=invoices::withTrashed()->where('id',$id)->first();
        $invoiceDetails=invoices_details::where('id_Invoice',$id)->get();
        $invoiceAttatchment = invoices_attachments::where('invoice_id',$id)->get();
        return view('invoices.invoiceDetails',compact(['invoices','invoiceDetails','invoiceAttatchment']));
       }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoices_details  $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoices_details $invoices_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoices_details  $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $invoices = invoices_attachments::findOrFail($request->id_file);
        $invoices->delete();
        Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }
    public function get_file($invoice_number,$file_name){
        return Storage::disk('public_uploads')->download($invoice_number.'/'.$file_name);

    }
     public function open_file($invoice_number,$file_name){
          //$files=Storage::disk('public_uploads')->getDriver()->getAdapter()->applayPathPrefix($invoice_number.'/'.$file_name);
       // dd($invoice_number . '/' . $file_name);
      //  return Storage::disk('public_uploads')->applayPathPrefix($invoice_number.'/'.$file_name)->get();
       $path = public_path('Attachments/' . $invoice_number . '/' . $file_name);
       return response()->file($path);
    }
}