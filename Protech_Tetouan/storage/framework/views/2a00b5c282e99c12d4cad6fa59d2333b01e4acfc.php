<div class="divide-y divide-gray-800" x-data="{open:false,showText:false,randomVariable:'random text'}">
    <nav class="flex items-center px-3 py-2 bg-gray-900 shadow-lg">
        <div>
            <button @click="open === true ? open = false : open = true " class='items-center block h-8 mr-3 text-gray-400 hover:text-gray-200 focus:text-gray-200 focus:outline-none sm:hidden'>
                <svg class="w-8 fill-current" viewBox="0 0 24 24">                            
                    <path x-show="!open" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                    <path x-show="open" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
                </svg>
            </button>
        </div>
        
        <div class="flex items-center w-full h-12">
            <a href="<?php echo e(url('/')); ?>" class="w-full" >
               <img class="h-12" src="<?php echo e(asset('storage/img/logo_white.png')); ?>">
            </a>
        </div>
        
        <div class="flex justify-end sm:w-8/12">
            <?php $__currentLoopData = $topNavLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <ul class="hidden text-xs text-gray-200 sm:flex sm:text-left">
               <a href="<?php echo e(url($item->slug)); ?>">
                    <li class="px-4 py-2 cursor-pointer hover:underline"><?php echo e($item->label); ?></li>
               </a>
            </ul>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </nav>
    <div class="sm:flex sm:min-h-screen">
        <aside class="text-gray-700 bg-gray-900 divide-y divide-gray-900 divide-dashed sm:w-4/12">
            
            <?php $__currentLoopData = $sideBarLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <ul class="hidden text-xs text-gray-200 sm:block sm:text-left">
                <a href="<?php echo e(url($item->slug)); ?>"> 
                    <li class="px-4 py-2 text-xs cursor-pointer hover:bg-gray-800"> 
                        <?php echo e($item->label); ?> 
                    </li>
                </a>
            </ul>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            
            <div class="block pb-3 divide-y divide-gray-800 sm:hidden" :class="open ? 'block' : 'hidden'">
                <?php $__currentLoopData = $sideBarLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <ul class="text-xs text-gray-200">
                        <a href="<?php echo e(url($item->slug)); ?>"> 
                            <li class="px-4 py-2 text-xs cursor-pointer hover:bg-gray-800"> 
                                <?php echo e($item->label); ?> 
                            </li>
                        </a>
                    </ul>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <?php $__currentLoopData = $topNavLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <ul class="text-xs text-gray-200">
                    <a href="<?php echo e(url($item->slug)); ?>"> 
                        <li class="px-4 py-2 text-xs cursor-pointer hover:bg-gray-800"> 
                            <?php echo e($item->label); ?> 
                        </li>
                    </a>
                </ul>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </aside>
        <main class="min-h-screen p-12 m-16 bg-gray-100 sm:w-8/12 md:w-9/12 lg:w-10/12">
            <section class="text-green-900 divide-y">
                <h1 class="text-3xl"><?php echo e($title); ?></h1>
                <article>
                    <div class="text-sm">
                        <?php echo $content; ?> 
                    </div>
                    
                </article>
            </section>
        </main>
    </div>
 
</div><?php /**PATH C:\Users\saidworks\Desktop\workshops\fil_rouge\Protech_Tetouan\resources\views/livewire/frontpage.blade.php ENDPATH**/ ?>