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

class AssistantApiCoreTypesAndroidAppInfoDelta extends \Google\Model
{
  protected $androidAppInfoType = AssistantApiCoreTypesAndroidAppInfo::class;
  protected $androidAppInfoDataType = '';
  /**
   * @var string
   */
  public $lastUpdateTimestamp;
  /**
   * @var string
   */
  public $updateType;

  /**
   * @param AssistantApiCoreTypesAndroidAppInfo
   */
  public function setAndroidAppInfo(AssistantApiCoreTypesAndroidAppInfo $androidAppInfo)
  {
    $this->androidAppInfo = $androidAppInfo;
  }
  /**
   * @return AssistantApiCoreTypesAndroidAppInfo
   */
  public function getAndroidAppInfo()
  {
    return $this->androidAppInfo;
  }
  /**
   * @param string
   */
  public function setLastUpdateTimestamp($lastUpdateTimestamp)
  {
    $this->lastUpdateTimestamp = $lastUpdateTimestamp;
  }
  /**
   * @return string
   */
  public function getLastUpdateTimestamp()
  {
    return $this->lastUpdateTimestamp;
  }
  /**
   * @param string
   */
  public function setUpdateType($updateType)
  {
    $this->updateType = $updateType;
  }
  /**
   * @return string
   */
  public function getUpdateType()
  {
    return $this->updateType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiCoreTypesAndroidAppInfoDelta::class, 'Google_Service_Contentwarehouse_AssistantApiCoreTypesAndroidAppInfoDelta');
