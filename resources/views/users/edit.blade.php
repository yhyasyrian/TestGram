<x-app-layout>
    <form method="post" enctype="multipart/form-data" action="{{route('profile.update',['user'=>$user->username])}}">
        @csrf
        @method('PATCH')
        <div class="space-y-12 px-2 mx-auto grid md:grid-cols-2 gap-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-6">
                        <x-input-label for="username">{{__('Username')}}</x-input-label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                <x-text-input type="text" name="username" id="username" class="flex-1 w-full"
                                              value="{{$user->username}}"
                                              placeholder="username"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <x-input-label for="bio">{{__('Bio')}}</x-input-label>
                        <div class="mt-2">
                            <textarea id="bio" name="bio" rows="3"
                                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 resize-none">{{$user->bio}}</textarea>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-gray-600">{{__('Write a few sentences bio yourself.')}}</p>
                    </div>

                    <div class="col-span-full">
                        <x-input-label for="image">{{__('Photo')}}</x-input-label>
                        <div class="mt-2 flex items-center gap-x-3">
                            <img src="{{asset($user->image)}}" class="h-12 w-12 text-gray-300 rounded-full"
                                 alt="image's {{$user->username}}"/>
                            <x-text-input type="file" name="image" id="image" class="w-full" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">{{__('Personal Information')}}</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">{{__('Use a permanent address where you can receive mail.')}}</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-input-label for="name">{{__('Full name')}}</x-input-label>
                        <div class="mt-2">
                            <x-text-input type="text" name="name" id="name" class="flex-1 w-full"
                                          value="{{$user->name}}"
                                          placeholder="name"/>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <x-input-label for="is_private">{{__('Is private')}}</x-input-label>
                        <div class="mt-2">
                            <x-input-label>
                                <input type="checkbox" id="is_private" name="is_private" @if($user->is_private) checked
                                       @endif class="sr-only peer">
                                <div
                                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-0 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            </x-input-label>
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <x-input-label for="password">{{__('New password')}}</x-input-label>
                        <div class="mt-2">
                            <x-text-input
                                type="password"
                                name="password"
                                id="password"
                                class="w-full"
                            />
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <x-input-label for="password_confirmation">{{__('Confirm password')}}</x-input-label>
                        <div class="mt-2">
                            <x-text-input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                class="w-full"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-6 flex items-center justify-end gap-x-6 px-2">
            <x-primary-button>{{__('Save')}}</x-primary-button>
        </div>
    </form>
</x-app-layout>
