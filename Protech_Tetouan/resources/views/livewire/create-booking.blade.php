{{-- use layout build using tailwindcss --}}
<div class="max-w-sm p-5 m-6 mx-auto bg-gray-200 rounded-lg">
   <form wire:submit.prevent="createBooking">
      {{-- <div class="mb-6">{{ var_dump($state) }}</div> 
      *{{        var_dump(auth()->user()->name)
      }}    --}}
    <p class="text-xl">Reservations</p>
        <div class="mb-6">
            <label for="service" class="inline-block">Select service</label>
            <select name="service" id="service" class="w-full h-10 bg-white rounded-lg" wire:model = 'state.service'>
                <option value="" selected>select a service</option>
                @foreach ($services as $service )
                    <option value="{{ $service->id }}">{{ $service->name }} ({{ $service->duration }}minutes)</option>
                @endforeach
            </select>    
        </div>
        <div class="mb-6 {{ !$employees->count() ? 'opacity-25' : '' }}">
            <label for="employee" class="inline-block mb-2 font-bold text-gray-700">Select employee</label>
            <select name="employee" id="employee" class="w-full h-10 bg-white rounded-lg" wire:model = 'state.employee' {{!$employees->count() ? 'disabled="disabled"' : "" }}>
                <option value="" selected>select a employee</option>
                @foreach ($employees as $employee )
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>    
        </div>
        <div class="mb-6 {{ !$this->selectedService || !$this->selectedEmployee ? 'opacity-25' : '' }}">
            <label for="appointment" class="inline-block mb-2 font-bold text-gray-700">Select appointment time</label>
            <livewire:booking-calendar :service="$this->selectedService" :employee="$this->selectedEmployee" :key="optional($this->selectedEmployee)->id"/> 
        </div>
    @if($this->hasDetailsToBook)
        <div class="mb-6">
            <div class="mb-2 font-bold text-gray-700">
                You are ready to book
            </div>
            <div class="py-2 border-t border-b border-gray-300">
                {{ $this->selectedService->name }} ({{ $this->selectedService->duration }} minutes) with {{ $this->selectedEmployee->name }}
                on {{ $this->timeObject->format('D jS M Y') }} at {{ $this->timeObject->format('g:i A') }}
            </div>
        </div>
        
        <div class="mb-6">
            <div class="mb-3">
                <label for="appointment" class="inline-block mb-2 font-bold text-gray-700">Your name</label>
                <input type="text" name="name" id="name" class="w-full h-10 bg-white rounded-lg"  wire:model.defer="state.name">
                @error('state.name')
                    <div class="mt-2 text-sm font-semibold text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="appointment" class="inline-block mb-2 font-bold text-gray-700">Your email</label>
                <input type="email" name="email" id="email" class="w-full h-10 bg-white rounded-lg" wire:model.defer='state.email'  />
                @error('state.email')
                <div class="mt-2 text-sm font-semibold text-red-500">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <button class="w-full px-6 py-2 mt-3 mb-3 text-lg text-center text-white bg-indigo-500 border-0 rounded h-11 focus:outline-none hover:bg-indigo-600" type="submit">Book now</button>
        </div>
    @endif    
        
   </form>
</div>
