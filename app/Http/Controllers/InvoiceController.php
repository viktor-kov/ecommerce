<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    public function show($id) {
        
        if(auth()->user()) {
            $invoice = Invoice::where('invoice_name', $id)->first();

            if($invoice->user_id == auth()->user()->id) {
                return response()->file(storage_path('app/invoices/').$id);
            }
            else {
                abort(403);
            }
        }
        else {
            return abort(403);
        }
    }

    public function deletePDF($id) {

        if(auth()->user()) {
            $invoice = Invoice::where('invoice_name', $id)->first();

            if($invoice) {
                if($invoice->user_id == auth()->user()->id) {
                    $invoice_id = $invoice->id;
                    $delete_invoice_pdf = Storage::disk('local')->delete('/invoices/'.$id);
                    $delete_invoice= Invoice::where('id', $invoice_id)->delete();
                    
                    return back();
                }
                else {
                    return abort(403);
                }
            }
            else {
                return back();
            }
        }

    }
}
