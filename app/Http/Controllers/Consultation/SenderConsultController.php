<?php

namespace App\Http\Controllers\Consultation;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use App\Mail\Consultation\ConsultMail;
use App\Actions\TelegramSendAction;

use App\Http\Requests\Consultation\ConsultFormRequest;

class SenderConsultController extends Controller
{
    public function send_consultation(ConsultFormRequest $request, TelegramSendAction $tgsender) {
        $data = $request->validated();


        $tmp = $tgsender->handle("<b>Консультация</b>\n\rИмя: ".$data['name']."\n\rТелефон: ".$data['phone']."\n\rКомментарий: ".$data['message']);


        Mail::to(explode(",",config('consultation.mailadresat')))->send(new ConsultMail($data));

        return redirect()->route('thencs_consult');
    }

    public function show_thencs() {
        return view('mail.consultation.thencs');
    }
}
