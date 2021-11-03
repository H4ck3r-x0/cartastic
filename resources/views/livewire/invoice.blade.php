<div>
	@if($showInvoice)
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
						<span>1</span>
						</div>
					</div>

					<div class="mb-2 md:mb-1 md:flex items-center">
						<label class="w-32 text-gray-800 block font-bold text-sm uppercase tracking-wide">Invoice Date</label>
						<span class="mr-4 inline-block hidden md:block">:</span>
						<div class="flex-1">
						<span>
							{{ Carbon\Carbon::now()->format('Y-m-d'); }}
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
					<span class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">{{ $client->name }}</span>
					<span class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">{{ $client->phone }}</span>
					<span class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">{{ $clientCarType }}</span>
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
						<div class="text-gray-800 font-medium">{{ $totalPrice . ' ' . 'SR' }}</div>
					</div>
				</div>
				<div class="flex justify-between mb-4">
					<div class="text-sm text-gray-600 text-right flex-1">Tax Rate</div>
					<div class="text-right w-40">
						<div class="text-sm text-gray-600">%{{ $this->taxRate }}</div>
					</div>
				</div>
			
				<div class="py-2 border-t border-b">
					<div class="flex justify-between">
						<div class="text-xl text-gray-600 text-right flex-1">Amount due</div>
						<div class="text-right w-40">
							<div class="text-xl text-gray-800 font-bold">{{ $totalPriceWithTax . ' ' . 'SR' }}</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Print Template -->
			<div id="js-print-template" x-ref="printTemplate" class="hidden">
				<div class="mb-8 flex justify-between">
					<div>
						<h2 class="text-3xl font-bold mb-6 pb-2 tracking-wider uppercase">Invoice</h2>

						<div class="mb-1 flex items-center">
							<label class="w-32 text-gray-800 block font-bold text-xs uppercase tracking-wide">Invoice No.</label>
							<span class="mr-4 inline-block">:</span>
							<div x-text="invoiceNumber"></div>
						</div>
			
						<div class="mb-1 flex items-center">
							<label class="w-32 text-gray-800 block font-bold text-xs uppercase tracking-wide">Invoice Date</label>
							<span class="mr-4 inline-block">:</span>
							<div x-text="invoiceDate"></div>
						</div>
			
						<div class="mb-1 flex items-center">
							<label class="w-32 text-gray-800 block font-bold text-xs uppercase tracking-wide">Due date</label>
							<span class="mr-4 inline-block">:</span>
							<div x-text="invoiceDueDate"></div>
						</div>
					</div>
					<div class="pr-5">
						<div class="w-32 h-32 mb-1 overflow-hidden">
							<img id="image2" class="object-cover w-20 h-20" />
						</div>
					</div>
				</div>

				<div class="flex justify-between mb-10">
					<div class="w-1/2">
						<label class="text-gray-800 block mb-2 font-bold text-xs uppercase tracking-wide">Bill/Ship To:</label>
						<div>
							<div x-text="billing.name"></div>
							<div x-text="billing.address"></div>
							<div x-text="billing.extra"></div>
						</div>
					</div>
					<div class="w-1/2">
						<label class="text-gray-800 block mb-2 font-bold text-xs uppercase tracking-wide">From:</label>
						<div>
							<div x-text="from.name"></div>
							<div x-text="from.address"></div>
							<div x-text="from.extra"></div>
						</div>
					</div>
				</div>

				<div class="flex flex-wrap -mx-1 border-b py-2 items-start">
					<div class="flex-1 px-1">
						<p class="text-gray-600 uppercase tracking-wide text-xs font-bold">Description</p>
					</div>
		
					<div class="px-1 w-32 text-right">
						<p class="text-gray-600 uppercase tracking-wide text-xs font-bold">Units</p>
					</div>
		
					<div class="px-1 w-32 text-right">
						<p class="leading-none">
							<span class="block uppercase tracking-wide text-xs font-bold text-gray-600">Unit Price</span>
							<span class="font-medium text-xs text-gray-500">(Incl. GST)</span>
						</p>
					</div>
		
					<div class="px-1 w-32 text-right">
						<p class="leading-none">
							<span class="block uppercase tracking-wide text-xs font-bold text-gray-600">Amount</span>
							<span class="font-medium text-xs text-gray-500">(Incl. GST)</span>
						</p>
					</div>
				</div>
				<template x-for="invoice in items" :key="invoice.id">
					<div class="flex flex-wrap -mx-1 py-2 border-b">
						<div class="flex-1 px-1">
							<p class="text-gray-800" x-text="invoice.name"></p>
						</div>
		
						<div class="px-1 w-32 text-right">
							<p class="text-gray-800" x-text="invoice.qty"></p>
						</div>
		
						<div class="px-1 w-32 text-right">
							<p class="text-gray-800" x-text="numberFormat(invoice.rate)"></p>
						</div>
		
						<div class="px-1 w-32 text-right">
							<p class="text-gray-800" x-text="numberFormat(invoice.total)"></p>
						</div>
					</div>
				</template>

				<div class="py-2 ml-auto mt-20" style="width: 320px">
					<div class="flex justify-between mb-3">
						<div class="text-gray-800 text-right flex-1">Total incl. GST</div>
						<div class="text-right w-40">
							<div class="text-gray-800 font-medium" x-html="netTotal"></div>
						</div>
					</div>
					<div class="flex justify-between mb-4">
						<div class="text-sm text-gray-600 text-right flex-1">GST(18%) incl. in Total</div>
						<div class="text-right w-40">
							<div class="text-sm text-gray-600" x-html="totalGST"></div>
						</div>
					</div>
				
					<div class="py-2 border-t border-b">
						<div class="flex justify-between">
							<div class="text-xl text-gray-600 text-right flex-1">Amount due</div>
							<div class="text-right w-40">
								<div class="text-xl text-gray-800 font-bold" x-html="netTotal"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Print Template -->
		</div>
	</div>
	@endif
</div>
