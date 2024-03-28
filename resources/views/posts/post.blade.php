<x-card class="px-0 w-full pb-0">
    <div class="card-header">
        <img src="{{asset($post->owner_image)}}" alt="{{$post->owner_username}}"
             class="w-8 h-8 rounded-full object-cover"/>
        <p class="font-bold">{{$post->owner_username}}</p>
    </div>
    <div class="overflow-hidden max-h-[35rem]">
        <img class="h-full object-cover w-auto" src="{{asset($post->image)}}"
             alt="{{$post->description}}"/>
    </div>
    <div class="card-paragraph">
        <a href="{{route('username',['user'=>$post->owner_username])}}" class="font-bold ms-1">{{$post->owner_username}}</a>
        <p class="">{{$post->description}}</p>
        @if($post->comments_count > 0)
            <a class="my-1 font-bold text-sm text-gray-500" href="{{route('post.show',['post'=>$post->slug])}}">{{__('All comments '.$post->comments_count)}}</a>
        @endif
        <div class="p-3">
            <a href="{{route('like',['post'=>$post->slug])}}">
                @if (!is_null($post->user_like))
                    <x-icon-heart-fill />
                @else
                    <x-icon-heart />
                @endif
            </a>
        </div>
        <p class="text-gray-400 p-3 text-xs uppercase">
            {{ \Illuminate\Support\Carbon::create($post->created_at)->diffForHumans()  }}
        </p>
    </div>
    @include('comments.create')
</x-card>
