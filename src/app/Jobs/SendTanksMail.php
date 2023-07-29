<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\TestMail;
use App\Mail\ThanksMail;
use Illuminate\Support\Facades\Mail;


class SendTanksMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $products;
    public $user;

    public function __construct($products, $user)
    {
        $this->products = $products;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Mail::to($this->user->email)
            ->send(new ThanksMail($this->products, $this->user));
        } catch (\Exception $e) {
            $errorMessege = $e->getMessage();
            Log::error('メール送信エラー:' . $errorMessege);
        }
    }
}
