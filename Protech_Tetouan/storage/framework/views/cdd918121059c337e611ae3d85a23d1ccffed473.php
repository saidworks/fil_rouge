<div>
<?php if($success): ?>
        <div class="text-center card text-success">
            <span class="text-success">Success</span>
            <div class="card-body">
                <p><?php echo e($success); ?></p>
            </div>
        </div>
<?php endif; ?>
 <form class="contact-form" wire:submit.prevent="contactFormSubmit" action="/contact" method="POST">
    <?php echo csrf_field(); ?>
    <div class="form-group">
      <label for="email">Votre email:</label>
      <input wire:model="email" type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
      <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-warning"><?php echo e($message); ?></p>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group">
      <label for="subject">Sujet:</label>
      <select name="subject" wire:model="subject" class="form-control" id="exampleFormControlSelect1">
        <option>---</option>
        <option>Services</option>
        <option>Produits</option>
        <option>Reservations</option>
        <option>Autre chose</option>
      </select>
      <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-warning"><?php echo e($message); ?></p>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group">
      <label for="comment">Message:</label>
      <textarea name="comment" wire:model="comment" class="form-control" id="comment" rows="3"> Entrer votre message ici</textarea>
    
    </div>
    <button type="submit" id="contact-submit-button" class="btn btn-primary">Submit</button>
  </form>

</div>


    <?php /**PATH C:\Users\saidworks\Desktop\workshops\fil_rouge\Protech_Tetouan\resources\views/livewire/contact-form.blade.php ENDPATH**/ ?>