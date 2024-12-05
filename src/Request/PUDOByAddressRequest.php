<?php

namespace Andyts93\BrtApiWrapper\Request;

use Andyts93\BrtApiWrapper\Exception\InvalidJsonException;
use Andyts93\BrtApiWrapper\Exception\RequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Andyts93\BrtApiWrapper\Response\PUSResponse;

class PUDOByAddressRequest implements RequestInterface
{
    protected $uuid;
    protected $endpoint = 'pudo/v1/open/pickup/get-pudo-by-address';
    protected $method = 'GET';
    protected $dataWrapper = 'query';
    protected $mandatoryFields = [
        'city',
        'countryCode',
        'zipCode'
    ];

    /**
     * @var string
     */
    private $address;

    /**
     * @var int
     */
    private $category;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $date_from;

    /**
     * @var string
     */
    private $destcountrycode;

    /**
     * @var int
     */
    private $holiday_tolerant;

    /**
     * @var string
     */
    private $language;

    /**
     * @var int
     */
    private $maxDistanceSearch;

    /**
     * @var int
     */
    private $max_pudo_number;

    /**
     * @var string
     */
    private $pudotype;

    /**
     * @var string
     */
    private $servicePudo;

    /**
     * @var int
     */
    private $servicePudo_display;

    /**
     * @var string
     */
    private $weight;

    /**
     * @var string
     */
    private $zipCode;

    public function __construct($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * Performs http call to BRT API
     *
     * @throws GuzzleException
     * @throws InvalidJsonException|RequestException|ClientException|ServerException
     */
    public function call()
    {
        $client = new Client([
            'base_uri' => 'https://api.brt.it/',
            'timeout' => 10.0,
        ]);

        try {
            $response = $client->request($this->method, $this->endpoint, [
                'headers' => [
                    'X-API-Auth' => $this->uuid,
                ],
                'query' => $this->createRequestBody(),
            ]);

            $responseBody = json_decode($response->getBody(), true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new InvalidJsonException(json_last_error_msg(), json_last_error());
            }

            $responseObject = json_decode(json_encode($responseBody), false);

            $pusResponse = new PUSResponse($responseObject);
            return $pusResponse->getPickupPoints();

        } catch (ClientException $e) {
            // Gestisci errori 4xx (client errors)
            $statusCode = $e->getResponse()->getStatusCode();
            if ($statusCode === 401) {
                // Unauthorized
                throw new \Exception('Unauthorized access. Please check your credentials.');
            } elseif ($statusCode === 403) {
                // Forbidden
                throw new \Exception('Forbidden access. You do not have permission to access this resource.');
            } elseif ($statusCode === 404) {
                // Not Found
                throw new \Exception('The requested resource was not found.');
            }
            throw $e;

        } catch (ServerException $e) {
            // Gestisci errori 5xx (server errors)
            throw new \Exception('Server error occurred: ' . $e->getMessage());

        } catch (RequestException $e) {
            // Gestisci errori di rete o timeout
            throw new \Exception('Request failed: ' . $e->getMessage());
        }
    }

    public function toArray()
    {
        $result = [
            'address' => $this->address,
            'category' => $this->category,
            'city' => $this->city,
            'countryCode' => $this->countryCode,
            'date_from' => $this->date_from,
            'destcountrycode' => $this->destcountrycode,
            'holiday_tolerant' => $this->holiday_tolerant,
            'language' => $this->language,
            'maxDistanceSearch' => $this->maxDistanceSearch,
            'max_pudo_number' => $this->max_pudo_number,
            'pudotype' => $this->pudotype,
            'servicePudo' => $this->servicePudo,
            'servicePudo_display' => $this->servicePudo_display,
            'weight' => $this->weight,
            'zipCode' => $this->zipCode,
        ];

        // Assicura che i campi obbligatori siano presenti, anche se null o vuoti
        foreach ($this->mandatoryFields as $field) {
            if (!array_key_exists($field, $result)) {
                $result[$field] = null;
            }
        }

        return [$this->dataWrapper => $result];
    }

    public function createRequestBody()
    {
        $arr = $this->toArray();
        $emptyMandatory = [];
        foreach ($arr[$this->dataWrapper] as $k => $v) {
            if (in_array($k, $this->mandatoryFields) && (is_null($v) || $v === "")) {
                $emptyMandatory[$k] = $v;
            }
        }

        if (count($emptyMandatory) > 0) {
            throw new RequestException(sprintf('Fields %s are mandatory', implode(', ', array_keys($emptyMandatory))));
        }
        return $arr[$this->dataWrapper];
    }

    /**
     * @param string $address
     * @return PUDOByAddressRequest
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @param int $category
     * @return PUDOByAddressRequest
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @param string $city
     * @return PUDOByAddressRequest
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @param string $countryCode
     * @return PUDOByAddressRequest
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @param string $date_from
     * @return PUDOByAddressRequest
     */
    public function setDateFrom($date_from)
    {
        $this->date_from = $date_from;
        return $this;
    }

    /**
     * @param string $destcountrycode
     * @return PUDOByAddressRequest
     */
    public function setDestCountryCode($destcountrycode)
    {
        $this->destcountrycode = $destcountrycode;
        return $this;
    }

    /**
     * @param int $holiday_tolerant
     * @return PUDOByAddressRequest
     */
    public function setHolidayTolerant($holiday_tolerant)
    {
        $this->holiday_tolerant = $holiday_tolerant;
        return $this;
    }

    /**
     * @param string $language
     * @return PUDOByAddressRequest
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @param int $maxDistanceSearch
     * @return PUDOByAddressRequest
     */
    public function setMaxDistanceSearch($maxDistanceSearch)
    {
        $this->maxDistanceSearch = $maxDistanceSearch;
        return $this;
    }

    /**
     * @param int $max_pudo_number
     * @return PUDOByAddressRequest
     */
    public function setMaxPudoNumber($max_pudo_number)
    {
        $this->max_pudo_number = $max_pudo_number;
        return $this;
    }

    /**
     * @param string $pudotype
     * @return PUDOByAddressRequest
     */
    public function setPudoType($pudotype)
    {
        $this->pudotype = $pudotype;
        return $this;
    }

    /**
     * @param string $servicePudo
     * @return PUDOByAddressRequest
     */
    public function setServicePudo($servicePudo)
    {
        $this->servicePudo = $servicePudo;
        return $this;
    }

    /**
     * @param int $servicePudo_display
     * @return PUDOByAddressRequest
     */
    public function setServicePudoDisplay($servicePudo_display)
    {
        $this->servicePudo_display = $servicePudo_display;
        return $this;
    }

    /**
     * @param string $weight
     * @return PUDOByAddressRequest
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @param string $zipCode
     * @return PUDOByAddressRequest
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }
}
