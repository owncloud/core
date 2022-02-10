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

class TrackCountryAvailability extends \Google\Collection
{
  protected $collection_key = 'countries';
  protected $countriesType = TrackTargetedCountry::class;
  protected $countriesDataType = 'array';
  /**
   * @var bool
   */
  public $restOfWorld;
  /**
   * @var bool
   */
  public $syncWithProduction;

  /**
   * @param TrackTargetedCountry[]
   */
  public function setCountries($countries)
  {
    $this->countries = $countries;
  }
  /**
   * @return TrackTargetedCountry[]
   */
  public function getCountries()
  {
    return $this->countries;
  }
  /**
   * @param bool
   */
  public function setRestOfWorld($restOfWorld)
  {
    $this->restOfWorld = $restOfWorld;
  }
  /**
   * @return bool
   */
  public function getRestOfWorld()
  {
    return $this->restOfWorld;
  }
  /**
   * @param bool
   */
  public function setSyncWithProduction($syncWithProduction)
  {
    $this->syncWithProduction = $syncWithProduction;
  }
  /**
   * @return bool
   */
  public function getSyncWithProduction()
  {
    return $this->syncWithProduction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrackCountryAvailability::class, 'Google_Service_AndroidPublisher_TrackCountryAvailability');
