
<div class="max-w-sm p-5 m-6 mx-auto bg-gray-200 rounded-lg">
   <form wire:submit.prevent="createBooking">
      
    <p class="text-xl">Reservations</p>
        <div class="mb-6">
            <label for="service" class="inline-block">Select service</label>
            <select name="service" id="service" class="w-full h-10 bg-white rounded-lg" wire:model = 'state.service'>
                <option value="" selected>select a service</option>
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?> (<?php echo e($service->duration); ?>minutes)</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>    
        </div>
        <div class="mb-6 <?php echo e(!$employees->count() ? 'opacity-25' : ''); ?>">
            <label for="employee" class="inline-block mb-2 font-bold text-gray-700">Select employee</label>
            <select name="employee" id="employee" class="w-full h-10 bg-white rounded-lg" wire:model = 'state.employee' <?php echo e(!$employees->count() ? 'disabled="disabled"' : ""); ?>>
                <option value="" selected>select a employee</option>
                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>    
        </div>
        <div class="mb-6 <?php echo e(!$this->selectedService || !$this->selectedEmployee ? 'opacity-25' : ''); ?>">
            <label for="appointment" class="inline-block mb-2 font-bold text-gray-700">Select appointment time</label>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('booking-calendar', ['service' => $this->selectedService,'employee' => $this->selectedEmployee])->html();
} elseif ($_instance->childHasBeenRendered(optional($this->selectedEmployee)->id)) {
    $componentId = $_instance->getRenderedChildComponentId(optional($this->selectedEmployee)->id);
    $componentTag = $_instance->getRenderedChildComponentTagName(optional($this->selectedEmployee)->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild(optional($this->selectedEmployee)->id);
} else {
    $response = \Livewire\Livewire::mount('booking-calendar', ['service' => $this->selectedService,'employee' => $this->selectedEmployee]);
    $html = $response->html();
    $_instance->logRenderedChild(optional($this->selectedEmployee)->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?> 
        </div>
    <?php if($this->hasDetailsToBook): ?>
        <div class="mb-6">
            <div class="mb-2 font-bold text-gray-700">
                You are ready to book
            </div>
            <div class="py-2 border-t border-b border-gray-300">
                <?php echo e($this->selectedService->name); ?> (<?php echo e($this->selectedService->duration); ?> minutes) with <?php echo e($this->selectedEmployee->name); ?>

                on <?php echo e($this->timeObject->format('D jS M Y')); ?> at <?php echo e($this->timeObject->format('g:i A')); ?>

            </div>
        </div>
        
        <div class="mb-6">
            <div class="mb-3">
                <label for="appointment" class="inline-block mb-2 font-bold text-gray-700">Your name</label>
                <input type="text" name="name" id="name" class="w-full h-10 bg-white rounded-lg"  wire:model.defer="state.name">
                <?php $__errorArgs = ['state.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="mt-2 text-sm font-semibold text-red-500">
                        <?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="mb-3">
                <label for="appointment" class="inline-block mb-2 font-bold text-gray-700">Your email</label>
                <input type="email" name="email" id="email" class="w-full h-10 bg-white rounded-lg" wire:model.defer='state.email'  />
                <?php $__errorArgs = ['state.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="mt-2 text-sm font-semibold text-red-500">
                    <?php echo e($message); ?>

                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <button class="w-full px-6 py-2 mt-3 mb-3 text-lg text-center text-white bg-indigo-500 border-0 rounded h-11 focus:outline-none hover:bg-indigo-600" type="submit">Book now</button>
        </div>
    <?php endif; ?>    
        
   </form>
</div>
<?php /**PATH C:\Users\saidworks\Desktop\workshops\fil_rouge\Protech_Tetouan\resources\views/livewire/create-booking.blade.php ENDPATH**/ ?>