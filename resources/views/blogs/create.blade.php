<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Blog
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="text-gray-100 bg-gray-900 body-font shadow w-full">
                    <div class="container mx-auto flex flex-wrap p-5 flex-row">
                        <h2 class="flex order-first w-1/3 title-font font-medium mb-0">
                            Create Blog
                        </h2>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-1 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('blogs.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="shadow sm:rounded-md sm:overflow-hidden">

                                @if (count($errors) > 0)
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="bg-red-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto">
                                        <span class="text-red-800">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{!! $error !!}</li>
                                                @endforeach
                                            </ul>
                                        </span>
                                    </div>
                                </div>
                                @endif

                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="title" class="block text-sm font-medium text-gray-700">
                                            Title
                                        </label>
                                        <div class="mt-1 flex rounded-md">
                                            <input required type="text" name="title" id="title" class="block w-full rounded-md border-gray-300" placeholder="Enter title here" value="{{ old('title') }}">
                                        </div>
                                    </div>
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="description" class="block text-sm font-medium text-gray-700">
                                            Content
                                        </label>
                                        <div class="mt-1">
                                            <textarea id="content" name="content" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full rounded-md border-gray-300" placeholder="Enter content here">{{ old('content') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="category" class="block text-sm font-medium text-gray-700">
                                            Category
                                        </label>
                                        <div class="mt-1 flex rounded-md">
                                            <input required type="text" name="category" id="category" class="block w-full rounded-md border-gray-300" placeholder="Enter category here" value="{{ old('category') }}">
                                        </div>
                                    </div>
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="image" class="block text-sm font-medium text-gray-700">
                                            Image
                                        </label>
                                        <div class="mt-1 flex rounded-md">
                                            <input type="file" name="image" id="image" class="block w-full border-gray-300" placeholder="Enter image here">
                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit" class="inline-flex jusaztify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>