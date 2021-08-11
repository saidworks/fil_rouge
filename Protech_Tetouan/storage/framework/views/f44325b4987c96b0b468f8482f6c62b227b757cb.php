<?php $attributes = $attributes->exceptProps(["annonce" => $annonce]); ?>
<?php foreach (array_filter((["annonce" => $annonce]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>


  <div class="mb-3 card" style="max-width: 100%;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="<?php echo e(asset('storage/img/'.$annonce->image)); ?>" class="card-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo e($annonce->title); ?></h5>
          <p class="card-text"><?php echo $annonce->body; ?></p>
          <p class="card-text"><small class="text-muted">Last updated 
            <?php echo e(\Carbon\Carbon::parse($annonce->updated_at)->diffForHumans()); ?></small></p>
        </div>
      </div>
    </div>
  </div><?php /**PATH C:\Users\saidworks\Desktop\workshops\fil_rouge\Protech_Tetouan\resources\views/components/annonce.blade.php ENDPATH**/ ?>