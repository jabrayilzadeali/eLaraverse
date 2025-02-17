@props(['items', 'columns', 'sorts', 'uniqueSortId' => '', 'hasOperations' => false, 'editLink', 'deleteLink', 'status' => false, 'statuses' => []])
<table class="w-full overflow-x-scroll table-auto dark:border-neutral-700">
    <thead>
        <tr class="pt-3 text-sm border-b dark:border-neutral-700 text-neutral-300">
            @foreach ($columns as $column)
                @if ($column['sortable'])
                    <x-table.th hasSorting="{{ $column['sortable'] }}" :sorts="$sorts" :uniqueSortId="$uniqueSortId" :sortQuery="$column['key']">
                        {{ $column['label'] }}
                    </x-table.th>
                @else
                    <x-table.th>{{ $column['label'] }}</x-table.th>
                @endif
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $product)
            <tr class="dark:hover:bg-neutral-800/50">
                @foreach ($columns as $column)
                    @php
                        $value = data_get($product, $column['key']);
                    @endphp
                    @if ($column['type'] === 'rating')
                        <x-table.td>
                            <x-stars class="block" :rating="$value"></x-stars>
                        </x-table.td>
                    @elseif ($column['type'] === 'img')
                        <x-table.td>
                            <x-img :img_path="$value"></x-img>
                        </x-table.td>
                    @elseif ($column['type'] === 'boolean')
                        <x-table.td>{{ $value ? 'true' : 'false' }}</x-table.td>
                    @elseif ($column['type'] === 'date')
                        <x-table.td>{{ $value->format('d.m.Y') }}</x-table.td>
                    @else
                        <x-table.td>{{ \Illuminate\Support\Str::limit($value, 35, '...') }} </x-table.td>
                    @endif
                @endforeach

                @if ($hasOperations)
                    <td class="flex items-center justify-center h-full gap-2 px-4 py-2">
                        
                        <a href="{{ route($editLink, $product->slug) }}"
                            class="block px-1 py-1 font-semibold bg-green-500 rounded-md text-neutral-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M5 19h1.425L16.2 9.225L14.775 7.8L5 17.575zm-2 2v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM19 6.4L17.6 5zm-3.525 2.125l-.7-.725L16.2 9.225z" />
                            </svg>
                        </a>
                        <dialog data-modal
                            class="absolute z-50 p-5 -translate-x-1/2 -translate-y-1/2 rounded-md top-1/2 left-1/2 dark:bg-neutral-800 dark:text-neutral-300">
                            <form action="{{ route($deleteLink, $product->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <p>Are you Sure You wanted to delete?</p>
                                <button data-close-modal type="button">Close</button>
                                <button
                                    class="px-1 py-1 font-semibold bg-red-500 rounded-md text-neutral-700 dark:text-neutral-100"
                                    autofocus>Yes</button>
                            </form>
                        </dialog>
                        <button data-show-modal
                            class="px-1 py-1 font-semibold bg-red-500 rounded-md text-neutral-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6zM8 9h8v10H8zm7.5-5l-1-1h-5l-1 1H5v2h14V4z" />
                            </svg>
                        </button>
                    </td>
                @endif
                @if ($status)
                    <td>
                        <select id="" class="max-w-60 col-start-1 row-start-1 w-full appearance-none rounded-md bg-white dark:bg-neutral-800 dark:text-neutral-200 py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" data-status>
                            @foreach ($statuses as $status)
                                <option @if ($status == $product['status']) selected @endif value="{{ $status }}" data-id={{ $product['id'] }}>{{ $status, $product['status'] }}</option>
                            @endforeach
                        </select>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

{{-- <script>
    const modal = document.querySelector("[data-modal]");
    const showModalBtns = document.querySelectorAll("[data-show-modal]");
    const closeModalBtns = document.querySelectorAll("[data-close-modal]");

    // "Show the dialog" button opens the dialog modally
    showModalBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            modal.showModal();
        })
    });

    // "Close" button closes the dialog
    closeModalBtns.forEach(closeBtn => {
        closeBtn.addEventListener("click", () => {
            modal.close();
        })
    })
</script> --}}
