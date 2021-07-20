<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
class Products extends Component
{   
    public $modalFormVisible = false ;
    public $modalFormDeleteVisible = false;
    public $price;
    public $name;
    public $description;
    public $picture;
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
        Product::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }    
    /**
     * read function 
     *
     * @return void
     */
    public function read(){
        return Product::paginate(5);
    }
    
     /**
     * update page function 
     *
     * @return void
     */
    public function update(){
        // problem with validation for slug when trying the update
        // $this->reset();
        $this->validate();
        Product::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
        
    }
    
    /**
     * delete page function 
     *
     * @return void
     */
    public function delete(){
        Product::destroy($this->modelId);
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
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'picture' => 'nullable|image|max:1024'
        ];
    }

    /**
     * modalData return the data the create function 
     *
     * @return void
     */
    public function modelData(){
        // in case i want to use prefix solution $picture_name = $this->name.$this->picture->getClientOriginalName();
        // for separate controller solution for products, services and posts
        if($this->picture){
        $picture_name = $this->picture->getClientOriginalName();}
        else{
            $picture_name = null;
        }
        $data= [
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'picture' => $picture_name,
            'user_id' => auth()->user()->id,
        ];
        if($this->picture){
        $this->picture->storeAs('public/img',$picture_name);}
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
        $data = Product::find($this->modelId);
        $this->name = $data->name;
        $this->price = $data->price;
        $this->description = $data->description;
        $this->picture = $data->picture;
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
        return view('livewire.products', [
            'data' => $this->read(),
        ]);
    }
}
