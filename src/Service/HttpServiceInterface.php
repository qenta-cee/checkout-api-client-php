<?php
namespace WirecardCheckoutApiClient\Service;

use Zend\Http\Client;

interface HttpServiceInterface
{
    const OPTIONS_METHOD = 'method';

    const OPTIONS_PARAMETERS = 'parameters';

    const OPTIONS_REQUEST_URI = 'requestUri';

    const OPTIONS_REQUEST_BODY = 'requestBody';

    /**
     * setter for the used http client
     *
     * @param Client $client
     * @return $this
     */
    public function setHttpClient(Client $client);

    /**
     * getter for the used http client
     *
     * @return Client
     */
    public function getHttpClient();

    /**
     * @param $requestUri
     * @return $this
     */
    public function setRequestUri($requestUri);

    /**
     * @return string
     */
    public function getRequestUri();
}