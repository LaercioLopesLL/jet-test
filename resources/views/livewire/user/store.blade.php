<div>
    @if (session()->has('message'))
        <div class="p-2 bg-green-200 text-green-900">
            {{ session('message') }}
        </div>
    @endif
    <input class="my-input" type="text" wire:model="name">
    <input class="my-input" type="text" wire:model="email">
    <button class="my-btn btn-blue" wire:click="store">Salvar</button>
    <button class="my-btn btn-blue" wire:click="$emitTo('user-index', 'render')">Atualizar</button>
</div>
