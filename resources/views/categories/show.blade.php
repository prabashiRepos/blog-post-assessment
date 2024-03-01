<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-xl sm:rounded-lg">
                <div class="text-gray-100 bg-gray-900 body-font shadow w-full">
                    <div class="container mx-auto flex flex-wrap p-5 flex-row">
                        <h2 class="flex order-first w-1/3 title-font font-medium mb-0">
                            Show Category
                        </h2>
                        <div class="w-2/3 inline-flex justify-end ml-0">
                            <a href="{{ route('categories.edit',$category->id) }}" class="bg-indigo-700 hover:bg-indigo-500 text-white ml-4 py-2 px-3 rounded-lg">Edit</a>
                            <form class="inline" action="{{ route('categories.destroy',$category->id) }}" method="post">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white ml-4 py-2 px-3 rounded-lg">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-1 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="grid gap-6 m-8 md:grid-cols-1">
                            
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <div>
                                    <div class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Name
                                    </div>
                                    <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $category->name }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <div>
                                    <div class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Description
                                    </div>
                                    <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $category->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>