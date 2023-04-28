<?php

namespace App\Http\Livewire;

use App\Http\Resources\OfficeLocationCollection;
use App\Models\OfficeLocation;
use App\Repositories\OfficeLocationRepository;
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
        $officeLocations = OfficeLocationRepository::make()
            ->filterByRange('price', $this->searchPriceFrom, $this->searchPriceTo)
            ->filterByRange('sqmt', $this->searchSqmtFrom, $this->searchSqmtTo)
            ->filterByOffices($this->searchOffices)
            ->filterByTables($this->searchTables)
            ->filterByName($this->searchName)
            ->paginate();

        return view('livewire.search-office-locations')->with('officeLocations', new OfficeLocationCollection($officeLocations));
    }
}
