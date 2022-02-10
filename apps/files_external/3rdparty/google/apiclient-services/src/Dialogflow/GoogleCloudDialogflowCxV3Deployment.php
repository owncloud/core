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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3Deployment extends \Google\Model
{
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var string
   */
  public $flowVersion;
  /**
   * @var string
   */
  public $name;
  protected $resultType = GoogleCloudDialogflowCxV3DeploymentResult::class;
  protected $resultDataType = '';
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $state;

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
   * @param string
   */
  public function setFlowVersion($flowVersion)
  {
    $this->flowVersion = $flowVersion;
  }
  /**
   * @return string
   */
  public function getFlowVersion()
  {
    return $this->flowVersion;
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
   * @param GoogleCloudDialogflowCxV3DeploymentResult
   */
  public function setResult(GoogleCloudDialogflowCxV3DeploymentResult $result)
  {
    $this->result = $result;
  }
  /**
   * @return GoogleCloudDialogflowCxV3DeploymentResult
   */
  public function getResult()
  {
    return $this->result;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3Deployment::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Deployment');
