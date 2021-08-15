<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\User;
// used to validate slugs in our form validation 
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class Users extends Component
{
    use WithPagination,WithFileUploads;
    public $modalFormVisible = false ;
    public $modalFormDeleteVisible = false;
    public $modelId;
    /**
    * put your custom public properties here
    */
    public $email,$name;
    public $role = 'user';
    
        /**
     * rules for validation
     *
     * @return void
     */

    public function rules(){
        return [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ];
    }

  
    /**
     * modelData the data for the model mapped
     * in this component
     * @return void
     */
    public function modelData(){
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
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
        $data = User::find($this->modelId);
        // Assign the variables here
        
        $this->name = $data->name;
        $this->email =$data->email;
        $this->role = $data->role;
    }        

      
    /**
     * read entries and paginate them
     * 5 entries per page
     * @return void
     */
    public function read(){
        return User::paginate(5); //4
    }    
   
  
    
 
    
       /**
     * update function
     *
     * @return void
     */
    public function update(){
        $this->validate();
        User::find($this->modelId)->update($this->modelData()); //6
        $this->modalFormVisible = false;
    }

    
    /**
     * delete function
     *
     * @return void
     */
    public function delete(){
        User::find($this->modelId)->delete(); //7
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
        return view('livewire.users',[
            'data' => $this->read(),
        ]);
    }
       
}