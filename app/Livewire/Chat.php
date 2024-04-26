<?php

namespace App\Livewire;
use App\Models\Message;
use Livewire\Component;

class Chat extends Component
{
    public $messageText;

    public function render()
    {
        $messages = Message::with('user')->latest()->take(10)->get()->sortBy('id');

        return view('livewire.chat', compact('messages'));
    }

    public function sendMessage()
    {
        $this->validate([
            'messageText' => 'required', // Ensure message text is not empty
        ], [
            'messageText.required' => 'Please enter a message.', // Custom error message
        ]);

        Message::create([
            'user_id' => auth()->user()->id,
            'message_text' => $this->messageText,
        ]);

        $this->reset('messageText');
        // $this->emit('messageReceived');
    }

    public function messageReceived()
    {
        $this->dispatchBrowserEvent('scrollToBottom');
    }
}
