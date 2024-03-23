<div class="flex flex-row gap-6 items-center">
    <a href="{{route('username',['user'=>$user->username])}}">
        <img src="{{$user->image}}" class="w-16 h-16 rounded-full bg-gray-300">
    </a>
    <div class="flex flex-col gap-2">
        <h3 class="font-bold">
            <a href="{{route('username',['user'=>$user->username])}}">{{$user->username}}</a>
        </h3>
        <p class="text-gray-500 font-light">{{$user->name}}</p>
    </div>
</div>
