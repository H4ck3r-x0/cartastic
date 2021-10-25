<div class="p-6">
    <div class="mt-3">
        <x-jet-label for="tax" value="{{ __('Tax') }}" />
        <x-jet-input wire:model="tax" id="tax" value="{{$tax}}" class="block mt-1 w-full" type="text" placeholder="Enter a number" autofocus required />
    </div>

    @if(!empty($tax))
    <div class="mt-3">
        <x-jet-button wire:click="save">
            {{ __('Save') }}
        </x-jet-button>
    </div>
    @endif
</div>