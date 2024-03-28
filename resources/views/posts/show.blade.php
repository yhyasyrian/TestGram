<x-app-layout>
    <div class="max-w-3xl mx-auto h-screen md:grid md:grid-cols-12">
        {{-- Left --}}
        <div class="md:col-span-7 h-screen bg-black flex justify-center items-center">
            <img src="{{asset($post->image)}}" alt="{{$post->description}}"
                 class="mx-auto max-h-screen object-cover">
        </div>
        {{-- Right --}}
        <div class="md:col-span-5 h-screen bg-white flex flex-col relative">
            @if($post->owner->id === auth()->id())
                <div class="absolute bg-white p-1 -top-6 end-0 flex flex-row-reverse gap-2">
                    @include('posts.deleteForm')
                    @include('posts.editForm',['slug'=>$post->slug])
                </div>
            @endif
            <x-show-profile-in-post :linkImg="asset($post->owner->image)" :username="$post->owner->username"
                                    :paragraph="$post->description"/>
            @include('comments.show',['comments'=>$post->comments])
            <div class="p-2">
                <a href="{{route('like',['post'=>$post->slug])}}">
                    @if ($post->likes()->where('user_id',auth()->id())->exists())
                        <x-icon-heart-fill/>
                    @else
                        <x-icon-heart/>
                    @endif
                </a>
            </div>
            @include('comments.create',['slug'=>$post->slug])
        </div>
    </div>
</x-app-layout>
