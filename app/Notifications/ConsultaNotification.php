<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConsultaNotification extends Notification
{
    use Queueable;

    public $consulta;
    public $pdf;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($consulta, $pdf)
    {
        $this->consulta = $consulta;
        $this->pdf = $pdf;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mail = (new MailMessage)
            ->subject('Información de consulta a ' . $this->consulta->pet->name)
            ->greeting('Hola ' . $this->consulta->client->name . ',')
            ->line('Te enviamos la información de la consulta de tu mascota ' . $this->consulta->pet->name)
            ->line('Nombre: ' . $this->consulta->pet->name)
            ->line('Edad: ' . $this->consulta->pet->edad())
            ->line('Peso: ' . $this->consulta->peso)
            ->line('Temperatura: ' . $this->consulta->temp)
            ->line('Mucosas: ' . $this->consulta->mucosas)
            ->line('Palpitacion Abdominal: ' . $this->consulta->palpitacion_abdominal)
            ->line('Sintomas: ' . $this->consulta->sintomas)
            ->line('Diagnostico: ' . $this->consulta->diagnostico)
            ->line('Receta: ' . $this->consulta->receta)
            ->attach(public_path('/storage/pdf/'.$this->pdf), [
                'as' => $this->pdf,
                'mime' => 'text/pdf',
            ]);

        return $mail;
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
            //
        ];
    }

}
