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

namespace Google\Service\ServiceControl;

class Auth extends \Google\Collection
{
  protected $collection_key = 'audiences';
  public $accessLevels;
  public $audiences;
  public $claims;
  public $presenter;
  public $principal;

  public function setAccessLevels($accessLevels)
  {
    $this->accessLevels = $accessLevels;
  }
  public function getAccessLevels()
  {
    return $this->accessLevels;
  }
  public function setAudiences($audiences)
  {
    $this->audiences = $audiences;
  }
  public function getAudiences()
  {
    return $this->audiences;
  }
  public function setClaims($claims)
  {
    $this->claims = $claims;
  }
  public function getClaims()
  {
    return $this->claims;
  }
  public function setPresenter($presenter)
  {
    $this->presenter = $presenter;
  }
  public function getPresenter()
  {
    return $this->presenter;
  }
  public function setPrincipal($principal)
  {
    $this->principal = $principal;
  }
  public function getPrincipal()
  {
    return $this->principal;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Auth::class, 'Google_Service_ServiceControl_Auth');
