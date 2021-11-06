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
  public $availability;
  public $availableQuantity;
  public $availableTime;
  public $brands;
  public $categories;
  public $collectionMemberIds;
  protected $colorInfoType = GoogleCloudRetailV2ColorInfo::class;
  protected $colorInfoDataType = '';
  public $conditions;
  public $description;
  public $expireTime;
  protected $fulfillmentInfoType = GoogleCloudRetailV2FulfillmentInfo::class;
  protected $fulfillmentInfoDataType = 'array';
  public $gtin;
  public $id;
  protected $imagesType = GoogleCloudRetailV2Image::class;
  protected $imagesDataType = 'array';
  public $languageCode;
  public $materials;
  public $name;
  public $patterns;
  protected $priceInfoType = GoogleCloudRetailV2PriceInfo::class;
  protected $priceInfoDataType = '';
  public $primaryProductId;
  protected $promotionsType = GoogleCloudRetailV2Promotion::class;
  protected $promotionsDataType = 'array';
  public $publishTime;
  protected $ratingType = GoogleCloudRetailV2Rating::class;
  protected $ratingDataType = '';
  public $retrievableFields;
  public $sizes;
  public $tags;
  public $title;
  public $ttl;
  public $type;
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
  public function setAvailability($availability)
  {
    $this->availability = $availability;
  }
  public function getAvailability()
  {
    return $this->availability;
  }
  public function setAvailableQuantity($availableQuantity)
  {
    $this->availableQuantity = $availableQuantity;
  }
  public function getAvailableQuantity()
  {
    return $this->availableQuantity;
  }
  public function setAvailableTime($availableTime)
  {
    $this->availableTime = $availableTime;
  }
  public function getAvailableTime()
  {
    return $this->availableTime;
  }
  public function setBrands($brands)
  {
    $this->brands = $brands;
  }
  public function getBrands()
  {
    return $this->brands;
  }
  public function setCategories($categories)
  {
    $this->categories = $categories;
  }
  public function getCategories()
  {
    return $this->categories;
  }
  public function setCollectionMemberIds($collectionMemberIds)
  {
    $this->collectionMemberIds = $collectionMemberIds;
  }
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
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  public function getConditions()
  {
    return $this->conditions;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
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
  public function setGtin($gtin)
  {
    $this->gtin = $gtin;
  }
  public function getGtin()
  {
    return $this->gtin;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
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
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setMaterials($materials)
  {
    $this->materials = $materials;
  }
  public function getMaterials()
  {
    return $this->materials;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPatterns($patterns)
  {
    $this->patterns = $patterns;
  }
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
  public function setPrimaryProductId($primaryProductId)
  {
    $this->primaryProductId = $primaryProductId;
  }
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
  public function setPublishTime($publishTime)
  {
    $this->publishTime = $publishTime;
  }
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
  public function setRetrievableFields($retrievableFields)
  {
    $this->retrievableFields = $retrievableFields;
  }
  public function getRetrievableFields()
  {
    return $this->retrievableFields;
  }
  public function setSizes($sizes)
  {
    $this->sizes = $sizes;
  }
  public function getSizes()
  {
    return $this->sizes;
  }
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  public function getTags()
  {
    return $this->tags;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setTtl($ttl)
  {
    $this->ttl = $ttl;
  }
  public function getTtl()
  {
    return $this->ttl;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
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
