<x-layouts.seller-layout>
    <x-table.table :items="$orderItems" :columns="$columns" :sorts="$sorts" :status="true" :statuses="['pending', 'shipped', 'delivered', 'cancelled']"></x-table.table>
</x-layouts.seller-layout>
