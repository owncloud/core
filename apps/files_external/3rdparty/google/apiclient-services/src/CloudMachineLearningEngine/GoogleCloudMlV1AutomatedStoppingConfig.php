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

class GoogleCloudMlV1AutomatedStoppingConfig extends \Google\Model
{
  protected $decayCurveStoppingConfigType = GoogleCloudMlV1AutomatedStoppingConfigDecayCurveAutomatedStoppingConfig::class;
  protected $decayCurveStoppingConfigDataType = '';
  protected $medianAutomatedStoppingConfigType = GoogleCloudMlV1AutomatedStoppingConfigMedianAutomatedStoppingConfig::class;
  protected $medianAutomatedStoppingConfigDataType = '';

  /**
   * @param GoogleCloudMlV1AutomatedStoppingConfigDecayCurveAutomatedStoppingConfig
   */
  public function setDecayCurveStoppingConfig(GoogleCloudMlV1AutomatedStoppingConfigDecayCurveAutomatedStoppingConfig $decayCurveStoppingConfig)
  {
    $this->decayCurveStoppingConfig = $decayCurveStoppingConfig;
  }
  /**
   * @return GoogleCloudMlV1AutomatedStoppingConfigDecayCurveAutomatedStoppingConfig
   */
  public function getDecayCurveStoppingConfig()
  {
    return $this->decayCurveStoppingConfig;
  }
  /**
   * @param GoogleCloudMlV1AutomatedStoppingConfigMedianAutomatedStoppingConfig
   */
  public function setMedianAutomatedStoppingConfig(GoogleCloudMlV1AutomatedStoppingConfigMedianAutomatedStoppingConfig $medianAutomatedStoppingConfig)
  {
    $this->medianAutomatedStoppingConfig = $medianAutomatedStoppingConfig;
  }
  /**
   * @return GoogleCloudMlV1AutomatedStoppingConfigMedianAutomatedStoppingConfig
   */
  public function getMedianAutomatedStoppingConfig()
  {
    return $this->medianAutomatedStoppingConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1AutomatedStoppingConfig::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AutomatedStoppingConfig');
