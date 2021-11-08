<div>
    @if(!empty($this->invoiceId))
    <div>
        <div class="antialiased sans-serif min-h-screen bg-white" style="min-height: 900px">
            <div class="border-t-8 border-gray-700 h-2"></div>
            <div 
                class="container mx-auto py-6 px-4"
            >
                <div class="flex justify-between">
                    <h2 class="text-2xl font-bold mb-6 pb-2 tracking-wider uppercase">Invoice</h2>
                    <h2 class="font-semibold text-xl text-indigo-500 tracking-widest mt-3">CleanTastic</h2>
                </div>
    
                <div class="flex mb-8 justify-between">
                    <div class="w-2/4">
                        <div class="mb-2 md:mb-1 md:flex items-center">
                            <label class="w-32 text-gray-800 block font-bold text-sm uppercase tracking-wide">Invoice No.</label>
                            <span class="mr-4 inline-block hidden md:block">:</span>
                            <div class="flex-1">
                            <span>{{ $this->invoice->id }}</span>
                            </div>
                        </div>
    
                        <div class="mb-2 md:mb-1 md:flex items-center">
                            <label class="w-32 text-gray-800 block font-bold text-sm uppercase tracking-wide">Invoice Date</label>
                            <span class="mr-4 inline-block hidden md:block">:</span>
                            <div class="flex-1">
                            <span>
                                {{ $this->invoice->created_at->format('Y-m-d') }}
                            </span>
                            </div>
                        </div>
                    </div>
                {{-- company datails is here... --}}
                
                {{-- company datails is here... --}}
                </div>
                {{-- Client Details and Company Details --}}
                <div class="flex flex-wrap justify-between mb-8">
                    <div class="flex flex-col w-full md:w-1/3 mb-2 md:mb-0">
                        <label class="text-gray-800 block mb-1 font-bold text-sm uppercase tracking-wide">Client Details:</label>
                        <span class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">{{ $this->invoice->client->name }}</span>
                      <span class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">{{ $this->invoice->client->phone }}</span> 
                        <span class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">{{ $this->invoice->client_car }}</span> 
                    </div>
                    <div class="flex flex-col w-full md:w-1/3 mb-2 md:mb-0">
                        <label class="text-gray-800 block mb-1 font-bold text-sm uppercase tracking-wide">Company Details:</label>
                        <span class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">CleanTastic</span>
                        <span class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">0555554533</span>
                        <span class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">King Fhad Road</span>
                    </div>
                </div>
    
                <div class="flex -mx-1 border-b py-2 items-start">
                    <div class="flex-1 px-1">
                        <p class="text-gray-800 uppercase tracking-wide text-sm font-bold">Service</p>
                    </div>
    
                    <div class="px-1 w-32 text-right">
                        <p class="leading-none">
                            <span class="block uppercase tracking-wide text-sm font-bold text-gray-800">Service Price</span>
                            {{-- <span class="font-medium text-xs text-gray-500">(Incl. Tax)</span> --}}
                        </p>
                    </div>
                </div>
    
                {{-- Services Table --}}
                @foreach ($servcies as $service)
                <div class="flex -mx-1 py-2 border-b">
                    <div class="flex-1 px-1">
                        <p class="text-gray-800" >{{ $service->name }}</p>
                    </div>
    
                    <div class="px-1 w-32 text-right">
                        <p class="text-gray-800">{{ $service->price . ' ' . 'SR' }}</p>
                    </div>
                </div>
                @endforeach	
                {{-- Total Calculation --}}
                <div class="py-2 ml-auto mt-5 w-full sm:w-2/4 lg:w-1/4">
                    <div class="flex justify-between mb-3">
                        <div class="text-gray-800 text-right flex-1">Total Excl. Tax</div>
                        <div class="text-right w-40">
                            <div class="text-gray-800 font-medium">{{ $this->invoice->totalPrice . ' ' . 'SR' }}</div>
                        </div>
                    </div>
                    <div class="flex justify-between mb-4">
                        <div class="text-sm text-gray-600 text-right flex-1">Tax Rate</div>
                        <div class="text-right w-40">
                            <div class="text-sm text-gray-600">%{{ $this->invoice->taxRate }}</div>
                        </div>
                    </div>
                    
                
                    <div class="py-2 border-t border-b">
                        <div class="flex justify-between">
                            <div class="text-xl text-gray-600 text-right flex-1">Amount due</div>
                            <div class="text-right w-40">
                                <div class="text-xl text-gray-800 font-bold">{{ $this->invoice->totalPriceWithTax . ' ' . 'SR' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </div>    
    @endif
</div>
