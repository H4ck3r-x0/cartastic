<div class="divide-y divide-indigo-500">
    <div class="flex items-center justify-center p-6 space-x-8">
        <button wire:click="$toggle('showCarInForm')" class="{{ $showCarInForm ? 'bg-indigo-500' : 'bg-indigo-300' }} text-lg text-white font-bold rounded p-10">Car In</button>
        <button class="bg-red-300 text-lg text-white font-bold rounded p-10">Car Out</button>
    </div>

    @if($showCarInForm && $step == 1)
    <div class="flex items-center p-6 animate__animated animate__fadeIn">
        <div class="flex flex-col w-full">
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
            {{-- Client Data --}}
            @include('livewire.CarIn._client-data')
            
            <!-- Car Types -->
            @include('livewire.CarIn._car-types')

            <!-- Services -->
            @if(!empty($selectedCarType))
            @include('livewire.CarIn._car-services')

            @if(!empty($selectedServices))
            <!-- Scheduled Wash -->
            <div class="flex items-center justify-center space-x-3 mt-6">
                <label for="scheduledWash" class="inline-flex items-center mt-3">
                    <input type="radio" wire:model="scheduledWash" value="1" class="form-checkbox h-8 w-8 text-gray-600" id="scheduledWash">
                    <span class="ml-2 text-gray-700">Now</span>
                </label>
                <label for="scheduledWash" class="inline-flex items-center mt-3">
                    <input type="radio" wire:model="scheduledWash" value="2" class="form-checkbox h-8 w-8 text-gray-600" id="scheduledWash">
                    <span class="ml-2 text-gray-700">Scheduled</span>
                </label>
            </div>

            <div class="flex items-center justify-center space-x-3 mt-6">
                @if($scheduledWash == 2)
                <input type="datetime-local">
                @endif
            </div>
            @endif
            <!-- Total Price -->
            <div class="flex flex-row justify-between mb-3 mt-6">
                <div>
                    <div>
                        <div class="flex flex-row items-center">
                            <x-jet-label class="mr-3" for="totalPrice" value="{{ __('Total Price:') }}" />
                            <p wire:model="totalPrice" class="text-sm font-semibold text-gray-800 tracking-wide">{{ $totalPrice }} SR</p>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-row items-center">
                            <x-jet-label class="mr-3" for="taxRate" value="{{ __('Tax Rate:') }}" />
                            <p wire:model="taxRate" class="text-sm font-semibold text-gray-800 tracking-wide">%{{ $taxRate->tax }}</p>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-row items-center">
                            <x-jet-label class="mr-3" for="totalPrice" value="{{ __('Amount') }}" />
                            <p wire:model="totalPriceWithTax" class="text-sm font-semibold text-gray-800 tracking-wide">{{ (int)$totalPriceWithTax }} SR</p>
                        </div>
                    </div>
                </div>
                @if(!empty($selectedServices))
                <div>
                    <x-jet-button class="ml-4 mt-6" wire:click="confirm">
                        {{ __('Confirm') }}
                    </x-jet-button>
                </div>
                @endif
            </div>
            @endif
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