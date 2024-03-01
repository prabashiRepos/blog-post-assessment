<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="text-gray-100 bg-gray-900 body-font shadow w-full">
                    <div class="container mx-auto flex flex-wrap p-5 flex-row">
                        <h2 class="flex order-first w-1/3 title-font font-medium mb-0">
                            Create Category
                        </h2>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-1 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('categories.store')}}" method="post" enctype="multipart/form-data">
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
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Name
                            </label>
                            <div class="mt-1 flex rounded-md">
                                <input required  type="text" name="name" id="name" class="block w-full rounded-md border-gray-300"
                                placeholder="Enter name here" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-span-3 sm:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Description
                            </label>
                            <div class="mt-1">
                                <textarea   id="description" name="description" rows="3"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full rounded-md border-gray-300"
                                placeholder="Enter description here">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        
                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                class="inline-flex jusaztify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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