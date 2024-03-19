<x-app-layout>
    <x-card>
        <form action="{{route('post.update',['post'=>$post->slug])}}" method="post" class="flex flex-col gap-y-4" enctype="multipart/form-data">
            @method('put')
            @csrf
            @include('posts.inputs')
            <x-primary-button class="w-fit self-end">{{__('Update Post')}}</x-primary-button>
        </form>
    </x-card>
</x-app-layout>
