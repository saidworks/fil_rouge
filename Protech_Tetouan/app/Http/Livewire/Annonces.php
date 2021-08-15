<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Annonce; 

class Annonces extends Component
{   
    public $modalFormVisible = false ;
    public $modalFormDeleteVisible = false;
    public $title;
    public $body;
    public $image;
    public $modelId;
    use WithPagination,WithFileUploads;
    
    
    /**
     * Shows the form modal
     * of the create function 
     * @return void
     */
    public function createShowModal(){
         $this->resetValidation();
         $this->reset();
         $this->modalFormVisible = true;
    }    
    
    /**
     * create function 
     *
     * @return void
     */
    public function create(){
        $this->validate();
        Annonce::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }    
    /**
     * read function 
     *
     * @return void
     */
    public function read(){
        return Annonce::paginate(5);
    }
    
     /**
     * update page function 
     *
     * @return void
     */
    public function update(){
        $this->validate();
        Annonce::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
        
    }
    
    /**
     * delete page function 
     *
     * @return void
     */
    public function delete(){
        Annonce::destroy($this->modelId);
        $this->modalFormDeleteVisible = false;
        //reset paginator 
        $this->resetPage();
    }


        /**
     * rules for validation
     *
     * @return void
     */

    public function rules(){
        return [
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|max:1024'
        ];
    }

    /**
     * modalData return the data the create function 
     *
     * @return void
     */
    public function modelData(){
        // in case i want to use prefix solution $image_name = $this->title.$this->image->getClientOriginalName();
        // for separate controller solution for products, services and posts
        if($this->image){
        $image_name = $this->image->getClientOriginalName();}
        else{
            $image_name = null;
        }
        $data= [
            'title' => $this->title,
            'body' => $this->body,
            'image' => $image_name,

        ];
        if($this->image){
        $this->image->storeAs('public/img',$image_name);}
        return $data;
    }        

    
    /**
     * updateShowModal shows the form modal 
     *  in update mode
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id){
        $this->resetValidation();
        $this->reset();
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
        $data = Annonce::find($this->modelId);
        $this->title = $data->title;
        $this->body = $data->body;
        $this->image = $data->image;
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
        return view('livewire.annonces', [
            'data' => $this->read(),
        ]);
    }
}
