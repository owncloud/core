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

class GooglePrivacyDlpV2DeidentifyContentRequest extends \Google\Model
{
  protected $deidentifyConfigType = GooglePrivacyDlpV2DeidentifyConfig::class;
  protected $deidentifyConfigDataType = '';
  /**
   * @var string
   */
  public $deidentifyTemplateName;
  protected $inspectConfigType = GooglePrivacyDlpV2InspectConfig::class;
  protected $inspectConfigDataType = '';
  /**
   * @var string
   */
  public $inspectTemplateName;
  protected $itemType = GooglePrivacyDlpV2ContentItem::class;
  protected $itemDataType = '';
  /**
   * @var string
   */
  public $locationId;

  /**
   * @param GooglePrivacyDlpV2DeidentifyConfig
   */
  public function setDeidentifyConfig(GooglePrivacyDlpV2DeidentifyConfig $deidentifyConfig)
  {
    $this->deidentifyConfig = $deidentifyConfig;
  }
  /**
   * @return GooglePrivacyDlpV2DeidentifyConfig
   */
  public function getDeidentifyConfig()
  {
    return $this->deidentifyConfig;
  }
  /**
   * @param string
   */
  public function setDeidentifyTemplateName($deidentifyTemplateName)
  {
    $this->deidentifyTemplateName = $deidentifyTemplateName;
  }
  /**
   * @return string
   */
  public function getDeidentifyTemplateName()
  {
    return $this->deidentifyTemplateName;
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
  /**
   * @param string
   */
  public function setInspectTemplateName($inspectTemplateName)
  {
    $this->inspectTemplateName = $inspectTemplateName;
  }
  /**
   * @return string
   */
  public function getInspectTemplateName()
  {
    return $this->inspectTemplateName;
  }
  /**
   * @param GooglePrivacyDlpV2ContentItem
   */
  public function setItem(GooglePrivacyDlpV2ContentItem $item)
  {
    $this->item = $item;
  }
  /**
   * @return GooglePrivacyDlpV2ContentItem
   */
  public function getItem()
  {
    return $this->item;
  }
  /**
   * @param string
   */
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  /**
   * @return string
   */
  public function getLocationId()
  {
    return $this->locationId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2DeidentifyContentRequest::class, 'Google_Service_DLP_GooglePrivacyDlpV2DeidentifyContentRequest');
