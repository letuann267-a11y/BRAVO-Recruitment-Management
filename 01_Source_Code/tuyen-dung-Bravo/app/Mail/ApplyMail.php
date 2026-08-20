<?php

namespace App\Mail;

use App\Models\Job;
use App\Models\JobRequest;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var JobRequest
     */
    private $jobRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(JobRequest $jobRequest)
    {
        //
        $this->jobRequest = $jobRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $job = Job::where("id", $this->jobRequest->job_id)->first();
        $companyName = $job->user->company->name;
        $user = User::where("id", $this->jobRequest->user_id)->first(); 
        return $this
            ->subject('Mail Apply')
            ->markdown('mail.apply-mail', [
                'name' => $user->name,
                'surname' => $user->surname, 
                'jobTitle' => $job->title,
                'address' => $job->address,
                'company' => $companyName
            ]);
    }
}