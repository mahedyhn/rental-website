<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class CreateProperty extends Component
{
     public $title;
    public $description;
    public $address;
    public $rent_price;
    public $bedrooms;
    public $bathrooms;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'address' => 'required|string|max:255',
        'rent_price' => 'required|numeric|min:0',
        'bedrooms' => 'required|integer|min:1',
        'bathrooms' => 'required|integer|min:1',
    ];

    public function saveProperty()
    {
        $this->validate();

        Property::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'description' => $this->description,
            'address' => $this->address,
            'rent_price' => $this->rent_price,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
        ]);

        session()->flash('message', 'Property successfully added.');

        // ফর্ম রিসেট করুন
        $this->reset();
    }

    public function render()
    {
        return view('livewire.create-property');
    }
}
