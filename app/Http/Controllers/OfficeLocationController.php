<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadOfficeLocationsCSVRequest;
use App\Http\Resources\OfficeLocationCollection;
use App\Models\OfficeLocation;
use App\Repositories\OfficeLocationRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use Throwable;

class OfficeLocationController extends Controller
{
    public function upload(UploadOfficeLocationsCSVRequest $request): JsonResponse
    {
        $csvFile = $request->file('file');

        $csv = Reader::createFromPath($csvFile->getRealPath());

        try {

            DB::beginTransaction();

            // Ignore header row
            $csv->setHeaderOffset(0);

            $records = $csv->getRecords();

            foreach($records as $record)
            {
                $officesValues = array_values($record);

                $item = new OfficeLocation([
                    'name' => $officesValues[0],
                    'price' => $officesValues[1],
                    'offices' => floatval($officesValues[2]),
                    'tables' => floatval($officesValues[3]),
                    'sqmt' => floatval($officesValues[4]),
                ]);


                $item->save();
            }

        } catch (Throwable $e) {

            DB::rollBack();

            return response()->json([
                'message' => 'The CSV could not be processed.',
                'errors' => ['file' => 'Invalid CVS Data']
            ], 422);
        }

        DB::commit();

        return response()->json(['message' => 'Upload successfull']);
    }

    public function index()
    {
        $perPage = request()->query('per_page', 15);

        $officeLocations = OfficeLocationRepository::make()
            ->filterByRange('price', request()->input('searchPriceFrom'), request()->input('searchPriceTo'))
            ->filterByRange('sqmt', request()->input('searchSqmtFrom'), request()->input('searchSqmtTo'))
            ->filterByOffices(request()->input('searchOffices'))
            ->filterByTables(request()->input('searchTables'))
            ->filterByName(request()->input('searchName'))
            ->paginate($perPage);

        return new OfficeLocationCollection($officeLocations);
    }

}
