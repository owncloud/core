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

class Google_Service_SemanticTile_ExtrudedArea extends Google_Model
{
  protected $areaType = 'Google_Service_SemanticTile_Area';
  protected $areaDataType = '';
  public $maxZ;
  public $minZ;

  /**
   * @param Google_Service_SemanticTile_Area
   */
  public function setArea(Google_Service_SemanticTile_Area $area)
  {
    $this->area = $area;
  }
  /**
   * @return Google_Service_SemanticTile_Area
   */
  public function getArea()
  {
    return $this->area;
  }
  public function setMaxZ($maxZ)
  {
    $this->maxZ = $maxZ;
  }
  public function getMaxZ()
  {
    return $this->maxZ;
  }
  public function setMinZ($minZ)
  {
    $this->minZ = $minZ;
  }
  public function getMinZ()
  {
    return $this->minZ;
  }
}
