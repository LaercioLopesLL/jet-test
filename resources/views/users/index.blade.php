<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Usuários
        </h2>
    </x-slot>

    <div class="mt-4">
        <div class="px-6 max-w-7xl mx-auto md:px-9 lg:px-12">
            <livewire:user.index />
        </div>
    </div>
</x-app-layout>