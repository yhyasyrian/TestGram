<x-app-layout>
    <x-card>
        <form action="{{route('post.store')}}" method="post" class="flex flex-col gap-y-4" enctype="multipart/form-data">
            @csrf
            {{-- Image --}}
            <div>
                <x-input-label for="image" :value="__('image')"/>
                <x-text-input type="file" name="image" id="image" class="w-full" required />
            </div>
            {{-- Caption --}}
            <div>
                <x-input-label for="description" :value="__('description')"/>
                <textarea class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                          name="description" id="description" rows="5"></textarea>
            </div>
            <x-primary-button class="w-fit self-end">{{__('Create Post')}}</x-primary-button>
        </form>
    </x-card>
</x-app-layout>
