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

class AssistantVerticalsHomeautomationProtoHomeAutomationDeviceItem extends \Google\Collection
{
  protected $collection_key = 'matchedItemValue';
  protected $homeautomationMetadataType = AssistantVerticalsHomeautomationProtoHomeAutomationMetaData::class;
  protected $homeautomationMetadataDataType = '';
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
class_alias(AssistantVerticalsHomeautomationProtoHomeAutomationDeviceItem::class, 'Google_Service_Contentwarehouse_AssistantVerticalsHomeautomationProtoHomeAutomationDeviceItem');
