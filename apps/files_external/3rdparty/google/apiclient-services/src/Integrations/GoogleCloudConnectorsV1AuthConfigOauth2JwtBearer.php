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

class GoogleCloudConnectorsV1AuthConfigOauth2JwtBearer extends \Google\Model
{
  protected $clientKeyType = GoogleCloudConnectorsV1Secret::class;
  protected $clientKeyDataType = '';
  protected $jwtClaimsType = GoogleCloudConnectorsV1AuthConfigOauth2JwtBearerJwtClaims::class;
  protected $jwtClaimsDataType = '';

  /**
   * @param GoogleCloudConnectorsV1Secret
   */
  public function setClientKey(GoogleCloudConnectorsV1Secret $clientKey)
  {
    $this->clientKey = $clientKey;
  }
  /**
   * @return GoogleCloudConnectorsV1Secret
   */
  public function getClientKey()
  {
    return $this->clientKey;
  }
  /**
   * @param GoogleCloudConnectorsV1AuthConfigOauth2JwtBearerJwtClaims
   */
  public function setJwtClaims(GoogleCloudConnectorsV1AuthConfigOauth2JwtBearerJwtClaims $jwtClaims)
  {
    $this->jwtClaims = $jwtClaims;
  }
  /**
   * @return GoogleCloudConnectorsV1AuthConfigOauth2JwtBearerJwtClaims
   */
  public function getJwtClaims()
  {
    return $this->jwtClaims;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudConnectorsV1AuthConfigOauth2JwtBearer::class, 'Google_Service_Integrations_GoogleCloudConnectorsV1AuthConfigOauth2JwtBearer');
