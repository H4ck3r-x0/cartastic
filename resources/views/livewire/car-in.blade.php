<div class="divide-y divide-indigo-500">
    <div class="flex items-center justify-center p-6 space-x-8">
        <button wire:click="$toggle('show')" class="{{ $show ? 'bg-indigo-500' : 'bg-indigo-300' }} text-lg text-white font-bold rounded p-10">Car In</button>
        <button class="bg-red-300 text-lg text-white font-bold rounded p-10">Car Out</button>
    </div>

    @if($show)
    <div class="flex items-center p-6 animate__animated animate__fadeIn">
        <div class="mb-3">
            <x-jet-label for="phone" value="{{ __('Phone Number') }}" />
            <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" placeholder="Client's Phone Number" required />
        </div>
    </div>
    @endif
</div>