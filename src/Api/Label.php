<?php

namespace Andyts93\BrtApiWrapper\Api;

class Label
{
    /**
     * @var int
     */
    public $dataLength;

    /**
     * @var string
     */
    public $parcelID;

    /**
     * @var string
     */
    public $trackingByParcelID;

    /**
     * @var string
     */
    public $stream;

    public function __construct($dataLength, $parcelID, $trackingByParcelID, $stream)
    {

        $this->dataLength = $dataLength;
        $this->parcelID = $parcelID;
        $this->trackingByParcelID = $trackingByParcelID;
        $this->stream = base64_decode($stream);
    }
}
