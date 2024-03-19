<div class="card-footer">
    <form method="post" action="{{route('comment.store',['post'=>$post->slug])}}" class="flex flex-row">
        @csrf
        <textarea name="body" id="body"
                  class="bg-transparent border-none focus:ring-0 resize-none max-h-60 grow outline-none h-12 placeholder-gray-400 overflow-y-hidden"
        ></textarea>
        <input type="submit" value="post" class="me-5 border-none outline-0 focus:ring-0 text-blue-600 cursor-pointer ">
    </form>
</div>
