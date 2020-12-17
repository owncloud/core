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

class Google_Service_DLP_GooglePrivacyDlpV2InspectJobConfig extends Google_Collection
{
  protected $collection_key = 'actions';
  protected $actionsType = 'Google_Service_DLP_GooglePrivacyDlpV2Action';
  protected $actionsDataType = 'array';
  protected $inspectConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2InspectConfig';
  protected $inspectConfigDataType = '';
  public $inspectTemplateName;
  protected $storageConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2StorageConfig';
  protected $storageConfigDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Action[]
   */
  public function setActions($actions)
  {
    $this->actions = $actions;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Action[]
   */
  public function getActions()
  {
    return $this->actions;
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
  public function setInspectTemplateName($inspectTemplateName)
  {
    $this->inspectTemplateName = $inspectTemplateName;
  }
  public function getInspectTemplateName()
  {
    return $this->inspectTemplateName;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2StorageConfig
   */
  public function setStorageConfig(Google_Service_DLP_GooglePrivacyDlpV2StorageConfig $storageConfig)
  {
    $this->storageConfig = $storageConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2StorageConfig
   */
  public function getStorageConfig()
  {
    return $this->storageConfig;
  }
}
