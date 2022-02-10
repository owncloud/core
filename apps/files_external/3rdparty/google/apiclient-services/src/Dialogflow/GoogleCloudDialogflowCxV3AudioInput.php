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

class GoogleCloudDialogflowCxV3AudioInput extends \Google\Model
{
  /**
   * @var string
   */
  public $audio;
  protected $configType = GoogleCloudDialogflowCxV3InputAudioConfig::class;
  protected $configDataType = '';

  /**
   * @param string
   */
  public function setAudio($audio)
  {
    $this->audio = $audio;
  }
  /**
   * @return string
   */
  public function getAudio()
  {
    return $this->audio;
  }
  /**
   * @param GoogleCloudDialogflowCxV3InputAudioConfig
   */
  public function setConfig(GoogleCloudDialogflowCxV3InputAudioConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return GoogleCloudDialogflowCxV3InputAudioConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3AudioInput::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3AudioInput');
