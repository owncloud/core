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

class KnowledgeAnswersIntentQueryShoppingIds extends \Google\Collection
{
  protected $collection_key = 'tagIds';
  /**
   * @var string[]
   */
  public $aspectClusterIds;
  /**
   * @var string
   */
  public $brandEntityId;
  /**
   * @var int[]
   */
  public $bxCategoryIds;
  protected $measuresType = KnowledgeAnswersIntentQueryShoppingIdsMeasureValue::class;
  protected $measuresDataType = 'array';
  /**
   * @var string[]
   */
  public $merchantIds;
  /**
   * @var string[]
   */
  public $merchantSourceIds;
  /**
   * @var string[]
   */
  public $tagIds;

  /**
   * @param string[]
   */
  public function setAspectClusterIds($aspectClusterIds)
  {
    $this->aspectClusterIds = $aspectClusterIds;
  }
  /**
   * @return string[]
   */
  public function getAspectClusterIds()
  {
    return $this->aspectClusterIds;
  }
  /**
   * @param string
   */
  public function setBrandEntityId($brandEntityId)
  {
    $this->brandEntityId = $brandEntityId;
  }
  /**
   * @return string
   */
  public function getBrandEntityId()
  {
    return $this->brandEntityId;
  }
  /**
   * @param int[]
   */
  public function setBxCategoryIds($bxCategoryIds)
  {
    $this->bxCategoryIds = $bxCategoryIds;
  }
  /**
   * @return int[]
   */
  public function getBxCategoryIds()
  {
    return $this->bxCategoryIds;
  }
  /**
   * @param KnowledgeAnswersIntentQueryShoppingIdsMeasureValue[]
   */
  public function setMeasures($measures)
  {
    $this->measures = $measures;
  }
  /**
   * @return KnowledgeAnswersIntentQueryShoppingIdsMeasureValue[]
   */
  public function getMeasures()
  {
    return $this->measures;
  }
  /**
   * @param string[]
   */
  public function setMerchantIds($merchantIds)
  {
    $this->merchantIds = $merchantIds;
  }
  /**
   * @return string[]
   */
  public function getMerchantIds()
  {
    return $this->merchantIds;
  }
  /**
   * @param string[]
   */
  public function setMerchantSourceIds($merchantSourceIds)
  {
    $this->merchantSourceIds = $merchantSourceIds;
  }
  /**
   * @return string[]
   */
  public function getMerchantSourceIds()
  {
    return $this->merchantSourceIds;
  }
  /**
   * @param string[]
   */
  public function setTagIds($tagIds)
  {
    $this->tagIds = $tagIds;
  }
  /**
   * @return string[]
   */
  public function getTagIds()
  {
    return $this->tagIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryShoppingIds::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryShoppingIds');
