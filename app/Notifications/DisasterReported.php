<?php

namespace App\Notifications;
use App\Models\Desa;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;

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
    // dd(json_encode($this->reportedData));

    // ...

    public function toArray($notifiable)
    {
        $reportedData = json_decode($this->reportedData, true);

        $namaBencana = $reportedData['nama_bencana'];
        $desaId = $reportedData['desa_id'];
        $namaDesa = DB::table('desas')->where('id', $desaId)->value('nama_desa');
        dd(json_encode($this->reportedData));
        return [
            'laporan_id' => $reportedData['id'],
            'nama_bencana' => $namaBencana,
            'nama_desa' => $namaDesa,
            'keterangan' => $reportedData['keterangan'],
            'jenis_bencana' => $reportedData['jenis_bencana'],
            'created_at' => $reportedData['created_at'],
        ];
    }


}
