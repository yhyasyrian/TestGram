{{-- Image --}}
<div>
    <x-input-label for="image" :value="__('image')"/>
    <x-text-input type="file" name="image" id="image" class="w-full" />
</div>
{{-- Caption --}}
<div>
    <x-input-label for="description" :value="__('description')"/>
    <textarea class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
              name="description" id="description" rows="5">{{old('description') ?? $post->description ?? ''}}</textarea>
</div>
