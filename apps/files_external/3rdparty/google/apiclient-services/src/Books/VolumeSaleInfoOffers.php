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

namespace Google\Service\Books;

class VolumeSaleInfoOffers extends \Google\Model
{
  /**
   * @var int
   */
  public $finskyOfferType;
  /**
   * @var bool
   */
  public $giftable;
  protected $listPriceType = VolumeSaleInfoOffersListPrice::class;
  protected $listPriceDataType = '';
  protected $rentalDurationType = VolumeSaleInfoOffersRentalDuration::class;
  protected $rentalDurationDataType = '';
  protected $retailPriceType = VolumeSaleInfoOffersRetailPrice::class;
  protected $retailPriceDataType = '';

  /**
   * @param int
   */
  public function setFinskyOfferType($finskyOfferType)
  {
    $this->finskyOfferType = $finskyOfferType;
  }
  /**
   * @return int
   */
  public function getFinskyOfferType()
  {
    return $this->finskyOfferType;
  }
  /**
   * @param bool
   */
  public function setGiftable($giftable)
  {
    $this->giftable = $giftable;
  }
  /**
   * @return bool
   */
  public function getGiftable()
  {
    return $this->giftable;
  }
  /**
   * @param VolumeSaleInfoOffersListPrice
   */
  public function setListPrice(VolumeSaleInfoOffersListPrice $listPrice)
  {
    $this->listPrice = $listPrice;
  }
  /**
   * @return VolumeSaleInfoOffersListPrice
   */
  public function getListPrice()
  {
    return $this->listPrice;
  }
  /**
   * @param VolumeSaleInfoOffersRentalDuration
   */
  public function setRentalDuration(VolumeSaleInfoOffersRentalDuration $rentalDuration)
  {
    $this->rentalDuration = $rentalDuration;
  }
  /**
   * @return VolumeSaleInfoOffersRentalDuration
   */
  public function getRentalDuration()
  {
    return $this->rentalDuration;
  }
  /**
   * @param VolumeSaleInfoOffersRetailPrice
   */
  public function setRetailPrice(VolumeSaleInfoOffersRetailPrice $retailPrice)
  {
    $this->retailPrice = $retailPrice;
  }
  /**
   * @return VolumeSaleInfoOffersRetailPrice
   */
  public function getRetailPrice()
  {
    return $this->retailPrice;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeSaleInfoOffers::class, 'Google_Service_Books_VolumeSaleInfoOffers');
