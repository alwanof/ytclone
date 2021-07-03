<div>
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header
                    class="flex items-center font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Edit Video
                </header>

                <div class="w-full p-6">
                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" wire:submit.prevent="update">
                        <div class="flex flex-wrap">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                Video Title:
                            </label>
                            <input type="text" wire:model="video.title" class="form-input w-full" autofocus>
                        </div>
                        @error('video.title')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="flex flex-wrap">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                Video Description:
                            </label>
                            <textarea cols="30" rows="4" wire:model="video.description"
                                class="form-input w-full"></textarea>
                        </div>
                        @error('video.description')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="flex flex-wrap">
                            <label for="visibility" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                Video Visibility:
                            </label>
                            <select wire:model="video.visibility" class="form-input w-full">
                                <option value="private">Private</option>
                                <option value="public">Public</option>
                                <option value="unlisted">Unlisted</option>
                            </select>
                        </div>
                        @error('video.visibility')
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
            </section>
        </div>
    </main>


</div>
