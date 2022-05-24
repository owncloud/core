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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3SecuritySettings extends \Google\Collection
{
  protected $collection_key = 'purgeDataTypes';
  /**
   * @var string
   */
  public $deidentifyTemplate;
  /**
   * @var string
   */
  public $displayName;
  protected $insightsExportSettingsType = GoogleCloudDialogflowCxV3SecuritySettingsInsightsExportSettings::class;
  protected $insightsExportSettingsDataType = '';
  /**
   * @var string
   */
  public $inspectTemplate;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $purgeDataTypes;
  /**
   * @var string
   */
  public $redactionScope;
  /**
   * @var string
   */
  public $redactionStrategy;
  /**
   * @var int
   */
  public $retentionWindowDays;

  /**
   * @param string
   */
  public function setDeidentifyTemplate($deidentifyTemplate)
  {
    $this->deidentifyTemplate = $deidentifyTemplate;
  }
  /**
   * @return string
   */
  public function getDeidentifyTemplate()
  {
    return $this->deidentifyTemplate;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param GoogleCloudDialogflowCxV3SecuritySettingsInsightsExportSettings
   */
  public function setInsightsExportSettings(GoogleCloudDialogflowCxV3SecuritySettingsInsightsExportSettings $insightsExportSettings)
  {
    $this->insightsExportSettings = $insightsExportSettings;
  }
  /**
   * @return GoogleCloudDialogflowCxV3SecuritySettingsInsightsExportSettings
   */
  public function getInsightsExportSettings()
  {
    return $this->insightsExportSettings;
  }
  /**
   * @param string
   */
  public function setInspectTemplate($inspectTemplate)
  {
    $this->inspectTemplate = $inspectTemplate;
  }
  /**
   * @return string
   */
  public function getInspectTemplate()
  {
    return $this->inspectTemplate;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setPurgeDataTypes($purgeDataTypes)
  {
    $this->purgeDataTypes = $purgeDataTypes;
  }
  /**
   * @return string[]
   */
  public function getPurgeDataTypes()
  {
    return $this->purgeDataTypes;
  }
  /**
   * @param string
   */
  public function setRedactionScope($redactionScope)
  {
    $this->redactionScope = $redactionScope;
  }
  /**
   * @return string
   */
  public function getRedactionScope()
  {
    return $this->redactionScope;
  }
  /**
   * @param string
   */
  public function setRedactionStrategy($redactionStrategy)
  {
    $this->redactionStrategy = $redactionStrategy;
  }
  /**
   * @return string
   */
  public function getRedactionStrategy()
  {
    return $this->redactionStrategy;
  }
  /**
   * @param int
   */
  public function setRetentionWindowDays($retentionWindowDays)
  {
    $this->retentionWindowDays = $retentionWindowDays;
  }
  /**
   * @return int
   */
  public function getRetentionWindowDays()
  {
    return $this->retentionWindowDays;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3SecuritySettings::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SecuritySettings');
