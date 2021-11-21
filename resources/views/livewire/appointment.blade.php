<div x-data="{show: true, viewedRow: null}">
    <div class="flex items-center">
      {{-- <div class="p-4">
          <x-jet-input @keyup="show=true" class="block mt-1" size="30" type="text" wire:model="query"  required autofocus placeholder="Search, eg, id, car type name etc .." />
      </div> --}}
      {{-- <div class="p-4">
        <select wire:model="carType" id="carType">
          <option value="">All Cars</option>
          @foreach ($cars as $car)
          <option value="{{ $car->name }}">{{ $car->name }}</option>  
          @endforeach
        </select>
      </div> --}}
  
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
                      Scheduled At
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
                  @foreach ($appointments as $appointment)
                <tr :class="viewedRow === {{ $appointment->id }} ? 'bg-indigo-100' : ''" class="{{ $appointment->confirmed ? 'bg-indigo-50' : '' }}">
                  <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                          {{ $appointment->id }}
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            {{ $appointment->user->name }}
                          </div>
                        </div>
                      </div>
                    </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          {{ $appointment->client->name }}
                        </div>
                        <div class="text-sm text-gray-500">
                          {{ $appointment->client->phone }}
                        </div>
                      </div>
                    </div>
                  </td>
     
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $appointment->client_car }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ $appointment->totalPrice . ' ' . 'SR' }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ $appointment->totalPriceWithTax . ' ' . 'SR' }}
                    </td>
                    <td class="flex flex-col items-center px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ \Carbon\Carbon::parse($appointment->scheduledAt)->format('y-m-d g:i A') }}
                      <span class="text-xs font-semibold text-green-600">
                        {{ \Carbon\Carbon::parse($appointment->scheduledAt)->diffForHumans() }}
                      </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ $appointment->created_at->format('Y-m-d') }}
                    </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    @if($appointment->confirmed)
                    Confiremd
                    @else
                    <x-jet-button wire:click="confirm({{ $appointment->id }})">
                      Confirm
                    </x-jet-button>
                    @endif
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="#" wire:click="delete({{ $appointment->id }})" class="text-red-600 hover:text-indigo-900">Delete</a>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class=" items-center bg-gray-100 p-4">
            <div class="flex flex-row mb-3">
                <x-jet-label for="ScheduledAppointments" value="{{ __('Scheduled Appointments:') }}" />
                <p id="ScheduledAppointments" wire:model="ScheduledAppointments" class="ml-1 text-sm font-semibold text-gray-900">{{ $ScheduledAppointments }}</p>    
            </div>
            <div class="flex flex-row mb-3">
              <x-jet-label for="ConfiremdAppointments" value="{{ __('Confiremd Appointments:') }}" />
              <p id="ConfiremdAppointments" wire:model="ConfiremdAppointments" class="ml-1 text-sm font-semibold text-gray-900">{{ $ConfiremdAppointments }}</p>    
          </div>
        </div>
      </div>
  </div>
  </div>
  </div>
  