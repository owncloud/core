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

class VolumeSaleInfo extends \Google\Collection
{
  protected $collection_key = 'offers';
  public $buyLink;
  public $country;
  public $isEbook;
  protected $listPriceType = VolumeSaleInfoListPrice::class;
  protected $listPriceDataType = '';
  protected $offersType = VolumeSaleInfoOffers::class;
  protected $offersDataType = 'array';
  public $onSaleDate;
  protected $retailPriceType = VolumeSaleInfoRetailPrice::class;
  protected $retailPriceDataType = '';
  public $saleability;

  public function setBuyLink($buyLink)
  {
    $this->buyLink = $buyLink;
  }
  public function getBuyLink()
  {
    return $this->buyLink;
  }
  public function setCountry($country)
  {
    $this->country = $country;
  }
  public function getCountry()
  {
    return $this->country;
  }
  public function setIsEbook($isEbook)
  {
    $this->isEbook = $isEbook;
  }
  public function getIsEbook()
  {
    return $this->isEbook;
  }
  /**
   * @param VolumeSaleInfoListPrice
   */
  public function setListPrice(VolumeSaleInfoListPrice $listPrice)
  {
    $this->listPrice = $listPrice;
  }
  /**
   * @return VolumeSaleInfoListPrice
   */
  public function getListPrice()
  {
    return $this->listPrice;
  }
  /**
   * @param VolumeSaleInfoOffers[]
   */
  public function setOffers($offers)
  {
    $this->offers = $offers;
  }
  /**
   * @return VolumeSaleInfoOffers[]
   */
  public function getOffers()
  {
    return $this->offers;
  }
  public function setOnSaleDate($onSaleDate)
  {
    $this->onSaleDate = $onSaleDate;
  }
  public function getOnSaleDate()
  {
    return $this->onSaleDate;
  }
  /**
   * @param VolumeSaleInfoRetailPrice
   */
  public function setRetailPrice(VolumeSaleInfoRetailPrice $retailPrice)
  {
    $this->retailPrice = $retailPrice;
  }
  /**
   * @return VolumeSaleInfoRetailPrice
   */
  public function getRetailPrice()
  {
    return $this->retailPrice;
  }
  public function setSaleability($saleability)
  {
    $this->saleability = $saleability;
  }
  public function getSaleability()
  {
    return $this->saleability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeSaleInfo::class, 'Google_Service_Books_VolumeSaleInfo');
