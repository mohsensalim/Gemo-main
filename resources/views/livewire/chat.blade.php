<div wire:poll>
    <div class="container" id="Chat">
        <h3 class=" text-center">

            @if (auth()->user()->email == 'samir.gamal77@yahoo.com')
                <a class="btn btn-primary" href="{{ Url('delete_chat') }}">حذف المحادثة</a>
            @endif
            Gemo Live Chat
        </h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="mesgs">
                    <div id="chat" class="msg_history">
                        @forelse ($messages as $message)

                            @if ($message->user->name == auth()->user()->name)
                                <!-- Reciever Message-->
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>{{ $message->message_text }}</p>
                                        <span class="time_date">
                                            {{ $message->created_at->diffForHumans(null, false, false) }}</span>
                                    </div>
                                </div>

                            @else

                                <div class="incoming_msg">{{ $message->user->name }}
                                    <div class="incoming_msg_img"> <img
                                            src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>{{ $message->message_text }}</p>
                                            <span
                                                class="time_date">{{ $message->created_at->diffForHumans(null, false, false) }}</span>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        @empty
                            <h5 style="text-align: center;color:red"> No Messages</h5>
                        @endforelse

                    </div>
                    <div class="type_msg">
                    <div class="input_msg_write">
    <form wire:submit.prevent="sendMessage">
        <input onkeydown='scrollDown()' wire:model.defer="messageText" type="text" class="write_msg"
            placeholder="Send A Message" />
        <button class="msg_send_btn" type="submit">Send</button>
    </form>
    @error('messageText') <span class="text-danger">{{ $message }}</span> @enderror
</div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


@section('scripts')
<script>

document.addEventListener('DOMContentLoaded', function() {
    function scrollDown() {
         document.getElementById('chat').scrollTop =  document.getElementById('chat').scrollHeight
        }

       scrollDown();
        });

</script>
@endsection