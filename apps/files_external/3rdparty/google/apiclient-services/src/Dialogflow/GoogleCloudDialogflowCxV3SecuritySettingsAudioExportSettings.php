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

class GoogleCloudDialogflowCxV3SecuritySettingsAudioExportSettings extends \Google\Model
{
  /**
   * @var string
   */
  public $audioExportPattern;
  /**
   * @var string
   */
  public $audioFormat;
  /**
   * @var bool
   */
  public $enableAudioRedaction;
  /**
   * @var string
   */
  public $gcsBucket;

  /**
   * @param string
   */
  public function setAudioExportPattern($audioExportPattern)
  {
    $this->audioExportPattern = $audioExportPattern;
  }
  /**
   * @return string
   */
  public function getAudioExportPattern()
  {
    return $this->audioExportPattern;
  }
  /**
   * @param string
   */
  public function setAudioFormat($audioFormat)
  {
    $this->audioFormat = $audioFormat;
  }
  /**
   * @return string
   */
  public function getAudioFormat()
  {
    return $this->audioFormat;
  }
  /**
   * @param bool
   */
  public function setEnableAudioRedaction($enableAudioRedaction)
  {
    $this->enableAudioRedaction = $enableAudioRedaction;
  }
  /**
   * @return bool
   */
  public function getEnableAudioRedaction()
  {
    return $this->enableAudioRedaction;
  }
  /**
   * @param string
   */
  public function setGcsBucket($gcsBucket)
  {
    $this->gcsBucket = $gcsBucket;
  }
  /**
   * @return string
   */
  public function getGcsBucket()
  {
    return $this->gcsBucket;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3SecuritySettingsAudioExportSettings::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SecuritySettingsAudioExportSettings');
