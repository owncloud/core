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

class GoogleCloudRetailV2SearchRequestFacetSpecFacetKey extends \Google\Collection
{
  protected $collection_key = 'restrictedValues';
  public $contains;
  protected $intervalsType = GoogleCloudRetailV2Interval::class;
  protected $intervalsDataType = 'array';
  public $key;
  public $orderBy;
  public $prefixes;
  public $query;
  public $restrictedValues;

  public function setContains($contains)
  {
    $this->contains = $contains;
  }
  public function getContains()
  {
    return $this->contains;
  }
  /**
   * @param GoogleCloudRetailV2Interval[]
   */
  public function setIntervals($intervals)
  {
    $this->intervals = $intervals;
  }
  /**
   * @return GoogleCloudRetailV2Interval[]
   */
  public function getIntervals()
  {
    return $this->intervals;
  }
  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
  public function setOrderBy($orderBy)
  {
    $this->orderBy = $orderBy;
  }
  public function getOrderBy()
  {
    return $this->orderBy;
  }
  public function setPrefixes($prefixes)
  {
    $this->prefixes = $prefixes;
  }
  public function getPrefixes()
  {
    return $this->prefixes;
  }
  public function setQuery($query)
  {
    $this->query = $query;
  }
  public function getQuery()
  {
    return $this->query;
  }
  public function setRestrictedValues($restrictedValues)
  {
    $this->restrictedValues = $restrictedValues;
  }
  public function getRestrictedValues()
  {
    return $this->restrictedValues;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2SearchRequestFacetSpecFacetKey::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2SearchRequestFacetSpecFacetKey');
