<div class="flex items-center justify-center space-x-3 mt-10">
    @foreach($services as $service)
    <label for="service" class="inline-flex items-center mt-3">
        <input type="checkbox" wire:model="selectedServices" wire:click="$emit('serviceAdded')" value="{{ $service->id }}" class="form-checkbox h-8 w-8 text-gray-600" id="service">
        <span class="ml-2 text-gray-700">{{ $service->name }}</span>
        <span class="ml-2 text-gray-700 space-x-4">({{ $service->price }})</span>
    </label>
    @endforeach
</div>