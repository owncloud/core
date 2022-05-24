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

class DatafeedTarget extends \Google\Collection
{
  protected $collection_key = 'includedDestinations';
  /**
   * @var string
   */
  public $country;
  /**
   * @var string[]
   */
  public $excludedDestinations;
  /**
   * @var string[]
   */
  public $includedDestinations;
  /**
   * @var string
   */
  public $language;

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
   * @param string[]
   */
  public function setExcludedDestinations($excludedDestinations)
  {
    $this->excludedDestinations = $excludedDestinations;
  }
  /**
   * @return string[]
   */
  public function getExcludedDestinations()
  {
    return $this->excludedDestinations;
  }
  /**
   * @param string[]
   */
  public function setIncludedDestinations($includedDestinations)
  {
    $this->includedDestinations = $includedDestinations;
  }
  /**
   * @return string[]
   */
  public function getIncludedDestinations()
  {
    return $this->includedDestinations;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DatafeedTarget::class, 'Google_Service_ShoppingContent_DatafeedTarget');
