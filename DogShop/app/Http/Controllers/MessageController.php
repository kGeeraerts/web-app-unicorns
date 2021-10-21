<?php

namespace App\Http\Controllers;

use App\Mail\MessageAnswer;
use App\Models\Message;
use App\Notifications\MessageSend;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class MessageController extends Controller {

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->authorizeResource(Message::class, 'message');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View {
        $messages = Message::latest()->paginate(15);
        return view('admin.inbox.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse {
        $message = new Message(request()->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'subject' => 'required|min:3|max:255',
            'question' => 'required|min:3|max:2048',
            'consent' => 'required|accepted',
        ]));
        $message->consent = true;

        if (auth()->id()) {
            $message->user_id = auth()->id();
        }
        $message->save();
        Notification::send(all_users_with_answer_messages_permission(), new MessageSend($message));
        return redirect('/contact/create')->with('status', 'Your question has been send to DogShop');
    }

    /**
     * Display the specified resource.
     *
     * @param Message $message
     * @return View
     */
    public function show(Message $message): View {
        return view('admin.inbox.item', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Message $message
     * @return View
     */
    public function edit(Message $message) {
        return view('admin.inbox.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Message $message
     * @return RedirectResponse
     */
    public function update(Message $message): RedirectResponse {
        $message->update(request()->validate([
            'answer' => 'required|min:3|max:2048',
        ]));
        $message->answered_by = auth()->id();
        $message->replied = true;
        $message->save();

        Mail::to($message->email)->send(new MessageAnswer($message));
        return redirect('/admin/inbox')->with('status', 'Answer send to '. $message->name);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Message $message
     * @return RedirectResponse
     */
    public function destroy(Message $message): RedirectResponse {
        $message->delete();
        return redirect('/admin/inbox)');
    }
}
