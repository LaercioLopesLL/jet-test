<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class Index extends Component
{
    use WithPagination;
    public $search, $selected_id, $confirmingDeletion;
    public $recordsPerPage = 10;
    public $updateMode = false;
    public $updateOrCreateModal = false;
    public $name, $email;
    
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
        $this->selected_id = $this->name = $this->email = null;
    }

    public function updateOrCreate()
    {
        $this->updateMode ? $this->update() : $this->store();
    }    
    
    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => 'not_defined_yet',
        ]);

        session()->flash('message', 'Usuário '. $this->name .' adicionado com sucesso.');
        $this->clearInputs();
        $this->updateOrCreateModal = false;
    }
    public function edit($id)
    {
        $this->updateMode = true;
        $this->updateOrCreateModal = true;
        $user = User::where('id',$id)->first();
        $this->selected_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function fillData($id)
    {
        $user = User::where('id',$id)->first();
        $this->selected_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->confirmingDeletion = false;
        $this->updateOrCreateModal = false;
        $this->clearInputs();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email,'. $this->selected_id,
        ]);

        if ($this->selected_id) {
            $user = User::find($this->selected_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $this->updateMode = false;
            $this->updateOrCreateModal = false;
            session()->flash('message', 'Usuário '. $this->name .' editado com sucesso.');
            $this->clearInputs();
        }
    }

    public function confirmDelete($id)
    {
        $this->fillData($id);
        $this->confirmingDeletion = true;
    }

    public function delete()
    {
        if($this->selected_id && $this->confirmingDeletion){
            User::where('id',$this->selected_id)->delete();
            session()->flash('message', 'Usuário '. $this->name .' excluído com sucesso.');
            $this->confirmingDeletion = false;
            $this->clearInputs();
        }
    }
}
