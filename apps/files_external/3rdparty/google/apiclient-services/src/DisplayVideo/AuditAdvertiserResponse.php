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
  public $adGroupCriteriaCount;
  public $campaignCriteriaCount;
  public $channelsCount;
  public $negativeKeywordListsCount;
  public $negativelyTargetedChannelsCount;
  public $usedCampaignsCount;
  public $usedInsertionOrdersCount;
  public $usedLineItemsCount;

  public function setAdGroupCriteriaCount($adGroupCriteriaCount)
  {
    $this->adGroupCriteriaCount = $adGroupCriteriaCount;
  }
  public function getAdGroupCriteriaCount()
  {
    return $this->adGroupCriteriaCount;
  }
  public function setCampaignCriteriaCount($campaignCriteriaCount)
  {
    $this->campaignCriteriaCount = $campaignCriteriaCount;
  }
  public function getCampaignCriteriaCount()
  {
    return $this->campaignCriteriaCount;
  }
  public function setChannelsCount($channelsCount)
  {
    $this->channelsCount = $channelsCount;
  }
  public function getChannelsCount()
  {
    return $this->channelsCount;
  }
  public function setNegativeKeywordListsCount($negativeKeywordListsCount)
  {
    $this->negativeKeywordListsCount = $negativeKeywordListsCount;
  }
  public function getNegativeKeywordListsCount()
  {
    return $this->negativeKeywordListsCount;
  }
  public function setNegativelyTargetedChannelsCount($negativelyTargetedChannelsCount)
  {
    $this->negativelyTargetedChannelsCount = $negativelyTargetedChannelsCount;
  }
  public function getNegativelyTargetedChannelsCount()
  {
    return $this->negativelyTargetedChannelsCount;
  }
  public function setUsedCampaignsCount($usedCampaignsCount)
  {
    $this->usedCampaignsCount = $usedCampaignsCount;
  }
  public function getUsedCampaignsCount()
  {
    return $this->usedCampaignsCount;
  }
  public function setUsedInsertionOrdersCount($usedInsertionOrdersCount)
  {
    $this->usedInsertionOrdersCount = $usedInsertionOrdersCount;
  }
  public function getUsedInsertionOrdersCount()
  {
    return $this->usedInsertionOrdersCount;
  }
  public function setUsedLineItemsCount($usedLineItemsCount)
  {
    $this->usedLineItemsCount = $usedLineItemsCount;
  }
  public function getUsedLineItemsCount()
  {
    return $this->usedLineItemsCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AuditAdvertiserResponse::class, 'Google_Service_DisplayVideo_AuditAdvertiserResponse');
