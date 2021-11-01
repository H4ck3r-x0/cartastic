<div class="p-6">
    @if(!$types->isEmpty())
    <div class="mb-3">
        <x-jet-label for="type" value="{{ __('Car Type') }}" />
        <select class="w-full" id="type" wire:model="car_types_id">
            <option value="">Select A Car Type</option>
            @foreach($types as $type)
            <option value="{{ $type->id }}">{{$type->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <x-jet-label for="service" value="{{ __('Service Name') }}" />
        <x-jet-input wire:model="name" id="service" class="block mt-1 w-full" type="text" :value="old('name')" placeholder="Service Name, eg car wash" required autofocus />
    </div>

    <div class="mt-3">
        <x-jet-label for="price" value="{{ __('Service Price') }}" />
        <x-jet-input wire:model="price" id="price" class="block mt-1 w-full" type="text" :value="old('price')" placeholder="Service Price" required />
    </div>

    @if(!empty($name) && !empty($price) && !empty($car_types_id))
    <div class="mt-3">
        <x-jet-button wire:click="save">
            {{ __('Save') }}
        </x-jet-button>
    </div>
    @endif

    @if($services->isNotEmpty())
    <div class="flex flex-col mt-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Service Price
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Car Type
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created At
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($services as $service)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $service->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $service->price }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $service->carType->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $service->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" wire:click="delete({{ $service->id }})" class="text-red-600 hover:text-indigo-900">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
    @else
    <h1>
        Please Add Car Types First, <a href="{{ route('carTypes') }}" class="text-blue-400">Click Here to Add</a>.
    </h1>
    @endif
</div>