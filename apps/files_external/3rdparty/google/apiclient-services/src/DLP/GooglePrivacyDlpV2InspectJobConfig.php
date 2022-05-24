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

class GooglePrivacyDlpV2InspectJobConfig extends \Google\Collection
{
  protected $collection_key = 'actions';
  protected $actionsType = GooglePrivacyDlpV2Action::class;
  protected $actionsDataType = 'array';
  protected $inspectConfigType = GooglePrivacyDlpV2InspectConfig::class;
  protected $inspectConfigDataType = '';
  /**
   * @var string
   */
  public $inspectTemplateName;
  protected $storageConfigType = GooglePrivacyDlpV2StorageConfig::class;
  protected $storageConfigDataType = '';

  /**
   * @param GooglePrivacyDlpV2Action[]
   */
  public function setActions($actions)
  {
    $this->actions = $actions;
  }
  /**
   * @return GooglePrivacyDlpV2Action[]
   */
  public function getActions()
  {
    return $this->actions;
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
   * @param GooglePrivacyDlpV2StorageConfig
   */
  public function setStorageConfig(GooglePrivacyDlpV2StorageConfig $storageConfig)
  {
    $this->storageConfig = $storageConfig;
  }
  /**
   * @return GooglePrivacyDlpV2StorageConfig
   */
  public function getStorageConfig()
  {
    return $this->storageConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2InspectJobConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2InspectJobConfig');
