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

class Google_Service_DisplayVideo_AudienceGroupAssignedTargetingOptionDetails extends Google_Collection
{
  protected $collection_key = 'includedFirstAndThirdPartyAudienceGroups';
  protected $excludedFirstAndThirdPartyAudienceGroupType = 'Google_Service_DisplayVideo_FirstAndThirdPartyAudienceGroup';
  protected $excludedFirstAndThirdPartyAudienceGroupDataType = '';
  protected $excludedGoogleAudienceGroupType = 'Google_Service_DisplayVideo_GoogleAudienceGroup';
  protected $excludedGoogleAudienceGroupDataType = '';
  protected $includedCombinedAudienceGroupType = 'Google_Service_DisplayVideo_CombinedAudienceGroup';
  protected $includedCombinedAudienceGroupDataType = '';
  protected $includedCustomListGroupType = 'Google_Service_DisplayVideo_CustomListGroup';
  protected $includedCustomListGroupDataType = '';
  protected $includedFirstAndThirdPartyAudienceGroupsType = 'Google_Service_DisplayVideo_FirstAndThirdPartyAudienceGroup';
  protected $includedFirstAndThirdPartyAudienceGroupsDataType = 'array';
  protected $includedGoogleAudienceGroupType = 'Google_Service_DisplayVideo_GoogleAudienceGroup';
  protected $includedGoogleAudienceGroupDataType = '';

  /**
   * @param Google_Service_DisplayVideo_FirstAndThirdPartyAudienceGroup
   */
  public function setExcludedFirstAndThirdPartyAudienceGroup(Google_Service_DisplayVideo_FirstAndThirdPartyAudienceGroup $excludedFirstAndThirdPartyAudienceGroup)
  {
    $this->excludedFirstAndThirdPartyAudienceGroup = $excludedFirstAndThirdPartyAudienceGroup;
  }
  /**
   * @return Google_Service_DisplayVideo_FirstAndThirdPartyAudienceGroup
   */
  public function getExcludedFirstAndThirdPartyAudienceGroup()
  {
    return $this->excludedFirstAndThirdPartyAudienceGroup;
  }
  /**
   * @param Google_Service_DisplayVideo_GoogleAudienceGroup
   */
  public function setExcludedGoogleAudienceGroup(Google_Service_DisplayVideo_GoogleAudienceGroup $excludedGoogleAudienceGroup)
  {
    $this->excludedGoogleAudienceGroup = $excludedGoogleAudienceGroup;
  }
  /**
   * @return Google_Service_DisplayVideo_GoogleAudienceGroup
   */
  public function getExcludedGoogleAudienceGroup()
  {
    return $this->excludedGoogleAudienceGroup;
  }
  /**
   * @param Google_Service_DisplayVideo_CombinedAudienceGroup
   */
  public function setIncludedCombinedAudienceGroup(Google_Service_DisplayVideo_CombinedAudienceGroup $includedCombinedAudienceGroup)
  {
    $this->includedCombinedAudienceGroup = $includedCombinedAudienceGroup;
  }
  /**
   * @return Google_Service_DisplayVideo_CombinedAudienceGroup
   */
  public function getIncludedCombinedAudienceGroup()
  {
    return $this->includedCombinedAudienceGroup;
  }
  /**
   * @param Google_Service_DisplayVideo_CustomListGroup
   */
  public function setIncludedCustomListGroup(Google_Service_DisplayVideo_CustomListGroup $includedCustomListGroup)
  {
    $this->includedCustomListGroup = $includedCustomListGroup;
  }
  /**
   * @return Google_Service_DisplayVideo_CustomListGroup
   */
  public function getIncludedCustomListGroup()
  {
    return $this->includedCustomListGroup;
  }
  /**
   * @param Google_Service_DisplayVideo_FirstAndThirdPartyAudienceGroup[]
   */
  public function setIncludedFirstAndThirdPartyAudienceGroups($includedFirstAndThirdPartyAudienceGroups)
  {
    $this->includedFirstAndThirdPartyAudienceGroups = $includedFirstAndThirdPartyAudienceGroups;
  }
  /**
   * @return Google_Service_DisplayVideo_FirstAndThirdPartyAudienceGroup[]
   */
  public function getIncludedFirstAndThirdPartyAudienceGroups()
  {
    return $this->includedFirstAndThirdPartyAudienceGroups;
  }
  /**
   * @param Google_Service_DisplayVideo_GoogleAudienceGroup
   */
  public function setIncludedGoogleAudienceGroup(Google_Service_DisplayVideo_GoogleAudienceGroup $includedGoogleAudienceGroup)
  {
    $this->includedGoogleAudienceGroup = $includedGoogleAudienceGroup;
  }
  /**
   * @return Google_Service_DisplayVideo_GoogleAudienceGroup
   */
  public function getIncludedGoogleAudienceGroup()
  {
    return $this->includedGoogleAudienceGroup;
  }
}
