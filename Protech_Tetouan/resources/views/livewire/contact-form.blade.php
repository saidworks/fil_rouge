<div>
@if ($success)
        <div class="text-center card text-success">
            <span class="text-success">Success</span>
            <div class="card-body">
                <p>{{ $success }}</p>
            </div>
        </div>
@endif
 <form class="contact-form" wire:submit.prevent="contactFormSubmit" action="/contact" method="POST">
    @csrf
    <div class="form-group">
      <label for="email">Votre email:</label>
      <input wire:model="email" type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
      @error('email')
        <p class="text-warning">{{ $message }}</p>
      @enderror
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
      @error('subject')
        <p class="text-warning">{{ $message }}</p>
      @enderror
    </div>
    <div class="form-group">
      <label for="comment">Message:</label>
      <textarea name="comment" wire:model="comment" class="form-control" id="comment" rows="3"> Entrer votre message ici</textarea>
    
    </div>
    <button type="submit" id="contact-submit-button" class="btn btn-primary">Submit</button>
  </form>

</div>


    