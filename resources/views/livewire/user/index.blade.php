<div>

    <div>
        @if (session()->has('message'))
        <div x-data="{ open: true }" x-show.transition.out.duration.500ms="open"
            class="flex justify-between align-middle bg-blue-300 bg-opacity-50 text-blue-900 rounded mb-2">
            <span class="py-3 pl-3">{{ session('message') }}</span>
            <button class="focus:outline-none p-3" @click="open = false">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="/currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        @endif
        <x-jet-dialog-modal wire:model="modal">
            <x-slot name="title">
                <span class="font-bold text-gray-600">Adicionar Usuário</span>
            </x-slot>

            <x-slot name="content">
                <div class="mt-2">
                    <div class="grid  md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-500" for="name">Nome</label>
                            <x-jet-input name="name" class="w-full" wire:model.defer="name" />
                            <x-jet-input-error for="name" />
                        </div>
                        <div>
                            <label class="block text-gray-500" for="email">Email</label>
                            <x-jet-input type="email" name="email" class="w-full" wire:model.defer="email" />
                            <x-jet-input-error for="email" />
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modal')" wire:loading.attr="disabled">
                    Cancelar
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:click="store" wire:loading.attr="disabled">
                    Adicionar
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>

        <div class="grid justify-items-end">
            <x-jet-button wire:click="$toggle('modal')">
                Novo
            </x-jet-button>
        </div>
    </div>
    <div class="w-full mt-4 text-gray-700">
        <div class="flex flex-col-reverse md:flex-row md:place-content-between">
            <div class="text-sm text-gray-600 mb-2" class="block md:inline">
                <select id="pagination" class="rounded p-3 focus:outline-none border border-gray-400 border-opacity-50"
                    wire:model="recordsPerPage">
                    <option>5</option>
                    <option>10</option>
                    <option>20</option>
                </select>
                registros por página
            </div>
            <x-jet-input class="block w-full md:w-1/2 md:inline mb-2" name="search" placeholder="Pesquisa" wire:model="search" />
        </div>
        <div class="shadow-md rounded mt-1 border-t border-gray-300 border-opacity-50">
            <table class="text-left w-full border-collapse">
                <thead>
                    <tr>
                        <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b-2">ID</th>
                        <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b-2">Nome</th>
                        <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b-2">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-100 border-b">
                        <td class="py-2 px-6 border-grey-light">{{ $user->id }}</td>
                        <td class="py-2 px-6 border-grey-light">{{ $user->name }}</td>
                        <td class="py-2 px-6 border-grey-light">{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="overflow-auto max-w-full">
            {{ $users->links() }}
        </div>

    </div>

</div>