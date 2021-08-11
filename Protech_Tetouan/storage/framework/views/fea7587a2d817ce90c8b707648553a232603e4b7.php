<div class="bg-white rounded-lg">
    <div class="relative flex justify-center flex-column">
        <?php if($this->WeekIsGreaterThanCurrent): ?>
        <button type="button" class="absolute top-0 left-0 p-4" wire:click="decrementCalendarWeek">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-300 hover:text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
              </svg>
        </button>
        <?php endif; ?>
        <div class="p-4 text-lg font-semibold">
            <?php echo e($this->calendarStartDate->format('M Y')); ?>

        </div>
        <button  type="button" class="absolute top-0 right-0 p-4" wire:click="incrementCalendarWeek">
            <svg xmlns="http://www.w3.org/2000/svg"  class="w-6 h-6 text-gray-300 hover:text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
        </button>
    </div>
   
    <div class="flex items-center justify-between px-3 pb-2 border-b border-gray-100">
        <?php $__currentLoopData = $this->calendarWeekInterval; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <button type="button" class="text-center cursor-pointer group focus:outline-none" wire:click="setDate(<?php echo e($day->timestamp); ?>)">
            <div class="mb-2 text-xs leading-none text-gray-700">
                <?php echo e($day->format('D')); ?>

            </div>
            <div class="flex items-center justify-center p-1 text-lg leading-none rounded-full group-hover:bg-gray-200 w-9 h-9 <?php echo e($date === $day->timestamp ? 'bg-gray-200' : ''); ?>">
                <?php echo e($day->format('d')); ?>

            </div>
        </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="overflow-y-scroll max-h-52">
        <?php if($this->availableTimeSlots->count()): ?>
            <?php $__currentLoopData = $this->availableTimeSlots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="radio" name="time" id="time_<?php echo e($slot->timestamp); ?>" value="<?php echo e($slot->timestamp); ?>" wire:model="time" class="sr-only">
                <label for="time_<?php echo e($slot->timestamp); ?>" class="flex items-center w-full px-4 py-2 text-left border-b border-gray-100 focus:outline-none">
                    <?php if($slot->timestamp === (int)$time): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    <?php endif; ?>
                    <?php echo e($slot->format('g:i A')); ?>

                </label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="px-4 py-2 text-center text-gray-700">
                No available slots
            </div>
        <?php endif; ?>
    </div>
</div>        <?php /**PATH C:\Users\saidworks\Desktop\workshops\fil_rouge\Protech_Tetouan\resources\views/livewire/booking-calendar.blade.php ENDPATH**/ ?>