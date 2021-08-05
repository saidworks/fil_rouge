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
</div>
