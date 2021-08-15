<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Component
{
    public $subject;
    public $email;
    public $comment;
    public $success;
    protected $rules = [
        'subject' => 'required',
        'email' => 'required|email',
        'comment' => 'required|min:5',
    ];

    public function contactFormSubmit()
    {
        $contact = $this->validate();

        Mail::send('email',
        array(
            'subject' => $this->subject,
            'email' => $this->email,
            'comment' => $this->comment,
            ),
            function($message){
                $message->from("said.storage@gmail.com");
                $message->to('said.storage@gmail.com', 'Bobby')->subject('Your Site Contect Form');
            }
        );

        $this->success = 'Thank you for reaching out to us!';

        $this->clearFields();
    }

    private function clearFields()
    {
        $this->comment = '';
        $this->email = '';
        $this->subject = '';
    }

   
}