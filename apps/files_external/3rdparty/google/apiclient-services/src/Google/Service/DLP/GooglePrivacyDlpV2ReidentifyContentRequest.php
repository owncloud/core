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

class Google_Service_DLP_GooglePrivacyDlpV2ReidentifyContentRequest extends Google_Model
{
  protected $inspectConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2InspectConfig';
  protected $inspectConfigDataType = '';
  public $inspectTemplateName;
  protected $itemType = 'Google_Service_DLP_GooglePrivacyDlpV2ContentItem';
  protected $itemDataType = '';
  public $locationId;
  protected $reidentifyConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2DeidentifyConfig';
  protected $reidentifyConfigDataType = '';
  public $reidentifyTemplateName;

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
  public function setInspectTemplateName($inspectTemplateName)
  {
    $this->inspectTemplateName = $inspectTemplateName;
  }
  public function getInspectTemplateName()
  {
    return $this->inspectTemplateName;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2ContentItem
   */
  public function setItem(Google_Service_DLP_GooglePrivacyDlpV2ContentItem $item)
  {
    $this->item = $item;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2ContentItem
   */
  public function getItem()
  {
    return $this->item;
  }
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  public function getLocationId()
  {
    return $this->locationId;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2DeidentifyConfig
   */
  public function setReidentifyConfig(Google_Service_DLP_GooglePrivacyDlpV2DeidentifyConfig $reidentifyConfig)
  {
    $this->reidentifyConfig = $reidentifyConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2DeidentifyConfig
   */
  public function getReidentifyConfig()
  {
    return $this->reidentifyConfig;
  }
  public function setReidentifyTemplateName($reidentifyTemplateName)
  {
    $this->reidentifyTemplateName = $reidentifyTemplateName;
  }
  public function getReidentifyTemplateName()
  {
    return $this->reidentifyTemplateName;
  }
}
