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

class GoogleCloudMlV1CheckTrialEarlyStoppingStateMetatdata extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $study;
  /**
   * @var string
   */
  public $trial;

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
  public function setStudy($study)
  {
    $this->study = $study;
  }
  /**
   * @return string
   */
  public function getStudy()
  {
    return $this->study;
  }
  /**
   * @param string
   */
  public function setTrial($trial)
  {
    $this->trial = $trial;
  }
  /**
   * @return string
   */
  public function getTrial()
  {
    return $this->trial;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1CheckTrialEarlyStoppingStateMetatdata::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1CheckTrialEarlyStoppingStateMetatdata');
