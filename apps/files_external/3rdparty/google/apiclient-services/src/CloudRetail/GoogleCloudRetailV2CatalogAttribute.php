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

class GoogleCloudRetailV2CatalogAttribute extends \Google\Model
{
  /**
   * @var string
   */
  public $dynamicFacetableOption;
  /**
   * @var bool
   */
  public $inUse;
  /**
   * @var string
   */
  public $indexableOption;
  /**
   * @var string
   */
  public $key;
  /**
   * @var string
   */
  public $searchableOption;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setDynamicFacetableOption($dynamicFacetableOption)
  {
    $this->dynamicFacetableOption = $dynamicFacetableOption;
  }
  /**
   * @return string
   */
  public function getDynamicFacetableOption()
  {
    return $this->dynamicFacetableOption;
  }
  /**
   * @param bool
   */
  public function setInUse($inUse)
  {
    $this->inUse = $inUse;
  }
  /**
   * @return bool
   */
  public function getInUse()
  {
    return $this->inUse;
  }
  /**
   * @param string
   */
  public function setIndexableOption($indexableOption)
  {
    $this->indexableOption = $indexableOption;
  }
  /**
   * @return string
   */
  public function getIndexableOption()
  {
    return $this->indexableOption;
  }
  /**
   * @param string
   */
  public function setKey($key)
  {
    $this->key = $key;
  }
  /**
   * @return string
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param string
   */
  public function setSearchableOption($searchableOption)
  {
    $this->searchableOption = $searchableOption;
  }
  /**
   * @return string
   */
  public function getSearchableOption()
  {
    return $this->searchableOption;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2CatalogAttribute::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2CatalogAttribute');
