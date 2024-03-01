<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categories
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <div class="text-gray-100 bg-gray-900 body-font shadow w-full">
                        <div class="container mx-auto flex flex-wrap p-5 flex-row">
                            <h2 class="flex order-first w-1/3 title-font font-medium mb-0">
                                Categories
                            </h2>
                            <div class="w-2/3 inline-flex justify-end ml-0">
                                <a href="{{ route('categories.create') }}" class="bg-indigo-700 hover:bg-indigo-500 text-white ml-4 py-2 px-3 rounded-lg">
                                    Create category
                                </a>
                            </div>
                        </div>
                    </div>

                    @foreach (['success', 'danger'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            @if($msg == 'success')
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="bg-green-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto">
                                    <span class="text-green-800">
                                        {{ Session::get('alert-' . $msg) }}
                                    </span>
                                </div>
                            </div>
                            @elseif($msg == 'danger')
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="bg-red-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto">
                                    <span class="text-red-800">
                                        {{ Session::get('alert-' . $msg) }}
                                    </span>
                                </div>
                            </div>
                            @else
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="bg-yellow-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto">
                                    <span class="text-yellow-800">
                                        {{ Session::get('alert-' . $msg) }}
                                    </span>
                                </div>
                            </div>
                            @endif
                        @endif
                    @endforeach

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            
							<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">
								Name
							</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">
                                Created at
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">
                                Updated at
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">show</span>
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">delete</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($categories as $category)
                            <tr>
                                
								<td scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">
									{{ $category->name }}
								</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $category->created_at }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $category->updated_at }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('categories.show',$category->id) }}" class="p-2 my-2 bg-gray-500 text-white rounded-md focus:outline-none focus:ring-2 ring-red-300 ring-offset-2">Show</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('categories.edit',$category->id) }}" class="p-2 my-2 bg-blue-500 text-white rounded-md focus:outline-none focus:ring-2 ring-red-300 ring-offset-2">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('categories.destroy',$category->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="PUT">
                                        <button type="submit" class="p-2 my-2 bg-red-500 text-white rounded-md focus:outline-none focus:ring-2 ring-red-300 ring-offset-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                {{ $categories->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>