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

class AuditAdvertiserResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $adGroupCriteriaCount;
  /**
   * @var string
   */
  public $campaignCriteriaCount;
  /**
   * @var string
   */
  public $channelsCount;
  /**
   * @var string
   */
  public $negativeKeywordListsCount;
  /**
   * @var string
   */
  public $negativelyTargetedChannelsCount;
  /**
   * @var string
   */
  public $usedCampaignsCount;
  /**
   * @var string
   */
  public $usedInsertionOrdersCount;
  /**
   * @var string
   */
  public $usedLineItemsCount;

  /**
   * @param string
   */
  public function setAdGroupCriteriaCount($adGroupCriteriaCount)
  {
    $this->adGroupCriteriaCount = $adGroupCriteriaCount;
  }
  /**
   * @return string
   */
  public function getAdGroupCriteriaCount()
  {
    return $this->adGroupCriteriaCount;
  }
  /**
   * @param string
   */
  public function setCampaignCriteriaCount($campaignCriteriaCount)
  {
    $this->campaignCriteriaCount = $campaignCriteriaCount;
  }
  /**
   * @return string
   */
  public function getCampaignCriteriaCount()
  {
    return $this->campaignCriteriaCount;
  }
  /**
   * @param string
   */
  public function setChannelsCount($channelsCount)
  {
    $this->channelsCount = $channelsCount;
  }
  /**
   * @return string
   */
  public function getChannelsCount()
  {
    return $this->channelsCount;
  }
  /**
   * @param string
   */
  public function setNegativeKeywordListsCount($negativeKeywordListsCount)
  {
    $this->negativeKeywordListsCount = $negativeKeywordListsCount;
  }
  /**
   * @return string
   */
  public function getNegativeKeywordListsCount()
  {
    return $this->negativeKeywordListsCount;
  }
  /**
   * @param string
   */
  public function setNegativelyTargetedChannelsCount($negativelyTargetedChannelsCount)
  {
    $this->negativelyTargetedChannelsCount = $negativelyTargetedChannelsCount;
  }
  /**
   * @return string
   */
  public function getNegativelyTargetedChannelsCount()
  {
    return $this->negativelyTargetedChannelsCount;
  }
  /**
   * @param string
   */
  public function setUsedCampaignsCount($usedCampaignsCount)
  {
    $this->usedCampaignsCount = $usedCampaignsCount;
  }
  /**
   * @return string
   */
  public function getUsedCampaignsCount()
  {
    return $this->usedCampaignsCount;
  }
  /**
   * @param string
   */
  public function setUsedInsertionOrdersCount($usedInsertionOrdersCount)
  {
    $this->usedInsertionOrdersCount = $usedInsertionOrdersCount;
  }
  /**
   * @return string
   */
  public function getUsedInsertionOrdersCount()
  {
    return $this->usedInsertionOrdersCount;
  }
  /**
   * @param string
   */
  public function setUsedLineItemsCount($usedLineItemsCount)
  {
    $this->usedLineItemsCount = $usedLineItemsCount;
  }
  /**
   * @return string
   */
  public function getUsedLineItemsCount()
  {
    return $this->usedLineItemsCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AuditAdvertiserResponse::class, 'Google_Service_DisplayVideo_AuditAdvertiserResponse');
