<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class RegisterEmail extends Mailable
{
    use Queueable, SerializesModels;
     
    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $register;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($register)
    {
        $this->register = $register;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@usd2bdt.com')
        
                    ->view('mails.register_email')
                    ->text('mails.demo_plain')
                    ->with(
                      [
                            'testVarOne' => '1',
                            'testVarTwo' => '2',
                      ]);
                    
                      
    }
}