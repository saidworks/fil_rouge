<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
class Frontpage extends Component
{
    public $urlslug;
    public $title;
    public $content;

    public function mount($urlslug = null){
        $this->retrieveContent($urlslug);
    }

    public function retrieveContent($urlslug){
        // get home page if we did not specify a slug
        if(empty($urlslug)){
            $data = Page::where('is_default_home',true)->first();
        }
        else {
            // get the page according to the slug
            $data = Page::where('slug',$urlslug)->first();
            // if we can't retrieve anything let us get the default 404 page
            if(!$data){
            $data = Page::where('is_default_not_found',true)->first();
            }
        }
        $this->title = $data->title;
        $this->content = $data->content;
    }
    public function sideBarLinks(){
        return DB::table('navigation_menus')
        ->where('type','=','SidebarNav')
        ->orderBy('sequence','asc')
        ->orderBy('created_at','asc')
        ->get();
    }
    public function render()
    {
        return view('livewire.frontpage',[
            'sideBarlinks' => $this->sideBarLinks()
        ])->layout('layouts.frontpage');
    }
}
