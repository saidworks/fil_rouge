<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Service;
use Livewire\Component;

class CreateBooking extends Component
{
    //get employees list to display in UI
    public $employees;
    //this is the variable that will be used to store data
    public $state = [
        'service' => null,
        'employee' => null,
    ];

    //initialize collection employees
    public function mount(){
        $this->employees = collect();
    }
    // updated hook -> state array -> service property
    public function updatedStateService($serviceId){
        $this->state['employee'] = '';
        if(!$serviceId){
            $this->employees = collect();
            return;
        }
        $this->employees = $this->selectedService->employees;

    }    
    /**
     * getSelectedServiceProperty
     *
     * @return void
     */
    public function getSelectedEmployeeProperty(){
        if(!$this->state['employee']){
            return null;
        }
        return Employee::find($this->state['employee']);
    }    
    /**
     * allows to get the selected service
     *  and create new property named selectedService
     * @return void
     */
    public function getSelectedServiceProperty(){
        if(!$this->state['service']){
            return null;
        }
        return Service::find($this->state['service']);
    }
    public function render()
    {
        $services = Service::get();
        $employees = $this->employees;
        return view('livewire.create-booking',compact('services','employees'));
    }
}
