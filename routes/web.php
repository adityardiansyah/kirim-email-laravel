<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/send-email', function (Request $request){
    $email = $request->email;
    $subject = $request->subject;
    $content = $request->konten;
    $data = array('email' => $email, 'subject' => $subject, 'content'=>$content);
    Mail::send('email', $data, function ($message) use ($data) {
        $message->from('buatkanemail.mail@gmail.com', 'Kirim Email');
        $message->to($data['email']);
        $message->subject($data['subject']);
    });
    return redirect()->back()->with('message','Email Berhasil dikirim :)');
})->name('send-email');
