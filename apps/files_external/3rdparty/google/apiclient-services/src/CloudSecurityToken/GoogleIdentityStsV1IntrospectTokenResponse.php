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
  public $active;
  public $clientId;
  public $exp;
  public $iat;
  public $iss;
  public $scope;
  public $sub;
  public $username;

  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }
  public function getClientId()
  {
    return $this->clientId;
  }
  public function setExp($exp)
  {
    $this->exp = $exp;
  }
  public function getExp()
  {
    return $this->exp;
  }
  public function setIat($iat)
  {
    $this->iat = $iat;
  }
  public function getIat()
  {
    return $this->iat;
  }
  public function setIss($iss)
  {
    $this->iss = $iss;
  }
  public function getIss()
  {
    return $this->iss;
  }
  public function setScope($scope)
  {
    $this->scope = $scope;
  }
  public function getScope()
  {
    return $this->scope;
  }
  public function setSub($sub)
  {
    $this->sub = $sub;
  }
  public function getSub()
  {
    return $this->sub;
  }
  public function setUsername($username)
  {
    $this->username = $username;
  }
  public function getUsername()
  {
    return $this->username;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleIdentityStsV1IntrospectTokenResponse::class, 'Google_Service_CloudSecurityToken_GoogleIdentityStsV1IntrospectTokenResponse');
