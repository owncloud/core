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

class GoogleCloudMlV1Study extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $inactiveReason;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $state;
  protected $studyConfigType = GoogleCloudMlV1StudyConfig::class;
  protected $studyConfigDataType = '';

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setInactiveReason($inactiveReason)
  {
    $this->inactiveReason = $inactiveReason;
  }
  /**
   * @return string
   */
  public function getInactiveReason()
  {
    return $this->inactiveReason;
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
   * @param GoogleCloudMlV1StudyConfig
   */
  public function setStudyConfig(GoogleCloudMlV1StudyConfig $studyConfig)
  {
    $this->studyConfig = $studyConfig;
  }
  /**
   * @return GoogleCloudMlV1StudyConfig
   */
  public function getStudyConfig()
  {
    return $this->studyConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1Study::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Study');
