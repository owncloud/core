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

namespace Google\Service\Dfareporting;

class PlacementAssignment extends \Google\Model
{
  /**
   * @var bool
   */
  public $active;
  /**
   * @var string
   */
  public $placementId;
  protected $placementIdDimensionValueType = DimensionValue::class;
  protected $placementIdDimensionValueDataType = '';
  /**
   * @var bool
   */
  public $sslRequired;

  /**
   * @param bool
   */
  public function setActive($active)
  {
    $this->active = $active;
  }
  /**
   * @return bool
   */
  public function getActive()
  {
    return $this->active;
  }
  /**
   * @param string
   */
  public function setPlacementId($placementId)
  {
    $this->placementId = $placementId;
  }
  /**
   * @return string
   */
  public function getPlacementId()
  {
    return $this->placementId;
  }
  /**
   * @param DimensionValue
   */
  public function setPlacementIdDimensionValue(DimensionValue $placementIdDimensionValue)
  {
    $this->placementIdDimensionValue = $placementIdDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getPlacementIdDimensionValue()
  {
    return $this->placementIdDimensionValue;
  }
  /**
   * @param bool
   */
  public function setSslRequired($sslRequired)
  {
    $this->sslRequired = $sslRequired;
  }
  /**
   * @return bool
   */
  public function getSslRequired()
  {
    return $this->sslRequired;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlacementAssignment::class, 'Google_Service_Dfareporting_PlacementAssignment');
