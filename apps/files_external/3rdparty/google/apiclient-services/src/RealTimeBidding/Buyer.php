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

namespace Google\Service\RealTimeBidding;

class Buyer extends \Google\Collection
{
  protected $collection_key = 'billingIds';
  public $activeCreativeCount;
  public $bidder;
  public $billingIds;
  public $displayName;
  public $maximumActiveCreativeCount;
  public $name;

  public function setActiveCreativeCount($activeCreativeCount)
  {
    $this->activeCreativeCount = $activeCreativeCount;
  }
  public function getActiveCreativeCount()
  {
    return $this->activeCreativeCount;
  }
  public function setBidder($bidder)
  {
    $this->bidder = $bidder;
  }
  public function getBidder()
  {
    return $this->bidder;
  }
  public function setBillingIds($billingIds)
  {
    $this->billingIds = $billingIds;
  }
  public function getBillingIds()
  {
    return $this->billingIds;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setMaximumActiveCreativeCount($maximumActiveCreativeCount)
  {
    $this->maximumActiveCreativeCount = $maximumActiveCreativeCount;
  }
  public function getMaximumActiveCreativeCount()
  {
    return $this->maximumActiveCreativeCount;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Buyer::class, 'Google_Service_RealTimeBidding_Buyer');
