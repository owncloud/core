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

class Google_Service_DisplayVideo_IdFilter extends Google_Collection
{
  protected $collection_key = 'mediaProductIds';
  public $adGroupAdIds;
  public $adGroupIds;
  public $campaignIds;
  public $insertionOrderIds;
  public $lineItemIds;
  public $mediaProductIds;

  public function setAdGroupAdIds($adGroupAdIds)
  {
    $this->adGroupAdIds = $adGroupAdIds;
  }
  public function getAdGroupAdIds()
  {
    return $this->adGroupAdIds;
  }
  public function setAdGroupIds($adGroupIds)
  {
    $this->adGroupIds = $adGroupIds;
  }
  public function getAdGroupIds()
  {
    return $this->adGroupIds;
  }
  public function setCampaignIds($campaignIds)
  {
    $this->campaignIds = $campaignIds;
  }
  public function getCampaignIds()
  {
    return $this->campaignIds;
  }
  public function setInsertionOrderIds($insertionOrderIds)
  {
    $this->insertionOrderIds = $insertionOrderIds;
  }
  public function getInsertionOrderIds()
  {
    return $this->insertionOrderIds;
  }
  public function setLineItemIds($lineItemIds)
  {
    $this->lineItemIds = $lineItemIds;
  }
  public function getLineItemIds()
  {
    return $this->lineItemIds;
  }
  public function setMediaProductIds($mediaProductIds)
  {
    $this->mediaProductIds = $mediaProductIds;
  }
  public function getMediaProductIds()
  {
    return $this->mediaProductIds;
  }
}
