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

namespace Google\Service\AndroidPublisher;

class CountryTargeting extends \Google\Collection
{
  protected $collection_key = 'countries';
  /**
   * @var string[]
   */
  public $countries;
  /**
   * @var bool
   */
  public $includeRestOfWorld;

  /**
   * @param string[]
   */
  public function setCountries($countries)
  {
    $this->countries = $countries;
  }
  /**
   * @return string[]
   */
  public function getCountries()
  {
    return $this->countries;
  }
  /**
   * @param bool
   */
  public function setIncludeRestOfWorld($includeRestOfWorld)
  {
    $this->includeRestOfWorld = $includeRestOfWorld;
  }
  /**
   * @return bool
   */
  public function getIncludeRestOfWorld()
  {
    return $this->includeRestOfWorld;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CountryTargeting::class, 'Google_Service_AndroidPublisher_CountryTargeting');
