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
  /**
   * @var string
   */
  public $buyLink;
  /**
   * @var string
   */
  public $country;
  /**
   * @var bool
   */
  public $isEbook;
  protected $listPriceType = VolumeSaleInfoListPrice::class;
  protected $listPriceDataType = '';
  protected $offersType = VolumeSaleInfoOffers::class;
  protected $offersDataType = 'array';
  /**
   * @var string
   */
  public $onSaleDate;
  protected $retailPriceType = VolumeSaleInfoRetailPrice::class;
  protected $retailPriceDataType = '';
  /**
   * @var string
   */
  public $saleability;

  /**
   * @param string
   */
  public function setBuyLink($buyLink)
  {
    $this->buyLink = $buyLink;
  }
  /**
   * @return string
   */
  public function getBuyLink()
  {
    return $this->buyLink;
  }
  /**
   * @param string
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param bool
   */
  public function setIsEbook($isEbook)
  {
    $this->isEbook = $isEbook;
  }
  /**
   * @return bool
   */
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
  /**
   * @param string
   */
  public function setOnSaleDate($onSaleDate)
  {
    $this->onSaleDate = $onSaleDate;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setSaleability($saleability)
  {
    $this->saleability = $saleability;
  }
  /**
   * @return string
   */
  public function getSaleability()
  {
    return $this->saleability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeSaleInfo::class, 'Google_Service_Books_VolumeSaleInfo');
