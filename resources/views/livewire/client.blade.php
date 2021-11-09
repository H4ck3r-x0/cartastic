<div>
    <div class="p-4">
        <x-jet-input class="block mt-1" size="30" type="text" wire:model="query"  required autofocus placeholder="Search by name, id, phone .." />
    </div>
<div class="flex flex-col">
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
                  Client Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Client Phone
                </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Visits Count
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Latest Vist
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    joind
                  </th>
                  
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">View Invoice</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($clients as $client)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                        {{ $client->id }}
                        </div>
                      </div>
                    </div>
                  </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ $client->name }}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          {{ $client->phone }}
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-green-800">
                       {{ $client->invoices_count ? $client->invoices_count : 'N/A' }}
                    </span>
                  </td>
                  <td class="flex flex-col px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $client->lastInvoice ? $client->lastInvoice->created_at->format('Y-m-d') : 'N/A' }}
                    <span class="text-xs font-semibold  text-green-600">
                      {{ $client->lastInvoice ? $client->lastInvoice->created_at->diffForHumans() : 'N/A' }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $client->created_at->format('Y-m-d') }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('viewClientInvoices', $client->id) }}" class="text-indigo-600 hover:text-indigo-900">View Invoices</a>
                  </td>
           
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>
</div>
</div>
