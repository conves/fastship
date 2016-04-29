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


class CsvParcelRepository implements ParcelRepository
{
    /**
     * @return Reader
     */
    private function csvReader()
    {
        $csvPath = env('DB_DATABASE');

        return Reader::createFromPath(
            new \SplFileObject($csvPath)
        )->setDelimiter(';');
    }

    /**
     * @param string $code
     * @return mixed Parcel or null
     */
    public function findByTrackingCode($code)
    {
        return $this->csvReader()
            ->addFilter(function ($row) {
                return isset($row[1], $row[2], $row[3]); // We make sure the data are present
            })
            ->addFilter(function ($row) use ($code) {
                return $code == $row[2]; // We are looking for the the code
            })
            ->setLimit(1) // We just want the first result
            ->fetchAssoc(['id', 'trackingCode', 'deliveryDate'], function ($record) {

                $parcel = new ParcelCsv(); // Instantiate model

                foreach ($record as $key => $value) {
                    if (property_exists('FastShip\Models\Parcel', $key)) {
                        $parcel->$key = $value;
                    }
                }

                return $parcel;
            });
    }
}