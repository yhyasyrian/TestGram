<x-app-layout>
    <x-card>
        <form action="{{route('post.store')}}" method="post" class="flex flex-col gap-y-4" enctype="multipart/form-data">
            @csrf
            @include('posts.inputs')
            <x-primary-button class="w-fit self-end">{{__('Create Post')}}</x-primary-button>
        </form>
    </x-card>
</x-app-layout>
