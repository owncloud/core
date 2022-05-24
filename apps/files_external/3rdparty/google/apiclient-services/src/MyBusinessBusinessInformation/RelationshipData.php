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

namespace Google\Service\MyBusinessBusinessInformation;

class RelationshipData extends \Google\Collection
{
  protected $collection_key = 'childrenLocations';
  protected $childrenLocationsType = RelevantLocation::class;
  protected $childrenLocationsDataType = 'array';
  /**
   * @var string
   */
  public $parentChain;
  protected $parentLocationType = RelevantLocation::class;
  protected $parentLocationDataType = '';

  /**
   * @param RelevantLocation[]
   */
  public function setChildrenLocations($childrenLocations)
  {
    $this->childrenLocations = $childrenLocations;
  }
  /**
   * @return RelevantLocation[]
   */
  public function getChildrenLocations()
  {
    return $this->childrenLocations;
  }
  /**
   * @param string
   */
  public function setParentChain($parentChain)
  {
    $this->parentChain = $parentChain;
  }
  /**
   * @return string
   */
  public function getParentChain()
  {
    return $this->parentChain;
  }
  /**
   * @param RelevantLocation
   */
  public function setParentLocation(RelevantLocation $parentLocation)
  {
    $this->parentLocation = $parentLocation;
  }
  /**
   * @return RelevantLocation
   */
  public function getParentLocation()
  {
    return $this->parentLocation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RelationshipData::class, 'Google_Service_MyBusinessBusinessInformation_RelationshipData');
