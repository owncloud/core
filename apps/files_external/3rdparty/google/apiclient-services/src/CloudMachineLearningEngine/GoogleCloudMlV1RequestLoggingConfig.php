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

class GoogleCloudMlV1RequestLoggingConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $bigqueryTableName;
  public $samplingPercentage;

  /**
   * @param string
   */
  public function setBigqueryTableName($bigqueryTableName)
  {
    $this->bigqueryTableName = $bigqueryTableName;
  }
  /**
   * @return string
   */
  public function getBigqueryTableName()
  {
    return $this->bigqueryTableName;
  }
  public function setSamplingPercentage($samplingPercentage)
  {
    $this->samplingPercentage = $samplingPercentage;
  }
  public function getSamplingPercentage()
  {
    return $this->samplingPercentage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1RequestLoggingConfig::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1RequestLoggingConfig');
