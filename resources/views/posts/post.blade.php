<x-card class="px-0 w-full pb-0">
    <div class="card-header">
        <img src="{{$post->owner->image}}" alt="{{$post->owner->username}}"
             class="w-8 h-8 rounded-full object-cover"/>
        <p class="font-bold">{{$post->owner->username}}</p>
    </div>
    <div class="overflow-hidden max-h-[35rem]">
        <img class="h-full object-cover w-auto" src="{{$post->image()}}"
             alt="{{$post->description}}"/>
    </div>
    <div class="card-paragraph">
        <a href="" class="font-bold ms-1">{{$post->owner->username}}</a>
        <p class="">{{$post->description}}</p>
        @if($post->comments->count() > 0)
            <a class="my-1 font-bold text-sm text-gray-500" href="{{route('post.show',['post'=>$post->slug])}}">{{__('All comments '.$post->comments->count())}}</a>
        @endif
        <p class="text-gray-400 p-3 text-xs uppercase">
            {{$post->created_at->diffForHumans()}}
        </p>
    </div>
    @include('comments.create')
</x-card>
