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

class GoogleCloudRetailV2SearchRequestFacetSpec extends \Google\Collection
{
  protected $collection_key = 'excludedFilterKeys';
  /**
   * @var bool
   */
  public $enableDynamicPosition;
  /**
   * @var string[]
   */
  public $excludedFilterKeys;
  protected $facetKeyType = GoogleCloudRetailV2SearchRequestFacetSpecFacetKey::class;
  protected $facetKeyDataType = '';
  /**
   * @var int
   */
  public $limit;

  /**
   * @param bool
   */
  public function setEnableDynamicPosition($enableDynamicPosition)
  {
    $this->enableDynamicPosition = $enableDynamicPosition;
  }
  /**
   * @return bool
   */
  public function getEnableDynamicPosition()
  {
    return $this->enableDynamicPosition;
  }
  /**
   * @param string[]
   */
  public function setExcludedFilterKeys($excludedFilterKeys)
  {
    $this->excludedFilterKeys = $excludedFilterKeys;
  }
  /**
   * @return string[]
   */
  public function getExcludedFilterKeys()
  {
    return $this->excludedFilterKeys;
  }
  /**
   * @param GoogleCloudRetailV2SearchRequestFacetSpecFacetKey
   */
  public function setFacetKey(GoogleCloudRetailV2SearchRequestFacetSpecFacetKey $facetKey)
  {
    $this->facetKey = $facetKey;
  }
  /**
   * @return GoogleCloudRetailV2SearchRequestFacetSpecFacetKey
   */
  public function getFacetKey()
  {
    return $this->facetKey;
  }
  /**
   * @param int
   */
  public function setLimit($limit)
  {
    $this->limit = $limit;
  }
  /**
   * @return int
   */
  public function getLimit()
  {
    return $this->limit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2SearchRequestFacetSpec::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2SearchRequestFacetSpec');
