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
        <div class="flex flex-row items-center mt-2">
            <x-jet-label class="mr-3" for="phone" value="{{ __('Vists Count:') }}" />
            <p class="text-sm font-semibold text-gray-800 tracking-wide">{{ $lookedUpClient->invoices_count }}</p>
        </div>
        <div class="flex flex-row items-center mt-2">
            <x-jet-label class="mr-3" for="phone" value="{{ __('Latest Vist:') }}" />
            <p class="text-sm font-semibold text-gray-800 tracking-wide">
                {{ $lookedUpClient->lastInvoice ? $lookedUpClient->lastInvoice->created_at->format('Y-m-d') : 'N/A' }}
            </p>
            <span class="ml-2 text-xs font-semibold  text-green-600">
                ({{ $lookedUpClient->lastInvoice ? $lookedUpClient->lastInvoice->created_at->diffForHumans() : 'N/A' }})
              </span>
        </div>
        

    </div>
</div>