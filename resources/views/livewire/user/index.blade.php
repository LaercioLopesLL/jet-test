<div>
	<div>
		@if (session()->has('message'))
			<div class="p-2 bg-green-300 text-green-900 rounded mb-2">
				{{ session('message') }}
			</div>
		@endif
		<input class="my-input" type="text" wire:model.defer="name">
		<input class="my-input" type="text" wire:model.defer="email">
		<button class="my-btn btn-blue" wire:click="store" wire:loading.attr="disabled">Salvar</button>
	</div>
	<div class="w-full mt-4 text-gray-700">
		<div class="flex place-content-between">
			<div class="text-sm">
				<select wire:model="recordsPerPage">
					<option>5</option>
					<option>10</option>
					<option>20</option>
				</select>
				registros por página
			</div>
			<input class="my-input ml-auto" placeholder="Buscar" type="search" wire:model="search">
		</div>
		<div class="shadow-md rounded mt-1 border-t border-gray-400 border-opacity-50">
			<table class="text-left w-full border-collapse">
				<thead>
					<tr>
						<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">ID</th>
						<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
						<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Email</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr class="hover:bg-grey-lighter border-b">
						<td class="py-3 px-6 border-grey-light">{{ $user->id }}</td>
						<td class="py-3 px-6 border-grey-light">{{ $user->name }}</td>
						<td class="py-3 px-6 border-grey-light">{{ $user->email }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
		{{ $users->links() }}
	</div>
</div>
