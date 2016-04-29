<?php
/**
 * Created by PhpStorm.
 * User: corneliu
 * Date: 29.04.2016
 * Time: 13:50
 */

namespace FastShip\Repositories;

use League\Csv\Reader;
use FastShip\Models\ParcelCsv;
use Illuminate\Support\Facades\Config;


class CsvParcelRepository implements ParcelRepository
{
    /**
     * @return Reader
     */
    private function csvReader()
    {
        $csvPath = base_path().'/src/storage.csv';

        return Reader::createFromPath(
            new \SplFileObject($csvPath)
        );
    }

    /**
     * @param string $code
     * @return mixed Parcel or null
     */
    public function findByTrackingCode($code)
    {
        $csvRecord = $this->csvReader()
            ->addFilter(function ($row) {
                return isset($row[0], $row[1], $row[2]); // We make sure the data are present
            })
            ->addFilter(function ($row) use ($code) {
                return $code == $row[1]; // We are looking for the the code
            })
            ->fetchOne(0);

        if ($csvRecord) {
            $parcel = new ParcelCsv();
            $parcel->id = $csvRecord[0];
            $parcel->trackingCode = $csvRecord[1];
            $parcel->deliveryDate = $csvRecord[2];
            return $parcel;
        }

        return null;
    }
}