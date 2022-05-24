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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2Product extends \Google\Collection
{
  protected $collection_key = 'variants';
  protected $attributesType = GoogleCloudRetailV2CustomAttribute::class;
  protected $attributesDataType = 'map';
  protected $audienceType = GoogleCloudRetailV2Audience::class;
  protected $audienceDataType = '';
  /**
   * @var string
   */
  public $availability;
  /**
   * @var int
   */
  public $availableQuantity;
  /**
   * @var string
   */
  public $availableTime;
  /**
   * @var string[]
   */
  public $brands;
  /**
   * @var string[]
   */
  public $categories;
  /**
   * @var string[]
   */
  public $collectionMemberIds;
  protected $colorInfoType = GoogleCloudRetailV2ColorInfo::class;
  protected $colorInfoDataType = '';
  /**
   * @var string[]
   */
  public $conditions;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $expireTime;
  protected $fulfillmentInfoType = GoogleCloudRetailV2FulfillmentInfo::class;
  protected $fulfillmentInfoDataType = 'array';
  /**
   * @var string
   */
  public $gtin;
  /**
   * @var string
   */
  public $id;
  protected $imagesType = GoogleCloudRetailV2Image::class;
  protected $imagesDataType = 'array';
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var string[]
   */
  public $materials;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $patterns;
  protected $priceInfoType = GoogleCloudRetailV2PriceInfo::class;
  protected $priceInfoDataType = '';
  /**
   * @var string
   */
  public $primaryProductId;
  protected $promotionsType = GoogleCloudRetailV2Promotion::class;
  protected $promotionsDataType = 'array';
  /**
   * @var string
   */
  public $publishTime;
  protected $ratingType = GoogleCloudRetailV2Rating::class;
  protected $ratingDataType = '';
  /**
   * @var string
   */
  public $retrievableFields;
  /**
   * @var string[]
   */
  public $sizes;
  /**
   * @var string[]
   */
  public $tags;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $ttl;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $uri;
  protected $variantsType = GoogleCloudRetailV2Product::class;
  protected $variantsDataType = 'array';

  /**
   * @param GoogleCloudRetailV2CustomAttribute[]
   */
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return GoogleCloudRetailV2CustomAttribute[]
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  /**
   * @param GoogleCloudRetailV2Audience
   */
  public function setAudience(GoogleCloudRetailV2Audience $audience)
  {
    $this->audience = $audience;
  }
  /**
   * @return GoogleCloudRetailV2Audience
   */
  public function getAudience()
  {
    return $this->audience;
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
   * @param int
   */
  public function setAvailableQuantity($availableQuantity)
  {
    $this->availableQuantity = $availableQuantity;
  }
  /**
   * @return int
   */
  public function getAvailableQuantity()
  {
    return $this->availableQuantity;
  }
  /**
   * @param string
   */
  public function setAvailableTime($availableTime)
  {
    $this->availableTime = $availableTime;
  }
  /**
   * @return string
   */
  public function getAvailableTime()
  {
    return $this->availableTime;
  }
  /**
   * @param string[]
   */
  public function setBrands($brands)
  {
    $this->brands = $brands;
  }
  /**
   * @return string[]
   */
  public function getBrands()
  {
    return $this->brands;
  }
  /**
   * @param string[]
   */
  public function setCategories($categories)
  {
    $this->categories = $categories;
  }
  /**
   * @return string[]
   */
  public function getCategories()
  {
    return $this->categories;
  }
  /**
   * @param string[]
   */
  public function setCollectionMemberIds($collectionMemberIds)
  {
    $this->collectionMemberIds = $collectionMemberIds;
  }
  /**
   * @return string[]
   */
  public function getCollectionMemberIds()
  {
    return $this->collectionMemberIds;
  }
  /**
   * @param GoogleCloudRetailV2ColorInfo
   */
  public function setColorInfo(GoogleCloudRetailV2ColorInfo $colorInfo)
  {
    $this->colorInfo = $colorInfo;
  }
  /**
   * @return GoogleCloudRetailV2ColorInfo
   */
  public function getColorInfo()
  {
    return $this->colorInfo;
  }
  /**
   * @param string[]
   */
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  /**
   * @return string[]
   */
  public function getConditions()
  {
    return $this->conditions;
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
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  /**
   * @return string
   */
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  /**
   * @param GoogleCloudRetailV2FulfillmentInfo[]
   */
  public function setFulfillmentInfo($fulfillmentInfo)
  {
    $this->fulfillmentInfo = $fulfillmentInfo;
  }
  /**
   * @return GoogleCloudRetailV2FulfillmentInfo[]
   */
  public function getFulfillmentInfo()
  {
    return $this->fulfillmentInfo;
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
   * @param GoogleCloudRetailV2Image[]
   */
  public function setImages($images)
  {
    $this->images = $images;
  }
  /**
   * @return GoogleCloudRetailV2Image[]
   */
  public function getImages()
  {
    return $this->images;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param string[]
   */
  public function setMaterials($materials)
  {
    $this->materials = $materials;
  }
  /**
   * @return string[]
   */
  public function getMaterials()
  {
    return $this->materials;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setPatterns($patterns)
  {
    $this->patterns = $patterns;
  }
  /**
   * @return string[]
   */
  public function getPatterns()
  {
    return $this->patterns;
  }
  /**
   * @param GoogleCloudRetailV2PriceInfo
   */
  public function setPriceInfo(GoogleCloudRetailV2PriceInfo $priceInfo)
  {
    $this->priceInfo = $priceInfo;
  }
  /**
   * @return GoogleCloudRetailV2PriceInfo
   */
  public function getPriceInfo()
  {
    return $this->priceInfo;
  }
  /**
   * @param string
   */
  public function setPrimaryProductId($primaryProductId)
  {
    $this->primaryProductId = $primaryProductId;
  }
  /**
   * @return string
   */
  public function getPrimaryProductId()
  {
    return $this->primaryProductId;
  }
  /**
   * @param GoogleCloudRetailV2Promotion[]
   */
  public function setPromotions($promotions)
  {
    $this->promotions = $promotions;
  }
  /**
   * @return GoogleCloudRetailV2Promotion[]
   */
  public function getPromotions()
  {
    return $this->promotions;
  }
  /**
   * @param string
   */
  public function setPublishTime($publishTime)
  {
    $this->publishTime = $publishTime;
  }
  /**
   * @return string
   */
  public function getPublishTime()
  {
    return $this->publishTime;
  }
  /**
   * @param GoogleCloudRetailV2Rating
   */
  public function setRating(GoogleCloudRetailV2Rating $rating)
  {
    $this->rating = $rating;
  }
  /**
   * @return GoogleCloudRetailV2Rating
   */
  public function getRating()
  {
    return $this->rating;
  }
  /**
   * @param string
   */
  public function setRetrievableFields($retrievableFields)
  {
    $this->retrievableFields = $retrievableFields;
  }
  /**
   * @return string
   */
  public function getRetrievableFields()
  {
    return $this->retrievableFields;
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
   * @param string[]
   */
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return string[]
   */
  public function getTags()
  {
    return $this->tags;
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
  public function setTtl($ttl)
  {
    $this->ttl = $ttl;
  }
  /**
   * @return string
   */
  public function getTtl()
  {
    return $this->ttl;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
  /**
   * @param GoogleCloudRetailV2Product[]
   */
  public function setVariants($variants)
  {
    $this->variants = $variants;
  }
  /**
   * @return GoogleCloudRetailV2Product[]
   */
  public function getVariants()
  {
    return $this->variants;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2Product::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2Product');
