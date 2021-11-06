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
  public $deidentifyTemplate;
  public $displayName;
  protected $insightsExportSettingsType = GoogleCloudDialogflowCxV3SecuritySettingsInsightsExportSettings::class;
  protected $insightsExportSettingsDataType = '';
  public $inspectTemplate;
  public $name;
  public $purgeDataTypes;
  public $redactionScope;
  public $redactionStrategy;
  public $retentionWindowDays;

  public function setDeidentifyTemplate($deidentifyTemplate)
  {
    $this->deidentifyTemplate = $deidentifyTemplate;
  }
  public function getDeidentifyTemplate()
  {
    return $this->deidentifyTemplate;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
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
  public function setInspectTemplate($inspectTemplate)
  {
    $this->inspectTemplate = $inspectTemplate;
  }
  public function getInspectTemplate()
  {
    return $this->inspectTemplate;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPurgeDataTypes($purgeDataTypes)
  {
    $this->purgeDataTypes = $purgeDataTypes;
  }
  public function getPurgeDataTypes()
  {
    return $this->purgeDataTypes;
  }
  public function setRedactionScope($redactionScope)
  {
    $this->redactionScope = $redactionScope;
  }
  public function getRedactionScope()
  {
    return $this->redactionScope;
  }
  public function setRedactionStrategy($redactionStrategy)
  {
    $this->redactionStrategy = $redactionStrategy;
  }
  public function getRedactionStrategy()
  {
    return $this->redactionStrategy;
  }
  public function setRetentionWindowDays($retentionWindowDays)
  {
    $this->retentionWindowDays = $retentionWindowDays;
  }
  public function getRetentionWindowDays()
  {
    return $this->retentionWindowDays;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3SecuritySettings::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SecuritySettings');
