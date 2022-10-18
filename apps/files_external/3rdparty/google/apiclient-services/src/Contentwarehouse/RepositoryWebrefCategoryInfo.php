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

namespace Google\Service\Contentwarehouse;

class RepositoryWebrefCategoryInfo extends \Google\Collection
{
  protected $collection_key = 'wpCategory';
  protected $allTypesType = RepositoryWebrefFreebaseType::class;
  protected $allTypesDataType = 'array';
  protected $fatcatCategoryType = RepositoryWebrefFatcatCategory::class;
  protected $fatcatCategoryDataType = 'array';
  protected $fatcatContextType = RepositoryWebrefFatcatCategory::class;
  protected $fatcatContextDataType = 'array';
  protected $freebaseTypeType = RepositoryWebrefFreebaseType::class;
  protected $freebaseTypeDataType = 'array';
  protected $kgCollectionType = RepositoryWebrefKGCollection::class;
  protected $kgCollectionDataType = 'array';
  protected $oysterTypeType = RepositoryWebrefOysterType::class;
  protected $oysterTypeDataType = '';
  protected $salientCategoryType = RepositoryWebrefFatcatCategory::class;
  protected $salientCategoryDataType = 'array';
  protected $wikipediaCategoryType = RepositoryWebrefWikipediaCategory::class;
  protected $wikipediaCategoryDataType = 'array';
  protected $wpCategoryType = RepositoryWebrefFreebaseType::class;
  protected $wpCategoryDataType = 'array';

  /**
   * @param RepositoryWebrefFreebaseType[]
   */
  public function setAllTypes($allTypes)
  {
    $this->allTypes = $allTypes;
  }
  /**
   * @return RepositoryWebrefFreebaseType[]
   */
  public function getAllTypes()
  {
    return $this->allTypes;
  }
  /**
   * @param RepositoryWebrefFatcatCategory[]
   */
  public function setFatcatCategory($fatcatCategory)
  {
    $this->fatcatCategory = $fatcatCategory;
  }
  /**
   * @return RepositoryWebrefFatcatCategory[]
   */
  public function getFatcatCategory()
  {
    return $this->fatcatCategory;
  }
  /**
   * @param RepositoryWebrefFatcatCategory[]
   */
  public function setFatcatContext($fatcatContext)
  {
    $this->fatcatContext = $fatcatContext;
  }
  /**
   * @return RepositoryWebrefFatcatCategory[]
   */
  public function getFatcatContext()
  {
    return $this->fatcatContext;
  }
  /**
   * @param RepositoryWebrefFreebaseType[]
   */
  public function setFreebaseType($freebaseType)
  {
    $this->freebaseType = $freebaseType;
  }
  /**
   * @return RepositoryWebrefFreebaseType[]
   */
  public function getFreebaseType()
  {
    return $this->freebaseType;
  }
  /**
   * @param RepositoryWebrefKGCollection[]
   */
  public function setKgCollection($kgCollection)
  {
    $this->kgCollection = $kgCollection;
  }
  /**
   * @return RepositoryWebrefKGCollection[]
   */
  public function getKgCollection()
  {
    return $this->kgCollection;
  }
  /**
   * @param RepositoryWebrefOysterType
   */
  public function setOysterType(RepositoryWebrefOysterType $oysterType)
  {
    $this->oysterType = $oysterType;
  }
  /**
   * @return RepositoryWebrefOysterType
   */
  public function getOysterType()
  {
    return $this->oysterType;
  }
  /**
   * @param RepositoryWebrefFatcatCategory[]
   */
  public function setSalientCategory($salientCategory)
  {
    $this->salientCategory = $salientCategory;
  }
  /**
   * @return RepositoryWebrefFatcatCategory[]
   */
  public function getSalientCategory()
  {
    return $this->salientCategory;
  }
  /**
   * @param RepositoryWebrefWikipediaCategory[]
   */
  public function setWikipediaCategory($wikipediaCategory)
  {
    $this->wikipediaCategory = $wikipediaCategory;
  }
  /**
   * @return RepositoryWebrefWikipediaCategory[]
   */
  public function getWikipediaCategory()
  {
    return $this->wikipediaCategory;
  }
  /**
   * @param RepositoryWebrefFreebaseType[]
   */
  public function setWpCategory($wpCategory)
  {
    $this->wpCategory = $wpCategory;
  }
  /**
   * @return RepositoryWebrefFreebaseType[]
   */
  public function getWpCategory()
  {
    return $this->wpCategory;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefCategoryInfo::class, 'Google_Service_Contentwarehouse_RepositoryWebrefCategoryInfo');
