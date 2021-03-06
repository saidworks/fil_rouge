<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\UserPermission;
// used to validate slugs in our form validation 
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class UserPermissions extends Component
{
    use WithPagination,WithFileUploads;
    public $modalFormVisible = false ;
    public $modalFormDeleteVisible = false;
    public $modelId;
    /**
    * put your custom public properties here
    */
    public $routeName,$role;
    
        /**
     * rules for validation
     *
     * @return void
     */

    public function rules(){
        return [
           'role' => 'required',
           'routeName' => 'required'
        ];
    }

  
    /**
     * modelData the data for the model mapped
     * in this component
     * @return void
     */
    public function modelData(){
        $data = [
            'role' => $this->role,
            'route_name' => $this->routeName,
        ];
        return $data;
    }

     /**
     * loadModel : loads the previous data of the 
     *  entry to update
     * @param  mixed $id
     * @return void
     */
    public function loadModel(){
        $data = UserPermission::find($this->modelId);
        // Assign the variables here
        $this->role = $data->role;
        $this->routeName = $data->route_name;
    }        

      
    /**
     * read entries and paginate them
     * 5 entries per page
     * @return void
     */
    public function read(){
        return UserPermission::paginate(5); //4
    }    
    /**
     * createShowModal shows the modal for creating
     * new navigation menu
     * @return void
     */
    public function createShowModal(){
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }
    
    public function create(){
        $this->validate();
        UserPermission::create($this->modelData()); //5
        $this->modalFormVisible = false;
        $this->reset();
    }  
    
       /**
     * update function
     *
     * @return void
     */
    public function update(){
        $this->validate();
        UserPermission::find($this->modelId)->update($this->modelData()); //6
        $this->modalFormVisible = false;
    }

    
    /**
     * delete function
     *
     * @return void
     */
    public function delete(){
        UserPermission::find($this->modelId)->delete(); //7
        $this->modalFormDeleteVisible = false;
        $this->resetPage();
    }
   
    /**
     * updateShowModal show update
     * modal
     * @return void
     */
    public function updateShowModal($id){
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel();
    }

      public function deleteShowModal($id){
        $this->modalFormDeleteVisible = true;
        $this->modelId = $id;
    }
    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.user-permissions',[
            'data' => $this->read(),
        ]);
    }
       
}