<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\StorageProduct;

class StorageUpdate extends Component
{
    public $single_product;
    public $product_amount_update;
    protected $product_id;

    public function mount($single_product) {
        $this->product_amount_update = $single_product->product_amount;
    }

    public $rules = [
        'product_amount_update' => 'required',
    ];

    public function updateAmount() {

        $this->validate();

        //retrieving product_id
        $product_id = $this->single_product->product_id;

        //find or fail by product id
        $product_amount = StorageProduct::where('product_id', $product_id)->firstOrFail();

        //supdate the amount
        $product_amount->update([
            'product_amount' => $this->product_amount_update,
        ]);

        session()->flash('product_amout_updated', __('products.amount-updated'));
    }

    public function render()
    {
        return view('livewire.storage-update');
    }
}
