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

namespace Google\Service\AdExchangeBuyerII;

class NonGuaranteedAuctionTerms extends \Google\Collection
{
  protected $collection_key = 'reservePricesPerBuyer';
  /**
   * @var bool
   */
  public $autoOptimizePrivateAuction;
  protected $reservePricesPerBuyerType = PricePerBuyer::class;
  protected $reservePricesPerBuyerDataType = 'array';

  /**
   * @param bool
   */
  public function setAutoOptimizePrivateAuction($autoOptimizePrivateAuction)
  {
    $this->autoOptimizePrivateAuction = $autoOptimizePrivateAuction;
  }
  /**
   * @return bool
   */
  public function getAutoOptimizePrivateAuction()
  {
    return $this->autoOptimizePrivateAuction;
  }
  /**
   * @param PricePerBuyer[]
   */
  public function setReservePricesPerBuyer($reservePricesPerBuyer)
  {
    $this->reservePricesPerBuyer = $reservePricesPerBuyer;
  }
  /**
   * @return PricePerBuyer[]
   */
  public function getReservePricesPerBuyer()
  {
    return $this->reservePricesPerBuyer;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NonGuaranteedAuctionTerms::class, 'Google_Service_AdExchangeBuyerII_NonGuaranteedAuctionTerms');
