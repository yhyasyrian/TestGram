<div>
    <div class="m-2 flex flex-row items-center">
        <div class="img min-w-[64px] max-w-[64px] h-[64px]">
            <img src="{{$linkImg}}" alt="{{$username}}"
                 class="rounded-full w-full">
        </div>
        <div class="ms-4">
            <h2 class="font-bold inline">{{$username}}</h2>
            <p class="break-all inline">{!! e($paragraph) !!}</p>
            @if(!is_null($createdAt))
                <span class="text-gray-500 font-bold">{{$createdAt}}</span>
            @endif
        </div>
    </div>
    <hr>
</div>
