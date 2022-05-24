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

namespace Google\Service\AdExchangeBuyerII;

class CreativeSpecification extends \Google\Collection
{
  protected $collection_key = 'creativeCompanionSizes';
  protected $creativeCompanionSizesType = AdSize::class;
  protected $creativeCompanionSizesDataType = 'array';
  protected $creativeSizeType = AdSize::class;
  protected $creativeSizeDataType = '';

  /**
   * @param AdSize[]
   */
  public function setCreativeCompanionSizes($creativeCompanionSizes)
  {
    $this->creativeCompanionSizes = $creativeCompanionSizes;
  }
  /**
   * @return AdSize[]
   */
  public function getCreativeCompanionSizes()
  {
    return $this->creativeCompanionSizes;
  }
  /**
   * @param AdSize
   */
  public function setCreativeSize(AdSize $creativeSize)
  {
    $this->creativeSize = $creativeSize;
  }
  /**
   * @return AdSize
   */
  public function getCreativeSize()
  {
    return $this->creativeSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeSpecification::class, 'Google_Service_AdExchangeBuyerII_CreativeSpecification');
