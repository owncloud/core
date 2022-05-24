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

class GoogleCloudDialogflowCxV3AdvancedSettingsLoggingSettings extends \Google\Model
{
  /**
   * @var bool
   */
  public $enableInteractionLogging;
  /**
   * @var bool
   */
  public $enableStackdriverLogging;

  /**
   * @param bool
   */
  public function setEnableInteractionLogging($enableInteractionLogging)
  {
    $this->enableInteractionLogging = $enableInteractionLogging;
  }
  /**
   * @return bool
   */
  public function getEnableInteractionLogging()
  {
    return $this->enableInteractionLogging;
  }
  /**
   * @param bool
   */
  public function setEnableStackdriverLogging($enableStackdriverLogging)
  {
    $this->enableStackdriverLogging = $enableStackdriverLogging;
  }
  /**
   * @return bool
   */
  public function getEnableStackdriverLogging()
  {
    return $this->enableStackdriverLogging;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3AdvancedSettingsLoggingSettings::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3AdvancedSettingsLoggingSettings');
