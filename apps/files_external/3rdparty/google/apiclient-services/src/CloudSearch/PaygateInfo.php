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

namespace Google\Service\CloudSearch;

class PaygateInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $callEndingSoonWarningTime;
  /**
   * @var string
   */
  public $callEndingTime;
  /**
   * @var bool
   */
  public $showUpgradePromos;

  /**
   * @param string
   */
  public function setCallEndingSoonWarningTime($callEndingSoonWarningTime)
  {
    $this->callEndingSoonWarningTime = $callEndingSoonWarningTime;
  }
  /**
   * @return string
   */
  public function getCallEndingSoonWarningTime()
  {
    return $this->callEndingSoonWarningTime;
  }
  /**
   * @param string
   */
  public function setCallEndingTime($callEndingTime)
  {
    $this->callEndingTime = $callEndingTime;
  }
  /**
   * @return string
   */
  public function getCallEndingTime()
  {
    return $this->callEndingTime;
  }
  /**
   * @param bool
   */
  public function setShowUpgradePromos($showUpgradePromos)
  {
    $this->showUpgradePromos = $showUpgradePromos;
  }
  /**
   * @return bool
   */
  public function getShowUpgradePromos()
  {
    return $this->showUpgradePromos;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PaygateInfo::class, 'Google_Service_CloudSearch_PaygateInfo');
