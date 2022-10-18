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

class GoogleCloudIntegrationsV1alphaJwt extends \Google\Model
{
  /**
   * @var string
   */
  public $jwt;
  /**
   * @var string
   */
  public $jwtHeader;
  /**
   * @var string
   */
  public $jwtPayload;
  /**
   * @var string
   */
  public $secret;

  /**
   * @param string
   */
  public function setJwt($jwt)
  {
    $this->jwt = $jwt;
  }
  /**
   * @return string
   */
  public function getJwt()
  {
    return $this->jwt;
  }
  /**
   * @param string
   */
  public function setJwtHeader($jwtHeader)
  {
    $this->jwtHeader = $jwtHeader;
  }
  /**
   * @return string
   */
  public function getJwtHeader()
  {
    return $this->jwtHeader;
  }
  /**
   * @param string
   */
  public function setJwtPayload($jwtPayload)
  {
    $this->jwtPayload = $jwtPayload;
  }
  /**
   * @return string
   */
  public function getJwtPayload()
  {
    return $this->jwtPayload;
  }
  /**
   * @param string
   */
  public function setSecret($secret)
  {
    $this->secret = $secret;
  }
  /**
   * @return string
   */
  public function getSecret()
  {
    return $this->secret;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaJwt::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaJwt');
