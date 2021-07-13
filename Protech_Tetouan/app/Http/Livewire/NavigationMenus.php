<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\NavigationMenu;
use Illuminate\Validation\Rule;

class NavigationMenus extends Component
{
    use WithPagination;
    //define variables
    public $slug;
    public $label;
    public $type = 'SidebarNav';
    public $sequence = 1;
    public $modelId;
    public $modalFormVisible = false ;
    public $modalFormDeleteVisible = false;
    
     
    /**
     * read entries and paginate them
     * 5 entries per page
     * @return void
     */
    public function read(){
        return NavigationMenu::paginate(5);
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
        NavigationMenu::create($this->modelData());
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
        NavigationMenu::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    
    /**
     * delete function
     *
     * @return void
     */
    public function delete(){
        NavigationMenu::find($this->modelId)->delete();
        $this->modalFormDeleteVisible = false;
        $this->resetPage();
    }
    public function rules(){
        return [
            'type' => 'required',
            'slug' => 'required',
            'label' => 'required',
            'type' => 'required'
        ];
    }
    /**
     * modelData the data for the model mapped
     * in this component
     * @return void
     */
    public function modelData(){
        $data = [
            'slug' => $this->slug,
            'type' => $this->type,
            'sequence' => $this->sequence,
            'label' => $this->label
        ];
        return $data;
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
    
    /**
     * loadModel : loads the previous data of the 
     *  entry to update
     * @param  mixed $id
     * @return void
     */
    public function loadModel(){
        $data = NavigationMenu::find($this->modelId);
        $this->slug = $data->slug;
        $this->type = $data->type;
        $this->label = $data->label;
        $this->sequence = $data->sequence;
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
        return view('livewire.navigation-menus',[
            'data' => $this->read(),
        ]);
    }
}
