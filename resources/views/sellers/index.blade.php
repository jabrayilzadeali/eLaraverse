<x-layouts.seller-layout>
    <div class="flex justify-between mt-10 mb-3">
        <div class="flex gap-5">
            <button
                class="flex items-center justify-center gap-2 px-3 border rounded-md text-neutral-300 border-neutral-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 16 16">
                    <path fill="currentColor"
                        d="M4 0v7.268a2 2 0 1 1-2 0V0zm0 12v4H2v-4zm5-9.732V0H7v2.268a2 2 0 1 0 2 0M9 16V7H7v9zm5-8.732V0h-2v7.268a2 2 0 1 0 2 0M14 16v-4h-2v4z" />
                </svg>
                <span>Filter</span>
            </button>
            <input type="text" class="px-2 py-1 rounded-md" placeholder="Axtar">
        </div>
        <button class="flex items-center justify-center gap-2 px-3 bg-blue-600 rounded-md text-neutral-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z" />
            </svg>
            <span>Add New Product</span>
        </button>
    </div>
    <table class="w-full border-t table-auto dark:border-neutral-700">
        <thead>
            <tr class="pt-3 text-neutral-300">
                <th class="px-4 py-2 text-left">#</th>
                <th class="px-4 py-2 text-left">Slug</th>
                <th class="px-4 py-2 text-left">Title</th>
                <th class="px-4 py-2 text-left">Description</th>
                <th class="px-4 py-2 text-left">Img</th>
                <th class="px-4 py-2 text-left">Rating</th>
                <th class="px-4 py-2 text-left">Is featured</th>
                <th class="px-4 py-2 text-left">In Stock</th>
                <th class="px-4 py-2 text-left">Price</th>
                <th class="px-4 py-2 text-left">Date</th>
                <th class="px-4 py-2 text-left">Operations</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 100; $i++)
                <tr>
                    <td class="px-4 py-2">{{ $i }}</td>
                    <td class="px-4 py-2">title-{{ $i }}</td>
                    <td class="px-4 py-2">Title {{ $i }}</td>
                    <td class="px-4 py-2">Lorem ipsum dolor sit.</td>
                    <td class="px-4 py-2"><img class="rounded-md"
                            src="https://picsum.photos/id/{{ $i }}/50/50" alt=""></td>
                    <td class="px-4 py-2">5</td>
                    <td class="px-4 py-2">false</td>
                    <td class="px-4 py-2">{{ $i }}</td>
                    <td class="px-4 py-2">237$</td>
                    <td class="px-4 py-2">10.02.2024</td>
                    <td class="px-4 py-2">
                        <button class="px-1 py-1 font-semibold bg-green-500 rounded-md text-neutral-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M5 19h1.425L16.2 9.225L14.775 7.8L5 17.575zm-2 2v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM19 6.4L17.6 5zm-3.525 2.125l-.7-.725L16.2 9.225z" />
                            </svg>
                        </button>
                        <button class="px-1 py-1 font-semibold bg-red-500 rounded-md text-neutral-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6zM8 9h8v10H8zm7.5-5l-1-1h-5l-1 1H5v2h14V4z" />
                            </svg>
                        </button>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
</x-layouts.seller-layout>
