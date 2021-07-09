<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Page;

class Pages extends Component
{   
    public $modalFormVisible = false ;
    public $slug;
    public $title;
    public $content;
    
    
    /**
     * Shows the form modal
     * of the create function 
     * @return void
     */
    public function createShowModal(){
         $this->modalFormVisible = true;
    }    
    /**
     * the livewire render function 
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.pages');
    }
}
