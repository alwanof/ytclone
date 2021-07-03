<div>
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header
                    class="flex items-center font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Create Video
                </header>

                <div class="w-full p-6" x-data="{ isUploading: false, progress: 0 }"
                    x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false, $wire.uploadCompleted()"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">

                    <div class="w-full" x-show="isUploading">
                        <div class="relative pt-1">
                            <div class="overflow-hidden h-3 mb-4 text-xs flex rounded bg-blue-200">
                                <div :style="`width:${progress}%`"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap p-2 text-white justify-center bg-blue-500">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="flex flex-wrap" x-show="!isUploading">
                        <div class="flex w-full h-30 items-center justify-center bg-grey-lighter">
                            <label
                                class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-700 cursor-pointer hover:bg-blue-700 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal">Select a Video</span>
                                <input type='file' class="hidden" wire:model="videoFile" />
                            </label>
                        </div>
                    </div>
                    @error('videoFile')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </section>
        </div>
    </main>


</div>
