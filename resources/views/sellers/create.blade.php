<x-layouts.admin-layout>
    <form class="" method="POST" action="{{ route('sellers.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="space-y-12">
            <div class="pb-12 border-b border-gray-900/10">
                <h2 class="font-semibold text-gray-900 text-base/7">Create a product</h2>
                <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="title" class="block font-medium text-gray-900 text-sm/6">Title</label>
                        <div
                            class="flex items-center pl-3 bg-white rounded-md outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                                placeholder="title">
                        </div>
                        @error('title')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="description" class="block font-medium text-gray-900 text-sm/6">description</label>
                        <div
                            class="flex items-center pl-3 bg-white rounded-md outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <input type="text" name="description" id="description" value="{{ old('description') }}"
                                class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                                placeholder="description">
                        </div>
                        @error('description')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-span-full">
                        <label for="cover-photo" class="block font-medium text-gray-900 text-sm/6">Cover photo</label>
                        <div
                            class="flex justify-center px-6 py-10 mt-2 border border-dashed rounded-lg border-gray-900/25">
                            <div class="text-center">
                                <svg class="mx-auto text-gray-300 size-12" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="flex mt-4 text-gray-600 text-sm/6">
                                    <label for="file_upload"
                                        class="relative font-semibold text-indigo-600 bg-white rounded-md cursor-pointer focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="file_upload" name="file_upload" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-gray-600 text-xs/5">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>

                        @error('file_upload')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="pb-12 border-b border-gray-900/10">
                <h2 class="font-semibold text-gray-900 text-base/7">Personal Information</h2>
                <p class="mt-1 text-gray-600 text-sm/6">Use a permanent address where you can receive mail.</p>

                <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="rating" class="block font-medium text-gray-900 text-sm/6">Rating</label>
                        <div class="mt-2">
                            <div data-stars class="flex text-orange-500">
                                @for ($i = 0; $i < 5; $i++)
                                    <div data-stars-div="{{ $i }}">
                                        <x-icons.empty-star data-empty-star="{{ $i }}"
                                            data-rating="{{ $i }}" size="35"></x-icons.empty-star>
                                        <x-icons.half-star data-half-star="{{ $i }}"
                                            data-rating="{{ $i + 0.5 }}" size="35"
                                            class="hidden"></x-icons.half-star>
                                        <x-icons.full-star data-full-star="{{ $i }}"
                                            data-rating="{{ $i + 1 }}" size="35"
                                            class="hidden"></x-icons.full-star>
                                    </div>
                                @endfor
                            </div>
                            <input data-rating type="hidden" name="rating" id="rating" value="{{ old('rating') }}"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                        @error('rating')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="price" class="block font-medium text-gray-900 text-sm/6">Price</label>
                        <div class="mt-2">
                            <input type="number" name="price" id="price" value="{{ old('price') }}"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                        @error('price')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end mt-6 gap-x-6">
            <a href="{{ route('products.index') }}" class="font-semibold text-gray-900 text-sm/6">Cancel</a>
            <button type="submit"
                class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
    <script>
        function showStar(index, status) {
            status === 'empty' ?
                document.querySelector(`[data-empty-star='${index}']`).classList.remove('hidden') :
                document.querySelector(`[data-empty-star='${index}']`).classList.add('hidden')
            status === 'half' ?
                document.querySelector(`[data-half-star='${index}']`).classList.remove('hidden') :
                document.querySelector(`[data-half-star='${index}']`).classList.add('hidden')
            status === 'full' ?
                document.querySelector(`[data-full-star='${index}']`).classList.remove('hidden') :
                document.querySelector(`[data-full-star='${index}']`).classList.add('hidden')
        }

        function correctStarOrder(rating) {
            if (rating > 0) {
                for (let i = 0; i < parseInt(rating); i++) {
                    showStar(i, 'full')
                }
            }
            if (rating % 1 !== 0) {
                const k = Math.ceil(rating) - 1
                showStar(k, 'half')
            }
            if (rating < 5) {
                for (let i = Math.ceil(rating); i < 5; i++) {
                    showStar(i, 'empty')
                }
            }
        }

        function starCorrect(e, rating) {
            const rect = e.target.closest('svg').getBoundingClientRect()
            const isLeftHalf = e.offsetX < rect.width / 2
            const isRightHalf = e.offsetX > rect.width / 2

            if (isLeftHalf) {
                showStar(rating, 'half')
            } else if (isRightHalf) {
                showStar(rating, 'full')
            }

            if (rating > 0) {
                for (let i = 0; i < rating; i++) {
                    showStar(i, 'full')
                }
            }
            if (rating < 5) {
                for (let i = Math.ceil(rating) + 1; i < 5; i++) {
                    showStar(i, 'empty')
                }
            }
        }

        let isStarClicked = false
        const starsDiv = document.querySelectorAll('[data-stars-div]')

        let rating = 0
        starsDiv.forEach((starDiv, index) => {
            starDiv.addEventListener('mouseover', (e) => {
                starCorrect(e, index)
            })



            starDiv.addEventListener('click', (e) => {
                isStarClicked = true
                rating = e.target.closest('svg').dataset.rating
                document.querySelector('[data-rating]').textContent = rating
            })

            starDiv.addEventListener('mouseleave', (e) => {
                console.log('Mouse is leaving', isStarClicked, rating)
                if (isStarClicked) {
                    correctStarOrder(rating)
                } else if (!isStarClicked) {
                    for (let i = 0; i < index + 1; i++) {
                        showStar(i, 'empty')
                    }
                }
            })
        });
        // document.querySelector("[data-stars-div='0']").addEventListener('mouseover', (e) => {
        //     const svg = e.target.closest('svg')
        //     const rect = svg.getBoundingClientRect()
        //     const mouseX = e.clientX - rect.left
        //     const isLeftHalf = mouseX < rect.width / 2
        //     const isRightHalf = mouseX > rect.width / 2

        //     if (isLeftHalf) {
        //         document.querySelector(`[data-empty-star='${0}']`).classList.add('hidden')
        //         document.querySelector(`[data-half-star='${0}']`).classList.remove('hidden')
        //         document.querySelector(`[data-full-star='${0}']`).classList.add('hidden')
        //         console.log('---------------------')
        //     } else if (isRightHalf) {
        //         document.querySelector(`[data-empty-star='${0}']`).classList.add('hidden')
        //         document.querySelector(`[data-half-star='${0}']`).classList.add('hidden')
        //         document.querySelector(`[data-full-star='${0}']`).classList.remove('hidden')
        //     }
        // })


        // document.querySelector("[data-stars-div='0']").addEventListener('click', (e) => {
        //     isStarClicked = true
        //     console.log('start clicked', isStarClicked)
        // })


        // document.querySelector("[data-stars-div='0']").addEventListener('mouseleave', (e) => {
        //     if (!isStarClicked) {
        //         console.log('cool')

        //         document.querySelector(`[data-empty-star='${0}']`).classList.remove('hidden')
        //         document.querySelector(`[data-half-star='${0}']`).classList.add('hidden')
        //         document.querySelector(`[data-full-star='${0}']`).classList.add('hidden')
        //     }
        // })



        // const stars = document.querySelectorAll('[data-empty-star]')
        // console.log(stars)
        // const prevHoveredStars = []
        // stars.forEach(( star, index ) => {
        //     star.addEventListener('mouseover', (e) => {
        //     })
        // });
    </script>
</x-layouts.admin-layout>
