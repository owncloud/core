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

namespace Google\Service\Cloudbilling;

class Sku extends \Google\Collection
{
  protected $collection_key = 'serviceRegions';
  protected $categoryType = Category::class;
  protected $categoryDataType = '';
  /**
   * @var string
   */
  public $description;
  protected $geoTaxonomyType = GeoTaxonomy::class;
  protected $geoTaxonomyDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $pricingInfoType = PricingInfo::class;
  protected $pricingInfoDataType = 'array';
  /**
   * @var string
   */
  public $serviceProviderName;
  /**
   * @var string[]
   */
  public $serviceRegions;
  /**
   * @var string
   */
  public $skuId;

  /**
   * @param Category
   */
  public function setCategory(Category $category)
  {
    $this->category = $category;
  }
  /**
   * @return Category
   */
  public function getCategory()
  {
    return $this->category;
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
   * @param GeoTaxonomy
   */
  public function setGeoTaxonomy(GeoTaxonomy $geoTaxonomy)
  {
    $this->geoTaxonomy = $geoTaxonomy;
  }
  /**
   * @return GeoTaxonomy
   */
  public function getGeoTaxonomy()
  {
    return $this->geoTaxonomy;
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
   * @param PricingInfo[]
   */
  public function setPricingInfo($pricingInfo)
  {
    $this->pricingInfo = $pricingInfo;
  }
  /**
   * @return PricingInfo[]
   */
  public function getPricingInfo()
  {
    return $this->pricingInfo;
  }
  /**
   * @param string
   */
  public function setServiceProviderName($serviceProviderName)
  {
    $this->serviceProviderName = $serviceProviderName;
  }
  /**
   * @return string
   */
  public function getServiceProviderName()
  {
    return $this->serviceProviderName;
  }
  /**
   * @param string[]
   */
  public function setServiceRegions($serviceRegions)
  {
    $this->serviceRegions = $serviceRegions;
  }
  /**
   * @return string[]
   */
  public function getServiceRegions()
  {
    return $this->serviceRegions;
  }
  /**
   * @param string
   */
  public function setSkuId($skuId)
  {
    $this->skuId = $skuId;
  }
  /**
   * @return string
   */
  public function getSkuId()
  {
    return $this->skuId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Sku::class, 'Google_Service_Cloudbilling_Sku');
