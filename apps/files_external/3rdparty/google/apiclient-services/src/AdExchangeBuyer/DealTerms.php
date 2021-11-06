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

class DealTerms extends \Google\Model
{
  public $brandingType;
  public $crossListedExternalDealIdType;
  public $description;
  protected $estimatedGrossSpendType = Price::class;
  protected $estimatedGrossSpendDataType = '';
  public $estimatedImpressionsPerDay;
  protected $guaranteedFixedPriceTermsType = DealTermsGuaranteedFixedPriceTerms::class;
  protected $guaranteedFixedPriceTermsDataType = '';
  protected $nonGuaranteedAuctionTermsType = DealTermsNonGuaranteedAuctionTerms::class;
  protected $nonGuaranteedAuctionTermsDataType = '';
  protected $nonGuaranteedFixedPriceTermsType = DealTermsNonGuaranteedFixedPriceTerms::class;
  protected $nonGuaranteedFixedPriceTermsDataType = '';
  protected $rubiconNonGuaranteedTermsType = DealTermsRubiconNonGuaranteedTerms::class;
  protected $rubiconNonGuaranteedTermsDataType = '';
  public $sellerTimeZone;

  public function setBrandingType($brandingType)
  {
    $this->brandingType = $brandingType;
  }
  public function getBrandingType()
  {
    return $this->brandingType;
  }
  public function setCrossListedExternalDealIdType($crossListedExternalDealIdType)
  {
    $this->crossListedExternalDealIdType = $crossListedExternalDealIdType;
  }
  public function getCrossListedExternalDealIdType()
  {
    return $this->crossListedExternalDealIdType;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Price
   */
  public function setEstimatedGrossSpend(Price $estimatedGrossSpend)
  {
    $this->estimatedGrossSpend = $estimatedGrossSpend;
  }
  /**
   * @return Price
   */
  public function getEstimatedGrossSpend()
  {
    return $this->estimatedGrossSpend;
  }
  public function setEstimatedImpressionsPerDay($estimatedImpressionsPerDay)
  {
    $this->estimatedImpressionsPerDay = $estimatedImpressionsPerDay;
  }
  public function getEstimatedImpressionsPerDay()
  {
    return $this->estimatedImpressionsPerDay;
  }
  /**
   * @param DealTermsGuaranteedFixedPriceTerms
   */
  public function setGuaranteedFixedPriceTerms(DealTermsGuaranteedFixedPriceTerms $guaranteedFixedPriceTerms)
  {
    $this->guaranteedFixedPriceTerms = $guaranteedFixedPriceTerms;
  }
  /**
   * @return DealTermsGuaranteedFixedPriceTerms
   */
  public function getGuaranteedFixedPriceTerms()
  {
    return $this->guaranteedFixedPriceTerms;
  }
  /**
   * @param DealTermsNonGuaranteedAuctionTerms
   */
  public function setNonGuaranteedAuctionTerms(DealTermsNonGuaranteedAuctionTerms $nonGuaranteedAuctionTerms)
  {
    $this->nonGuaranteedAuctionTerms = $nonGuaranteedAuctionTerms;
  }
  /**
   * @return DealTermsNonGuaranteedAuctionTerms
   */
  public function getNonGuaranteedAuctionTerms()
  {
    return $this->nonGuaranteedAuctionTerms;
  }
  /**
   * @param DealTermsNonGuaranteedFixedPriceTerms
   */
  public function setNonGuaranteedFixedPriceTerms(DealTermsNonGuaranteedFixedPriceTerms $nonGuaranteedFixedPriceTerms)
  {
    $this->nonGuaranteedFixedPriceTerms = $nonGuaranteedFixedPriceTerms;
  }
  /**
   * @return DealTermsNonGuaranteedFixedPriceTerms
   */
  public function getNonGuaranteedFixedPriceTerms()
  {
    return $this->nonGuaranteedFixedPriceTerms;
  }
  /**
   * @param DealTermsRubiconNonGuaranteedTerms
   */
  public function setRubiconNonGuaranteedTerms(DealTermsRubiconNonGuaranteedTerms $rubiconNonGuaranteedTerms)
  {
    $this->rubiconNonGuaranteedTerms = $rubiconNonGuaranteedTerms;
  }
  /**
   * @return DealTermsRubiconNonGuaranteedTerms
   */
  public function getRubiconNonGuaranteedTerms()
  {
    return $this->rubiconNonGuaranteedTerms;
  }
  public function setSellerTimeZone($sellerTimeZone)
  {
    $this->sellerTimeZone = $sellerTimeZone;
  }
  public function getSellerTimeZone()
  {
    return $this->sellerTimeZone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DealTerms::class, 'Google_Service_AdExchangeBuyer_DealTerms');
