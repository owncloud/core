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

namespace Google\Service\AuthorizedBuyersMarketplace;

class PrivateAuctionTerms extends \Google\Model
{
  protected $floorPriceType = Price::class;
  protected $floorPriceDataType = '';
  /**
   * @var bool
   */
  public $openAuctionAllowed;

  /**
   * @param Price
   */
  public function setFloorPrice(Price $floorPrice)
  {
    $this->floorPrice = $floorPrice;
  }
  /**
   * @return Price
   */
  public function getFloorPrice()
  {
    return $this->floorPrice;
  }
  /**
   * @param bool
   */
  public function setOpenAuctionAllowed($openAuctionAllowed)
  {
    $this->openAuctionAllowed = $openAuctionAllowed;
  }
  /**
   * @return bool
   */
  public function getOpenAuctionAllowed()
  {
    return $this->openAuctionAllowed;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PrivateAuctionTerms::class, 'Google_Service_AuthorizedBuyersMarketplace_PrivateAuctionTerms');
