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
  /**
   * @var string[]
   */
  public $accessLevels;
  /**
   * @var string[]
   */
  public $audiences;
  /**
   * @var array[]
   */
  public $claims;
  /**
   * @var string
   */
  public $presenter;
  /**
   * @var string
   */
  public $principal;

  /**
   * @param string[]
   */
  public function setAccessLevels($accessLevels)
  {
    $this->accessLevels = $accessLevels;
  }
  /**
   * @return string[]
   */
  public function getAccessLevels()
  {
    return $this->accessLevels;
  }
  /**
   * @param string[]
   */
  public function setAudiences($audiences)
  {
    $this->audiences = $audiences;
  }
  /**
   * @return string[]
   */
  public function getAudiences()
  {
    return $this->audiences;
  }
  /**
   * @param array[]
   */
  public function setClaims($claims)
  {
    $this->claims = $claims;
  }
  /**
   * @return array[]
   */
  public function getClaims()
  {
    return $this->claims;
  }
  /**
   * @param string
   */
  public function setPresenter($presenter)
  {
    $this->presenter = $presenter;
  }
  /**
   * @return string
   */
  public function getPresenter()
  {
    return $this->presenter;
  }
  /**
   * @param string
   */
  public function setPrincipal($principal)
  {
    $this->principal = $principal;
  }
  /**
   * @return string
   */
  public function getPrincipal()
  {
    return $this->principal;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Auth::class, 'Google_Service_ServiceControl_Auth');
