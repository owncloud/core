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

class AssistantVerticalsHomeautomationProtoHomeAutomationDevice extends \Google\Collection
{
  protected $collection_key = 'matchedItemValue';
  protected $deviceSelectionLogType = AssistantLogsDeviceSelectionLog::class;
  protected $deviceSelectionLogDataType = '';
  protected $dtoErrorType = AssistantDeviceTargetingDeviceTargetingError::class;
  protected $dtoErrorDataType = '';
  protected $dtoQueryInfoType = AssistantVerticalsHomeautomationProtoDeviceTargetingOutputQueryInfo::class;
  protected $dtoQueryInfoDataType = '';
  protected $homeautomationMetadataType = AssistantVerticalsHomeautomationProtoHomeAutomationMetaData::class;
  protected $homeautomationMetadataDataType = '';
  protected $listType = AssistantVerticalsHomeautomationProtoHomeAutomationDeviceItem::class;
  protected $listDataType = 'array';
  /**
   * @var string
   */
  public $matchedItemKey;
  /**
   * @var string
   */
  public $matchedItemRawvalue;
  /**
   * @var string[]
   */
  public $matchedItemValue;

  /**
   * @param AssistantLogsDeviceSelectionLog
   */
  public function setDeviceSelectionLog(AssistantLogsDeviceSelectionLog $deviceSelectionLog)
  {
    $this->deviceSelectionLog = $deviceSelectionLog;
  }
  /**
   * @return AssistantLogsDeviceSelectionLog
   */
  public function getDeviceSelectionLog()
  {
    return $this->deviceSelectionLog;
  }
  /**
   * @param AssistantDeviceTargetingDeviceTargetingError
   */
  public function setDtoError(AssistantDeviceTargetingDeviceTargetingError $dtoError)
  {
    $this->dtoError = $dtoError;
  }
  /**
   * @return AssistantDeviceTargetingDeviceTargetingError
   */
  public function getDtoError()
  {
    return $this->dtoError;
  }
  /**
   * @param AssistantVerticalsHomeautomationProtoDeviceTargetingOutputQueryInfo
   */
  public function setDtoQueryInfo(AssistantVerticalsHomeautomationProtoDeviceTargetingOutputQueryInfo $dtoQueryInfo)
  {
    $this->dtoQueryInfo = $dtoQueryInfo;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoDeviceTargetingOutputQueryInfo
   */
  public function getDtoQueryInfo()
  {
    return $this->dtoQueryInfo;
  }
  /**
   * @param AssistantVerticalsHomeautomationProtoHomeAutomationMetaData
   */
  public function setHomeautomationMetadata(AssistantVerticalsHomeautomationProtoHomeAutomationMetaData $homeautomationMetadata)
  {
    $this->homeautomationMetadata = $homeautomationMetadata;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoHomeAutomationMetaData
   */
  public function getHomeautomationMetadata()
  {
    return $this->homeautomationMetadata;
  }
  /**
   * @param AssistantVerticalsHomeautomationProtoHomeAutomationDeviceItem[]
   */
  public function setList($list)
  {
    $this->list = $list;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoHomeAutomationDeviceItem[]
   */
  public function getList()
  {
    return $this->list;
  }
  /**
   * @param string
   */
  public function setMatchedItemKey($matchedItemKey)
  {
    $this->matchedItemKey = $matchedItemKey;
  }
  /**
   * @return string
   */
  public function getMatchedItemKey()
  {
    return $this->matchedItemKey;
  }
  /**
   * @param string
   */
  public function setMatchedItemRawvalue($matchedItemRawvalue)
  {
    $this->matchedItemRawvalue = $matchedItemRawvalue;
  }
  /**
   * @return string
   */
  public function getMatchedItemRawvalue()
  {
    return $this->matchedItemRawvalue;
  }
  /**
   * @param string[]
   */
  public function setMatchedItemValue($matchedItemValue)
  {
    $this->matchedItemValue = $matchedItemValue;
  }
  /**
   * @return string[]
   */
  public function getMatchedItemValue()
  {
    return $this->matchedItemValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantVerticalsHomeautomationProtoHomeAutomationDevice::class, 'Google_Service_Contentwarehouse_AssistantVerticalsHomeautomationProtoHomeAutomationDevice');
