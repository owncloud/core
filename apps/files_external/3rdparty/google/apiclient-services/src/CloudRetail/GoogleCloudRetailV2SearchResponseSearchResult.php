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

class GoogleCloudRetailV2SearchResponseSearchResult extends \Google\Model
{
  /**
   * @var string
   */
  public $id;
  /**
   * @var int
   */
  public $matchingVariantCount;
  /**
   * @var string[]
   */
  public $matchingVariantFields;
  protected $productType = GoogleCloudRetailV2Product::class;
  protected $productDataType = '';
  /**
   * @var array[]
   */
  public $variantRollupValues;

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
   * @param int
   */
  public function setMatchingVariantCount($matchingVariantCount)
  {
    $this->matchingVariantCount = $matchingVariantCount;
  }
  /**
   * @return int
   */
  public function getMatchingVariantCount()
  {
    return $this->matchingVariantCount;
  }
  /**
   * @param string[]
   */
  public function setMatchingVariantFields($matchingVariantFields)
  {
    $this->matchingVariantFields = $matchingVariantFields;
  }
  /**
   * @return string[]
   */
  public function getMatchingVariantFields()
  {
    return $this->matchingVariantFields;
  }
  /**
   * @param GoogleCloudRetailV2Product
   */
  public function setProduct(GoogleCloudRetailV2Product $product)
  {
    $this->product = $product;
  }
  /**
   * @return GoogleCloudRetailV2Product
   */
  public function getProduct()
  {
    return $this->product;
  }
  /**
   * @param array[]
   */
  public function setVariantRollupValues($variantRollupValues)
  {
    $this->variantRollupValues = $variantRollupValues;
  }
  /**
   * @return array[]
   */
  public function getVariantRollupValues()
  {
    return $this->variantRollupValues;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2SearchResponseSearchResult::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2SearchResponseSearchResult');
