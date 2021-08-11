<?php $attributes = $attributes->exceptProps(["product" => $product]); ?>
<?php foreach (array_filter((["product" => $product]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
    <!-- Start Grid -->

            <div class="col">
                <div class="mx-auto mt-4 card" style="width: 24rem;">
                    <img class="card-img-top" src="<?php echo e(asset('storage/img/'.$product->picture)); ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($product->name); ?></h5>
                        <p class="card-text"><?php echo $product->description; ?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            
            </div>
  
    <!-- End Grid --><?php /**PATH C:\Users\saidworks\Desktop\workshops\fil_rouge\Protech_Tetouan\resources\views/components/product.blade.php ENDPATH**/ ?>