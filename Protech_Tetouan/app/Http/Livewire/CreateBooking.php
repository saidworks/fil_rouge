<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Carbon\Carbon;
use App\Models\Service;
use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class CreateBooking extends Component
{
    //get employees list to display in UI
    public $employees;
    //this is the variable that will be used to store data
   
    // I need to add id for authenticated user
    public $state = [
        'service' => null,
        'employee' => null,
        'time' => null,
       'name' => null,
       'email' => null
    ];

    
    //initialize collection employees
    public function mount(){
        $this->employees = collect();
    }
    protected $listeners = [
        'updated-booking-time' => 'setTime'  
    ];

    protected function rules(){
        return [
            'state.service' => 'required|exists:services,id',
            'state.employee' => 'required|exists:employees,id' ,
            'state.time' => 'required|numeric',
            'state.name' => 'required|string',
            'state.email' => 'required|email',
           
        ];
    }
    public function createBooking(){
        $this->validate();
        $bookingFields = [
            'date' => $this->timeObject->toDateString(),
            'start_time' => $this->timeObject->toTimeString(),
            // clone to not modify the original
            'end_time' => $this->timeObject->clone()->addMinutes($this->selectedService->duration)->toTimeString(),
            'client_name' => $this->state['name'],
            'client_email' => $this->state['email']

        ];
     //The only difference between create and make: create persists to the database whereas make just returns a new instance of the model
        $appointment = Appointment::make(
            $bookingFields 
        );
        $appointment->service()->associate($this->selectedService); // attach it and insert it automatically 
        $appointment->employee()->associate($this->selectedEmployee);
        $appointment->save();
        return redirect()->to(route('bookings.show',$appointment).'?token='.$appointment->token);
    }
    public function setTime($time){
        $this->state['time'] = $time;
    }
    // updated hook -> state array -> service property
    public function updatedStateService($serviceId){
        $this->state['employee'] = '';
        if(!$serviceId){
            $this->employees = collect();
            return;
        }
        $this->clearTime(); 
        $this->employees = $this->selectedService->employees;

    }   
         
    public function clearTime(){
        $this->state['time'] = ''; 
    }
    /**
     * update time when employee updated
     *
     * @return void
     */
    public function updatedStateEmployee(){
        $this->clearTime();
    }
    /**
     * Get the selected employee from the UI
     *  assign it to a new property named selectedEmployee
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
    
    /**
     * when all data entered return true
     *
     * @return void
     */
    public function getHasDetailsToBookProperty(){
        return $this->state['service']  && $this->state['employee']  && $this->state['time'];
        
    }
    public function getTimeObjectProperty(){
        return Carbon::createFromTimeStamp($this->state['time']);
    }
    
    public function render()
    {
        $services = Service::get();
        $employees = $this->employees;
        return view('livewire.create-booking',compact('services','employees'))->layout('layouts.frontpage');
    }
}
