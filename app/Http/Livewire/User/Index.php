<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class Index extends Component
{
    use WithPagination;
    public $search;
    public $recordsPerPage = 10;
    public $name;
    public $email;
    public $modal;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        return view('livewire.user.index',
            ['users'=>User::where('name', 'like', '%'.$this->search.'%')
                ->orWhere('email', 'like', '%'.$this->search.'%')
                ->orderBy('id', 'desc')
                ->paginate($this->recordsPerPage)
            ]);
    }

    public function clearInputs(){
        $this->name = $this->email = null;
    }

    public function store()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => 'not_defined_yet',
        ]);

        session()->flash('message', 'Usuário '. $this->name .' adicionado com sucesso.');
        $this->clearInputs();
        $this->modal = false;
    }
}
