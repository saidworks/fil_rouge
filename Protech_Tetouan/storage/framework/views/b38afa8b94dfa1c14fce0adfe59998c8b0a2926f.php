<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <?php echo e(__('Navigation Menus')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('navigation-menus')->html();
} elseif ($_instance->childHasBeenRendered('O0U5UPO')) {
    $componentId = $_instance->getRenderedChildComponentId('O0U5UPO');
    $componentTag = $_instance->getRenderedChildComponentTagName('O0U5UPO');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('O0U5UPO');
} else {
    $response = \Livewire\Livewire::mount('navigation-menus');
    $html = $response->html();
    $_instance->logRenderedChild('O0U5UPO', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\saidworks\Desktop\workshops\fil_rouge\Protech_Tetouan\resources\views/admin/navigation-menus.blade.php ENDPATH**/ ?>