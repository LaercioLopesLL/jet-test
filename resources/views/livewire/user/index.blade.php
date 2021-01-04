<div>

	<div x-data="modal()" x-init="iniciando = false">
		@if (session()->has('message'))
			<div x-data="{ open: true }" x-show.transition.out.duration.500ms="open" class="p-3 flex justify-between align-middle bg-green-300 bg-opacity-50 text-green-900 rounded mb-2">
				<span>{{ session('message') }}</span>
				<button class="focus:outline-none" @click="open = false">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="/currentColor">
						<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
					</svg>
				</button>
			</div>
		@endif
		<script>
			function modal(){
				return {
					show: false,
					open() {
						this.show = true;
						document.querySelector('body').style.overflow = 'hidden';
					},
					close() {
						this.show = false;
						document.querySelector('body').style.overflow = 'auto';
					},
					isOpen() {
						return this.show === true;
					},
				};
			}
		</script>

		<div class="grid justify-items-end">
			<button class="my-btn btn-blue focus:outline-none" @click="open">Novo</button>
		</div>

		<!-- Modal Backdrop -->
		<div class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-50" x-bind:class="{ 'hidden': iniciando }" x-show.imediate="isOpen()"  >

			<!-- Modal -->
			<div class="h-auto mx-auto mt-16 w-full p-4 text-left max-w-3xl bg-white rounded shadow-xl md:p-6 lg:p-8" @click.away="close">
				<div class="mt-3 text-center sm:mt-0 sm:text-left">
					<!-- Modal header -->
					<div class="flex justify-between">
						<h3 class="text-lg font-medium leading-6 text-gray-600">
							Adicionar Usuário
						</h3>
						<button class="focus:outline-none" @click="close">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="/currentColor">
								<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
							</svg>
						</button>
					</div>
					<!-- Modal body -->
					<div class="mt-2">
						<div class="grid  md:grid-cols-2 gap-4">
							<div>
								<label class="block text-gray-500" for="">Nome</label>
								<input @if($errors->has('name')) class="my-input w-full border-red-300 focus:border-red-500" @else class="my-input w-full" @endif type="text" wire:model.defer="name">
								@error('name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
							</div>
							<div>
								<label class="block text-gray-500" for="">Email</label>
								<input @if($errors->has('email')) class="my-input w-full border-red-300 focus:border-red-500" @else class="my-input w-full" @endif type="text" wire:model.defer="email">
								@error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
							</div>
						</div>
					</div>
				</div>
				<!-- One big close button.  --->
				<div class="mt-5 sm:mt-6">
					<span class="flex w-full rounded-md shadow-sm">
						<button @click="close" class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
						Close this modal!
						</button>
					</span>
				</div>

			</div>
		</div>
		

		
	</div>
	<div class="w-full mt-4 text-gray-700">
		<div class="flex place-content-between">
			<div class="text-sm text-gray-600">
				<select class="rounded p-2 focus:outline-none border border-gray-400 border-opacity-50" wire:model="recordsPerPage">
					<option>5</option>
					<option>10</option>
					<option>20</option>
				</select>
				registros por página
			</div>
			<input style="width: 300px; max-width: 300px;" class="rounded py-1 px-2 focus:outline-none border border-gray-400 border-opacity-50 focus:border-blue-500" placeholder="Buscar" type="search" wire:model="search">
		</div>
		<div class="shadow-md rounded mt-1 border-t border-gray-300 border-opacity-50">
			<table class="text-left w-full border-collapse">
				<thead>
					<tr>
						<th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b border-grey-light">ID</th>
						<th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b border-grey-light">Nome</th>
						<th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b border-grey-light">Email</th>
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
	<x-jet-dialog-modal wire:model="modal">
		<x-slot name="title">
			<div class="flex justify-between">
				<span>Adicionar Usuário</span>
				<button class="focus:outline-none" wire:click="closeModal">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="/currentColor">
						<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
					</svg>
				</button>
			</div>
		</x-slot>

		<x-slot name="content">
		<div class="grid  md:grid-cols-2 gap-4">
			<div>
				<label class="block text-gray-500" for="">Nome</label>
				<input @if($errors->has('name')) class="my-input w-full border-red-300 focus:border-red-500" @else class="my-input w-full" @endif type="text" wire:model.defer="name">
				@error('name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
			</div>
			<div>
				<label class="block text-gray-500" for="">Email</label>
				<input @if($errors->has('email')) class="my-input w-full border-red-300 focus:border-red-500" @else class="my-input w-full" @endif type="text" wire:model.defer="email">
				@error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
			</div>
		</div>
		</x-slot>

		<x-slot name="footer">
			<div class="flex justify-between">
				<button wire:click="closeModal" class="rounded hover:bg-gray-400 hover:border-gray-400 px-4 py-1 border-2 text-white border-gray-500 bg-gray-500 focus:outline-none">Cancelar</button>
				<button class="my-btn btn-blue" wire:click="store" wire:loading.attr="disabled">Salvar</button>
			</div>
		</x-slot>
	</x-jet-dialog-modal>
</div>
