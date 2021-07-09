<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Page;
// used to validate slugs in our form validation 
use Illuminate\Validation\Rule;
class Pages extends Component
{   
    public $modalFormVisible = false ;
    public $modalFormDeleteVisible = false;
    public $slug;
    public $title;
    public $content;
    public $modelId;
    use WithPagination;
    
    
    /**
     * Shows the form modal
     * of the create function 
     * @return void
     */
    public function createShowModal(){
         $this->resetValidation();
         $this->resetVars();
         $this->modalFormVisible = true;
    }    
    
    /**
     * create function 
     *
     * @return void
     */
    public function create(){
        $this->validate();
        Page::create($this->modelData());
        $this->modalFormVisible = false;
        $this->resetVars();
    }    
    /**
     * read function 
     *
     * @return void
     */
    public function read(){
        return Page::paginate(5);
    }
    
        /**
     * rules for validation
     *
     * @return void
     */

    public function rules(){
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('pages','slug')],
            'content' => 'required'
        ];
    }

    /**
     * modalData return the data the create function 
     *
     * @return void
     */
    public function modelData(){
        $data= [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content
        ];
        return $data;
    }    
    /**
     * resetVars reset variables of livewire
     *
     * @return void
     */
    public function resetVars(){
        $this->modelId = null;
        $this->title = null;
        $this->slug = null;
        $this->content = null;
    }
    
    /**
     * update the article
     *
     * @return void
     */
    public function update(){
        // problem with slug when trying update
        $this->validate();
        Page::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }
    /**
     * updatedTitle take the value of the title 
     * and assign to the slug everytime it's changed
     * @return void
     */
    public function updatedTitle($value){
        $this->generateSlug($value);
    }    
    /**
     * generateSlug a url slug
     * based on the title
     * @param  mixed $value
     * @return void
     */
    public function generateSlug($value){
        $process1 = str_replace(' ','-',$value);
        $process2 = strtolower($process1);
        $this->slug = $process2;
    }
    
    /**
     * updateShowModal shows the form modal 
     *  in update mode
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id){
        $this->resetValidation();
        $this->resetVars();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }
    
    /**
     * loadModel loads the data of the component
     *  
     * @return void
     */
    public function loadModel(){
        $data = Page::find($this->modelId);
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->content = $data->content;
    }
    
    /**
     * shows delete Modal
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteShowModal($id){
       $this->modelId = $id;
       $this->modalFormDeleteVisible = true;
    }

    /**
     * the livewire render function 
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.pages', [
            'data' => $this->read(),
        ]);
    }
}
