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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaAudience extends \Google\Collection
{
  protected $collection_key = 'filterClauses';
  /**
   * @var bool
   */
  public $adsPersonalizationEnabled;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  protected $eventTriggerType = GoogleAnalyticsAdminV1alphaAudienceEventTrigger::class;
  protected $eventTriggerDataType = '';
  /**
   * @var string
   */
  public $exclusionDurationMode;
  protected $filterClausesType = GoogleAnalyticsAdminV1alphaAudienceFilterClause::class;
  protected $filterClausesDataType = 'array';
  /**
   * @var int
   */
  public $membershipDurationDays;
  /**
   * @var string
   */
  public $name;

  /**
   * @param bool
   */
  public function setAdsPersonalizationEnabled($adsPersonalizationEnabled)
  {
    $this->adsPersonalizationEnabled = $adsPersonalizationEnabled;
  }
  /**
   * @return bool
   */
  public function getAdsPersonalizationEnabled()
  {
    return $this->adsPersonalizationEnabled;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
   * @param GoogleAnalyticsAdminV1alphaAudienceEventTrigger
   */
  public function setEventTrigger(GoogleAnalyticsAdminV1alphaAudienceEventTrigger $eventTrigger)
  {
    $this->eventTrigger = $eventTrigger;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAudienceEventTrigger
   */
  public function getEventTrigger()
  {
    return $this->eventTrigger;
  }
  /**
   * @param string
   */
  public function setExclusionDurationMode($exclusionDurationMode)
  {
    $this->exclusionDurationMode = $exclusionDurationMode;
  }
  /**
   * @return string
   */
  public function getExclusionDurationMode()
  {
    return $this->exclusionDurationMode;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaAudienceFilterClause[]
   */
  public function setFilterClauses($filterClauses)
  {
    $this->filterClauses = $filterClauses;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAudienceFilterClause[]
   */
  public function getFilterClauses()
  {
    return $this->filterClauses;
  }
  /**
   * @param int
   */
  public function setMembershipDurationDays($membershipDurationDays)
  {
    $this->membershipDurationDays = $membershipDurationDays;
  }
  /**
   * @return int
   */
  public function getMembershipDurationDays()
  {
    return $this->membershipDurationDays;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaAudience::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAudience');
