@props(['img' => ''])
<div class="col-span-full">
    <label for="cover-photo"
        class="block font-medium text-gray-900 dark:text-gray-300 text-sm/6">Cover photo</label>
    <div data-drop-area
        class="relative flex justify-center px-6 py-10 mt-2 border border-dashed rounded-lg border-gray-900/25 dark:border-gray-100/25">
        <div class="text-center">
            <button data-delete-img type="button" class="absolute  {{ $img !== '' ? '' : 'hidden' }} top-5 right-4 dark:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z" />
                </svg>
            </button>
            <img data-img class="max-w-96" src="{{ $img !== '' ? $img : '' }}" alt="">
            <div data-text class="{{ $img !== '' ? 'hidden' : '' }}">
                <svg class="mx-auto text-gray-300 size-12" viewBox="0 0 24 24" fill="currentColor"
                    aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd"
                        d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                        clip-rule="evenodd" />
                </svg>
                <div class="flex mt-4 text-gray-600 text-sm/6">
                    <label for="file_upload"
                        class="relative font-semibold text-indigo-600 rounded-md cursor-pointer focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                        <span>Upload a file</span>
                        <input data-file-upload id="file_upload" name="file_upload" type="file"
                            class="sr-only">
                    </label>
                    <p class="pl-1 dark:text-gray-300">or drag and drop</p>
                </div>
                <p class="text-gray-600 dark:text-gray-300 text-xs/5">PNG, JPG, GIF up to 10MB</p>
            </div>
        </div>
    </div>

    @error('file_upload')
        <div class="text-sm text-red-500">{{ $message }}</div>
    @enderror
</div>

<script>
    document.addEventListener("DOMContentLoaded", (event) => {
        const dropArea = document.querySelector('[data-drop-area]')
        const fileUpload = document.querySelector('[data-file-upload]')
        const img = document.querySelector('[data-img]')
        const closeBtn = document.querySelector('[data-delete-img]')
        const texts = document.querySelector('[data-text]')
        
        closeBtn.addEventListener('click', () => {
            img.src = ''
            texts.classList.remove('hidden')
            fileUpload.value = ''
            closeBtn.classList.add('hidden')
        })

        fileUpload.addEventListener("change", () => {
            closeBtn.classList.remove('hidden')
            const imgLink = URL.createObjectURL(fileUpload.files[0])
            img.src = imgLink
            texts.classList.add('hidden')
            console.log(fileUpload.files)
        })

        dropArea.addEventListener('dragover', (e) => e.preventDefault())
        dropArea.addEventListener('drop', (e) => {
            e.preventDefault()
            const files = e.dataTransfer.files
            console.log(files)
            closeBtn.classList.remove('hidden')
            // console.log(fileUpload.files)
            const imgLink = URL.createObjectURL(files[0])
            texts.classList.add('hidden')
            img.src = imgLink
        })

    });
</script>