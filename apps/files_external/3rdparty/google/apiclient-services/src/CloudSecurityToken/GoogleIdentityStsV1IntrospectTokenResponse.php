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

namespace Google\Service\CloudSecurityToken;

class GoogleIdentityStsV1IntrospectTokenResponse extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "clientId" => "client_id",
  ];
  /**
   * @var bool
   */
  public $active;
  /**
   * @var string
   */
  public $clientId;
  /**
   * @var string
   */
  public $exp;
  /**
   * @var string
   */
  public $iat;
  /**
   * @var string
   */
  public $iss;
  /**
   * @var string
   */
  public $scope;
  /**
   * @var string
   */
  public $sub;
  /**
   * @var string
   */
  public $username;

  /**
   * @param bool
   */
  public function setActive($active)
  {
    $this->active = $active;
  }
  /**
   * @return bool
   */
  public function getActive()
  {
    return $this->active;
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
  public function setExp($exp)
  {
    $this->exp = $exp;
  }
  /**
   * @return string
   */
  public function getExp()
  {
    return $this->exp;
  }
  /**
   * @param string
   */
  public function setIat($iat)
  {
    $this->iat = $iat;
  }
  /**
   * @return string
   */
  public function getIat()
  {
    return $this->iat;
  }
  /**
   * @param string
   */
  public function setIss($iss)
  {
    $this->iss = $iss;
  }
  /**
   * @return string
   */
  public function getIss()
  {
    return $this->iss;
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
  public function setSub($sub)
  {
    $this->sub = $sub;
  }
  /**
   * @return string
   */
  public function getSub()
  {
    return $this->sub;
  }
  /**
   * @param string
   */
  public function setUsername($username)
  {
    $this->username = $username;
  }
  /**
   * @return string
   */
  public function getUsername()
  {
    return $this->username;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleIdentityStsV1IntrospectTokenResponse::class, 'Google_Service_CloudSecurityToken_GoogleIdentityStsV1IntrospectTokenResponse');
