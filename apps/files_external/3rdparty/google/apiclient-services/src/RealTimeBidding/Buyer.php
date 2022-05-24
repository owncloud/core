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
  /**
   * @var string
   */
  public $activeCreativeCount;
  /**
   * @var string
   */
  public $bidder;
  /**
   * @var string[]
   */
  public $billingIds;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $maximumActiveCreativeCount;
  /**
   * @var string
   */
  public $name;

  /**
   * @param string
   */
  public function setActiveCreativeCount($activeCreativeCount)
  {
    $this->activeCreativeCount = $activeCreativeCount;
  }
  /**
   * @return string
   */
  public function getActiveCreativeCount()
  {
    return $this->activeCreativeCount;
  }
  /**
   * @param string
   */
  public function setBidder($bidder)
  {
    $this->bidder = $bidder;
  }
  /**
   * @return string
   */
  public function getBidder()
  {
    return $this->bidder;
  }
  /**
   * @param string[]
   */
  public function setBillingIds($billingIds)
  {
    $this->billingIds = $billingIds;
  }
  /**
   * @return string[]
   */
  public function getBillingIds()
  {
    return $this->billingIds;
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
   * @param string
   */
  public function setMaximumActiveCreativeCount($maximumActiveCreativeCount)
  {
    $this->maximumActiveCreativeCount = $maximumActiveCreativeCount;
  }
  /**
   * @return string
   */
  public function getMaximumActiveCreativeCount()
  {
    return $this->maximumActiveCreativeCount;
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
class_alias(Buyer::class, 'Google_Service_RealTimeBidding_Buyer');
