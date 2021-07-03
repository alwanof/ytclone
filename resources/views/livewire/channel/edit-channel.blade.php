<div>
    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" wire:submit.prevent="update">
        <div class="flex flex-wrap">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                Channel Name:
            </label>
            <input type="text" wire:model="channel.name" class="form-input w-full" autofocus>
        </div>
        @error('channel.name')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
        @enderror
        <div class="flex flex-wrap">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                Channel Slug:
            </label>
            <input type="text" wire:model="channel.slug" class="form-input w-full">
        </div>
        @error('channel.slug')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
        @enderror
        <div class="flex flex-wrap">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                Channel Description:
            </label>
            <textarea cols="30" rows="4" wire:model="channel.description" class="form-input w-full"></textarea>
        </div>
        @error('channel.description')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
        @enderror
        @if ($logo)

            <div class="flex flex-wrap">
                <img src="{{ $logo->temporaryUrl() }}" class="h-20">
            </div>

        @endif
        <div class="flex flex-wrap">
            <div class="flex w-full h-30 items-center justify-center bg-grey-lighter">
                <label
                    class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-700 cursor-pointer hover:bg-blue-700 hover:text-white">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="mt-2 text-base leading-normal">Select a logo</span>
                    <input type='file' class="hidden" wire:model="logo" />
                </label>
            </div>
        </div>
        @error('logo')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
        @enderror

        <div class="flex flex-wrap">
            <button type="submit"
                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                Submit
            </button>


        </div>
        @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                        </svg></div>
                    <div>
                        <p class="font-bold">{{ session('message') }}</p>

                    </div>
                </div>
            </div>

        @endif



    </form>

</div>
