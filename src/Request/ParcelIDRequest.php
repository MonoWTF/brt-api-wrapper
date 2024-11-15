<?php

namespace Andyts93\BrtApiWrapper\Request;

use Andyts93\BrtApiWrapper\Exception\InvalidJsonException;
use Andyts93\BrtApiWrapper\Response\ParcelIDResponse;
use GuzzleHttp\Client;

class ParcelIDRequest extends BaseRequest
{
    protected $endpoint = 'tracking/parcelID/';
    protected $method = 'GET';
    protected $mandatoryFields = [];

    public function callWithPath($parcelID)
    {
        $client = new Client();

        try {
            $response = $client->request($this->method, 'https://api.brt.it/rest/v1/' . $this->endpoint . $parcelID, [
                'headers' => [
                    'userID' => $this->account['userID'],
                    'password' => $this->account['password'],
                ],
            ]);

            $responseBody = json_decode($response->getBody(), true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new InvalidJsonException(json_last_error_msg(), json_last_error());
            }

            // Converti l'array in un oggetto
            $responseObject = json_decode(json_encode($responseBody), false);

            return $responseObject;

        } catch (\Exception $e) {
            // Puoi gestire qui l'errore specifico
            throw $e;
        }
    }

}
