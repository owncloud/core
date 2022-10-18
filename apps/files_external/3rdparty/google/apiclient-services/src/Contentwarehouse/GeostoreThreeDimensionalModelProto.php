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

class GeostoreThreeDimensionalModelProto extends \Google\Collection
{
  protected $collection_key = 'points';
  /**
   * @var int[]
   */
  public $pointIndices;
  protected $pointsType = GeostorePointWithHeightProto::class;
  protected $pointsDataType = 'array';

  /**
   * @param int[]
   */
  public function setPointIndices($pointIndices)
  {
    $this->pointIndices = $pointIndices;
  }
  /**
   * @return int[]
   */
  public function getPointIndices()
  {
    return $this->pointIndices;
  }
  /**
   * @param GeostorePointWithHeightProto[]
   */
  public function setPoints($points)
  {
    $this->points = $points;
  }
  /**
   * @return GeostorePointWithHeightProto[]
   */
  public function getPoints()
  {
    return $this->points;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreThreeDimensionalModelProto::class, 'Google_Service_Contentwarehouse_GeostoreThreeDimensionalModelProto');
