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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Trial extends Google_Collection
{
  protected $collection_key = 'parameters';
  public $clientId;
  public $endTime;
  protected $finalMeasurementType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Measurement';
  protected $finalMeasurementDataType = '';
  public $infeasibleReason;
  protected $measurementsType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Measurement';
  protected $measurementsDataType = 'array';
  public $name;
  protected $parametersType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1TrialParameter';
  protected $parametersDataType = 'array';
  public $startTime;
  public $state;
  public $trialInfeasible;

  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }
  public function getClientId()
  {
    return $this->clientId;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
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
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Measurement[]
   */
  public function setMeasurements($measurements)
  {
    $this->measurements = $measurements;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Measurement[]
   */
  public function getMeasurements()
  {
    return $this->measurements;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1TrialParameter[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1TrialParameter[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
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
