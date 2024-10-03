<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Services\MessagingFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller {
    public function create()
    {
        return view('sendmessage');
    }

    public function store(Request $request) {

        Log::info('Recibido el request para enviar un mensaje.', ['request' => $request->all()]);
        $request->validate([
            'platform' => 'required',
            'message' => 'required',
            'recipients' => 'required|string',
        ]);

        DB::beginTransaction();
        try {

            $service = MessagingFactory::getService($request->platform);
            $recipientsArray = array_map('trim', explode(',', $request->recipients));

            Log::info('Recibido ', ['array' => $recipientsArray]);
            foreach ($recipientsArray as $recipient) {
                if (!empty($recipient)) {
                    $service->sendMassMessage($request->message, [$recipient]);

                    $message = new Message();
                    $message->user_id = Auth::id();
                    $message->platform = $request->platform;
                    $message->message = $request->message;
                    $message->recipients = $recipient; 
                    $message->status = 1;
                    $message->save();
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info('Error al enviar o guardar el mensaje.', ['error' => $e->getMessage()]);
        }
    }

    public function index() {
        $messages = Message::where('user_id', Auth::id())->paginate(10);
        return view('sent', compact('messages'));
    }
}