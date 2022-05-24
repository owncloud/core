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

class IdentityServiceMembershipState extends \Google\Model
{
  /**
   * @var string
   */
  public $failureReason;
  /**
   * @var string
   */
  public $installedVersion;
  protected $memberConfigType = IdentityServiceMembershipSpec::class;
  protected $memberConfigDataType = '';
  /**
   * @var string
   */
  public $state;

  /**
   * @param string
   */
  public function setFailureReason($failureReason)
  {
    $this->failureReason = $failureReason;
  }
  /**
   * @return string
   */
  public function getFailureReason()
  {
    return $this->failureReason;
  }
  /**
   * @param string
   */
  public function setInstalledVersion($installedVersion)
  {
    $this->installedVersion = $installedVersion;
  }
  /**
   * @return string
   */
  public function getInstalledVersion()
  {
    return $this->installedVersion;
  }
  /**
   * @param IdentityServiceMembershipSpec
   */
  public function setMemberConfig(IdentityServiceMembershipSpec $memberConfig)
  {
    $this->memberConfig = $memberConfig;
  }
  /**
   * @return IdentityServiceMembershipSpec
   */
  public function getMemberConfig()
  {
    return $this->memberConfig;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IdentityServiceMembershipState::class, 'Google_Service_GKEHub_IdentityServiceMembershipState');
