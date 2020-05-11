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

class Google_Service_DLP_GooglePrivacyDlpV2RedactImageRequest extends Google_Collection
{
  protected $collection_key = 'imageRedactionConfigs';
  protected $byteItemType = 'Google_Service_DLP_GooglePrivacyDlpV2ByteContentItem';
  protected $byteItemDataType = '';
  protected $imageRedactionConfigsType = 'Google_Service_DLP_GooglePrivacyDlpV2ImageRedactionConfig';
  protected $imageRedactionConfigsDataType = 'array';
  public $includeFindings;
  protected $inspectConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2InspectConfig';
  protected $inspectConfigDataType = '';
  public $locationId;

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2ByteContentItem
   */
  public function setByteItem(Google_Service_DLP_GooglePrivacyDlpV2ByteContentItem $byteItem)
  {
    $this->byteItem = $byteItem;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2ByteContentItem
   */
  public function getByteItem()
  {
    return $this->byteItem;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2ImageRedactionConfig
   */
  public function setImageRedactionConfigs($imageRedactionConfigs)
  {
    $this->imageRedactionConfigs = $imageRedactionConfigs;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2ImageRedactionConfig
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
   * @param Google_Service_DLP_GooglePrivacyDlpV2InspectConfig
   */
  public function setInspectConfig(Google_Service_DLP_GooglePrivacyDlpV2InspectConfig $inspectConfig)
  {
    $this->inspectConfig = $inspectConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2InspectConfig
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
