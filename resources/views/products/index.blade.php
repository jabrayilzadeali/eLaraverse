<x-layout>
    <div>
        <div>
            <!--
            Mobile filter dialog
      
            Off-canvas filters for mobile, show/hide based on off-canvas filters state.
          -->
            <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
                <!--
              Off-canvas menu backdrop, show/hide based on off-canvas menu state.
      
              Entering: "transition-opacity ease-linear duration-300"
                From: "opacity-0"
                To: "opacity-100"
              Leaving: "transition-opacity ease-linear duration-300"
                From: "opacity-100"
                To: "opacity-0"
            -->
                <div class="fixed inset-0 bg-black/25" aria-hidden="true"></div>

                <div class="fixed inset-0 z-40 flex">
                    <!--
                Off-canvas menu, show/hide based on off-canvas menu state.
      
                Entering: "transition ease-in-out duration-300 transform"
                  From: "translate-x-full"
                  To: "translate-x-0"
                Leaving: "transition ease-in-out duration-300 transform"
                  From: "translate-x-0"
                  To: "translate-x-full"
              -->
                    <div
                        class="relative flex flex-col max-w-xs py-4 pb-12 ml-auto overflow-y-auto bg-white shadow-xl dark:bg-neutral-900 size-full">
                        <div class="flex items-center justify-between px-4">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Filters</h2>
                            <button type="button"
                                class="flex items-center justify-center p-2 -mr-2 text-gray-400 bg-white rounded-md dark:text-gray-100 dark:bg-transparent size-10">
                                <span class="sr-only">Close menu</span>
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Filters -->
                        <form class="mt-4 border-t border-gray-200">
                            <h3 class="sr-only">Categories</h3>
                            <ul role="list" class="px-2 py-3 font-medium">
                                <li>
                                    <a href="#" class="block px-2 py-3 font-bold text-gray-100">Totes</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-3 dark:text-gray-200">Backpacks</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-3 dark:text-gray-200">Travel Bags</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-3 dark:text-gray-200">Hip Bags</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-3 dark:text-gray-200">Laptop Sleeves</a>
                                </li>
                            </ul>

                            <div class="px-4 py-6 border-t border-gray-200">
                                <h3 class="flow-root -mx-2 -my-3">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex items-center justify-between w-full px-2 py-3 text-gray-400 bg-white dark:bg-neutral-900 hover:text-gray-500"
                                        aria-controls="filter-section-mobile-0" aria-expanded="false">
                                        <span class="font-medium text-gray-900 dark:text-gray-200">Color</span>
                                        <span class="flex items-center ml-6 dark:text-gray-200">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-mobile-0">
                                    <div class="space-y-6">
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-color-0" name="color[]" value="white"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-color-0"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">White</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-color-1" name="color[]" value="beige"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-color-1"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">Beige</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-color-2" name="color[]" value="blue"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-color-2"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">Blue</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-color-3" name="color[]" value="brown"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-color-3"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">Brown</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-color-4" name="color[]" value="green"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-color-4"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">Green</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-color-5" name="color[]" value="purple"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-color-5"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">Purple</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-6 border-t border-gray-200">
                                <h3 class="flow-root -mx-2 -my-3">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex items-center justify-between w-full px-2 py-3 text-gray-400 bg-white dark:bg-neutral-900 hover:text-gray-500"
                                        aria-controls="filter-section-mobile-1" aria-expanded="false">
                                        <span class="font-medium text-gray-900 dark:text-gray-200">Category</span>
                                        <span class="flex items-center ml-6 dark:text-gray-200">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-mobile-1">
                                    <div class="space-y-6">
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-category-0" name="category[]"
                                                        value="new-arrivals" type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-category-0"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">New Arrivals</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-category-1" name="category[]"
                                                        value="sale" type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-category-1"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">Sale</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-category-2" name="category[]"
                                                        value="travel" type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-category-2"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">Travel</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-category-3" name="category[]"
                                                        value="organization" type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-category-3"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">Organization</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-category-4" name="category[]"
                                                        value="accessories" type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-category-4"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">Accessories</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-6 border-t border-gray-200">
                                <h3 class="flow-root -mx-2 -my-3">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex items-center justify-between w-full px-2 py-3 text-gray-400 bg-white hover:text-gray-500 dark:bg-neutral-900"
                                        aria-controls="filter-section-mobile-2" aria-expanded="false">
                                        <span class="font-medium text-gray-900 dark:text-gray-200">Size</span>
                                        <span class="flex items-center ml-6 dark:text-gray-200">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-mobile-2">
                                    <div class="space-y-6">
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-size-0" name="size[]" value="2l"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-size-0"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">2L</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-size-1" name="size[]" value="6l"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-size-1"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">6L</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-size-2" name="size[]" value="12l"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-size-2"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">12L</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-size-3" name="size[]" value="18l"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-size-3"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">18L</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-size-4" name="size[]" value="20l"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-size-4"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">20L</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-size-5" name="size[]" value="40l"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-size-5"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">40L</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <main class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-baseline justify-between pt-24 pb-6 border-b border-gray-200">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-gray-300">All Products</h1>

                    <div class="flex items-center">
                        <div class="relative inline-block text-left">
                            <div>
                                <button type="button"
                                    class="inline-flex justify-center text-sm font-medium text-gray-700 dark:text-gray-300 group dark:hover:text-gray-400 hover:text-gray-900"
                                    id="menu-button" aria-expanded="false" aria-haspopup="true">
                                    Sort
                                    <svg class="ml-1 -mr-1 text-gray-400 dark:text-gray-300 size-5 shrink-0 dark:group-hover:text-gray-400 group-hover:text-gray-500"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <!--
                    Dropdown menu, show/hide based on menu state.
      
                    Entering: "transition ease-out duration-100"
                      From: "transform opacity-0 scale-95"
                      To: "transform opacity-100 scale-100"
                    Leaving: "transition ease-in duration-75"
                      From: "transform opacity-100 scale-100"
                      To: "transform opacity-0 scale-95"
                  -->
                            <div class="absolute right-0 z-10 w-40 mt-2 origin-top-right bg-white rounded-md shadow-2xl dark:bg-neutral-800 ring-1 ring-black/5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                tabindex="-1">
                                <div class="py-1" role="none">
                                    <!--
                        Active: "bg-gray-100 outline-none", Not Active: ""
      
                        Selected: "font-medium text-gray-900", Not Selected: "text-gray-500"
                      -->
                                    <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-900 dark:text-white"
                                        role="menuitem" tabindex="-1" id="menu-item-0">Most Popular</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-500 dark:text-gray-300" role="menuitem"
                                        tabindex="-1" id="menu-item-1">Best Rating</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-500 dark:text-gray-300" role="menuitem"
                                        tabindex="-1" id="menu-item-2">Newest</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-500 dark:text-gray-300" role="menuitem"
                                        tabindex="-1" id="menu-item-3">Price: Low to High</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-500 dark:text-gray-300" role="menuitem"
                                        tabindex="-1" id="menu-item-4">Price: High to Low</a>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="p-2 ml-5 -m-2 text-gray-400 hover:text-gray-500 sm:ml-7">
                            <span class="sr-only">View grid</span>
                            <svg class="size-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor"
                                data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M4.25 2A2.25 2.25 0 0 0 2 4.25v2.5A2.25 2.25 0 0 0 4.25 9h2.5A2.25 2.25 0 0 0 9 6.75v-2.5A2.25 2.25 0 0 0 6.75 2h-2.5Zm0 9A2.25 2.25 0 0 0 2 13.25v2.5A2.25 2.25 0 0 0 4.25 18h2.5A2.25 2.25 0 0 0 9 15.75v-2.5A2.25 2.25 0 0 0 6.75 11h-2.5Zm9-9A2.25 2.25 0 0 0 11 4.25v2.5A2.25 2.25 0 0 0 13.25 9h2.5A2.25 2.25 0 0 0 18 6.75v-2.5A2.25 2.25 0 0 0 15.75 2h-2.5Zm0 9A2.25 2.25 0 0 0 11 13.25v2.5A2.25 2.25 0 0 0 13.25 18h2.5A2.25 2.25 0 0 0 18 15.75v-2.5A2.25 2.25 0 0 0 15.75 11h-2.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button type="button"
                            class="p-2 ml-4 -m-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
                            <span class="sr-only">Filters</span>
                            <svg class="size-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor"
                                data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 0 1 .628.74v2.288a2.25 2.25 0 0 1-.659 1.59l-4.682 4.683a2.25 2.25 0 0 0-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 0 1 8 18.25v-5.757a2.25 2.25 0 0 0-.659-1.591L2.659 6.22A2.25 2.25 0 0 1 2 4.629V2.34a.75.75 0 0 1 .628-.74Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <section aria-labelledby="products-heading" class="pt-6 pb-24">
                    <h2 id="products-heading" class="sr-only">Products</h2>

                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                        <!-- Filters -->
                        <form class="hidden lg:block">
                            <h3 class="sr-only">Categories</h3>
                            <ul role="list"
                                class="pb-6 space-y-4 text-sm font-medium text-gray-900 border-b border-gray-200">
                                <li>
                                    <a href="#" class="text-gray-900 dark:text-gray-300">Totes</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-900 dark:text-gray-300">Backpacks</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-900 dark:text-gray-300">Travel Bags</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-900 dark:text-gray-300">Hip Bags</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-900 dark:text-gray-300">Laptop Sleeves</a>
                                </li>
                            </ul>

                            <div class="py-6 border-b border-gray-200">
                                <h3 class="flow-root -my-3">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-3 text-sm text-gray-400 bg-white dark:bg-neutral-900 hover:text-gray-500"
                                        aria-controls="filter-section-0" aria-expanded="false">
                                        <span class="font-semibold text-gray-900 dark:text-gray-200">Color</span>
                                        <span class="flex items-center ml-6 dark:text-gray-200">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-0">
                                    <div class="space-y-4">
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-color-0" name="color[]" value="white"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-color-0" class="text-sm text-gray-600 dark:text-gray-300">White</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-color-1" name="color[]" value="beige"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-color-1" class="text-sm text-gray-600 dark:text-gray-300">Beige</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-color-2" name="color[]" value="blue"
                                                        type="checkbox" checked
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-color-2" class="text-sm text-gray-600 dark:text-gray-300">Blue</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-color-3" name="color[]" value="brown"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-color-3" class="text-sm text-gray-600 dark:text-gray-300">Brown</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-color-4" name="color[]" value="green"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-color-4" class="text-sm text-gray-600 dark:text-gray-300">Green</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-color-5" name="color[]" value="purple"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-color-5" class="text-sm text-gray-600 dark:text-gray-300">Purple</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-6 border-b border-gray-200">
                                <h3 class="flow-root -my-3">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-3 text-sm text-gray-400 bg-white dark:bg-neutral-900 hover:text-gray-500"
                                        aria-controls="filter-section-1" aria-expanded="false">
                                        <span class="font-medium text-gray-900 dark:text-gray-200">Category</span>
                                        <span class="flex items-center ml-6 dark:text-gray-200">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-1">
                                    <div class="space-y-4">
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-category-0" name="category[]"
                                                        value="new-arrivals" type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-category-0" class="text-sm text-gray-600 dark:text-gray-300">New Arrivals</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-category-1" name="category[]" value="sale"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-category-1" class="text-sm text-gray-600 dark:text-gray-300">Sale</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-category-2" name="category[]" value="travel"
                                                        type="checkbox" checked
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-category-2"
                                                class="text-sm text-gray-600 dark:text-gray-300">Travel</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-category-3" name="category[]"
                                                        value="organization" type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-category-3"
                                                class="text-sm text-gray-600 dark:text-gray-300">Organization</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-category-4" name="category[]"
                                                        value="accessories" type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-category-4"
                                                class="text-sm text-gray-600 dark:text-gray-300">Accessories</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-6 border-b border-gray-200">
                                <h3 class="flow-root -my-3">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-3 text-sm text-gray-400 bg-white dark:bg-neutral-900 hover:text-gray-500"
                                        aria-controls="filter-section-2" aria-expanded="false">
                                        <span class="font-medium text-gray-900 dark:text-gray-200">Size</span>
                                        <span class="flex items-center ml-6 dark:text-gray-200">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-2">
                                    <div class="space-y-4">
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-size-0" name="size[]" value="2l"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-size-0" class="text-sm text-gray-600 dark:text-gray-300">2L</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-size-1" name="size[]" value="6l"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-size-1" class="text-sm text-gray-600 dark:text-gray-300">6L</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-size-2" name="size[]" value="12l"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-size-2" class="text-sm text-gray-600 dark:text-gray-300">12L</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-size-3" name="size[]" value="18l"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-size-3" class="text-sm text-gray-600 dark:text-gray-300">18L</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-size-4" name="size[]" value="20l"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-size-4" class="text-sm text-gray-600 dark:text-gray-300">20L</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-size-5" name="size[]" value="40l"
                                                        type="checkbox" checked
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-size-5" class="text-sm text-gray-600 dark:text-gray-300">40L</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Product grid -->
                        <div class="lg:col-span-3">
                            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                                @foreach ($products as $product)
                                    <x-product-item :id="$product->id" :slug="route('products.show', $product->slug)" :img="$product->img_path" :title="$product->title"
                                        :rating="$product->rating" :price="$product->price" :previousPrice="$product->price * 2"></x-product-item>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    {{-- <div class="">
        <div class="">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h2 class="sr-only">Products</h2>
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                @foreach ($products as $product)
                    <x-product-item :id="$product->id" :slug="route('products.show', $product->slug)" :img="$product->img_path" :title="$product->title"
                        :rating="$product->rating" :price="$product->price" :previousPrice="$product->price * 2"></x-product-item>
                @endforeach
            </div>
        </div>
    </div> --}}
</x-layout>
