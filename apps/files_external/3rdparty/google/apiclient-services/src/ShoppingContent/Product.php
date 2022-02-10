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

class Product extends \Google\Collection
{
  protected $collection_key = 'taxes';
  /**
   * @var string[]
   */
  public $additionalImageLinks;
  /**
   * @var string
   */
  public $additionalSizeType;
  /**
   * @var string
   */
  public $adsGrouping;
  /**
   * @var string[]
   */
  public $adsLabels;
  /**
   * @var string
   */
  public $adsRedirect;
  /**
   * @var bool
   */
  public $adult;
  /**
   * @var string
   */
  public $ageGroup;
  /**
   * @var string
   */
  public $availability;
  /**
   * @var string
   */
  public $availabilityDate;
  /**
   * @var string
   */
  public $brand;
  /**
   * @var string
   */
  public $canonicalLink;
  /**
   * @var string
   */
  public $channel;
  /**
   * @var string
   */
  public $color;
  /**
   * @var string
   */
  public $condition;
  /**
   * @var string
   */
  public $contentLanguage;
  protected $costOfGoodsSoldType = Price::class;
  protected $costOfGoodsSoldDataType = '';
  protected $customAttributesType = CustomAttribute::class;
  protected $customAttributesDataType = 'array';
  /**
   * @var string
   */
  public $customLabel0;
  /**
   * @var string
   */
  public $customLabel1;
  /**
   * @var string
   */
  public $customLabel2;
  /**
   * @var string
   */
  public $customLabel3;
  /**
   * @var string
   */
  public $customLabel4;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayAdsId;
  /**
   * @var string
   */
  public $displayAdsLink;
  /**
   * @var string[]
   */
  public $displayAdsSimilarIds;
  /**
   * @var string
   */
  public $displayAdsTitle;
  public $displayAdsValue;
  /**
   * @var string
   */
  public $energyEfficiencyClass;
  /**
   * @var string[]
   */
  public $excludedDestinations;
  /**
   * @var string
   */
  public $expirationDate;
  /**
   * @var string
   */
  public $gender;
  /**
   * @var string
   */
  public $googleProductCategory;
  /**
   * @var string
   */
  public $gtin;
  /**
   * @var string
   */
  public $id;
  /**
   * @var bool
   */
  public $identifierExists;
  /**
   * @var string
   */
  public $imageLink;
  /**
   * @var string[]
   */
  public $includedDestinations;
  protected $installmentType = Installment::class;
  protected $installmentDataType = '';
  /**
   * @var bool
   */
  public $isBundle;
  /**
   * @var string
   */
  public $itemGroupId;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $link;
  /**
   * @var string
   */
  public $linkTemplate;
  protected $loyaltyPointsType = LoyaltyPoints::class;
  protected $loyaltyPointsDataType = '';
  /**
   * @var string
   */
  public $material;
  /**
   * @var string
   */
  public $maxEnergyEfficiencyClass;
  /**
   * @var string
   */
  public $maxHandlingTime;
  /**
   * @var string
   */
  public $minEnergyEfficiencyClass;
  /**
   * @var string
   */
  public $minHandlingTime;
  /**
   * @var string
   */
  public $mobileLink;
  /**
   * @var string
   */
  public $mobileLinkTemplate;
  /**
   * @var string
   */
  public $mpn;
  /**
   * @var string
   */
  public $multipack;
  /**
   * @var string
   */
  public $offerId;
  /**
   * @var string
   */
  public $pattern;
  /**
   * @var string
   */
  public $pickupMethod;
  /**
   * @var string
   */
  public $pickupSla;
  protected $priceType = Price::class;
  protected $priceDataType = '';
  protected $productDetailsType = ProductProductDetail::class;
  protected $productDetailsDataType = 'array';
  protected $productHeightType = ProductDimension::class;
  protected $productHeightDataType = '';
  /**
   * @var string[]
   */
  public $productHighlights;
  protected $productLengthType = ProductDimension::class;
  protected $productLengthDataType = '';
  /**
   * @var string[]
   */
  public $productTypes;
  protected $productWeightType = ProductWeight::class;
  protected $productWeightDataType = '';
  protected $productWidthType = ProductDimension::class;
  protected $productWidthDataType = '';
  /**
   * @var string[]
   */
  public $promotionIds;
  protected $salePriceType = Price::class;
  protected $salePriceDataType = '';
  /**
   * @var string
   */
  public $salePriceEffectiveDate;
  /**
   * @var string
   */
  public $sellOnGoogleQuantity;
  protected $shippingType = ProductShipping::class;
  protected $shippingDataType = 'array';
  protected $shippingHeightType = ProductShippingDimension::class;
  protected $shippingHeightDataType = '';
  /**
   * @var string
   */
  public $shippingLabel;
  protected $shippingLengthType = ProductShippingDimension::class;
  protected $shippingLengthDataType = '';
  protected $shippingWeightType = ProductShippingWeight::class;
  protected $shippingWeightDataType = '';
  protected $shippingWidthType = ProductShippingDimension::class;
  protected $shippingWidthDataType = '';
  /**
   * @var string[]
   */
  public $shoppingAdsExcludedCountries;
  /**
   * @var string
   */
  public $sizeSystem;
  /**
   * @var string
   */
  public $sizeType;
  /**
   * @var string[]
   */
  public $sizes;
  /**
   * @var string
   */
  public $source;
  protected $subscriptionCostType = ProductSubscriptionCost::class;
  protected $subscriptionCostDataType = '';
  /**
   * @var string
   */
  public $targetCountry;
  /**
   * @var string
   */
  public $taxCategory;
  protected $taxesType = ProductTax::class;
  protected $taxesDataType = 'array';
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $transitTimeLabel;
  protected $unitPricingBaseMeasureType = ProductUnitPricingBaseMeasure::class;
  protected $unitPricingBaseMeasureDataType = '';
  protected $unitPricingMeasureType = ProductUnitPricingMeasure::class;
  protected $unitPricingMeasureDataType = '';

  /**
   * @param string[]
   */
  public function setAdditionalImageLinks($additionalImageLinks)
  {
    $this->additionalImageLinks = $additionalImageLinks;
  }
  /**
   * @return string[]
   */
  public function getAdditionalImageLinks()
  {
    return $this->additionalImageLinks;
  }
  /**
   * @param string
   */
  public function setAdditionalSizeType($additionalSizeType)
  {
    $this->additionalSizeType = $additionalSizeType;
  }
  /**
   * @return string
   */
  public function getAdditionalSizeType()
  {
    return $this->additionalSizeType;
  }
  /**
   * @param string
   */
  public function setAdsGrouping($adsGrouping)
  {
    $this->adsGrouping = $adsGrouping;
  }
  /**
   * @return string
   */
  public function getAdsGrouping()
  {
    return $this->adsGrouping;
  }
  /**
   * @param string[]
   */
  public function setAdsLabels($adsLabels)
  {
    $this->adsLabels = $adsLabels;
  }
  /**
   * @return string[]
   */
  public function getAdsLabels()
  {
    return $this->adsLabels;
  }
  /**
   * @param string
   */
  public function setAdsRedirect($adsRedirect)
  {
    $this->adsRedirect = $adsRedirect;
  }
  /**
   * @return string
   */
  public function getAdsRedirect()
  {
    return $this->adsRedirect;
  }
  /**
   * @param bool
   */
  public function setAdult($adult)
  {
    $this->adult = $adult;
  }
  /**
   * @return bool
   */
  public function getAdult()
  {
    return $this->adult;
  }
  /**
   * @param string
   */
  public function setAgeGroup($ageGroup)
  {
    $this->ageGroup = $ageGroup;
  }
  /**
   * @return string
   */
  public function getAgeGroup()
  {
    return $this->ageGroup;
  }
  /**
   * @param string
   */
  public function setAvailability($availability)
  {
    $this->availability = $availability;
  }
  /**
   * @return string
   */
  public function getAvailability()
  {
    return $this->availability;
  }
  /**
   * @param string
   */
  public function setAvailabilityDate($availabilityDate)
  {
    $this->availabilityDate = $availabilityDate;
  }
  /**
   * @return string
   */
  public function getAvailabilityDate()
  {
    return $this->availabilityDate;
  }
  /**
   * @param string
   */
  public function setBrand($brand)
  {
    $this->brand = $brand;
  }
  /**
   * @return string
   */
  public function getBrand()
  {
    return $this->brand;
  }
  /**
   * @param string
   */
  public function setCanonicalLink($canonicalLink)
  {
    $this->canonicalLink = $canonicalLink;
  }
  /**
   * @return string
   */
  public function getCanonicalLink()
  {
    return $this->canonicalLink;
  }
  /**
   * @param string
   */
  public function setChannel($channel)
  {
    $this->channel = $channel;
  }
  /**
   * @return string
   */
  public function getChannel()
  {
    return $this->channel;
  }
  /**
   * @param string
   */
  public function setColor($color)
  {
    $this->color = $color;
  }
  /**
   * @return string
   */
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param string
   */
  public function setCondition($condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return string
   */
  public function getCondition()
  {
    return $this->condition;
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
   * @param Price
   */
  public function setCostOfGoodsSold(Price $costOfGoodsSold)
  {
    $this->costOfGoodsSold = $costOfGoodsSold;
  }
  /**
   * @return Price
   */
  public function getCostOfGoodsSold()
  {
    return $this->costOfGoodsSold;
  }
  /**
   * @param CustomAttribute[]
   */
  public function setCustomAttributes($customAttributes)
  {
    $this->customAttributes = $customAttributes;
  }
  /**
   * @return CustomAttribute[]
   */
  public function getCustomAttributes()
  {
    return $this->customAttributes;
  }
  /**
   * @param string
   */
  public function setCustomLabel0($customLabel0)
  {
    $this->customLabel0 = $customLabel0;
  }
  /**
   * @return string
   */
  public function getCustomLabel0()
  {
    return $this->customLabel0;
  }
  /**
   * @param string
   */
  public function setCustomLabel1($customLabel1)
  {
    $this->customLabel1 = $customLabel1;
  }
  /**
   * @return string
   */
  public function getCustomLabel1()
  {
    return $this->customLabel1;
  }
  /**
   * @param string
   */
  public function setCustomLabel2($customLabel2)
  {
    $this->customLabel2 = $customLabel2;
  }
  /**
   * @return string
   */
  public function getCustomLabel2()
  {
    return $this->customLabel2;
  }
  /**
   * @param string
   */
  public function setCustomLabel3($customLabel3)
  {
    $this->customLabel3 = $customLabel3;
  }
  /**
   * @return string
   */
  public function getCustomLabel3()
  {
    return $this->customLabel3;
  }
  /**
   * @param string
   */
  public function setCustomLabel4($customLabel4)
  {
    $this->customLabel4 = $customLabel4;
  }
  /**
   * @return string
   */
  public function getCustomLabel4()
  {
    return $this->customLabel4;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDisplayAdsId($displayAdsId)
  {
    $this->displayAdsId = $displayAdsId;
  }
  /**
   * @return string
   */
  public function getDisplayAdsId()
  {
    return $this->displayAdsId;
  }
  /**
   * @param string
   */
  public function setDisplayAdsLink($displayAdsLink)
  {
    $this->displayAdsLink = $displayAdsLink;
  }
  /**
   * @return string
   */
  public function getDisplayAdsLink()
  {
    return $this->displayAdsLink;
  }
  /**
   * @param string[]
   */
  public function setDisplayAdsSimilarIds($displayAdsSimilarIds)
  {
    $this->displayAdsSimilarIds = $displayAdsSimilarIds;
  }
  /**
   * @return string[]
   */
  public function getDisplayAdsSimilarIds()
  {
    return $this->displayAdsSimilarIds;
  }
  /**
   * @param string
   */
  public function setDisplayAdsTitle($displayAdsTitle)
  {
    $this->displayAdsTitle = $displayAdsTitle;
  }
  /**
   * @return string
   */
  public function getDisplayAdsTitle()
  {
    return $this->displayAdsTitle;
  }
  public function setDisplayAdsValue($displayAdsValue)
  {
    $this->displayAdsValue = $displayAdsValue;
  }
  public function getDisplayAdsValue()
  {
    return $this->displayAdsValue;
  }
  /**
   * @param string
   */
  public function setEnergyEfficiencyClass($energyEfficiencyClass)
  {
    $this->energyEfficiencyClass = $energyEfficiencyClass;
  }
  /**
   * @return string
   */
  public function getEnergyEfficiencyClass()
  {
    return $this->energyEfficiencyClass;
  }
  /**
   * @param string[]
   */
  public function setExcludedDestinations($excludedDestinations)
  {
    $this->excludedDestinations = $excludedDestinations;
  }
  /**
   * @return string[]
   */
  public function getExcludedDestinations()
  {
    return $this->excludedDestinations;
  }
  /**
   * @param string
   */
  public function setExpirationDate($expirationDate)
  {
    $this->expirationDate = $expirationDate;
  }
  /**
   * @return string
   */
  public function getExpirationDate()
  {
    return $this->expirationDate;
  }
  /**
   * @param string
   */
  public function setGender($gender)
  {
    $this->gender = $gender;
  }
  /**
   * @return string
   */
  public function getGender()
  {
    return $this->gender;
  }
  /**
   * @param string
   */
  public function setGoogleProductCategory($googleProductCategory)
  {
    $this->googleProductCategory = $googleProductCategory;
  }
  /**
   * @return string
   */
  public function getGoogleProductCategory()
  {
    return $this->googleProductCategory;
  }
  /**
   * @param string
   */
  public function setGtin($gtin)
  {
    $this->gtin = $gtin;
  }
  /**
   * @return string
   */
  public function getGtin()
  {
    return $this->gtin;
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
   * @param bool
   */
  public function setIdentifierExists($identifierExists)
  {
    $this->identifierExists = $identifierExists;
  }
  /**
   * @return bool
   */
  public function getIdentifierExists()
  {
    return $this->identifierExists;
  }
  /**
   * @param string
   */
  public function setImageLink($imageLink)
  {
    $this->imageLink = $imageLink;
  }
  /**
   * @return string
   */
  public function getImageLink()
  {
    return $this->imageLink;
  }
  /**
   * @param string[]
   */
  public function setIncludedDestinations($includedDestinations)
  {
    $this->includedDestinations = $includedDestinations;
  }
  /**
   * @return string[]
   */
  public function getIncludedDestinations()
  {
    return $this->includedDestinations;
  }
  /**
   * @param Installment
   */
  public function setInstallment(Installment $installment)
  {
    $this->installment = $installment;
  }
  /**
   * @return Installment
   */
  public function getInstallment()
  {
    return $this->installment;
  }
  /**
   * @param bool
   */
  public function setIsBundle($isBundle)
  {
    $this->isBundle = $isBundle;
  }
  /**
   * @return bool
   */
  public function getIsBundle()
  {
    return $this->isBundle;
  }
  /**
   * @param string
   */
  public function setItemGroupId($itemGroupId)
  {
    $this->itemGroupId = $itemGroupId;
  }
  /**
   * @return string
   */
  public function getItemGroupId()
  {
    return $this->itemGroupId;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setLink($link)
  {
    $this->link = $link;
  }
  /**
   * @return string
   */
  public function getLink()
  {
    return $this->link;
  }
  /**
   * @param string
   */
  public function setLinkTemplate($linkTemplate)
  {
    $this->linkTemplate = $linkTemplate;
  }
  /**
   * @return string
   */
  public function getLinkTemplate()
  {
    return $this->linkTemplate;
  }
  /**
   * @param LoyaltyPoints
   */
  public function setLoyaltyPoints(LoyaltyPoints $loyaltyPoints)
  {
    $this->loyaltyPoints = $loyaltyPoints;
  }
  /**
   * @return LoyaltyPoints
   */
  public function getLoyaltyPoints()
  {
    return $this->loyaltyPoints;
  }
  /**
   * @param string
   */
  public function setMaterial($material)
  {
    $this->material = $material;
  }
  /**
   * @return string
   */
  public function getMaterial()
  {
    return $this->material;
  }
  /**
   * @param string
   */
  public function setMaxEnergyEfficiencyClass($maxEnergyEfficiencyClass)
  {
    $this->maxEnergyEfficiencyClass = $maxEnergyEfficiencyClass;
  }
  /**
   * @return string
   */
  public function getMaxEnergyEfficiencyClass()
  {
    return $this->maxEnergyEfficiencyClass;
  }
  /**
   * @param string
   */
  public function setMaxHandlingTime($maxHandlingTime)
  {
    $this->maxHandlingTime = $maxHandlingTime;
  }
  /**
   * @return string
   */
  public function getMaxHandlingTime()
  {
    return $this->maxHandlingTime;
  }
  /**
   * @param string
   */
  public function setMinEnergyEfficiencyClass($minEnergyEfficiencyClass)
  {
    $this->minEnergyEfficiencyClass = $minEnergyEfficiencyClass;
  }
  /**
   * @return string
   */
  public function getMinEnergyEfficiencyClass()
  {
    return $this->minEnergyEfficiencyClass;
  }
  /**
   * @param string
   */
  public function setMinHandlingTime($minHandlingTime)
  {
    $this->minHandlingTime = $minHandlingTime;
  }
  /**
   * @return string
   */
  public function getMinHandlingTime()
  {
    return $this->minHandlingTime;
  }
  /**
   * @param string
   */
  public function setMobileLink($mobileLink)
  {
    $this->mobileLink = $mobileLink;
  }
  /**
   * @return string
   */
  public function getMobileLink()
  {
    return $this->mobileLink;
  }
  /**
   * @param string
   */
  public function setMobileLinkTemplate($mobileLinkTemplate)
  {
    $this->mobileLinkTemplate = $mobileLinkTemplate;
  }
  /**
   * @return string
   */
  public function getMobileLinkTemplate()
  {
    return $this->mobileLinkTemplate;
  }
  /**
   * @param string
   */
  public function setMpn($mpn)
  {
    $this->mpn = $mpn;
  }
  /**
   * @return string
   */
  public function getMpn()
  {
    return $this->mpn;
  }
  /**
   * @param string
   */
  public function setMultipack($multipack)
  {
    $this->multipack = $multipack;
  }
  /**
   * @return string
   */
  public function getMultipack()
  {
    return $this->multipack;
  }
  /**
   * @param string
   */
  public function setOfferId($offerId)
  {
    $this->offerId = $offerId;
  }
  /**
   * @return string
   */
  public function getOfferId()
  {
    return $this->offerId;
  }
  /**
   * @param string
   */
  public function setPattern($pattern)
  {
    $this->pattern = $pattern;
  }
  /**
   * @return string
   */
  public function getPattern()
  {
    return $this->pattern;
  }
  /**
   * @param string
   */
  public function setPickupMethod($pickupMethod)
  {
    $this->pickupMethod = $pickupMethod;
  }
  /**
   * @return string
   */
  public function getPickupMethod()
  {
    return $this->pickupMethod;
  }
  /**
   * @param string
   */
  public function setPickupSla($pickupSla)
  {
    $this->pickupSla = $pickupSla;
  }
  /**
   * @return string
   */
  public function getPickupSla()
  {
    return $this->pickupSla;
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
  /**
   * @param ProductProductDetail[]
   */
  public function setProductDetails($productDetails)
  {
    $this->productDetails = $productDetails;
  }
  /**
   * @return ProductProductDetail[]
   */
  public function getProductDetails()
  {
    return $this->productDetails;
  }
  /**
   * @param ProductDimension
   */
  public function setProductHeight(ProductDimension $productHeight)
  {
    $this->productHeight = $productHeight;
  }
  /**
   * @return ProductDimension
   */
  public function getProductHeight()
  {
    return $this->productHeight;
  }
  /**
   * @param string[]
   */
  public function setProductHighlights($productHighlights)
  {
    $this->productHighlights = $productHighlights;
  }
  /**
   * @return string[]
   */
  public function getProductHighlights()
  {
    return $this->productHighlights;
  }
  /**
   * @param ProductDimension
   */
  public function setProductLength(ProductDimension $productLength)
  {
    $this->productLength = $productLength;
  }
  /**
   * @return ProductDimension
   */
  public function getProductLength()
  {
    return $this->productLength;
  }
  /**
   * @param string[]
   */
  public function setProductTypes($productTypes)
  {
    $this->productTypes = $productTypes;
  }
  /**
   * @return string[]
   */
  public function getProductTypes()
  {
    return $this->productTypes;
  }
  /**
   * @param ProductWeight
   */
  public function setProductWeight(ProductWeight $productWeight)
  {
    $this->productWeight = $productWeight;
  }
  /**
   * @return ProductWeight
   */
  public function getProductWeight()
  {
    return $this->productWeight;
  }
  /**
   * @param ProductDimension
   */
  public function setProductWidth(ProductDimension $productWidth)
  {
    $this->productWidth = $productWidth;
  }
  /**
   * @return ProductDimension
   */
  public function getProductWidth()
  {
    return $this->productWidth;
  }
  /**
   * @param string[]
   */
  public function setPromotionIds($promotionIds)
  {
    $this->promotionIds = $promotionIds;
  }
  /**
   * @return string[]
   */
  public function getPromotionIds()
  {
    return $this->promotionIds;
  }
  /**
   * @param Price
   */
  public function setSalePrice(Price $salePrice)
  {
    $this->salePrice = $salePrice;
  }
  /**
   * @return Price
   */
  public function getSalePrice()
  {
    return $this->salePrice;
  }
  /**
   * @param string
   */
  public function setSalePriceEffectiveDate($salePriceEffectiveDate)
  {
    $this->salePriceEffectiveDate = $salePriceEffectiveDate;
  }
  /**
   * @return string
   */
  public function getSalePriceEffectiveDate()
  {
    return $this->salePriceEffectiveDate;
  }
  /**
   * @param string
   */
  public function setSellOnGoogleQuantity($sellOnGoogleQuantity)
  {
    $this->sellOnGoogleQuantity = $sellOnGoogleQuantity;
  }
  /**
   * @return string
   */
  public function getSellOnGoogleQuantity()
  {
    return $this->sellOnGoogleQuantity;
  }
  /**
   * @param ProductShipping[]
   */
  public function setShipping($shipping)
  {
    $this->shipping = $shipping;
  }
  /**
   * @return ProductShipping[]
   */
  public function getShipping()
  {
    return $this->shipping;
  }
  /**
   * @param ProductShippingDimension
   */
  public function setShippingHeight(ProductShippingDimension $shippingHeight)
  {
    $this->shippingHeight = $shippingHeight;
  }
  /**
   * @return ProductShippingDimension
   */
  public function getShippingHeight()
  {
    return $this->shippingHeight;
  }
  /**
   * @param string
   */
  public function setShippingLabel($shippingLabel)
  {
    $this->shippingLabel = $shippingLabel;
  }
  /**
   * @return string
   */
  public function getShippingLabel()
  {
    return $this->shippingLabel;
  }
  /**
   * @param ProductShippingDimension
   */
  public function setShippingLength(ProductShippingDimension $shippingLength)
  {
    $this->shippingLength = $shippingLength;
  }
  /**
   * @return ProductShippingDimension
   */
  public function getShippingLength()
  {
    return $this->shippingLength;
  }
  /**
   * @param ProductShippingWeight
   */
  public function setShippingWeight(ProductShippingWeight $shippingWeight)
  {
    $this->shippingWeight = $shippingWeight;
  }
  /**
   * @return ProductShippingWeight
   */
  public function getShippingWeight()
  {
    return $this->shippingWeight;
  }
  /**
   * @param ProductShippingDimension
   */
  public function setShippingWidth(ProductShippingDimension $shippingWidth)
  {
    $this->shippingWidth = $shippingWidth;
  }
  /**
   * @return ProductShippingDimension
   */
  public function getShippingWidth()
  {
    return $this->shippingWidth;
  }
  /**
   * @param string[]
   */
  public function setShoppingAdsExcludedCountries($shoppingAdsExcludedCountries)
  {
    $this->shoppingAdsExcludedCountries = $shoppingAdsExcludedCountries;
  }
  /**
   * @return string[]
   */
  public function getShoppingAdsExcludedCountries()
  {
    return $this->shoppingAdsExcludedCountries;
  }
  /**
   * @param string
   */
  public function setSizeSystem($sizeSystem)
  {
    $this->sizeSystem = $sizeSystem;
  }
  /**
   * @return string
   */
  public function getSizeSystem()
  {
    return $this->sizeSystem;
  }
  /**
   * @param string
   */
  public function setSizeType($sizeType)
  {
    $this->sizeType = $sizeType;
  }
  /**
   * @return string
   */
  public function getSizeType()
  {
    return $this->sizeType;
  }
  /**
   * @param string[]
   */
  public function setSizes($sizes)
  {
    $this->sizes = $sizes;
  }
  /**
   * @return string[]
   */
  public function getSizes()
  {
    return $this->sizes;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param ProductSubscriptionCost
   */
  public function setSubscriptionCost(ProductSubscriptionCost $subscriptionCost)
  {
    $this->subscriptionCost = $subscriptionCost;
  }
  /**
   * @return ProductSubscriptionCost
   */
  public function getSubscriptionCost()
  {
    return $this->subscriptionCost;
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
  /**
   * @param string
   */
  public function setTaxCategory($taxCategory)
  {
    $this->taxCategory = $taxCategory;
  }
  /**
   * @return string
   */
  public function getTaxCategory()
  {
    return $this->taxCategory;
  }
  /**
   * @param ProductTax[]
   */
  public function setTaxes($taxes)
  {
    $this->taxes = $taxes;
  }
  /**
   * @return ProductTax[]
   */
  public function getTaxes()
  {
    return $this->taxes;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setTransitTimeLabel($transitTimeLabel)
  {
    $this->transitTimeLabel = $transitTimeLabel;
  }
  /**
   * @return string
   */
  public function getTransitTimeLabel()
  {
    return $this->transitTimeLabel;
  }
  /**
   * @param ProductUnitPricingBaseMeasure
   */
  public function setUnitPricingBaseMeasure(ProductUnitPricingBaseMeasure $unitPricingBaseMeasure)
  {
    $this->unitPricingBaseMeasure = $unitPricingBaseMeasure;
  }
  /**
   * @return ProductUnitPricingBaseMeasure
   */
  public function getUnitPricingBaseMeasure()
  {
    return $this->unitPricingBaseMeasure;
  }
  /**
   * @param ProductUnitPricingMeasure
   */
  public function setUnitPricingMeasure(ProductUnitPricingMeasure $unitPricingMeasure)
  {
    $this->unitPricingMeasure = $unitPricingMeasure;
  }
  /**
   * @return ProductUnitPricingMeasure
   */
  public function getUnitPricingMeasure()
  {
    return $this->unitPricingMeasure;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Product::class, 'Google_Service_ShoppingContent_Product');
