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
   </form>
</div>
