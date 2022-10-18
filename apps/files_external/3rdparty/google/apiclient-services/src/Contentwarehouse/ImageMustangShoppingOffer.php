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

class ImageMustangShoppingOffer extends \Google\Collection
{
  protected $collection_key = 'inferredImageTypes';
  /**
   * @var string[]
   */
  public $inferredImageTypes;
  /**
   * @var string
   */
  public $ipsOfferId;

  /**
   * @param string[]
   */
  public function setInferredImageTypes($inferredImageTypes)
  {
    $this->inferredImageTypes = $inferredImageTypes;
  }
  /**
   * @return string[]
   */
  public function getInferredImageTypes()
  {
    return $this->inferredImageTypes;
  }
  /**
   * @param string
   */
  public function setIpsOfferId($ipsOfferId)
  {
    $this->ipsOfferId = $ipsOfferId;
  }
  /**
   * @return string
   */
  public function getIpsOfferId()
  {
    return $this->ipsOfferId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageMustangShoppingOffer::class, 'Google_Service_Contentwarehouse_ImageMustangShoppingOffer');
