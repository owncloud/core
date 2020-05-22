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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Study extends Google_Model
{
  public $createTime;
  public $inactiveReason;
  public $name;
  public $state;
  protected $studyConfigType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfig';
  protected $studyConfigDataType = '';

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setInactiveReason($inactiveReason)
  {
    $this->inactiveReason = $inactiveReason;
  }
  public function getInactiveReason()
  {
    return $this->inactiveReason;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfig
   */
  public function setStudyConfig(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfig $studyConfig)
  {
    $this->studyConfig = $studyConfig;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfig
   */
  public function getStudyConfig()
  {
    return $this->studyConfig;
  }
}
