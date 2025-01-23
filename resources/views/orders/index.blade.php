<x-layouts.app-layout>
    @php
        $colors = [
            'pending' => 'bg-yellow-300',
            'shipped' => 'bg-orange-500',
            'delivered' => 'bg-green-500',
            'cancelled' => 'bg-red-500',
        ]
    @endphp
    <div class="flex flex-col gap-7 max-w-[60rem] mx-auto">
        @forelse ($orders as $order)
            <div class="p-3 rounded-lg dark:bg-neutral-800">
                <div class="flex items-center justify-between mb-5">
                    <div class="text-xl">#{{ $order->order_number }}</div>
                    <div class="text-xl">{{ $order->status }}</div>
                </div>
                <div class="flex flex-col gap-3 rounded-lg">
                    @foreach ($order->order_items as $item)
                        @php
                            $discounted_price = $item->product->price - $item->product->price * $item->product->discount / 100
                        @endphp
                        <div class="flex justify-between p-5 rounded-lg dark:bg-neutral-700">
                            <div class="flex items-center gap-2 lg:gap-5">
                                <img class="w-[3rem] h-[3rem] lg:w-[5rem] lg:h-[5rem] rounded-md" src="{{ Storage::url($item->product->img_path) }}" alt="">
                                <div class="flex flex-col justify-between gap-3">
                                    <a href="{{ route('products.show', $item->product->slug) }}" class="block text-gray-200">{{ $item->product->title }}</a>
                                    <div class="px-3 py-1 text-black {{ $colors[$item->status] }} rounded-md w-fit">{{ $item->status }}</div>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="flex flex-col items-start justify-between pr-1 border-r-2 lg:pr-3 border-neutral-800/40">
                                    <div>
                                        <div>
                                            <span class="line-through">{{ $item->product->price }}$</span>
                                            <span class="text-red-500">{{ $item->product->discount }}%</span>
                                        </div>
                                        <p>{{ $discounted_price }}$</p>
                                    </div>
                                    <p>Qty {{ $item->quantity }}</p>
                                </div>
                                <div class="flex items-center justify-between pl-2 text-xl lg:pl-5 lg:text-3xl text-stone-200">
                                    {{ $discounted_price * $item->quantity }}$
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <p>No Orders yet</p>
        @endforelse
    </div>
</x-layouts.app-layout>
