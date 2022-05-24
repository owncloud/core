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

namespace Google\Service\CloudMachineLearningEngine;

class GoogleCloudMlV1Trial extends \Google\Collection
{
  protected $collection_key = 'parameters';
  /**
   * @var string
   */
  public $clientId;
  /**
   * @var string
   */
  public $endTime;
  protected $finalMeasurementType = GoogleCloudMlV1Measurement::class;
  protected $finalMeasurementDataType = '';
  /**
   * @var string
   */
  public $infeasibleReason;
  protected $measurementsType = GoogleCloudMlV1Measurement::class;
  protected $measurementsDataType = 'array';
  /**
   * @var string
   */
  public $name;
  protected $parametersType = GoogleCloudMlV1TrialParameter::class;
  protected $parametersDataType = 'array';
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $state;
  /**
   * @var bool
   */
  public $trialInfeasible;

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
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param GoogleCloudMlV1Measurement
   */
  public function setFinalMeasurement(GoogleCloudMlV1Measurement $finalMeasurement)
  {
    $this->finalMeasurement = $finalMeasurement;
  }
  /**
   * @return GoogleCloudMlV1Measurement
   */
  public function getFinalMeasurement()
  {
    return $this->finalMeasurement;
  }
  /**
   * @param string
   */
  public function setInfeasibleReason($infeasibleReason)
  {
    $this->infeasibleReason = $infeasibleReason;
  }
  /**
   * @return string
   */
  public function getInfeasibleReason()
  {
    return $this->infeasibleReason;
  }
  /**
   * @param GoogleCloudMlV1Measurement[]
   */
  public function setMeasurements($measurements)
  {
    $this->measurements = $measurements;
  }
  /**
   * @return GoogleCloudMlV1Measurement[]
   */
  public function getMeasurements()
  {
    return $this->measurements;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleCloudMlV1TrialParameter[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return GoogleCloudMlV1TrialParameter[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
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
  /**
   * @param bool
   */
  public function setTrialInfeasible($trialInfeasible)
  {
    $this->trialInfeasible = $trialInfeasible;
  }
  /**
   * @return bool
   */
  public function getTrialInfeasible()
  {
    return $this->trialInfeasible;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1Trial::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Trial');
