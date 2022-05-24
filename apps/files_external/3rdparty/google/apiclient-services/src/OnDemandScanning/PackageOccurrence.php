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

namespace Google\Service\OnDemandScanning;

class PackageOccurrence extends \Google\Collection
{
  protected $collection_key = 'location';
  protected $locationType = Location::class;
  protected $locationDataType = 'array';
  /**
   * @var string
   */
  public $name;

  /**
   * @param Location[]
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return Location[]
   */
  public function getLocation()
  {
    return $this->location;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PackageOccurrence::class, 'Google_Service_OnDemandScanning_PackageOccurrence');
