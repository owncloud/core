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
  /**
   * @var string
   */
  public $ageGroup;
  /**
   * @var string
   */
  public $brand;
  protected $capacityType = Capacity::class;
  protected $capacityDataType = '';
  /**
   * @var string
   */
  public $color;
  protected $countType = Count::class;
  protected $countDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $disclosureDate;
  /**
   * @var string[]
   */
  public $excludedDestination;
  protected $featureDescriptionType = FeatureDescription::class;
  protected $featureDescriptionDataType = 'array';
  /**
   * @var string
   */
  public $flavor;
  /**
   * @var string
   */
  public $format;
  /**
   * @var string
   */
  public $gender;
  /**
   * @var string[]
   */
  public $gtin;
  protected $imageLinkType = Image::class;
  protected $imageLinkDataType = '';
  /**
   * @var string[]
   */
  public $includedDestination;
  /**
   * @var string
   */
  public $itemGroupId;
  /**
   * @var string
   */
  public $material;
  /**
   * @var string
   */
  public $mpn;
  /**
   * @var string
   */
  public $pattern;
  protected $productDetailType = ProductDetail::class;
  protected $productDetailDataType = 'array';
  /**
   * @var string[]
   */
  public $productHighlight;
  /**
   * @var string
   */
  public $productLine;
  /**
   * @var string
   */
  public $productName;
  /**
   * @var string
   */
  public $productPageUrl;
  /**
   * @var string[]
   */
  public $productType;
  /**
   * @var string
   */
  public $releaseDate;
  /**
   * @var string[]
   */
  public $richProductContent;
  /**
   * @var string
   */
  public $scent;
  /**
   * @var string
   */
  public $size;
  /**
   * @var string
   */
  public $sizeSystem;
  /**
   * @var string[]
   */
  public $sizeType;
  protected $suggestedRetailPriceType = Price::class;
  protected $suggestedRetailPriceDataType = '';
  /**
   * @var string
   */
  public $targetClientId;
  /**
   * @var string
   */
  public $theme;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string[]
   */
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
  public function setDisclosureDate($disclosureDate)
  {
    $this->disclosureDate = $disclosureDate;
  }
  /**
   * @return string
   */
  public function getDisclosureDate()
  {
    return $this->disclosureDate;
  }
  /**
   * @param string[]
   */
  public function setExcludedDestination($excludedDestination)
  {
    $this->excludedDestination = $excludedDestination;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param string
   */
  public function setFlavor($flavor)
  {
    $this->flavor = $flavor;
  }
  /**
   * @return string
   */
  public function getFlavor()
  {
    return $this->flavor;
  }
  /**
   * @param string
   */
  public function setFormat($format)
  {
    $this->format = $format;
  }
  /**
   * @return string
   */
  public function getFormat()
  {
    return $this->format;
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
   * @param string[]
   */
  public function setGtin($gtin)
  {
    $this->gtin = $gtin;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param string[]
   */
  public function setIncludedDestination($includedDestination)
  {
    $this->includedDestination = $includedDestination;
  }
  /**
   * @return string[]
   */
  public function getIncludedDestination()
  {
    return $this->includedDestination;
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
  /**
   * @param string[]
   */
  public function setProductHighlight($productHighlight)
  {
    $this->productHighlight = $productHighlight;
  }
  /**
   * @return string[]
   */
  public function getProductHighlight()
  {
    return $this->productHighlight;
  }
  /**
   * @param string
   */
  public function setProductLine($productLine)
  {
    $this->productLine = $productLine;
  }
  /**
   * @return string
   */
  public function getProductLine()
  {
    return $this->productLine;
  }
  /**
   * @param string
   */
  public function setProductName($productName)
  {
    $this->productName = $productName;
  }
  /**
   * @return string
   */
  public function getProductName()
  {
    return $this->productName;
  }
  /**
   * @param string
   */
  public function setProductPageUrl($productPageUrl)
  {
    $this->productPageUrl = $productPageUrl;
  }
  /**
   * @return string
   */
  public function getProductPageUrl()
  {
    return $this->productPageUrl;
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
   * @param string
   */
  public function setReleaseDate($releaseDate)
  {
    $this->releaseDate = $releaseDate;
  }
  /**
   * @return string
   */
  public function getReleaseDate()
  {
    return $this->releaseDate;
  }
  /**
   * @param string[]
   */
  public function setRichProductContent($richProductContent)
  {
    $this->richProductContent = $richProductContent;
  }
  /**
   * @return string[]
   */
  public function getRichProductContent()
  {
    return $this->richProductContent;
  }
  /**
   * @param string
   */
  public function setScent($scent)
  {
    $this->scent = $scent;
  }
  /**
   * @return string
   */
  public function getScent()
  {
    return $this->scent;
  }
  /**
   * @param string
   */
  public function setSize($size)
  {
    $this->size = $size;
  }
  /**
   * @return string
   */
  public function getSize()
  {
    return $this->size;
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
   * @param string[]
   */
  public function setSizeType($sizeType)
  {
    $this->sizeType = $sizeType;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param string
   */
  public function setTargetClientId($targetClientId)
  {
    $this->targetClientId = $targetClientId;
  }
  /**
   * @return string
   */
  public function getTargetClientId()
  {
    return $this->targetClientId;
  }
  /**
   * @param string
   */
  public function setTheme($theme)
  {
    $this->theme = $theme;
  }
  /**
   * @return string
   */
  public function getTheme()
  {
    return $this->theme;
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
   * @param string[]
   */
  public function setVideoLink($videoLink)
  {
    $this->videoLink = $videoLink;
  }
  /**
   * @return string[]
   */
  public function getVideoLink()
  {
    return $this->videoLink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Attributes::class, 'Google_Service_ManufacturerCenter_Attributes');
