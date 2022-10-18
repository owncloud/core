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

class AssistantDevicesPlatformProtoExecutionConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $cloudEndpointName;
  /**
   * @var bool
   */
  public $cloudIntentTranslationDisabled;
  /**
   * @var string
   */
  public $intentCommandFormat;
  /**
   * @var bool
   */
  public $localDisabled;
  /**
   * @var string
   */
  public $localExecutionType;
  /**
   * @var bool
   */
  public $remoteDisabled;
  /**
   * @var string
   */
  public $remoteExecutionType;

  /**
   * @param string
   */
  public function setCloudEndpointName($cloudEndpointName)
  {
    $this->cloudEndpointName = $cloudEndpointName;
  }
  /**
   * @return string
   */
  public function getCloudEndpointName()
  {
    return $this->cloudEndpointName;
  }
  /**
   * @param bool
   */
  public function setCloudIntentTranslationDisabled($cloudIntentTranslationDisabled)
  {
    $this->cloudIntentTranslationDisabled = $cloudIntentTranslationDisabled;
  }
  /**
   * @return bool
   */
  public function getCloudIntentTranslationDisabled()
  {
    return $this->cloudIntentTranslationDisabled;
  }
  /**
   * @param string
   */
  public function setIntentCommandFormat($intentCommandFormat)
  {
    $this->intentCommandFormat = $intentCommandFormat;
  }
  /**
   * @return string
   */
  public function getIntentCommandFormat()
  {
    return $this->intentCommandFormat;
  }
  /**
   * @param bool
   */
  public function setLocalDisabled($localDisabled)
  {
    $this->localDisabled = $localDisabled;
  }
  /**
   * @return bool
   */
  public function getLocalDisabled()
  {
    return $this->localDisabled;
  }
  /**
   * @param string
   */
  public function setLocalExecutionType($localExecutionType)
  {
    $this->localExecutionType = $localExecutionType;
  }
  /**
   * @return string
   */
  public function getLocalExecutionType()
  {
    return $this->localExecutionType;
  }
  /**
   * @param bool
   */
  public function setRemoteDisabled($remoteDisabled)
  {
    $this->remoteDisabled = $remoteDisabled;
  }
  /**
   * @return bool
   */
  public function getRemoteDisabled()
  {
    return $this->remoteDisabled;
  }
  /**
   * @param string
   */
  public function setRemoteExecutionType($remoteExecutionType)
  {
    $this->remoteExecutionType = $remoteExecutionType;
  }
  /**
   * @return string
   */
  public function getRemoteExecutionType()
  {
    return $this->remoteExecutionType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantDevicesPlatformProtoExecutionConfig::class, 'Google_Service_Contentwarehouse_AssistantDevicesPlatformProtoExecutionConfig');
