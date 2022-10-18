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

class AssistantVerticalsHomeautomationProtoDeviceTargetingOutputQueryInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $annotatedSpanDevice;
  /**
   * @var string
   */
  public $annotatedSpanRoom;
  /**
   * @var string
   */
  public $annotatedSpanStructure;
  /**
   * @var string
   */
  public $processedMentionedSpan;

  /**
   * @param string
   */
  public function setAnnotatedSpanDevice($annotatedSpanDevice)
  {
    $this->annotatedSpanDevice = $annotatedSpanDevice;
  }
  /**
   * @return string
   */
  public function getAnnotatedSpanDevice()
  {
    return $this->annotatedSpanDevice;
  }
  /**
   * @param string
   */
  public function setAnnotatedSpanRoom($annotatedSpanRoom)
  {
    $this->annotatedSpanRoom = $annotatedSpanRoom;
  }
  /**
   * @return string
   */
  public function getAnnotatedSpanRoom()
  {
    return $this->annotatedSpanRoom;
  }
  /**
   * @param string
   */
  public function setAnnotatedSpanStructure($annotatedSpanStructure)
  {
    $this->annotatedSpanStructure = $annotatedSpanStructure;
  }
  /**
   * @return string
   */
  public function getAnnotatedSpanStructure()
  {
    return $this->annotatedSpanStructure;
  }
  /**
   * @param string
   */
  public function setProcessedMentionedSpan($processedMentionedSpan)
  {
    $this->processedMentionedSpan = $processedMentionedSpan;
  }
  /**
   * @return string
   */
  public function getProcessedMentionedSpan()
  {
    return $this->processedMentionedSpan;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantVerticalsHomeautomationProtoDeviceTargetingOutputQueryInfo::class, 'Google_Service_Contentwarehouse_AssistantVerticalsHomeautomationProtoDeviceTargetingOutputQueryInfo');
