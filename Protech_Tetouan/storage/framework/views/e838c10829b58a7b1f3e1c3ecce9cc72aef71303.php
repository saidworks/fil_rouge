<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">

        <!-- Scripts -->
        <script src="<?php echo e(mix('js/app.js')); ?>" defer></script>
    </head>
    <body>
        <header class="text-gray-600 body-font">
            <div class="container flex flex-col flex-wrap items-center p-5 mx-auto md:flex-row">
              <a class="flex items-center w-20 mb-4 font-medium text-gray-900 title-font md:mb-0" href="#">
                <img  src="<?php echo e(asset('storage/img/logo.png')); ?>" />
              </a>
           
            </div>
          </header>
        <div class="font-sans antialiased text-gray-900">
            <?php echo e($slot); ?>

        </div>
    </body>
</html>
<?php /**PATH C:\Users\saidworks\Desktop\workshops\fil_rouge\Protech_Tetouan\resources\views/layouts/guest.blade.php ENDPATH**/ ?>