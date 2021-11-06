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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2RedactImageRequest extends \Google\Collection
{
  protected $collection_key = 'imageRedactionConfigs';
  protected $byteItemType = GooglePrivacyDlpV2ByteContentItem::class;
  protected $byteItemDataType = '';
  protected $imageRedactionConfigsType = GooglePrivacyDlpV2ImageRedactionConfig::class;
  protected $imageRedactionConfigsDataType = 'array';
  public $includeFindings;
  protected $inspectConfigType = GooglePrivacyDlpV2InspectConfig::class;
  protected $inspectConfigDataType = '';
  public $locationId;

  /**
   * @param GooglePrivacyDlpV2ByteContentItem
   */
  public function setByteItem(GooglePrivacyDlpV2ByteContentItem $byteItem)
  {
    $this->byteItem = $byteItem;
  }
  /**
   * @return GooglePrivacyDlpV2ByteContentItem
   */
  public function getByteItem()
  {
    return $this->byteItem;
  }
  /**
   * @param GooglePrivacyDlpV2ImageRedactionConfig[]
   */
  public function setImageRedactionConfigs($imageRedactionConfigs)
  {
    $this->imageRedactionConfigs = $imageRedactionConfigs;
  }
  /**
   * @return GooglePrivacyDlpV2ImageRedactionConfig[]
   */
  public function getImageRedactionConfigs()
  {
    return $this->imageRedactionConfigs;
  }
  public function setIncludeFindings($includeFindings)
  {
    $this->includeFindings = $includeFindings;
  }
  public function getIncludeFindings()
  {
    return $this->includeFindings;
  }
  /**
   * @param GooglePrivacyDlpV2InspectConfig
   */
  public function setInspectConfig(GooglePrivacyDlpV2InspectConfig $inspectConfig)
  {
    $this->inspectConfig = $inspectConfig;
  }
  /**
   * @return GooglePrivacyDlpV2InspectConfig
   */
  public function getInspectConfig()
  {
    return $this->inspectConfig;
  }
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  public function getLocationId()
  {
    return $this->locationId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2RedactImageRequest::class, 'Google_Service_DLP_GooglePrivacyDlpV2RedactImageRequest');
