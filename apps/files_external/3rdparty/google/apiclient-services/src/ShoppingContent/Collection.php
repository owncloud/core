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

class Collection extends \Google\Collection
{
  protected $collection_key = 'imageLink';
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
  protected $featuredProductType = CollectionFeaturedProduct::class;
  protected $featuredProductDataType = 'array';
  /**
   * @var string[]
   */
  public $headline;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string[]
   */
  public $imageLink;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $link;
  /**
   * @var string
   */
  public $mobileLink;
  /**
   * @var string
   */
  public $productCountry;

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
   * @param CollectionFeaturedProduct[]
   */
  public function setFeaturedProduct($featuredProduct)
  {
    $this->featuredProduct = $featuredProduct;
  }
  /**
   * @return CollectionFeaturedProduct[]
   */
  public function getFeaturedProduct()
  {
    return $this->featuredProduct;
  }
  /**
   * @param string[]
   */
  public function setHeadline($headline)
  {
    $this->headline = $headline;
  }
  /**
   * @return string[]
   */
  public function getHeadline()
  {
    return $this->headline;
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
  public function setImageLink($imageLink)
  {
    $this->imageLink = $imageLink;
  }
  /**
   * @return string[]
   */
  public function getImageLink()
  {
    return $this->imageLink;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
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
  public function setProductCountry($productCountry)
  {
    $this->productCountry = $productCountry;
  }
  /**
   * @return string
   */
  public function getProductCountry()
  {
    return $this->productCountry;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Collection::class, 'Google_Service_ShoppingContent_Collection');
