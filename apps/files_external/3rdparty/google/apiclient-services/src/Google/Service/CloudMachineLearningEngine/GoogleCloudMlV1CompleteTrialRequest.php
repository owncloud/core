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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1CompleteTrialRequest extends Google_Model
{
  protected $finalMeasurementType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Measurement';
  protected $finalMeasurementDataType = '';
  public $infeasibleReason;
  public $trialInfeasible;

  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Measurement
   */
  public function setFinalMeasurement(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Measurement $finalMeasurement)
  {
    $this->finalMeasurement = $finalMeasurement;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Measurement
   */
  public function getFinalMeasurement()
  {
    return $this->finalMeasurement;
  }
  public function setInfeasibleReason($infeasibleReason)
  {
    $this->infeasibleReason = $infeasibleReason;
  }
  public function getInfeasibleReason()
  {
    return $this->infeasibleReason;
  }
  public function setTrialInfeasible($trialInfeasible)
  {
    $this->trialInfeasible = $trialInfeasible;
  }
  public function getTrialInfeasible()
  {
    return $this->trialInfeasible;
  }
}
