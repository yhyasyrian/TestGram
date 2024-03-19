<form method="post" action="{{route('comment.store',['post'=>$slug])}}" class="p-2 mt-2 flex flex-row">
    @csrf
    <textarea id="body" name="body" placeholder="comment"
              class="w-full border-none focus:ring-transparent focus:border-none"></textarea>
    <input type="submit" value="Post" class="underline text-blue-500 font-bold cursor-pointer">
</form>
