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

class IdFilter extends \Google\Collection
{
  protected $collection_key = 'mediaProductIds';
  /**
   * @var string[]
   */
  public $adGroupAdIds;
  /**
   * @var string[]
   */
  public $adGroupIds;
  /**
   * @var string[]
   */
  public $campaignIds;
  /**
   * @var string[]
   */
  public $insertionOrderIds;
  /**
   * @var string[]
   */
  public $lineItemIds;
  /**
   * @var string[]
   */
  public $mediaProductIds;

  /**
   * @param string[]
   */
  public function setAdGroupAdIds($adGroupAdIds)
  {
    $this->adGroupAdIds = $adGroupAdIds;
  }
  /**
   * @return string[]
   */
  public function getAdGroupAdIds()
  {
    return $this->adGroupAdIds;
  }
  /**
   * @param string[]
   */
  public function setAdGroupIds($adGroupIds)
  {
    $this->adGroupIds = $adGroupIds;
  }
  /**
   * @return string[]
   */
  public function getAdGroupIds()
  {
    return $this->adGroupIds;
  }
  /**
   * @param string[]
   */
  public function setCampaignIds($campaignIds)
  {
    $this->campaignIds = $campaignIds;
  }
  /**
   * @return string[]
   */
  public function getCampaignIds()
  {
    return $this->campaignIds;
  }
  /**
   * @param string[]
   */
  public function setInsertionOrderIds($insertionOrderIds)
  {
    $this->insertionOrderIds = $insertionOrderIds;
  }
  /**
   * @return string[]
   */
  public function getInsertionOrderIds()
  {
    return $this->insertionOrderIds;
  }
  /**
   * @param string[]
   */
  public function setLineItemIds($lineItemIds)
  {
    $this->lineItemIds = $lineItemIds;
  }
  /**
   * @return string[]
   */
  public function getLineItemIds()
  {
    return $this->lineItemIds;
  }
  /**
   * @param string[]
   */
  public function setMediaProductIds($mediaProductIds)
  {
    $this->mediaProductIds = $mediaProductIds;
  }
  /**
   * @return string[]
   */
  public function getMediaProductIds()
  {
    return $this->mediaProductIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IdFilter::class, 'Google_Service_DisplayVideo_IdFilter');
