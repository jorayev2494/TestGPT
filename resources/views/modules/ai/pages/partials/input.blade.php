<div class="chat-input p-3">
    <form action="{{ route('assistant.send', ['slug' => request()->route('slug')]) }}" method="post" class="input-group">
        @csrf
        <input type="text" name="text" class="form-control" value="Привет! кто ты по профессии?" placeholder="Напишите сообщение...">
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>
