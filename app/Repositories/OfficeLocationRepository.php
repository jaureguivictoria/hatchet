<?php

namespace App\Repositories;

use App\Models\OfficeLocation;
use Illuminate\Pagination\Paginator;

class OfficeLocationRepository
{

    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    private $query;

    public function __construct()
    {
        $this->query = OfficeLocation::query();
    }

    public static function make(): OfficeLocationRepository
    {
        return new static();
    }


    public function filterByName($name)
    {
        $this->query->when($name, function($query) use ($name) {
            $query->where('name', 'like', '%'.$name.'%');
        });

        return $this;
    }

    public function filterByOffices($offices)
    {
        $this->query->when($offices, function($query) use ($offices) {
            $query->where('offices', '=', $offices);
        });

        return $this;
    }

    public function filterByTables($tables)
    {
        $this->query->when($tables, function($query) use ($tables) {
            $query->where('tables', '=', $tables);
        });

        return $this;
    }

    public function filterByRange(string $columnRange, $min, $max)
    {
        $hasRange = !empty($min) && !empty($max);

        if ($hasRange) {
            $this->query->whereBetween($columnRange, [$min, $max]);
        } else {
            $this->query->when($min, function($query) use ($min, $columnRange) {
                $query->where($columnRange, '>=', $min);
            });

            $this->query->when($max, function($query) use ($max, $columnRange) {
                $query->where($columnRange, '>=', $max);
            });
        }

        return $this;
    }

    public function paginate(int $perPage = 15)
    {
        return $this->query->paginate($perPage);
    }

}
