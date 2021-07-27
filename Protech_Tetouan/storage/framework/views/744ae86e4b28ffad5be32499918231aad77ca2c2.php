
<div>
    <div class="p-5 text-4xl text-gray-500 bg-gray-700 boder sm:bg-blue-400 md:text-5xl lg:bg-green-300"><?php echo e($title); ?></div>
    <div class='text-center border lg:flex'> <?php echo $content; ?> </div>
    
    <?php if(str_contains(strtolower($title),'contact')): ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('counter')->html();
} elseif ($_instance->childHasBeenRendered('Pt45BLW')) {
    $componentId = $_instance->getRenderedChildComponentId('Pt45BLW');
    $componentTag = $_instance->getRenderedChildComponentTagName('Pt45BLW');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Pt45BLW');
} else {
    $response = \Livewire\Livewire::mount('counter');
    $html = $response->html();
    $_instance->logRenderedChild('Pt45BLW', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif; ?>
    <div class="border">
        <img src="<?php echo e(asset('storage/img/Youfoodshutterbug.jpg')); ?>" alt="">
    </div>
</div>


<div>
    <nav class="flex items-center px-3 py-2 bg-gray-900">
        <div class="bg-red-500 ">Mobile View button</div>
        <div class="bg-green-500 ">Logo image</div>
        <div class="bg-blue-500 ">Top nav links</div>
    </nav>
    <div>
        <aside>

        </aside>
    </div>
    <main>
        <h1><?php echo e($title); ?></h1>
        <article>
            <?php echo $content; ?> 
        </article>
    </main>
</div><?php /**PATH C:\Users\saidworks\Desktop\workshops\fil_rouge\Protech_Tetouan\resources\views/livewire/draft.blade.php ENDPATH**/ ?>