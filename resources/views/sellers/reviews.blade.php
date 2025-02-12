<x-layouts.seller-layout>
    <h1 class="mb-5 text-4xl font-bold">Reviews</h1>
    <ul>
        <li class="p-2 rounded-2xl ring-1">
            @foreach ($products as $product)
                <h2 class="text-3xl font-semibold text-neutral-200">{{ $product->title }}</h2>
                <div>
                    <x-table.table :items="$product->reviews" :columns="$columns" :sorts="$sorts" :uniqueSortId="$product->id"></x-table.table>
                </div>
            @endforeach
        </li>
    </ul>
</x-layouts.seller-layout>
