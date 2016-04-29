<?php
/**
 * Created by PhpStorm.
 * User: corneliu
 * Date: 29.04.2016
 * Time: 13:47
 */
namespace FastShip\Repositories;


interface ParcelRepository
{
    public function findByTrackingCode($code);
}