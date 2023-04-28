<?php

namespace App\Http\Livewire;

use App\Http\Resources\OfficeLocationCollection;
use App\Models\OfficeLocation;
use Livewire\Component;
use Livewire\WithPagination;

class SearchOfficeLocations extends Component
{
    use WithPagination;

    public $searchName;

    public $searchOffices;

    public $searchTables;

    public $searchSqmtFrom;

    public $searchSqmtTo;

    public $searchPriceFrom;

    public $searchPriceTo;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $officeLocations = new OfficeLocationCollection(
            OfficeLocation::where('name', 'like', '%'.$this->searchName.'%')
                ->orWhere('offices', $this->searchOffices)
                ->orWhere('tables', $this->searchTables)
                ->orWhereBetween('sqmt', [$this->searchSqmtFrom, $this->searchSqmtTo])
                ->orWhereBetween('price', [$this->searchPriceFrom, $this->searchPriceTo])
                ->paginate()
        );

        return view('livewire.search-office-locations')->with('officeLocations', $officeLocations);
    }
}
