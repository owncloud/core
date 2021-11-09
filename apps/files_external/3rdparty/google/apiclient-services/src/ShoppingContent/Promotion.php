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
  public $brand;
  public $brandExclusion;
  public $contentLanguage;
  public $couponValueType;
  public $freeGiftDescription;
  public $freeGiftItemId;
  protected $freeGiftValueType = PriceAmount::class;
  protected $freeGiftValueDataType = '';
  public $genericRedemptionCode;
  public $getThisQuantityDiscounted;
  public $id;
  public $itemGroupId;
  public $itemGroupIdExclusion;
  public $itemId;
  public $itemIdExclusion;
  public $limitQuantity;
  protected $limitValueType = PriceAmount::class;
  protected $limitValueDataType = '';
  public $longTitle;
  protected $minimumPurchaseAmountType = PriceAmount::class;
  protected $minimumPurchaseAmountDataType = '';
  public $minimumPurchaseQuantity;
  protected $moneyBudgetType = PriceAmount::class;
  protected $moneyBudgetDataType = '';
  protected $moneyOffAmountType = PriceAmount::class;
  protected $moneyOffAmountDataType = '';
  public $offerType;
  public $orderLimit;
  public $percentOff;
  public $productApplicability;
  public $productType;
  public $productTypeExclusion;
  public $promotionDestinationIds;
  public $promotionDisplayDates;
  protected $promotionDisplayTimePeriodType = TimePeriod::class;
  protected $promotionDisplayTimePeriodDataType = '';
  public $promotionEffectiveDates;
  protected $promotionEffectiveTimePeriodType = TimePeriod::class;
  protected $promotionEffectiveTimePeriodDataType = '';
  public $promotionId;
  public $redemptionChannel;
  public $shippingServiceNames;
  public $targetCountry;

  public function setBrand($brand)
  {
    $this->brand = $brand;
  }
  public function getBrand()
  {
    return $this->brand;
  }
  public function setBrandExclusion($brandExclusion)
  {
    $this->brandExclusion = $brandExclusion;
  }
  public function getBrandExclusion()
  {
    return $this->brandExclusion;
  }
  public function setContentLanguage($contentLanguage)
  {
    $this->contentLanguage = $contentLanguage;
  }
  public function getContentLanguage()
  {
    return $this->contentLanguage;
  }
  public function setCouponValueType($couponValueType)
  {
    $this->couponValueType = $couponValueType;
  }
  public function getCouponValueType()
  {
    return $this->couponValueType;
  }
  public function setFreeGiftDescription($freeGiftDescription)
  {
    $this->freeGiftDescription = $freeGiftDescription;
  }
  public function getFreeGiftDescription()
  {
    return $this->freeGiftDescription;
  }
  public function setFreeGiftItemId($freeGiftItemId)
  {
    $this->freeGiftItemId = $freeGiftItemId;
  }
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
  public function setGenericRedemptionCode($genericRedemptionCode)
  {
    $this->genericRedemptionCode = $genericRedemptionCode;
  }
  public function getGenericRedemptionCode()
  {
    return $this->genericRedemptionCode;
  }
  public function setGetThisQuantityDiscounted($getThisQuantityDiscounted)
  {
    $this->getThisQuantityDiscounted = $getThisQuantityDiscounted;
  }
  public function getGetThisQuantityDiscounted()
  {
    return $this->getThisQuantityDiscounted;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setItemGroupId($itemGroupId)
  {
    $this->itemGroupId = $itemGroupId;
  }
  public function getItemGroupId()
  {
    return $this->itemGroupId;
  }
  public function setItemGroupIdExclusion($itemGroupIdExclusion)
  {
    $this->itemGroupIdExclusion = $itemGroupIdExclusion;
  }
  public function getItemGroupIdExclusion()
  {
    return $this->itemGroupIdExclusion;
  }
  public function setItemId($itemId)
  {
    $this->itemId = $itemId;
  }
  public function getItemId()
  {
    return $this->itemId;
  }
  public function setItemIdExclusion($itemIdExclusion)
  {
    $this->itemIdExclusion = $itemIdExclusion;
  }
  public function getItemIdExclusion()
  {
    return $this->itemIdExclusion;
  }
  public function setLimitQuantity($limitQuantity)
  {
    $this->limitQuantity = $limitQuantity;
  }
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
  public function setLongTitle($longTitle)
  {
    $this->longTitle = $longTitle;
  }
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
  public function setMinimumPurchaseQuantity($minimumPurchaseQuantity)
  {
    $this->minimumPurchaseQuantity = $minimumPurchaseQuantity;
  }
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
  public function setOfferType($offerType)
  {
    $this->offerType = $offerType;
  }
  public function getOfferType()
  {
    return $this->offerType;
  }
  public function setOrderLimit($orderLimit)
  {
    $this->orderLimit = $orderLimit;
  }
  public function getOrderLimit()
  {
    return $this->orderLimit;
  }
  public function setPercentOff($percentOff)
  {
    $this->percentOff = $percentOff;
  }
  public function getPercentOff()
  {
    return $this->percentOff;
  }
  public function setProductApplicability($productApplicability)
  {
    $this->productApplicability = $productApplicability;
  }
  public function getProductApplicability()
  {
    return $this->productApplicability;
  }
  public function setProductType($productType)
  {
    $this->productType = $productType;
  }
  public function getProductType()
  {
    return $this->productType;
  }
  public function setProductTypeExclusion($productTypeExclusion)
  {
    $this->productTypeExclusion = $productTypeExclusion;
  }
  public function getProductTypeExclusion()
  {
    return $this->productTypeExclusion;
  }
  public function setPromotionDestinationIds($promotionDestinationIds)
  {
    $this->promotionDestinationIds = $promotionDestinationIds;
  }
  public function getPromotionDestinationIds()
  {
    return $this->promotionDestinationIds;
  }
  public function setPromotionDisplayDates($promotionDisplayDates)
  {
    $this->promotionDisplayDates = $promotionDisplayDates;
  }
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
  public function setPromotionEffectiveDates($promotionEffectiveDates)
  {
    $this->promotionEffectiveDates = $promotionEffectiveDates;
  }
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
  public function setPromotionId($promotionId)
  {
    $this->promotionId = $promotionId;
  }
  public function getPromotionId()
  {
    return $this->promotionId;
  }
  public function setRedemptionChannel($redemptionChannel)
  {
    $this->redemptionChannel = $redemptionChannel;
  }
  public function getRedemptionChannel()
  {
    return $this->redemptionChannel;
  }
  public function setShippingServiceNames($shippingServiceNames)
  {
    $this->shippingServiceNames = $shippingServiceNames;
  }
  public function getShippingServiceNames()
  {
    return $this->shippingServiceNames;
  }
  public function setTargetCountry($targetCountry)
  {
    $this->targetCountry = $targetCountry;
  }
  public function getTargetCountry()
  {
    return $this->targetCountry;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Promotion::class, 'Google_Service_ShoppingContent_Promotion');
