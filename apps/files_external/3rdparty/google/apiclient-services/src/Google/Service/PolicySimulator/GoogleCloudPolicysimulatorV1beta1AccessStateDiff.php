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

class Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1AccessStateDiff extends Google_Model
{
  public $accessChange;
  protected $baselineType = 'Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ExplainedAccess';
  protected $baselineDataType = '';
  protected $simulatedType = 'Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ExplainedAccess';
  protected $simulatedDataType = '';

  public function setAccessChange($accessChange)
  {
    $this->accessChange = $accessChange;
  }
  public function getAccessChange()
  {
    return $this->accessChange;
  }
  /**
   * @param Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ExplainedAccess
   */
  public function setBaseline(Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ExplainedAccess $baseline)
  {
    $this->baseline = $baseline;
  }
  /**
   * @return Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ExplainedAccess
   */
  public function getBaseline()
  {
    return $this->baseline;
  }
  /**
   * @param Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ExplainedAccess
   */
  public function setSimulated(Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ExplainedAccess $simulated)
  {
    $this->simulated = $simulated;
  }
  /**
   * @return Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ExplainedAccess
   */
  public function getSimulated()
  {
    return $this->simulated;
  }
}
