<x-app-layout>
    <div class="max-w-3xl mx-auto h-screen md:grid md:grid-cols-12">
        {{-- Left --}}
        <div class="md:col-span-7 h-screen bg-black flex justify-center items-center">
            <img src="{{asset('storage/'.$post->image)}}" alt="{{$post->description}}"
                 class="mx-auto max-h-screen object-cover">
        </div>
        {{-- Right --}}
        <div class="md:col-span-5 h-screen bg-white flex flex-col">
            <x-show-profile-in-post :linkImg="asset($post->owner->image)" :username="$post->owner->username" :paragraph="$post->description" />
            @include('comments.show',['comments'=>$post->comments])
            @include('comments.create',['slug'=>$post->slug])
        </div>
    </div>
</x-app-layout>
