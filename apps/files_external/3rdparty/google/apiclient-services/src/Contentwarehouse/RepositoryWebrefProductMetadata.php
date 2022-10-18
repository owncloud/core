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

class RepositoryWebrefProductMetadata extends \Google\Collection
{
  protected $collection_key = 'variantClusterId';
  /**
   * @var string[]
   */
  public $productLineId;
  protected $shoppingIdsType = KnowledgeAnswersIntentQueryShoppingIds::class;
  protected $shoppingIdsDataType = '';
  /**
   * @var string
   */
  public $type;
  /**
   * @var string[]
   */
  public $variantClusterId;

  /**
   * @param string[]
   */
  public function setProductLineId($productLineId)
  {
    $this->productLineId = $productLineId;
  }
  /**
   * @return string[]
   */
  public function getProductLineId()
  {
    return $this->productLineId;
  }
  /**
   * @param KnowledgeAnswersIntentQueryShoppingIds
   */
  public function setShoppingIds(KnowledgeAnswersIntentQueryShoppingIds $shoppingIds)
  {
    $this->shoppingIds = $shoppingIds;
  }
  /**
   * @return KnowledgeAnswersIntentQueryShoppingIds
   */
  public function getShoppingIds()
  {
    return $this->shoppingIds;
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
  /**
   * @param string[]
   */
  public function setVariantClusterId($variantClusterId)
  {
    $this->variantClusterId = $variantClusterId;
  }
  /**
   * @return string[]
   */
  public function getVariantClusterId()
  {
    return $this->variantClusterId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefProductMetadata::class, 'Google_Service_Contentwarehouse_RepositoryWebrefProductMetadata');
