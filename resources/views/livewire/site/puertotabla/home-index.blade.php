
    <div class="max-w-screen-xl mx-auto px-5  min-h-sceen">
        <div class="flex flex-col items-center">
            <h2 class="font-bold text-5xl mt-5 tracking-tight">
                FAQ
            </h2>
            <p class="text-xl mt-3">
                Frequenty asked questions
            </p>
        </div>
        <div class="grid divide-y divide-neutral-200 max-w-xl mx-auto mt-8">

            @foreach ($categories as $category)
                
                <div class="py-5 bg-gray-500">
                    <details class="group">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                            <span class=""> {{$category->name}} </span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"
                                    width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="mt-3 group-open:animate-fadeIn">
                            
                            @foreach ($subcategories as $subcategory)
                                
                                <div class="py-5 bg-gray-300">
                                    <details class="group">
                                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                                            <span class=""> {{$subcategory->name}} </span>
                                            <span class="transition group-open:rotate-180">
                                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"
                                                    width="24">
                                                    <path d="M6 9l6 6 6-6"></path>
                                                </svg>
                                            </span>
                                        </summary>
                                        <p class="mt-3 group-open:animate-fadeIn">
                                            
                                        @foreach ($products as $product)
                                                
                                            <div class="py-5 bg-gray-100">
                                                        <span class=""> {{$product->name}} </span>
                                                    <p class="mt-3 group-open:animate-fadeIn">
                                                        {{$product->description}}
                                                    </p>
                                            </div>
                                        @endforeach
                                        </p>
                                    </details>
                                </div>
                            @endforeach
                        </p>
                    </details>
                </div>
            @endforeach
        </div>
    </div>

    <script>
    //     ...
	// extend: {
    //   keyframes: {
    //     fadeIn: {
    //       "0%": { opacity: 0 },
    //       "100%": { opacity: 100 },
    //     },
    //   },
    //   animation: {
    //     fadeIn: "fadeIn 0.2s ease-in-out forwards",
    //   },
    // },
    // ...
    </script>
