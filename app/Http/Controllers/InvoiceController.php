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
        
        //only  the logged in users can see their invoices or admin
        if(auth()->user()) {
            $invoice = Invoice::where('invoice_name', $id)->first();

            if($invoice->user_id == auth()->user()->id || auth()->user()->current_team_id) {
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
    public function updateStatus($id, $status) {
        
        $invoice = Invoice::findOrFail($id);

        //cant go back on product status, if we are trying to go from "home" to "packed" nothing will happen
        if($invoice->status < $status) {
            $invoice->update(['status' => $status]);
        }

        return back();
    }

    //function for finishing the order
    public function finishOrder($id) {
        $invoice = Invoice::findOrFail($id);
        $invoice->update([
            'active' => 0,
        ]);
        
        return back();
    }
}
