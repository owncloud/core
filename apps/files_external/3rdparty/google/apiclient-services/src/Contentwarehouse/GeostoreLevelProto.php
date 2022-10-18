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

class GeostoreLevelProto extends \Google\Collection
{
  protected $collection_key = 'building';
  protected $buildingType = GeostoreFeatureIdProto::class;
  protected $buildingDataType = 'array';
  /**
   * @var float
   */
  public $number;

  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setBuilding($building)
  {
    $this->building = $building;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getBuilding()
  {
    return $this->building;
  }
  /**
   * @param float
   */
  public function setNumber($number)
  {
    $this->number = $number;
  }
  /**
   * @return float
   */
  public function getNumber()
  {
    return $this->number;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreLevelProto::class, 'Google_Service_Contentwarehouse_GeostoreLevelProto');
