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

namespace Google\Service\Contentwarehouse;

class AssistantLogsDefaultDeviceLog extends \Google\Model
{
  protected $defaultSpeakerType = AssistantLogsDeviceInfoLog::class;
  protected $defaultSpeakerDataType = '';
  protected $defaultTvType = AssistantLogsDeviceInfoLog::class;
  protected $defaultTvDataType = '';
  /**
   * @var string
   */
  public $sourceDeviceId;

  /**
   * @param AssistantLogsDeviceInfoLog
   */
  public function setDefaultSpeaker(AssistantLogsDeviceInfoLog $defaultSpeaker)
  {
    $this->defaultSpeaker = $defaultSpeaker;
  }
  /**
   * @return AssistantLogsDeviceInfoLog
   */
  public function getDefaultSpeaker()
  {
    return $this->defaultSpeaker;
  }
  /**
   * @param AssistantLogsDeviceInfoLog
   */
  public function setDefaultTv(AssistantLogsDeviceInfoLog $defaultTv)
  {
    $this->defaultTv = $defaultTv;
  }
  /**
   * @return AssistantLogsDeviceInfoLog
   */
  public function getDefaultTv()
  {
    return $this->defaultTv;
  }
  /**
   * @param string
   */
  public function setSourceDeviceId($sourceDeviceId)
  {
    $this->sourceDeviceId = $sourceDeviceId;
  }
  /**
   * @return string
   */
  public function getSourceDeviceId()
  {
    return $this->sourceDeviceId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantLogsDefaultDeviceLog::class, 'Google_Service_Contentwarehouse_AssistantLogsDefaultDeviceLog');
