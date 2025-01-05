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
        <input data-input-rating type="hidden" name="rating" id="rating" value="{{ old('rating') }}"
            required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
    </div>
    @error('rating')
        <div class="text-sm text-red-500">{{ $message }}</div>
    @enderror
</div>

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
            document.querySelector('[data-input-rating]').value = rating
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
</script>
