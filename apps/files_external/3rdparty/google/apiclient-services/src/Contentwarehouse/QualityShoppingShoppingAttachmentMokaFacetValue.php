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

class QualityShoppingShoppingAttachmentMokaFacetValue extends \Google\Model
{
  /**
   * @var string
   */
  public $facetId;
  public $measureValue;
  /**
   * @var string
   */
  public $tagId;

  /**
   * @param string
   */
  public function setFacetId($facetId)
  {
    $this->facetId = $facetId;
  }
  /**
   * @return string
   */
  public function getFacetId()
  {
    return $this->facetId;
  }
  public function setMeasureValue($measureValue)
  {
    $this->measureValue = $measureValue;
  }
  public function getMeasureValue()
  {
    return $this->measureValue;
  }
  /**
   * @param string
   */
  public function setTagId($tagId)
  {
    $this->tagId = $tagId;
  }
  /**
   * @return string
   */
  public function getTagId()
  {
    return $this->tagId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityShoppingShoppingAttachmentMokaFacetValue::class, 'Google_Service_Contentwarehouse_QualityShoppingShoppingAttachmentMokaFacetValue');
