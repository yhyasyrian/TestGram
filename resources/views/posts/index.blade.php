<x-app-layout>
    <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 gap-6 lg:container mx-auto px-2">
        <div class="col-start-3 col-end-9 ">
            <div class="flex flex-col gap-y-8">
                @foreach($posts as $post)
                    @include('posts.post')
                @endforeach
            </div>
        </div>
        <div class="col-start-9 col-end-13 ">
            <div class="w-full flex flex-col gap-y-4">
                <x-show-user-with-name :photo="asset(auth()->user()->image)" :user="auth()->user()" />
                <h2 class="ms-2 font-bold text-gray-500">{{__('Suggestions for you')}}</h2>
                <ul class="flex flex-col gap-y-4">
                    @foreach($suggestd_users as $suggestd_user)
                        <li><x-show-user-with-name :user="$suggestd_user" /></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
