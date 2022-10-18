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

class AssistantLogsLumosProcessorInfo extends \Google\Model
{
  /**
   * @var int
   */
  public $devicesAfterRun;
  /**
   * @var int
   */
  public $devicesBeforeRun;
  /**
   * @var string
   */
  public $processorName;

  /**
   * @param int
   */
  public function setDevicesAfterRun($devicesAfterRun)
  {
    $this->devicesAfterRun = $devicesAfterRun;
  }
  /**
   * @return int
   */
  public function getDevicesAfterRun()
  {
    return $this->devicesAfterRun;
  }
  /**
   * @param int
   */
  public function setDevicesBeforeRun($devicesBeforeRun)
  {
    $this->devicesBeforeRun = $devicesBeforeRun;
  }
  /**
   * @return int
   */
  public function getDevicesBeforeRun()
  {
    return $this->devicesBeforeRun;
  }
  /**
   * @param string
   */
  public function setProcessorName($processorName)
  {
    $this->processorName = $processorName;
  }
  /**
   * @return string
   */
  public function getProcessorName()
  {
    return $this->processorName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantLogsLumosProcessorInfo::class, 'Google_Service_Contentwarehouse_AssistantLogsLumosProcessorInfo');
