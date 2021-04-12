<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Informations;

class UserInformationsUpdate extends Component
{
    public $informations;
    public $name;
    public $lastname;
    public $town;
    public $psc;
    public $street;
    public $house_id;
    public $phone_number;

    protected $rules = [
        'name' => 'required',
        'lastname' => 'required',
        'town' => 'required',
        'psc' => 'required',
        'street' => 'required',
        'house_id' => 'required',
        'phone_number' => 'required'
    ];

    public function mount($informations) {
        $this->name = $informations->name ?? "";
        $this->lastname = $informations->lastname ?? "";
        $this->town = $informations->town ?? "";
        $this->psc = $informations->psc ?? "";
        $this->street = $informations->street ?? "";
        $this->house_id = $informations->house_id ?? "";
        $this->phone_number = $informations->phone_number ?? "";
    }

    public function updateInformations() {
        $this->validate();

        $information = Informations::updateOrCreate(
        [
            'user_id' => auth()->id(),
        ],
        [
            'name' =>  $this->name,
            'lastname' => $this->lastname,
            'town' => $this->town,
            'psc' => $this->psc, 
            'street' => $this->street,
            'house_id' => $this->house_id,
            'phone_number' => $this->phone_number,
        ]);
        
        session()->flash('informations-updated', __('other.address-updated'));
    }

    public function render()
    {
        return view('livewire.user-informations-update');
    }
}
