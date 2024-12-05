<?php

namespace Andyts93\BrtApiWrapper\Response;

use Andyts93\BrtApiWrapper\Api\PickupPoint;

class PUSResponse
{
    protected $rootElement = 'pudo';
    protected $pickupPoints = [];

    public function __construct($response)
    {
        foreach ($response->{$this->rootElement} as $index => $value) {
            // Crea una nuova istanza di PUSResponse per ogni oggetto
            $pickupPoint = new PickupPoint((array) $value);

            // Aggiungi l'istanza all'array di punti di raccolta
            $this->pickupPoints[] = $pickupPoint;
        }

        return $this->pickupPoints;
    }

    /**
     * @return array<PickupPoint>
     */
    public function getPickupPoints()
    {
        return $this->pickupPoints;
    }

}
