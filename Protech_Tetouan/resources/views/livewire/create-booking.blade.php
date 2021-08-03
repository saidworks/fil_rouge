{{-- use layout build using tailwindcss --}}
<div class="max-w-sm p-5 m-6 mx-auto bg-gray-200 rounded-lg">
   <form action="">
      <div class="mb-6">{{ var_dump($state) }}</div> 
    <p class="text-xl">Reservations</p>
        <div class="mb-6">
            <label for="service" class="inline-block">Select service</label>
            <select name="service" id="service" class="w-full h-10 bg-white rounded-lg" wire:model = 'state.service'>
                <option value="" selected>select a service</option>
                @foreach ($services as $service )
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>    
        </div>
        <div class="mb-6 {{ !$employees->count() ? 'opacity-25' : '' }}">
            <label for="employee" class="inline-block">Select employee</label>
            <select name="employee" id="employee" class="w-full h-10 bg-white rounded-lg" wire:model = 'state.employee' {{!$employees->count() ? 'disabled="disabled"' : "" }}>
                <option value="" selected>select a employee</option>
                @foreach ($employees as $employee )
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>    
        </div>
        <div class="mb-6 {{ !$this->selectedService || !$this->selectedEmployee ? 'opacity-25' : '' }}">
            <label for="appointment" class="inline-block">Select appointment time</label>
        </div>
        <div class="bg-white rounded-lg">
            <div class="relative flex justify-center flex-column">
                <button type="button" class="absolute top-0 left-0 p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-300 hover:text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                      </svg>
                </button>
                <div class="p-4 text-lg font-semibold">
                    August 2021
                </div>
                <button  type="button" class="absolute top-0 right-0 p-4">
                    <svg xmlns="http://www.w3.org/2000/svg"  class="w-6 h-6 text-gray-300 hover:text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                      </svg>
                </button>
            </div>
            <div class="flex items-center justify-between px-3 pb-2 border-b border-gray-100">
                <button type="button" class="text-center cursor-pointer group focus:outline-none">
                    <div class="mb-2 text-xs leading-none text-gray-700">
                        day
                    </div>
                    <div class="flex items-center justify-center p-1 text-lg leading-none rounded-full group-hover:bg-gray-200 w-9 h-9">
                        nb
                    </div>

                </button>
            </div>
            <div class="overflow-y-scroll max-h-52">
                <input type="radio" name="time" id="" value="" class="sr-only">
                <label for="" class="flex items-center w-full px-4 py-2 text-left border-b border-gray-100 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    9:00am
                </label>
                <div class="px-4 py-2 text-center text-gray-700">
                    No available slots
                </div>
            </div>
        </div>        
        
   </form>
</div>
