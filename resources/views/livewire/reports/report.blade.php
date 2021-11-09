<div x-data="{show: true, viewedRow: null}">
  <div class="flex justify-between">
    <div class="p-4">
        <x-jet-input @keyup="show=true" class="block mt-1" size="30" type="text" wire:model="query"  required autofocus placeholder="Search, eg, id, car type name etc .." />
    </div>
 
    <x-jet-button class="p-4 m-4" @click="show=!show" x-text="show ? 'Hide Table' : 'Show Table'">
    </x-jet-button>
</div>

<div class="flex flex-col"  x-show="show" x-transition.duration.200ms>
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    #ID
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Created by
                  </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Client Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Car Type
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Total Price
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Total Price <span class="text-xs text-gray-400">(Tax)</span>
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    created at
                  </th>
                  
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">View Invoice</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($invoices as $invoice)
              <tr :class="viewedRow === {{ $invoice->id }} ? 'bg-indigo-100' : ''">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                        {{ $invoice->id }}
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          {{ $invoice->user->name }}
                        </div>
                      </div>
                    </div>
                  </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ $invoice->client->name }}
                      </div>
                      <div class="text-sm text-gray-500">
                        {{ $invoice->client->phone }}
                      </div>
                    </div>
                  </div>
                </td>
   
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ $invoice->client_car }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $invoice->totalPrice . ' ' . 'SR' }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $invoice->totalPriceWithTax . ' ' . 'SR' }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $invoice->created_at->format('Y-m-d') }}
                  </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="#" @click="show=!show; viewedRow={{ $invoice->id }}" wire:click="showInvoice({{ $invoice->id }})" class="text-indigo-600 hover:text-indigo-900">View Invoice</a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="#" wire:click="delete({{ $invoice->id }})" class="text-red-600 hover:text-indigo-900">Delete</a>
              </td>
              </tr>
              @endforeach
              <!-- More people... -->
            </tbody>
          </table>
        </div>
        <div class=" items-center bg-gray-100 p-4">
            <div class="flex flex-row mb-3">
                <x-jet-label for="totalPrice" value="{{ __('Total:') }}" />
                <p id="totalPrice" wire:model="totalPrice"  class="ml-1 text-sm font-semibold text-gray-900">{{ $this->totalPrice . ' ' . 'SR' }}</p>    
            </div>
            <div class="flex flex-row mb-3">
                <x-jet-label for="totalTaxes" value="{{ __('Total Taxes:') }}" />
                <p id="totalTaxes" wire:model="totalTaxes"  class="ml-1 text-sm font-semibold text-gray-900">{{ $this->totalTaxes . ' ' . 'SR' }}</p>    
            </div>
            <div class="flex flex-row mb-3">
                <x-jet-label for="totalGrand" value="{{ __('Grand Total (Tax):') }}" />
                <p id="totalGrand" wire:model="totalGrand"  class="ml-1 text-sm font-semibold text-gray-900">{{ $this->totalGrand . ' ' . 'SR' }}</p>    
            </div>
        </div>
    </div>
</div>
</div>
</div>
