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

class AssistantLogsDeviceMediaSessionLog extends \Google\Collection
{
  protected $collection_key = 'supportedTransportControl';
  protected $deviceIdType = AssistantApiCoreTypesDeviceId::class;
  protected $deviceIdDataType = '';
  /**
   * @var string
   */
  public $mediaSessionType;
  /**
   * @var string
   */
  public $mediaType;
  /**
   * @var string
   */
  public $playbackState;
  /**
   * @var string
   */
  public $providerMid;
  /**
   * @var string[]
   */
  public $supportedTransportControl;

  /**
   * @param AssistantApiCoreTypesDeviceId
   */
  public function setDeviceId(AssistantApiCoreTypesDeviceId $deviceId)
  {
    $this->deviceId = $deviceId;
  }
  /**
   * @return AssistantApiCoreTypesDeviceId
   */
  public function getDeviceId()
  {
    return $this->deviceId;
  }
  /**
   * @param string
   */
  public function setMediaSessionType($mediaSessionType)
  {
    $this->mediaSessionType = $mediaSessionType;
  }
  /**
   * @return string
   */
  public function getMediaSessionType()
  {
    return $this->mediaSessionType;
  }
  /**
   * @param string
   */
  public function setMediaType($mediaType)
  {
    $this->mediaType = $mediaType;
  }
  /**
   * @return string
   */
  public function getMediaType()
  {
    return $this->mediaType;
  }
  /**
   * @param string
   */
  public function setPlaybackState($playbackState)
  {
    $this->playbackState = $playbackState;
  }
  /**
   * @return string
   */
  public function getPlaybackState()
  {
    return $this->playbackState;
  }
  /**
   * @param string
   */
  public function setProviderMid($providerMid)
  {
    $this->providerMid = $providerMid;
  }
  /**
   * @return string
   */
  public function getProviderMid()
  {
    return $this->providerMid;
  }
  /**
   * @param string[]
   */
  public function setSupportedTransportControl($supportedTransportControl)
  {
    $this->supportedTransportControl = $supportedTransportControl;
  }
  /**
   * @return string[]
   */
  public function getSupportedTransportControl()
  {
    return $this->supportedTransportControl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantLogsDeviceMediaSessionLog::class, 'Google_Service_Contentwarehouse_AssistantLogsDeviceMediaSessionLog');
