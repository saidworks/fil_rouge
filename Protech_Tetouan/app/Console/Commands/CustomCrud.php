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

        //get the original string content of the file
        $fileOriginString = $this->file->get($fileOrigin);
        $replaceFileOriginString = Str::replaceArray('^', [
                                    $this->nameOfTheClass
                                ], $fileOriginString);

        //put the file into the destination directory
        $this->file->put($fileDestination,$replaceFileOriginString);
        $this->info('livewire class created: '.$fileDestination);
    }
}
