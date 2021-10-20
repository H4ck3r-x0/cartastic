<div class="divide-y divide-indigo-500">
    <div class="flex items-center justify-center p-6 space-x-8">
        <button wire:click="$toggle('showCarInForm')" class="{{ $showCarInForm ? 'bg-indigo-500' : 'bg-indigo-300' }} text-lg text-white font-bold rounded p-10">Car In</button>
        <button class="bg-red-300 text-lg text-white font-bold rounded p-10">Car Out</button>
    </div>

    @if($showCarInForm)
    <div class="flex items-center p-6 animate__animated animate__fadeIn">
        <div class="flex flex-col">
            <div class="flex flex-row items-center mb-3">
                <div>
                    <x-jet-label for="phone" value="{{ __('Client Phone Number') }}" />
                    <x-jet-input wire:model="clientPhone" size="50" id="phone" class="block mt-1 w-full" type="text" :value="old('phone')" placeholder="Client's Phone Number" required />
                </div>
                @if(!empty($clientPhone))
                <x-jet-button class="ml-4 mt-6" wire:click="lookupClientPhone({{$clientPhone}})">
                    {{ __('Lookup') }}
                </x-jet-button>
                @endif
            </div>

            @if($lookedUpClient !== null)
            <div class="flex flex-row items-center mb-3">
                <div>
                    <div class="flex flex-row items-center justify-around">
                        <x-jet-label class="mr-3" for="name" value="{{ __('Client Name:') }}" />
                        <p class="text-sm font-semibold text-gray-800 tracking-wide">{{ $lookedUpClient->name }}</p>
                    </div>

                    <div class="flex flex-row items-center mt-2">
                        <x-jet-label class="mr-3" for="phone" value="{{ __('Client Phone:') }}" />
                        <p class="text-sm font-semibold text-gray-800 tracking-wide">{{ $lookedUpClient->phone }}</p>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
    @endif
</div>