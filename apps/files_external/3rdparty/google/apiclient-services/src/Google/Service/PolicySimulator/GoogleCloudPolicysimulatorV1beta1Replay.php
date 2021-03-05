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

class Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1Replay extends Google_Model
{
  protected $configType = 'Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ReplayConfig';
  protected $configDataType = '';
  public $name;
  protected $resultsSummaryType = 'Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ReplayResultsSummary';
  protected $resultsSummaryDataType = '';
  public $state;

  /**
   * @param Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ReplayConfig
   */
  public function setConfig(Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ReplayConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ReplayConfig
   */
  public function getConfig()
  {
    return $this->config;
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
   * @param Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ReplayResultsSummary
   */
  public function setResultsSummary(Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ReplayResultsSummary $resultsSummary)
  {
    $this->resultsSummary = $resultsSummary;
  }
  /**
   * @return Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ReplayResultsSummary
   */
  public function getResultsSummary()
  {
    return $this->resultsSummary;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
