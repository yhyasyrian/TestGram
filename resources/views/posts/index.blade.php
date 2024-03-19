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
            <div class="w-full border-t">asd</div>
        </div>
    </div>
</x-app-layout>
