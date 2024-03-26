<x-app-layout>
    <div class="grid grid-cols-4 px-4 container mx-auto">
        {{-- user image --}}
        <div class="px-4 col-span-2 md:col-span-1 order-1">
            <img src="{{$user->image()}}" alt="{{$user->username}}'s photo"
                 class="rounded-full w-20 md:w-40 border-neutral-500"/>
        </div>
        {{-- user name and button --}}
        <div class="px-4 col-span-2 md:mr-0 flex flex-col order-2 md:col-span-3">
            <h1 class="text-3xl mb-3">{{$user->username}}</h1>
            @if(auth()->id() === $user->id)
                <a href="{{route('profile.edit',['user'=>$user->username])}}"
                >
                    <x-secondary-button
                        class="block px-2 sm:px-8 md:px-16 py-1 w-fit">{{__('Edit Profile')}}</x-secondary-button>
                </a>
            @endif
        </div>
        {{-- user information --}}
        <div class="text-md mt-8 px-4 col-span-3 col-start-1 order-3 md:order-4 md:col-start-2 md:mt-0">
            <p class="font-bold">{{$user->name}}</p>
            {!! nl2br(e($user->bio)) !!}
        </div>
        {{-- User stats  --}}
        <div
            class="col-span-4 my-5 py-2 border-y border-y-neutral-200 order-4 md:order-3 md:border-none md:px-4 md:col-start-2">
            <ul class="text-md flex flex-row justify-around md:justify-start md:space-x-10 md:text-xl">
                <li class="flex flex-col md:flex-row text-center rtl:ml-5">
                    <div class="md:ltr:mr-1 md:rtl:ml-1 font-bold md:font-normal">
                        {{ $user->posts->count() }}
                    </div>
                    <span class='text-neutral-500 md:text-black'>
                    {{ $user->posts->count() > 1 ? __('posts') : __('post') }}</span>
                </li>
            </ul>
        </div>
    </div>
    {{-- bottom --}}
    <div class="grid sm:grid-cols-2 md:grid-cols-3 md:container mx-auto px-2 gap-4 my-4">
        @foreach($user->posts as $post)
            <a href="{{route('post.show',['post'=>$post->slug])}}">
                <img src="{{$post->image()}}" alt="" class="w-full object-cover aspect-square rounded-sm">
            </a>
        @endforeach
    </div>
</x-app-layout>
