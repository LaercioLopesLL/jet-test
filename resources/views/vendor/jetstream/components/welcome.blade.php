<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <!-- modal div -->
    <div class="mt-6" x-data="{ open: false }" x-init="iniciando = false">

      <!-- Button -->
      <button class="px-4 py-2 text-white bg-blue-500 rounded select-none no-outline focus:shadow-outline" @click="open = true">Open Modal</button>

      <!-- Dialog (full screen) -->
      <div class="hidden absolute top-0 left-0 flex items-center justify-center w-full h-full bg-black bg-opacity-50" x-bind:class="{ 'hidden': iniciando }" x-show.transition.duration.400ms="open"  >

        <!-- Modal -->
        <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="open = false">
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Modal Title
            </h3>
            <div class="mt-2">
              <p class="text-sm leading-5 text-gray-500">
                Adipisci quasi doloribus. Veniam veritatis dignissimos. Quis maiores ea. Et nulla sunt.
              </p>
            </div>
          </div>
         <!-- One big close button.  --->
          <div class="mt-5 sm:mt-6">
            <span class="flex w-full rounded-md shadow-sm">
              <button @click="open = false" class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
                Close this modal!
              </button>
            </span>
          </div>

        </div>
      </div>
    </div>

    <div class="mt-8 text-2xl">
        Bem Vindo!
    </div>

</div>

