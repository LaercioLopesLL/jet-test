<div>
	<div class="w-full mt-4">
		<div class="bg-white shadow-md rounded">
			<div class="flex place-content-between">
				<div class="text-sm">
					<select wire:model="recordsPage">
						<option>5</option>
						<option>10</option>
						<option>20</option>
					</select>
					registros por página
				</div>
				<input class="my-input ml-auto" placeholder="Buscar" type="search" wire:model="search">
			</div>
			<table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
				<thead>
					<tr>
						<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">ID</th>
						<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
						<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Email</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $value)
					<tr class="hover:bg-grey-lighter border-b">
						<td class="py-3 px-6 border-grey-light">{{ $value->id }}</td>
						<td class="py-3 px-6 border-grey-light">{{ $value->name }}</td>
						<td class="py-3 px-6 border-grey-light">{{ $value->email }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $users->links() }}
		</div>
	</div>
</div>
