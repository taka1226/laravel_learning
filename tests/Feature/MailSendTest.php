<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Mail\MailTest;
use Illuminate\Support\Facades\Mail;

class MailSendTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        // 実際にはメールを送らないように設定
        Mail::fake();

        // メールが送られていないことを確認
        Mail::assertNothingSent();


        // メール送信処理を実施
        $response = $this->get('/mail');

        $email = "to_address@example.com";
        // メッセージが指定したユーザーに届いたことをアサート
        Mail::assertSent(MailTest::class, function ($mail) use ($email) {
            return $mail->hasTo($email);
        });

        // メールが1回送信されたことをアサート
        Mail::assertSent(MailTest::class, 1);

  }

}
