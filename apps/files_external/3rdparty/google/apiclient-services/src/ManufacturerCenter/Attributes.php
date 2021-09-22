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

namespace Google\Service\ManufacturerCenter;

class Attributes extends \Google\Collection
{
  protected $collection_key = 'videoLink';
  protected $additionalImageLinkType = Image::class;
  protected $additionalImageLinkDataType = 'array';
  public $ageGroup;
  public $brand;
  protected $capacityType = Capacity::class;
  protected $capacityDataType = '';
  public $color;
  protected $countType = Count::class;
  protected $countDataType = '';
  public $description;
  public $disclosureDate;
  public $excludedDestination;
  protected $featureDescriptionType = FeatureDescription::class;
  protected $featureDescriptionDataType = 'array';
  public $flavor;
  public $format;
  public $gender;
  public $gtin;
  protected $imageLinkType = Image::class;
  protected $imageLinkDataType = '';
  public $includedDestination;
  public $itemGroupId;
  public $material;
  public $mpn;
  public $pattern;
  protected $productDetailType = ProductDetail::class;
  protected $productDetailDataType = 'array';
  public $productHighlight;
  public $productLine;
  public $productName;
  public $productPageUrl;
  public $productType;
  public $releaseDate;
  public $richProductContent;
  public $scent;
  public $size;
  public $sizeSystem;
  public $sizeType;
  protected $suggestedRetailPriceType = Price::class;
  protected $suggestedRetailPriceDataType = '';
  public $targetClientId;
  public $theme;
  public $title;
  public $videoLink;

  /**
   * @param Image[]
   */
  public function setAdditionalImageLink($additionalImageLink)
  {
    $this->additionalImageLink = $additionalImageLink;
  }
  /**
   * @return Image[]
   */
  public function getAdditionalImageLink()
  {
    return $this->additionalImageLink;
  }
  public function setAgeGroup($ageGroup)
  {
    $this->ageGroup = $ageGroup;
  }
  public function getAgeGroup()
  {
    return $this->ageGroup;
  }
  public function setBrand($brand)
  {
    $this->brand = $brand;
  }
  public function getBrand()
  {
    return $this->brand;
  }
  /**
   * @param Capacity
   */
  public function setCapacity(Capacity $capacity)
  {
    $this->capacity = $capacity;
  }
  /**
   * @return Capacity
   */
  public function getCapacity()
  {
    return $this->capacity;
  }
  public function setColor($color)
  {
    $this->color = $color;
  }
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param Count
   */
  public function setCount(Count $count)
  {
    $this->count = $count;
  }
  /**
   * @return Count
   */
  public function getCount()
  {
    return $this->count;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisclosureDate($disclosureDate)
  {
    $this->disclosureDate = $disclosureDate;
  }
  public function getDisclosureDate()
  {
    return $this->disclosureDate;
  }
  public function setExcludedDestination($excludedDestination)
  {
    $this->excludedDestination = $excludedDestination;
  }
  public function getExcludedDestination()
  {
    return $this->excludedDestination;
  }
  /**
   * @param FeatureDescription[]
   */
  public function setFeatureDescription($featureDescription)
  {
    $this->featureDescription = $featureDescription;
  }
  /**
   * @return FeatureDescription[]
   */
  public function getFeatureDescription()
  {
    return $this->featureDescription;
  }
  public function setFlavor($flavor)
  {
    $this->flavor = $flavor;
  }
  public function getFlavor()
  {
    return $this->flavor;
  }
  public function setFormat($format)
  {
    $this->format = $format;
  }
  public function getFormat()
  {
    return $this->format;
  }
  public function setGender($gender)
  {
    $this->gender = $gender;
  }
  public function getGender()
  {
    return $this->gender;
  }
  public function setGtin($gtin)
  {
    $this->gtin = $gtin;
  }
  public function getGtin()
  {
    return $this->gtin;
  }
  /**
   * @param Image
   */
  public function setImageLink(Image $imageLink)
  {
    $this->imageLink = $imageLink;
  }
  /**
   * @return Image
   */
  public function getImageLink()
  {
    return $this->imageLink;
  }
  public function setIncludedDestination($includedDestination)
  {
    $this->includedDestination = $includedDestination;
  }
  public function getIncludedDestination()
  {
    return $this->includedDestination;
  }
  public function setItemGroupId($itemGroupId)
  {
    $this->itemGroupId = $itemGroupId;
  }
  public function getItemGroupId()
  {
    return $this->itemGroupId;
  }
  public function setMaterial($material)
  {
    $this->material = $material;
  }
  public function getMaterial()
  {
    return $this->material;
  }
  public function setMpn($mpn)
  {
    $this->mpn = $mpn;
  }
  public function getMpn()
  {
    return $this->mpn;
  }
  public function setPattern($pattern)
  {
    $this->pattern = $pattern;
  }
  public function getPattern()
  {
    return $this->pattern;
  }
  /**
   * @param ProductDetail[]
   */
  public function setProductDetail($productDetail)
  {
    $this->productDetail = $productDetail;
  }
  /**
   * @return ProductDetail[]
   */
  public function getProductDetail()
  {
    return $this->productDetail;
  }
  public function setProductHighlight($productHighlight)
  {
    $this->productHighlight = $productHighlight;
  }
  public function getProductHighlight()
  {
    return $this->productHighlight;
  }
  public function setProductLine($productLine)
  {
    $this->productLine = $productLine;
  }
  public function getProductLine()
  {
    return $this->productLine;
  }
  public function setProductName($productName)
  {
    $this->productName = $productName;
  }
  public function getProductName()
  {
    return $this->productName;
  }
  public function setProductPageUrl($productPageUrl)
  {
    $this->productPageUrl = $productPageUrl;
  }
  public function getProductPageUrl()
  {
    return $this->productPageUrl;
  }
  public function setProductType($productType)
  {
    $this->productType = $productType;
  }
  public function getProductType()
  {
    return $this->productType;
  }
  public function setReleaseDate($releaseDate)
  {
    $this->releaseDate = $releaseDate;
  }
  public function getReleaseDate()
  {
    return $this->releaseDate;
  }
  public function setRichProductContent($richProductContent)
  {
    $this->richProductContent = $richProductContent;
  }
  public function getRichProductContent()
  {
    return $this->richProductContent;
  }
  public function setScent($scent)
  {
    $this->scent = $scent;
  }
  public function getScent()
  {
    return $this->scent;
  }
  public function setSize($size)
  {
    $this->size = $size;
  }
  public function getSize()
  {
    return $this->size;
  }
  public function setSizeSystem($sizeSystem)
  {
    $this->sizeSystem = $sizeSystem;
  }
  public function getSizeSystem()
  {
    return $this->sizeSystem;
  }
  public function setSizeType($sizeType)
  {
    $this->sizeType = $sizeType;
  }
  public function getSizeType()
  {
    return $this->sizeType;
  }
  /**
   * @param Price
   */
  public function setSuggestedRetailPrice(Price $suggestedRetailPrice)
  {
    $this->suggestedRetailPrice = $suggestedRetailPrice;
  }
  /**
   * @return Price
   */
  public function getSuggestedRetailPrice()
  {
    return $this->suggestedRetailPrice;
  }
  public function setTargetClientId($targetClientId)
  {
    $this->targetClientId = $targetClientId;
  }
  public function getTargetClientId()
  {
    return $this->targetClientId;
  }
  public function setTheme($theme)
  {
    $this->theme = $theme;
  }
  public function getTheme()
  {
    return $this->theme;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setVideoLink($videoLink)
  {
    $this->videoLink = $videoLink;
  }
  public function getVideoLink()
  {
    return $this->videoLink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Attributes::class, 'Google_Service_ManufacturerCenter_Attributes');
