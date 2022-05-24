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

namespace Google\Service\AdExchangeBuyer;

class PricePerBuyer extends \Google\Model
{
  public $auctionTier;
  protected $billedBuyerType = Buyer::class;
  protected $billedBuyerDataType = '';
  protected $buyerType = Buyer::class;
  protected $buyerDataType = '';
  protected $priceType = Price::class;
  protected $priceDataType = '';

  public function setAuctionTier($auctionTier)
  {
    $this->auctionTier = $auctionTier;
  }
  public function getAuctionTier()
  {
    return $this->auctionTier;
  }
  /**
   * @param Buyer
   */
  public function setBilledBuyer(Buyer $billedBuyer)
  {
    $this->billedBuyer = $billedBuyer;
  }
  /**
   * @return Buyer
   */
  public function getBilledBuyer()
  {
    return $this->billedBuyer;
  }
  /**
   * @param Buyer
   */
  public function setBuyer(Buyer $buyer)
  {
    $this->buyer = $buyer;
  }
  /**
   * @return Buyer
   */
  public function getBuyer()
  {
    return $this->buyer;
  }
  /**
   * @param Price
   */
  public function setPrice(Price $price)
  {
    $this->price = $price;
  }
  /**
   * @return Price
   */
  public function getPrice()
  {
    return $this->price;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PricePerBuyer::class, 'Google_Service_AdExchangeBuyer_PricePerBuyer');
