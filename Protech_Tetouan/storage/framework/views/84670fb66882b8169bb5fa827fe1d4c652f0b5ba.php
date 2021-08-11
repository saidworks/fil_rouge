<div class="max-w-sm p-5 m-6 mx-auto bg-gray-200 rounded-lg">
   <div class="mb-6">
       <div class="mb-2 font-bold text-gray-700">
            <?php echo e($appointment->client_name); ?> , Thanks for your booking.
       </div>
       <div class="py-2 border-t border-b border-gray-300">
           <div class="font-semibold">
               <?php echo e($appointment->service->name); ?> ( <?php echo e($appointment->service->duration); ?> minutes) with <?php echo e($appointment->employee->name); ?>

           </div>
           <div class="text-gray-700">
                on <?php echo e($appointment->date->format('D jS M Y')); ?> at <?php echo e($appointment->start_time->format('g:i A')); ?>

           </div>
       </div>
   </div>
   <?php if(!$appointment->isCancelled()): ?>
        <button class="w-full px-6 py-2 mt-3 mb-3 text-lg text-center text-white bg-pink-500 border-0 rounded h-11 focus:outline-none hover:bg-indigo-600" type="button"
        x-data ="{
            confirmCancellation(){
                if(window.confirm('Are you sure?')){
                
                    window.livewire.find('<?php echo e($_instance->id); ?>').call('cancelBooking')
                }
            }
        }"
        x-on:click ="confirmCancellation" 
        >
        Cancel booking
            </button>
   <?php endif; ?>
   <?php if($appointment->isCancelled()): ?>
            <p> Your booking has been cancelled </p>
   <?php endif; ?>
</div>
<?php /**PATH C:\Users\saidworks\Desktop\workshops\fil_rouge\Protech_Tetouan\resources\views/livewire/show-booking.blade.php ENDPATH**/ ?>