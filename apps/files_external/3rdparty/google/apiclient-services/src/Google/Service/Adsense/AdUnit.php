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

class Google_Service_Adsense_AdUnit extends Google_Model
{
  protected $contentAdsSettingsType = 'Google_Service_Adsense_ContentAdsSettings';
  protected $contentAdsSettingsDataType = '';
  public $displayName;
  public $name;
  public $reportingDimensionId;
  public $state;

  /**
   * @param Google_Service_Adsense_ContentAdsSettings
   */
  public function setContentAdsSettings(Google_Service_Adsense_ContentAdsSettings $contentAdsSettings)
  {
    $this->contentAdsSettings = $contentAdsSettings;
  }
  /**
   * @return Google_Service_Adsense_ContentAdsSettings
   */
  public function getContentAdsSettings()
  {
    return $this->contentAdsSettings;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setReportingDimensionId($reportingDimensionId)
  {
    $this->reportingDimensionId = $reportingDimensionId;
  }
  public function getReportingDimensionId()
  {
    return $this->reportingDimensionId;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
