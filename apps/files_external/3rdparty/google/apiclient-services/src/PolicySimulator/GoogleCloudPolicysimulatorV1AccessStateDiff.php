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

class GoogleCloudPolicysimulatorV1AccessStateDiff extends \Google\Model
{
  /**
   * @var string
   */
  public $accessChange;
  protected $baselineType = GoogleCloudPolicysimulatorV1ExplainedAccess::class;
  protected $baselineDataType = '';
  protected $simulatedType = GoogleCloudPolicysimulatorV1ExplainedAccess::class;
  protected $simulatedDataType = '';

  /**
   * @param string
   */
  public function setAccessChange($accessChange)
  {
    $this->accessChange = $accessChange;
  }
  /**
   * @return string
   */
  public function getAccessChange()
  {
    return $this->accessChange;
  }
  /**
   * @param GoogleCloudPolicysimulatorV1ExplainedAccess
   */
  public function setBaseline(GoogleCloudPolicysimulatorV1ExplainedAccess $baseline)
  {
    $this->baseline = $baseline;
  }
  /**
   * @return GoogleCloudPolicysimulatorV1ExplainedAccess
   */
  public function getBaseline()
  {
    return $this->baseline;
  }
  /**
   * @param GoogleCloudPolicysimulatorV1ExplainedAccess
   */
  public function setSimulated(GoogleCloudPolicysimulatorV1ExplainedAccess $simulated)
  {
    $this->simulated = $simulated;
  }
  /**
   * @return GoogleCloudPolicysimulatorV1ExplainedAccess
   */
  public function getSimulated()
  {
    return $this->simulated;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudPolicysimulatorV1AccessStateDiff::class, 'Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1AccessStateDiff');
