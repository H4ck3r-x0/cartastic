<div class="flex items-center justify-center space-x-3">
    @foreach($carTypes as $type)
    <label for="{{ $type->id }}" class="inline-flex items-center mt-3">
        <input type="radio" wire:model="selectedCarType" value="{{ $type->id}}" class="form-checkbox h-8 w-8 text-gray-600" id="{{$type->id}}">
        <span class="ml-2 text-gray-700">{{ $type->name }}</span>
    </label>
    @endforeach
</div>