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

namespace Google\Service\IdentityToolkit;

class IdpConfig extends \Google\Collection
{
  protected $collection_key = 'whitelistedAudiences';
  /**
   * @var string
   */
  public $clientId;
  /**
   * @var bool
   */
  public $enabled;
  /**
   * @var int
   */
  public $experimentPercent;
  /**
   * @var string
   */
  public $provider;
  /**
   * @var string
   */
  public $secret;
  /**
   * @var string[]
   */
  public $whitelistedAudiences;

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
   * @param bool
   */
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  /**
   * @return bool
   */
  public function getEnabled()
  {
    return $this->enabled;
  }
  /**
   * @param int
   */
  public function setExperimentPercent($experimentPercent)
  {
    $this->experimentPercent = $experimentPercent;
  }
  /**
   * @return int
   */
  public function getExperimentPercent()
  {
    return $this->experimentPercent;
  }
  /**
   * @param string
   */
  public function setProvider($provider)
  {
    $this->provider = $provider;
  }
  /**
   * @return string
   */
  public function getProvider()
  {
    return $this->provider;
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
  /**
   * @param string[]
   */
  public function setWhitelistedAudiences($whitelistedAudiences)
  {
    $this->whitelistedAudiences = $whitelistedAudiences;
  }
  /**
   * @return string[]
   */
  public function getWhitelistedAudiences()
  {
    return $this->whitelistedAudiences;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IdpConfig::class, 'Google_Service_IdentityToolkit_IdpConfig');
