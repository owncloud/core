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

class AssistantLogsAmbiguousTargetDeviceLogPuntInfoLog extends \Google\Collection
{
  protected $collection_key = 'deviceIndex';
  /**
   * @var int[]
   */
  public $deviceIndex;
  /**
   * @var int
   */
  public $mediaExcuse;
  /**
   * @var string
   */
  public $providerMid;

  /**
   * @param int[]
   */
  public function setDeviceIndex($deviceIndex)
  {
    $this->deviceIndex = $deviceIndex;
  }
  /**
   * @return int[]
   */
  public function getDeviceIndex()
  {
    return $this->deviceIndex;
  }
  /**
   * @param int
   */
  public function setMediaExcuse($mediaExcuse)
  {
    $this->mediaExcuse = $mediaExcuse;
  }
  /**
   * @return int
   */
  public function getMediaExcuse()
  {
    return $this->mediaExcuse;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantLogsAmbiguousTargetDeviceLogPuntInfoLog::class, 'Google_Service_Contentwarehouse_AssistantLogsAmbiguousTargetDeviceLogPuntInfoLog');
