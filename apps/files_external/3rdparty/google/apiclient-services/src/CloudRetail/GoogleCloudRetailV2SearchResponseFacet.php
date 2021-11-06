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

class GoogleCloudRetailV2SearchResponseFacet extends \Google\Collection
{
  protected $collection_key = 'values';
  public $dynamicFacet;
  public $key;
  protected $valuesType = GoogleCloudRetailV2SearchResponseFacetFacetValue::class;
  protected $valuesDataType = 'array';

  public function setDynamicFacet($dynamicFacet)
  {
    $this->dynamicFacet = $dynamicFacet;
  }
  public function getDynamicFacet()
  {
    return $this->dynamicFacet;
  }
  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param GoogleCloudRetailV2SearchResponseFacetFacetValue[]
   */
  public function setValues($values)
  {
    $this->values = $values;
  }
  /**
   * @return GoogleCloudRetailV2SearchResponseFacetFacetValue[]
   */
  public function getValues()
  {
    return $this->values;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2SearchResponseFacet::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2SearchResponseFacet');
