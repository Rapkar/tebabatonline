@auth
<form id="chat-form" class="chat-form" action="{{route('sendmessage')}}" method="post">
    @csrf
    <div class="chhead">
        <h2>ارتباط با: </h2>
        <select>
            <optgroup label="طبیب"> <!-- Label for the first group -->
                <option value="1">طبیب شماره ۱</option>
                <option value="2">طبیب شماره ۲</option>
                <option value="3">طبیب شماره ۳</option>
            </optgroup>

            <option value="1">پشتیبان</option>


        </select>
    </div>


    <div id="messages" class="chatbox">
        <!-- Messages will be displayed here -->
    </div>
    <input type="text" id="messageInput" placeholder="Type your message here..." autofocus>
    <button>ارسال</button>
</form>
@endauth