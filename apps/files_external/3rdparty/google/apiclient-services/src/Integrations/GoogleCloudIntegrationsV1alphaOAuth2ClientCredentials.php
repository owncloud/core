<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Integrations;

class GoogleCloudIntegrationsV1alphaOAuth2ClientCredentials extends \Google\Model
{
  protected $accessTokenType = GoogleCloudIntegrationsV1alphaAccessToken::class;
  protected $accessTokenDataType = '';
  /**
   * @var string
   */
  public $clientId;
  /**
   * @var string
   */
  public $clientSecret;
  /**
   * @var string
   */
  public $requestType;
  /**
   * @var string
   */
  public $scope;
  /**
   * @var string
   */
  public $tokenEndpoint;
  protected $tokenParamsType = GoogleCloudIntegrationsV1alphaParameterMap::class;
  protected $tokenParamsDataType = '';

  /**
   * @param GoogleCloudIntegrationsV1alphaAccessToken
   */
  public function setAccessToken(GoogleCloudIntegrationsV1alphaAccessToken $accessToken)
  {
    $this->accessToken = $accessToken;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaAccessToken
   */
  public function getAccessToken()
  {
    return $this->accessToken;
  }
  /**
   * @param string
   */
  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }
  /**
   * @return string
   */
  public function getClientId()
  {
    return $this->clientId;
  }
  /**
   * @param string
   */
  public function setClientSecret($clientSecret)
  {
    $this->clientSecret = $clientSecret;
  }
  /**
   * @return string
   */
  public function getClientSecret()
  {
    return $this->clientSecret;
  }
  /**
   * @param string
   */
  public function setRequestType($requestType)
  {
    $this->requestType = $requestType;
  }
  /**
   * @return string
   */
  public function getRequestType()
  {
    return $this->requestType;
  }
  /**
   * @param string
   */
  public function setScope($scope)
  {
    $this->scope = $scope;
  }
  /**
   * @return string
   */
  public function getScope()
  {
    return $this->scope;
  }
  /**
   * @param string
   */
  public function setTokenEndpoint($tokenEndpoint)
  {
    $this->tokenEndpoint = $tokenEndpoint;
  }
  /**
   * @return string
   */
  public function getTokenEndpoint()
  {
    return $this->tokenEndpoint;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaParameterMap
   */
  public function setTokenParams(GoogleCloudIntegrationsV1alphaParameterMap $tokenParams)
  {
    $this->tokenParams = $tokenParams;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaParameterMap
   */
  public function getTokenParams()
  {
    return $this->tokenParams;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaOAuth2ClientCredentials::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaOAuth2ClientCredentials');
