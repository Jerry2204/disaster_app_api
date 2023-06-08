<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DisasterReported extends Notification
{
    use Queueable;
    private $reportedData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reportedData)
    {
        $this->reportedData = $reportedData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'laporan_id' => $this->reportedData['id'],
            'nama_bencana' => $this->reportedData['nama_bencana'],
            
            'keterangan' => $this->reportedData['keterangan'],
            'jenis_bencana' => $this->reportedData['jenis_bencana'],
            'created_at' => $this->reportedData['created_at'],
        ];
    }
}
