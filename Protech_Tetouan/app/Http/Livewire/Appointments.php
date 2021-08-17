<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Appointment; 
// used to validate slugs in our form validation 
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
class Appointments extends Component
{   
   
    public $slug;
    public $title;
    public $content;
    public $image;
    public $modelId;
    use WithPagination,WithFileUploads;
    
    

  
    /**
     * read function 
     *
     * @return void
     */
    public function read(){
        return Appointment::paginate(10);
    }
    
     
    public function render()
    {
        return view('livewire.appointments', [
            'data' => $this->read(),
        ]);
    }
}
