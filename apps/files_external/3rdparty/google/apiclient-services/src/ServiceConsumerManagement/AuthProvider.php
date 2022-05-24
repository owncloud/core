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

namespace Google\Service\ServiceConsumerManagement;

class AuthProvider extends \Google\Collection
{
  protected $collection_key = 'jwtLocations';
  /**
   * @var string
   */
  public $audiences;
  /**
   * @var string
   */
  public $authorizationUrl;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $issuer;
  /**
   * @var string
   */
  public $jwksUri;
  protected $jwtLocationsType = JwtLocation::class;
  protected $jwtLocationsDataType = 'array';

  /**
   * @param string
   */
  public function setAudiences($audiences)
  {
    $this->audiences = $audiences;
  }
  /**
   * @return string
   */
  public function getAudiences()
  {
    return $this->audiences;
  }
  /**
   * @param string
   */
  public function setAuthorizationUrl($authorizationUrl)
  {
    $this->authorizationUrl = $authorizationUrl;
  }
  /**
   * @return string
   */
  public function getAuthorizationUrl()
  {
    return $this->authorizationUrl;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setIssuer($issuer)
  {
    $this->issuer = $issuer;
  }
  /**
   * @return string
   */
  public function getIssuer()
  {
    return $this->issuer;
  }
  /**
   * @param string
   */
  public function setJwksUri($jwksUri)
  {
    $this->jwksUri = $jwksUri;
  }
  /**
   * @return string
   */
  public function getJwksUri()
  {
    return $this->jwksUri;
  }
  /**
   * @param JwtLocation[]
   */
  public function setJwtLocations($jwtLocations)
  {
    $this->jwtLocations = $jwtLocations;
  }
  /**
   * @return JwtLocation[]
   */
  public function getJwtLocations()
  {
    return $this->jwtLocations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AuthProvider::class, 'Google_Service_ServiceConsumerManagement_AuthProvider');
