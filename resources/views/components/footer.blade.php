<footer class="py-5 dark:bg-gray-800">
    <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid gap-10 md:gap-7 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-[3fr_1fr_1fr_3fr]">
            <div class="">
                <div class="w-32 mb-5"><img src="{{ asset('img/logo.png') }}" alt=""></div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero animi blanditiis reprehenderit quod soluta voluptatem accusantium illo laudantium assumenda a!</p>
            </div>
            <div>
                <h2 class="mb-5 text-2xl font-bold">Menu</h2>
                <ul>
                    <li><a class="dark:text-gray-200" href="/">Home</a></li>
                    <li><a class="dark:text-gray-200" href="/products">Products</a></li>
                </ul>
            </div>
            <div>
                <h2 class="mb-5 text-2xl font-bold">Information</h2>
                <ul>
                    <li><a class="dark:text-gray-200" href="/">Home</a></li>
                    <li><a class="dark:text-gray-200" href="/products">Products</a></li>
                </ul>
            </div>
            <form method="POST">
                <h2 class="mb-5 text-2xl font-bold">Subscribe to out newsletter</h2>
                <div class="flex gap-2">
                    <input class="p-1 rounded-md dark:bg-gray-800 dark:text-gray-200 dark:ring-1 dark:ring-gray-200/50" type="email">
                    <input class="px-2 py-1 rounded-md dark:text-gray-200 ring-1 dark:ring-gray-200" type="submit" value="Subscribe">
                </div>
            </form>
        </div>
    </div>
</footer>