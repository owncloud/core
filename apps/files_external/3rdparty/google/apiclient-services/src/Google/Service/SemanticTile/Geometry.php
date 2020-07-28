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

class Google_Service_SemanticTile_Geometry extends Google_Collection
{
  protected $collection_key = 'modeledVolumes';
  protected $areasType = 'Google_Service_SemanticTile_Area';
  protected $areasDataType = 'array';
  protected $extrudedAreasType = 'Google_Service_SemanticTile_ExtrudedArea';
  protected $extrudedAreasDataType = 'array';
  protected $linesType = 'Google_Service_SemanticTile_Line';
  protected $linesDataType = 'array';
  protected $modeledVolumesType = 'Google_Service_SemanticTile_ModeledVolume';
  protected $modeledVolumesDataType = 'array';

  /**
   * @param Google_Service_SemanticTile_Area
   */
  public function setAreas($areas)
  {
    $this->areas = $areas;
  }
  /**
   * @return Google_Service_SemanticTile_Area
   */
  public function getAreas()
  {
    return $this->areas;
  }
  /**
   * @param Google_Service_SemanticTile_ExtrudedArea
   */
  public function setExtrudedAreas($extrudedAreas)
  {
    $this->extrudedAreas = $extrudedAreas;
  }
  /**
   * @return Google_Service_SemanticTile_ExtrudedArea
   */
  public function getExtrudedAreas()
  {
    return $this->extrudedAreas;
  }
  /**
   * @param Google_Service_SemanticTile_Line
   */
  public function setLines($lines)
  {
    $this->lines = $lines;
  }
  /**
   * @return Google_Service_SemanticTile_Line
   */
  public function getLines()
  {
    return $this->lines;
  }
  /**
   * @param Google_Service_SemanticTile_ModeledVolume
   */
  public function setModeledVolumes($modeledVolumes)
  {
    $this->modeledVolumes = $modeledVolumes;
  }
  /**
   * @return Google_Service_SemanticTile_ModeledVolume
   */
  public function getModeledVolumes()
  {
    return $this->modeledVolumes;
  }
}
