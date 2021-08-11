  <?php $attributes = $attributes->exceptProps(['topNavLinks' => $topNavLinks]); ?>
<?php foreach (array_filter((['topNavLinks' => $topNavLinks]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
  <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="./img/logo.png" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="mx-auto navbar-nav">
            <?php $__currentLoopData = $topNavLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!str_contains(strtolower($item->slug),'home')): ?>
              <li class="px-4 nav-item"><a class="nav-link" href="<?php echo e(url($item->slug)); ?>"><?php echo e($item->label); ?></a></li>
            <?php endif; ?>
           
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
    </nav>
    <!-- End Nav -->
<?php /**PATH C:\Users\saidworks\Desktop\workshops\fil_rouge\Protech_Tetouan\resources\views/components/header.blade.php ENDPATH**/ ?>