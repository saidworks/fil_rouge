<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;

class CustomCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:livewire:crud
        {nameOfTheClass? : the name of the class},
        {nameOfTheModelClass? : the name of the model class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a custom livewire CRUD';    
    /**
     * Our custom class properties 
     *
     * @var mixed
     */
    protected $nameOfTheClass;
    protected $nameOfTheModelClass;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->file = new Filesystem();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //gathers all parameters 
        $this->gatherParameters();
        //generate the livewire class File
        $this->generateLivewireCrudClassFile();
        // generate the view File
        $this->generateLivewireViewFile();
    }
    protected function gatherParameters(){
       $this->nameOfTheClass = $this->argument('nameOfTheClass');
       $this->nameOfModelTheClass = $this->argument('nameOfTheModelClass');
        // if user did not input the class name
       if(!$this->nameOfTheClass){
            $this->nameOfTheClass = $this->ask('enter the name of the class');
       }
       if(!$this->nameOfTheModelClass){
        $this->nameOfTheModelClass = $this->ask('enter the name of the model class');
        }
        //convert to studly case
        $this->nameOfTheClass = Str::studly($this->nameOfTheClass);
        $this->nameOfTheModelClass = Str::studly($this->nameOfTheModelClass);

        $this->info($this->nameOfTheClass.' '.$this->nameOfTheModelClass);
    }    
    /**
     * generate livewire crud ClassFile
     *
     * @return void
     */
    Protected function generateLivewireCrudClassFile(){
        // set the origin and destination of the livewire class file
        $fileOrigin = base_path('/stubs/custom.livewire.crud.stub');
        $fileDestination = base_path('app/Http/Livewire/'.$this->nameOfTheClass.'.php');
        if($this->file->exists($fileDestination)){
            $this->info('This file exists already '.$this->nameOfTheClass.'.php');
            return false;
        }
        //get the original string content of the file
        $fileOriginString = $this->file->get($fileOrigin);
        //replace the strings specified in the array sequentially
        $replaceFileOriginString = Str::replaceArray('{{}}', [
                                    $this->nameOfTheModelClass, // Name of the model class
                                    $this->nameOfTheClass, // Name of the clas
                                    $this->nameOfTheModelClass,
                                    $this->nameOfTheModelClass,
                                    $this->nameOfTheModelClass,
                                    $this->nameOfTheModelClass,
                                    $this->nameOfTheModelClass,
                                    Str::kebab($this->nameOfTheClass), // From "Foobar" to "foo-bar"
                                ], $fileOriginString);

        //put the file into the destination directory
        $this->file->put($fileDestination,$replaceFileOriginString);
        $this->info('livewire class created: '.$fileDestination);
    }
    protected function generateLivewireViewFile(){
            // set the origin and destination of the livewire class file
            $fileOrigin = base_path('/stubs/custom.livewire.crud.view.stub');
            $fileDestination = base_path('resources/views/livewire/'.Str::kebab($this->nameOfTheClass).'.blade.php');
            if($this->file->exists($fileDestination)){
                $this->info('This file exists already '.Str::kebab($this->nameOfTheClass).'.blade.php');
                return false;
            }
            //copy the file to destination 
            $this->file->copy($fileOrigin,$fileDestination);
            $this->info('Livewire view file created'.$fileDestination);
    }
}
