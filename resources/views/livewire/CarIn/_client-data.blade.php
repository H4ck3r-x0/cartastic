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