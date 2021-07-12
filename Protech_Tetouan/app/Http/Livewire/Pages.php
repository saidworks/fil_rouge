<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Page;
// used to validate slugs in our form validation 
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
class Pages extends Component
{   
    public $modalFormVisible = false ;
    public $modalFormDeleteVisible = false;
    public $slug;
    public $title;
    public $content;
    public $image;
    public $modelId;
    use WithPagination,WithFileUploads;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;
    
    
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
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Page::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
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
     * update page function 
     *
     * @return void
     */
    public function update(){
        // problem with validation for slug when trying the update
        $this->validate();
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Page::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }
    
    /**
     * delete page function 
     *
     * @return void
     */
    public function delete(){
        Page::destroy($this->modelId);
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
            'slug' => ['required', Rule::unique('pages','slug')->ignore($this->modelId)],
            'content' => 'required',
            'image' => 'required|image|max:1024'
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
        $image_name = $this->image->getClientOriginalName();
        $data= [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'image' => $image_name,
            'is_default_home' => $this->isSetToDefaultHomePage,
            'is_default_not_found' => $this->isSetToDefaultNotFoundPage
        ];
        $this->image->storeAs('public/img',$image_name);
        return $data;
    }        
    /**
     * two functions that update the value of default page home
     *  if 404 checked and vice versa
     * @return void
     */
    public function updatedIsSetToDefaultHomePage(){
        $this->isSetToDefaultNotFoundPage = null;
    }
    public function updatedIsSetToDefaultNotFoundPage(){
        $this->isSetToDefaultHomePage= null;
    }
    
    
   
    /**
     * updatedTitle take the value of the title 
     * and assign to the slug everytime it's changed
     * @return void
     */
    public function updatedTitle($value){
       $this->slug = Str::slug($value);
    }    

        
    /**
     * unassign Default HomePage from the database table
     *  following function unassign the not found page from the database table
     * @return void
     */
    private function unassignDefaultHomePage(){
        if($this->isSetToDefaultHomePage != null){
            Page::where('is_default_home',true)->update([
                'is_default_home' => false,
            ]);
        }
    }
    private function unassignDefaultNotFoundPage(){
        if($this->isSetToDefaultNotFoundPage  != null){
            Page::where('is_default_not_found',true)->update([
                'is_default_not_found'=> false,
            ]);
        }
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
        $data = Page::find($this->modelId);
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->content = $data->content;
        $this->image = $data->image;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null:true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null:true;

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
