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

class Google_Service_SemanticTile_TerrainTile extends Google_Model
{
  protected $coordinatesType = 'Google_Service_SemanticTile_TileCoordinates';
  protected $coordinatesDataType = '';
  protected $firstDerivativeType = 'Google_Service_SemanticTile_FirstDerivativeElevationGrid';
  protected $firstDerivativeDataType = '';
  public $name;
  protected $secondDerivativeType = 'Google_Service_SemanticTile_SecondDerivativeElevationGrid';
  protected $secondDerivativeDataType = '';

  /**
   * @param Google_Service_SemanticTile_TileCoordinates
   */
  public function setCoordinates(Google_Service_SemanticTile_TileCoordinates $coordinates)
  {
    $this->coordinates = $coordinates;
  }
  /**
   * @return Google_Service_SemanticTile_TileCoordinates
   */
  public function getCoordinates()
  {
    return $this->coordinates;
  }
  /**
   * @param Google_Service_SemanticTile_FirstDerivativeElevationGrid
   */
  public function setFirstDerivative(Google_Service_SemanticTile_FirstDerivativeElevationGrid $firstDerivative)
  {
    $this->firstDerivative = $firstDerivative;
  }
  /**
   * @return Google_Service_SemanticTile_FirstDerivativeElevationGrid
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
   * @param Google_Service_SemanticTile_SecondDerivativeElevationGrid
   */
  public function setSecondDerivative(Google_Service_SemanticTile_SecondDerivativeElevationGrid $secondDerivative)
  {
    $this->secondDerivative = $secondDerivative;
  }
  /**
   * @return Google_Service_SemanticTile_SecondDerivativeElevationGrid
   */
  public function getSecondDerivative()
  {
    return $this->secondDerivative;
  }
}
