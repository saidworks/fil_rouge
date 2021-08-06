<div class="max-w-sm p-5 m-6 mx-auto bg-gray-200 rounded-lg">
   <div class="mb-6">
       <div class="mb-2 font-bold text-gray-700">
            {{ $appointment->client_name }} , Thanks for your booking.
       </div>
       <div class="py-2 border-t border-b border-gray-300">
           <div class="font-semibold">
               {{ $appointment->service->name }} ( {{ $appointment->service->duration }} minutes) with {{ $appointment->employee->name }}
           </div>
           <div class="text-gray-700">
                on {{ $appointment->date->format('D jS M Y') }} at {{ $appointment->start_time->format('g:i A') }}
           </div>
       </div>
   </div>
   @if(!$appointment->isCancelled())
        <button class="w-full px-6 py-2 mt-3 mb-3 text-lg text-center text-white bg-pink-500 border-0 rounded h-11 focus:outline-none hover:bg-indigo-600" type="button"
        x-data ="{
            confirmCancellation(){
                if(window.confirm('Are you sure?')){
                {{-- link a method from livewire component --}}
                    @this.call('cancelBooking')
                }
            }
        }"
        x-on:click ="confirmCancellation" 
        >
        Cancel booking
            </button>
   @endif
   @if($appointment->isCancelled())
            <p> Your booking has been cancelled </p>
   @endif
</div>
