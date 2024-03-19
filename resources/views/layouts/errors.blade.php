@if($errors->any())
    <div class="bg-red-500 max-w-2xl mx-auto list-decimal text-white p-2 mb-4 rounded-md">
        @foreach($errors->all() as $number => $error)
            <p>{{$number + 1}} - {{$error}}</p>
        @endforeach
    </div>
@endif

@if(session()->has('fail'))
    <div class="bg-red-500 max-w-2xl mx-auto list-decimal text-white p-2 mb-4 rounded-md">
        {{session()->get('fail')}}
    </div>
@endif
@if(session()->has('success'))
    <div class="bg-green-500 max-w-2xl mx-auto list-decimal text-white p-2 mb-4 rounded-md">
        {{session()->get('success')}}
    </div>
@endif
