<div class="container mx-auto">

    <h3>Filters</h3>

    <label class="relative block mt-5">
        <span class="sr-only">Search by name</span>
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20"><!-- ... --></svg>
        </span>
        <input  wire:model="searchName" class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Search by name" type="text" name="searchName" id="search"/>
    </label>

    <label class="relative block mt-5">
        <span class="sr-only">Search by offices</span>
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20"><!-- ... --></svg>
        </span>
        <input  wire:model="searchOffices" class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Search by offices" type="number" name="searchOffice"/>
    </label>

    <label class="relative block mt-5">
        <span class="sr-only">Search by offices</span>
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20"><!-- ... --></svg>
        </span>
        <input  wire:model="searchTables" class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Search by tables" type="number" name="searchTable"/>
    </label>

    <div class="grid grid-cols-3 gap-4 mt-5">
        <label class="row-span-3 col-span-1">
            <span class="sr-only">Search by sqmt from</span>
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20"><!-- ... --></svg>
            </span>
            <input  wire:model="searchSqmtFrom" class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Search by sqmt from" type="number" name="searchSqmtFrom"/>
        </label>

        <label class="row-span-3 col-span-1">
            <span class="sr-only">Search by sqmt up to</span>
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20"><!-- ... --></svg>
            </span>
            <input  wire:model="searchSqmtTo" class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Search by sqmt up to" type="number" name="searchSqmtTo"/>
        </label>
    </div>

    <span class="grid grid-cols-3 gap-4 mt-5">
        <label class="row-span-3 col-span-1">
            <span class="sr-only">Search by prices from</span>
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20"><!-- ... --></svg>
            </span>
            <input  wire:model="searchPriceFrom" class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Search by prices from" type="number" name="searchPriceFrom"/>
        </label>

        <label class="row-span-3 col-span-1">
            <span class="sr-only">Search by prices up to</span>
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20"><!-- ... --></svg>
            </span>
            <input  wire:model="searchPriceTo" class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Search by prices up to" type="number" name="searchPriceTo"/>
        </label>
    </span>


    <table class="table-fixed mt-6">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Offices</th>
                <th>Tables</th>
                <th>Sqmts</th>
            </tr>
        </thead>
        <tbody>
            </tr>
            @foreach($officeLocations as $officeLocation)
            <tr>
                <td>{{ $officeLocation->name }}</td>
                <td>{{ $officeLocation->price }}</td>
                <td>{{ $officeLocation->offices }}</td>
                <td>{{ $officeLocation->tables }}</td>
                <td>{{ $officeLocation->sqmt }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $officeLocations->links() }}
</div>
