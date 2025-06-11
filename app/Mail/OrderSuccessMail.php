<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public function __construct($order)
    {
        $this->order = $order; // Truyền dữ liệu đơn hàng
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject('Đơn hàng của bạn đã được thanh toán thành công')
                    ->view('email.order_success');
    }
}
