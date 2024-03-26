<x-app-layout>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 md:container mx-auto px-2 gap-4">
        @foreach($explorer as $post)
            <div>
                <a href="{{route('post.show',['post'=>$post->slug])}}">
                    <img src="{{$post->image()}}" alt="" class="w-full object-cover aspect-square rounded-sm">
                </a>
            </div>
        @endforeach
    </div>
    <div class="my-8 container mx-auto px-2">
        {{$explorer->links('vendor.pagination.tailwind')}}
    </div>
</x-app-layout>
