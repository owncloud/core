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

namespace Google\Service\PolicySimulator;

class GoogleCloudPolicysimulatorV1beta1ReplayConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $logSource;
  protected $policyOverlayType = GoogleIamV1Policy::class;
  protected $policyOverlayDataType = 'map';

  /**
   * @param string
   */
  public function setLogSource($logSource)
  {
    $this->logSource = $logSource;
  }
  /**
   * @return string
   */
  public function getLogSource()
  {
    return $this->logSource;
  }
  /**
   * @param GoogleIamV1Policy[]
   */
  public function setPolicyOverlay($policyOverlay)
  {
    $this->policyOverlay = $policyOverlay;
  }
  /**
   * @return GoogleIamV1Policy[]
   */
  public function getPolicyOverlay()
  {
    return $this->policyOverlay;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudPolicysimulatorV1beta1ReplayConfig::class, 'Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ReplayConfig');
