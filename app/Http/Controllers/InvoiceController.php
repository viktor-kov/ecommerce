<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{   
    //show the requested invoice
    public function show($id) {
        
        //only  the logged in users can see their invoices
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

    //update the invoice status
    public function updateStatus($id) {
        $invoice = Invoice::where('id', $id)->update(['active' => 0]);
        return redirect()->route('orders')->with('success', 'Objednávka vybavená!');
    }
}
