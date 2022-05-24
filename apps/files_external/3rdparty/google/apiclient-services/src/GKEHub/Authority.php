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

namespace Google\Service\GKEHub;

class Authority extends \Google\Model
{
  /**
   * @var string
   */
  public $identityProvider;
  /**
   * @var string
   */
  public $issuer;
  /**
   * @var string
   */
  public $oidcJwks;
  /**
   * @var string
   */
  public $workloadIdentityPool;

  /**
   * @param string
   */
  public function setIdentityProvider($identityProvider)
  {
    $this->identityProvider = $identityProvider;
  }
  /**
   * @return string
   */
  public function getIdentityProvider()
  {
    return $this->identityProvider;
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
  public function setOidcJwks($oidcJwks)
  {
    $this->oidcJwks = $oidcJwks;
  }
  /**
   * @return string
   */
  public function getOidcJwks()
  {
    return $this->oidcJwks;
  }
  /**
   * @param string
   */
  public function setWorkloadIdentityPool($workloadIdentityPool)
  {
    $this->workloadIdentityPool = $workloadIdentityPool;
  }
  /**
   * @return string
   */
  public function getWorkloadIdentityPool()
  {
    return $this->workloadIdentityPool;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Authority::class, 'Google_Service_GKEHub_Authority');
