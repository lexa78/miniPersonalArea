<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;
use Mail;

class SendCode extends Command implements SelfHandling {

	private $emailMessage;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($emailContent)
	{
		$this->emailMessage = $emailContent;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		Mail::send('emails.code', $this->emailMessage, function($message)
		{
			$message->to($this->emailMessage['email'])->subject('Код для продолжения регистрации');
		});
	}

}
