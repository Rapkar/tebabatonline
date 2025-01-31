@auth
<img  class="chat-icon" src="{{ asset('images/chat.png') }}">

<form id="chat-form" style="display: none;" class="chat-form" action="{{route('sendmessage',2)}}" method="post">
    @csrf
    <div class="chhead">
    
        <h2>ارتباط با: </h2>
        <select name="users">
            <optgroup label="طبیب"> <!-- Label for the first group -->
                <option value="2">طبیب شماره ۱</option>
                <option value="3">طبیب شماره ۲</option>
                <option value="4">طبیب شماره ۳</option>
            </optgroup>

            <option value="1">پشتیبان</option>


        </select>
        <img class="close" src="{{ asset('images/close.svg') }}">
    </div>

<div class="chatbox" >
    <div id="messages  box" >
        <!-- Messages will be displayed here -->
         <div class="textbar">
         <button> <img src="{{ asset('images/send.svg') }}"></button>
        <input type="text" id="messageInput" placeholder="پیام خود را وارد کنید..." autofocus>
       
        </div>
    </div>
    </div>
</form>
@endauth