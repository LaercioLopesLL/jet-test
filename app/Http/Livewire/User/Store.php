<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class Store extends Component
{
    public $name, $email;

    public function render()
    {
        return view('livewire.user.store');
    }

    public function store()
    {
        Validator::make([
            'name'=>$this->name,
            'email'=>$this->email,
        ],
        [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ])->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => 'not_defined_yet',
        ]);

        session()->flash('message', 'Usuário '. $this->name .' adicionado com sucesso.');
        $this->emitTo('user.index', 'render');
    }
}
