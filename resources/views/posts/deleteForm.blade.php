<form action="{{route('post.destroy',['post'=>$post->slug])}}" method="post" onsubmit="return confirm('delete post?')">
    @method('delete')
    @csrf
    <button class="text-red-400 hover:text-red-600 hover-transition">
        <x-icon-trash />
    </button>
</form>
