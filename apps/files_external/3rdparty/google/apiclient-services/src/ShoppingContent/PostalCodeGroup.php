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

namespace Google\Service\ShoppingContent;

class PostalCodeGroup extends \Google\Collection
{
  protected $collection_key = 'postalCodeRanges';
  /**
   * @var string
   */
  public $country;
  /**
   * @var string
   */
  public $name;
  protected $postalCodeRangesType = PostalCodeRange::class;
  protected $postalCodeRangesDataType = 'array';

  /**
   * @param string
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param PostalCodeRange[]
   */
  public function setPostalCodeRanges($postalCodeRanges)
  {
    $this->postalCodeRanges = $postalCodeRanges;
  }
  /**
   * @return PostalCodeRange[]
   */
  public function getPostalCodeRanges()
  {
    return $this->postalCodeRanges;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PostalCodeGroup::class, 'Google_Service_ShoppingContent_PostalCodeGroup');
