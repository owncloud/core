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

namespace Google\Service\DisplayVideo;

class CmHybridConfig extends \Google\Collection
{
  protected $collection_key = 'cmSyncableSiteIds';
  public $cmAccountId;
  public $cmFloodlightConfigId;
  public $cmFloodlightLinkingAuthorized;
  public $cmSyncableSiteIds;
  public $dv360ToCmCostReportingEnabled;
  public $dv360ToCmDataSharingEnabled;

  public function setCmAccountId($cmAccountId)
  {
    $this->cmAccountId = $cmAccountId;
  }
  public function getCmAccountId()
  {
    return $this->cmAccountId;
  }
  public function setCmFloodlightConfigId($cmFloodlightConfigId)
  {
    $this->cmFloodlightConfigId = $cmFloodlightConfigId;
  }
  public function getCmFloodlightConfigId()
  {
    return $this->cmFloodlightConfigId;
  }
  public function setCmFloodlightLinkingAuthorized($cmFloodlightLinkingAuthorized)
  {
    $this->cmFloodlightLinkingAuthorized = $cmFloodlightLinkingAuthorized;
  }
  public function getCmFloodlightLinkingAuthorized()
  {
    return $this->cmFloodlightLinkingAuthorized;
  }
  public function setCmSyncableSiteIds($cmSyncableSiteIds)
  {
    $this->cmSyncableSiteIds = $cmSyncableSiteIds;
  }
  public function getCmSyncableSiteIds()
  {
    return $this->cmSyncableSiteIds;
  }
  public function setDv360ToCmCostReportingEnabled($dv360ToCmCostReportingEnabled)
  {
    $this->dv360ToCmCostReportingEnabled = $dv360ToCmCostReportingEnabled;
  }
  public function getDv360ToCmCostReportingEnabled()
  {
    return $this->dv360ToCmCostReportingEnabled;
  }
  public function setDv360ToCmDataSharingEnabled($dv360ToCmDataSharingEnabled)
  {
    $this->dv360ToCmDataSharingEnabled = $dv360ToCmDataSharingEnabled;
  }
  public function getDv360ToCmDataSharingEnabled()
  {
    return $this->dv360ToCmDataSharingEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CmHybridConfig::class, 'Google_Service_DisplayVideo_CmHybridConfig');
