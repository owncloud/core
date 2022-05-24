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

namespace Google\Service\SemanticTile;

class TerrainTile extends \Google\Model
{
  protected $coordinatesType = TileCoordinates::class;
  protected $coordinatesDataType = '';
  protected $firstDerivativeType = FirstDerivativeElevationGrid::class;
  protected $firstDerivativeDataType = '';
  public $name;
  protected $secondDerivativeType = SecondDerivativeElevationGrid::class;
  protected $secondDerivativeDataType = '';

  /**
   * @param TileCoordinates
   */
  public function setCoordinates(TileCoordinates $coordinates)
  {
    $this->coordinates = $coordinates;
  }
  /**
   * @return TileCoordinates
   */
  public function getCoordinates()
  {
    return $this->coordinates;
  }
  /**
   * @param FirstDerivativeElevationGrid
   */
  public function setFirstDerivative(FirstDerivativeElevationGrid $firstDerivative)
  {
    $this->firstDerivative = $firstDerivative;
  }
  /**
   * @return FirstDerivativeElevationGrid
   */
  public function getFirstDerivative()
  {
    return $this->firstDerivative;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param SecondDerivativeElevationGrid
   */
  public function setSecondDerivative(SecondDerivativeElevationGrid $secondDerivative)
  {
    $this->secondDerivative = $secondDerivative;
  }
  /**
   * @return SecondDerivativeElevationGrid
   */
  public function getSecondDerivative()
  {
    return $this->secondDerivative;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TerrainTile::class, 'Google_Service_SemanticTile_TerrainTile');
