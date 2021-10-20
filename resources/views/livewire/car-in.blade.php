<div class="divide-y divide-indigo-500">
    <div class="flex items-center justify-center p-6 space-x-8">
        <button wire:click="$toggle('showCarInForm')" class="{{ $showCarInForm ? 'bg-indigo-500' : 'bg-indigo-300' }} text-lg text-white font-bold rounded p-10">Car In</button>
        <button class="bg-red-300 text-lg text-white font-bold rounded p-10">Car Out</button>
    </div>

    @if($showCarInForm && $step == 1)
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
                    <div class="flex flex-row items-center">
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
    @elseif($step === 2)
    <div class="flex items-center p-6 animate__animated animate__fadeIn">
        <div class="flex flex-col">
            <div class="flex flex-col items-center mb-3">
                <div>
                    <x-jet-label for="newClientName" value="{{ __('Client Name') }}" />
                    <x-jet-input wire:model="newClientName" size="50" id="newClientName" class="block mt-1 w-full" type="text" :value="old('newClientName')" placeholder="Client's Name" required />
                </div>

                <div class="mt-3">
                    <x-jet-label for="newClientPhone" value="{{ __('Client Phone Number') }}" />
                    <x-jet-input wire:model="newClientPhone" size="50" id="newClientPhone" class="block mt-1 w-full" type="text" :value="old('newClientPhone')" placeholder="Client's Phone Number" required />
                </div>

                @if(!empty($newClientName) && !empty($newClientPhone))
                <x-jet-button class="ml-4 mt-6" wire:click="signUpNewClient">
                    {{ __('Sign up') }}
                </x-jet-button>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>