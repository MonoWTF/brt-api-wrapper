<?php

namespace Andyts93\BrtApiWrapper\Api;

class PickupPoint
{
    /**
     * @var boolean
     */
    public $available;

    /**
     * @var string
     */
    public $building;

    /**
     * @var string
     */
    public $carrierDepot;

    /**
     * @var string
     */
    public $carrierInfo;

    /**
     * @var string
     */
    public $carrierPudoId;

    /**
     * @var string
     */
    public $complementaryInfo;

    /**
     * @var string
     */
    public $complementaryServiceInfo;

    /**
     * @var string
     */
    public $contactName;

    /**
     * @var string
     */
    public $country;

    /**
     * @var string
     */
    public $department;

    /**
     * @var boolean
     */
    public $disableAccess;

    /**
     * @var double
     */
    public $distanceFromPoint;

    /**
     * @var boolean
     */
    public $enabled;

    /**
     * @var string
     */
    public $floor;

    /**
     * @var string
     */
    public $fullAddress;

    /**
     * @var array<PUSPointHoliday>
     */
    public $holidays;

    /**
     * @var array<PUSPointHour>
     */
    public $hours;

    /**
     * @var string
     */
    public $language;

    /**
     * @var string
     */
    public $latitude;

    /**
     * @var string
     */
    public $localizationHint;

    /**
     * @var string
     */
    public $locationNumber;

    /**
     * @var string
     */
    public $longitude;

    /**
     * @var int
     */
    public $maxParcel;

    /**
     * @var double
     */
    public $maxWeight;

    /**
     * @var boolean
     */
    public $parking;

    /**
     * @var string
     */
    public $pointName;

    /**
     * @var string
     */
    public $pointName2;

    /**
     * @var string
     */
    public $pudoId;

    /**
     * @var string
     */
    public $service;

    /**
     * @var string
     */
    public $state;

    /**
     * @var string
     */
    public $street;

    /**
     * @var string
     */
    public $street2;

    /**
     * @var string
     */
    public $street3;

    /**
     * @var string
     */
    public $streetNumber;

    /**
     * @var string
     */
    public $subArea;

    /**
     * @var string
     */
    public $town;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $zipCode;

    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

        /**
     * @return boolean
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * @return string
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * @return string
     */
    public function getCarrierDepot()
    {
        return $this->carrierDepot;
    }

    /**
     * @return string
     */
    public function getCarrierInfo()
    {
        return $this->carrierInfo;
    }

    /**
     * @return string
     */
    public function getCarrierPudoId()
    {
        return $this->carrierPudoId;
    }

    /**
     * @return string
     */
    public function getComplementaryInfo()
    {
        return $this->complementaryInfo;
    }

    /**
     * @return string
     */
    public function getComplementaryServiceInfo()
    {
        return $this->complementaryServiceInfo;
    }

    /**
     * @return string
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @return boolean
     */
    public function getDisableAccess()
    {
        return $this->disableAccess;
    }

    /**
     * @return double
     */
    public function getDistanceFromPoint()
    {
        return $this->distanceFromPoint;
    }

    /**
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return string
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * @return string
     */
    public function getFullAddress()
    {
        return $this->fullAddress;
    }

    /**
     * @return array<PUSPointHoliday>
     */
    public function getHolidays()
    {
        return $this->holidays;
    }

    /**
     * @return array<PUSPointHour>
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return string
     */
    public function getLocalizationHint()
    {
        return $this->localizationHint;
    }

    /**
     * @return string
     */
    public function getLocationNumber()
    {
        return $this->locationNumber;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return int
     */
    public function getMaxParcel()
    {
        return $this->maxParcel;
    }

    /**
     * @return double
     */
    public function getMaxWeight()
    {
        return $this->maxWeight;
    }

    /**
     * @return boolean
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * @return string
     */
    public function getPointName()
    {
        return $this->pointName;
    }

    /**
     * @return string
     */
    public function getPointName2()
    {
        return $this->pointName2;
    }

    /**
     * @return string
     */
    public function getPudoId()
    {
        return $this->pudoId;
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getStreet2()
    {
        return $this->street2;
    }

    /**
     * @return string
     */
    public function getStreet3()
    {
        return $this->street3;
    }

    /**
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @return string
     */
    public function getSubArea()
    {
        return $this->subArea;
    }

    /**
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
}
