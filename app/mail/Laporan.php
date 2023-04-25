<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Laporan extends Mailable
{
    use Queueable, SerializesModels;
    public $report;

    /**
     * The report instance.
     *
     * @var \App\Models\Report
     */


    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Report  $report
     * @return void
     */
    public function __construct($report)
    {
        $this->report = $report;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build($formData)
    {
        return $this->view('public.mail')
                    ->from('bpbdtoba@gmail.com', 'BPBDTOBA');

    }
}
