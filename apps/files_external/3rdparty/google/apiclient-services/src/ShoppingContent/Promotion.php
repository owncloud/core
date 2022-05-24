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

namespace Google\Service\ShoppingContent;

class Promotion extends \Google\Collection
{
  protected $collection_key = 'shippingServiceNames';
  /**
   * @var string[]
   */
  public $brand;
  /**
   * @var string[]
   */
  public $brandExclusion;
  /**
   * @var string
   */
  public $contentLanguage;
  /**
   * @var string
   */
  public $couponValueType;
  /**
   * @var string
   */
  public $freeGiftDescription;
  /**
   * @var string
   */
  public $freeGiftItemId;
  protected $freeGiftValueType = PriceAmount::class;
  protected $freeGiftValueDataType = '';
  /**
   * @var string
   */
  public $genericRedemptionCode;
  /**
   * @var int
   */
  public $getThisQuantityDiscounted;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string[]
   */
  public $itemGroupId;
  /**
   * @var string[]
   */
  public $itemGroupIdExclusion;
  /**
   * @var string[]
   */
  public $itemId;
  /**
   * @var string[]
   */
  public $itemIdExclusion;
  /**
   * @var int
   */
  public $limitQuantity;
  protected $limitValueType = PriceAmount::class;
  protected $limitValueDataType = '';
  /**
   * @var string
   */
  public $longTitle;
  protected $minimumPurchaseAmountType = PriceAmount::class;
  protected $minimumPurchaseAmountDataType = '';
  /**
   * @var int
   */
  public $minimumPurchaseQuantity;
  protected $moneyBudgetType = PriceAmount::class;
  protected $moneyBudgetDataType = '';
  protected $moneyOffAmountType = PriceAmount::class;
  protected $moneyOffAmountDataType = '';
  /**
   * @var string
   */
  public $offerType;
  /**
   * @var int
   */
  public $orderLimit;
  /**
   * @var int
   */
  public $percentOff;
  /**
   * @var string
   */
  public $productApplicability;
  /**
   * @var string[]
   */
  public $productType;
  /**
   * @var string[]
   */
  public $productTypeExclusion;
  /**
   * @var string[]
   */
  public $promotionDestinationIds;
  /**
   * @var string
   */
  public $promotionDisplayDates;
  protected $promotionDisplayTimePeriodType = TimePeriod::class;
  protected $promotionDisplayTimePeriodDataType = '';
  /**
   * @var string
   */
  public $promotionEffectiveDates;
  protected $promotionEffectiveTimePeriodType = TimePeriod::class;
  protected $promotionEffectiveTimePeriodDataType = '';
  /**
   * @var string
   */
  public $promotionId;
  /**
   * @var string[]
   */
  public $redemptionChannel;
  /**
   * @var string[]
   */
  public $shippingServiceNames;
  /**
   * @var string
   */
  public $targetCountry;

  /**
   * @param string[]
   */
  public function setBrand($brand)
  {
    $this->brand = $brand;
  }
  /**
   * @return string[]
   */
  public function getBrand()
  {
    return $this->brand;
  }
  /**
   * @param string[]
   */
  public function setBrandExclusion($brandExclusion)
  {
    $this->brandExclusion = $brandExclusion;
  }
  /**
   * @return string[]
   */
  public function getBrandExclusion()
  {
    return $this->brandExclusion;
  }
  /**
   * @param string
   */
  public function setContentLanguage($contentLanguage)
  {
    $this->contentLanguage = $contentLanguage;
  }
  /**
   * @return string
   */
  public function getContentLanguage()
  {
    return $this->contentLanguage;
  }
  /**
   * @param string
   */
  public function setCouponValueType($couponValueType)
  {
    $this->couponValueType = $couponValueType;
  }
  /**
   * @return string
   */
  public function getCouponValueType()
  {
    return $this->couponValueType;
  }
  /**
   * @param string
   */
  public function setFreeGiftDescription($freeGiftDescription)
  {
    $this->freeGiftDescription = $freeGiftDescription;
  }
  /**
   * @return string
   */
  public function getFreeGiftDescription()
  {
    return $this->freeGiftDescription;
  }
  /**
   * @param string
   */
  public function setFreeGiftItemId($freeGiftItemId)
  {
    $this->freeGiftItemId = $freeGiftItemId;
  }
  /**
   * @return string
   */
  public function getFreeGiftItemId()
  {
    return $this->freeGiftItemId;
  }
  /**
   * @param PriceAmount
   */
  public function setFreeGiftValue(PriceAmount $freeGiftValue)
  {
    $this->freeGiftValue = $freeGiftValue;
  }
  /**
   * @return PriceAmount
   */
  public function getFreeGiftValue()
  {
    return $this->freeGiftValue;
  }
  /**
   * @param string
   */
  public function setGenericRedemptionCode($genericRedemptionCode)
  {
    $this->genericRedemptionCode = $genericRedemptionCode;
  }
  /**
   * @return string
   */
  public function getGenericRedemptionCode()
  {
    return $this->genericRedemptionCode;
  }
  /**
   * @param int
   */
  public function setGetThisQuantityDiscounted($getThisQuantityDiscounted)
  {
    $this->getThisQuantityDiscounted = $getThisQuantityDiscounted;
  }
  /**
   * @return int
   */
  public function getGetThisQuantityDiscounted()
  {
    return $this->getThisQuantityDiscounted;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string[]
   */
  public function setItemGroupId($itemGroupId)
  {
    $this->itemGroupId = $itemGroupId;
  }
  /**
   * @return string[]
   */
  public function getItemGroupId()
  {
    return $this->itemGroupId;
  }
  /**
   * @param string[]
   */
  public function setItemGroupIdExclusion($itemGroupIdExclusion)
  {
    $this->itemGroupIdExclusion = $itemGroupIdExclusion;
  }
  /**
   * @return string[]
   */
  public function getItemGroupIdExclusion()
  {
    return $this->itemGroupIdExclusion;
  }
  /**
   * @param string[]
   */
  public function setItemId($itemId)
  {
    $this->itemId = $itemId;
  }
  /**
   * @return string[]
   */
  public function getItemId()
  {
    return $this->itemId;
  }
  /**
   * @param string[]
   */
  public function setItemIdExclusion($itemIdExclusion)
  {
    $this->itemIdExclusion = $itemIdExclusion;
  }
  /**
   * @return string[]
   */
  public function getItemIdExclusion()
  {
    return $this->itemIdExclusion;
  }
  /**
   * @param int
   */
  public function setLimitQuantity($limitQuantity)
  {
    $this->limitQuantity = $limitQuantity;
  }
  /**
   * @return int
   */
  public function getLimitQuantity()
  {
    return $this->limitQuantity;
  }
  /**
   * @param PriceAmount
   */
  public function setLimitValue(PriceAmount $limitValue)
  {
    $this->limitValue = $limitValue;
  }
  /**
   * @return PriceAmount
   */
  public function getLimitValue()
  {
    return $this->limitValue;
  }
  /**
   * @param string
   */
  public function setLongTitle($longTitle)
  {
    $this->longTitle = $longTitle;
  }
  /**
   * @return string
   */
  public function getLongTitle()
  {
    return $this->longTitle;
  }
  /**
   * @param PriceAmount
   */
  public function setMinimumPurchaseAmount(PriceAmount $minimumPurchaseAmount)
  {
    $this->minimumPurchaseAmount = $minimumPurchaseAmount;
  }
  /**
   * @return PriceAmount
   */
  public function getMinimumPurchaseAmount()
  {
    return $this->minimumPurchaseAmount;
  }
  /**
   * @param int
   */
  public function setMinimumPurchaseQuantity($minimumPurchaseQuantity)
  {
    $this->minimumPurchaseQuantity = $minimumPurchaseQuantity;
  }
  /**
   * @return int
   */
  public function getMinimumPurchaseQuantity()
  {
    return $this->minimumPurchaseQuantity;
  }
  /**
   * @param PriceAmount
   */
  public function setMoneyBudget(PriceAmount $moneyBudget)
  {
    $this->moneyBudget = $moneyBudget;
  }
  /**
   * @return PriceAmount
   */
  public function getMoneyBudget()
  {
    return $this->moneyBudget;
  }
  /**
   * @param PriceAmount
   */
  public function setMoneyOffAmount(PriceAmount $moneyOffAmount)
  {
    $this->moneyOffAmount = $moneyOffAmount;
  }
  /**
   * @return PriceAmount
   */
  public function getMoneyOffAmount()
  {
    return $this->moneyOffAmount;
  }
  /**
   * @param string
   */
  public function setOfferType($offerType)
  {
    $this->offerType = $offerType;
  }
  /**
   * @return string
   */
  public function getOfferType()
  {
    return $this->offerType;
  }
  /**
   * @param int
   */
  public function setOrderLimit($orderLimit)
  {
    $this->orderLimit = $orderLimit;
  }
  /**
   * @return int
   */
  public function getOrderLimit()
  {
    return $this->orderLimit;
  }
  /**
   * @param int
   */
  public function setPercentOff($percentOff)
  {
    $this->percentOff = $percentOff;
  }
  /**
   * @return int
   */
  public function getPercentOff()
  {
    return $this->percentOff;
  }
  /**
   * @param string
   */
  public function setProductApplicability($productApplicability)
  {
    $this->productApplicability = $productApplicability;
  }
  /**
   * @return string
   */
  public function getProductApplicability()
  {
    return $this->productApplicability;
  }
  /**
   * @param string[]
   */
  public function setProductType($productType)
  {
    $this->productType = $productType;
  }
  /**
   * @return string[]
   */
  public function getProductType()
  {
    return $this->productType;
  }
  /**
   * @param string[]
   */
  public function setProductTypeExclusion($productTypeExclusion)
  {
    $this->productTypeExclusion = $productTypeExclusion;
  }
  /**
   * @return string[]
   */
  public function getProductTypeExclusion()
  {
    return $this->productTypeExclusion;
  }
  /**
   * @param string[]
   */
  public function setPromotionDestinationIds($promotionDestinationIds)
  {
    $this->promotionDestinationIds = $promotionDestinationIds;
  }
  /**
   * @return string[]
   */
  public function getPromotionDestinationIds()
  {
    return $this->promotionDestinationIds;
  }
  /**
   * @param string
   */
  public function setPromotionDisplayDates($promotionDisplayDates)
  {
    $this->promotionDisplayDates = $promotionDisplayDates;
  }
  /**
   * @return string
   */
  public function getPromotionDisplayDates()
  {
    return $this->promotionDisplayDates;
  }
  /**
   * @param TimePeriod
   */
  public function setPromotionDisplayTimePeriod(TimePeriod $promotionDisplayTimePeriod)
  {
    $this->promotionDisplayTimePeriod = $promotionDisplayTimePeriod;
  }
  /**
   * @return TimePeriod
   */
  public function getPromotionDisplayTimePeriod()
  {
    return $this->promotionDisplayTimePeriod;
  }
  /**
   * @param string
   */
  public function setPromotionEffectiveDates($promotionEffectiveDates)
  {
    $this->promotionEffectiveDates = $promotionEffectiveDates;
  }
  /**
   * @return string
   */
  public function getPromotionEffectiveDates()
  {
    return $this->promotionEffectiveDates;
  }
  /**
   * @param TimePeriod
   */
  public function setPromotionEffectiveTimePeriod(TimePeriod $promotionEffectiveTimePeriod)
  {
    $this->promotionEffectiveTimePeriod = $promotionEffectiveTimePeriod;
  }
  /**
   * @return TimePeriod
   */
  public function getPromotionEffectiveTimePeriod()
  {
    return $this->promotionEffectiveTimePeriod;
  }
  /**
   * @param string
   */
  public function setPromotionId($promotionId)
  {
    $this->promotionId = $promotionId;
  }
  /**
   * @return string
   */
  public function getPromotionId()
  {
    return $this->promotionId;
  }
  /**
   * @param string[]
   */
  public function setRedemptionChannel($redemptionChannel)
  {
    $this->redemptionChannel = $redemptionChannel;
  }
  /**
   * @return string[]
   */
  public function getRedemptionChannel()
  {
    return $this->redemptionChannel;
  }
  /**
   * @param string[]
   */
  public function setShippingServiceNames($shippingServiceNames)
  {
    $this->shippingServiceNames = $shippingServiceNames;
  }
  /**
   * @return string[]
   */
  public function getShippingServiceNames()
  {
    return $this->shippingServiceNames;
  }
  /**
   * @param string
   */
  public function setTargetCountry($targetCountry)
  {
    $this->targetCountry = $targetCountry;
  }
  /**
   * @return string
   */
  public function getTargetCountry()
  {
    return $this->targetCountry;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Promotion::class, 'Google_Service_ShoppingContent_Promotion');
