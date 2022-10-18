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

class GeostoreBuildingProto extends \Google\Collection
{
  protected $collection_key = 'level';
  /**
   * @var float
   */
  public $baseHeightMetersAgl;
  protected $defaultDisplayLevelType = GeostoreFeatureIdProto::class;
  protected $defaultDisplayLevelDataType = '';
  /**
   * @var int
   */
  public $floors;
  protected $floorsMetadataType = GeostoreFieldMetadataProto::class;
  protected $floorsMetadataDataType = '';
  /**
   * @var float
   */
  public $heightMeters;
  protected $heightMetersMetadataType = GeostoreFieldMetadataProto::class;
  protected $heightMetersMetadataDataType = '';
  protected $levelType = GeostoreFeatureIdProto::class;
  protected $levelDataType = 'array';
  /**
   * @var string
   */
  public $structure;

  /**
   * @param float
   */
  public function setBaseHeightMetersAgl($baseHeightMetersAgl)
  {
    $this->baseHeightMetersAgl = $baseHeightMetersAgl;
  }
  /**
   * @return float
   */
  public function getBaseHeightMetersAgl()
  {
    return $this->baseHeightMetersAgl;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setDefaultDisplayLevel(GeostoreFeatureIdProto $defaultDisplayLevel)
  {
    $this->defaultDisplayLevel = $defaultDisplayLevel;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getDefaultDisplayLevel()
  {
    return $this->defaultDisplayLevel;
  }
  /**
   * @param int
   */
  public function setFloors($floors)
  {
    $this->floors = $floors;
  }
  /**
   * @return int
   */
  public function getFloors()
  {
    return $this->floors;
  }
  /**
   * @param GeostoreFieldMetadataProto
   */
  public function setFloorsMetadata(GeostoreFieldMetadataProto $floorsMetadata)
  {
    $this->floorsMetadata = $floorsMetadata;
  }
  /**
   * @return GeostoreFieldMetadataProto
   */
  public function getFloorsMetadata()
  {
    return $this->floorsMetadata;
  }
  /**
   * @param float
   */
  public function setHeightMeters($heightMeters)
  {
    $this->heightMeters = $heightMeters;
  }
  /**
   * @return float
   */
  public function getHeightMeters()
  {
    return $this->heightMeters;
  }
  /**
   * @param GeostoreFieldMetadataProto
   */
  public function setHeightMetersMetadata(GeostoreFieldMetadataProto $heightMetersMetadata)
  {
    $this->heightMetersMetadata = $heightMetersMetadata;
  }
  /**
   * @return GeostoreFieldMetadataProto
   */
  public function getHeightMetersMetadata()
  {
    return $this->heightMetersMetadata;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setLevel($level)
  {
    $this->level = $level;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getLevel()
  {
    return $this->level;
  }
  /**
   * @param string
   */
  public function setStructure($structure)
  {
    $this->structure = $structure;
  }
  /**
   * @return string
   */
  public function getStructure()
  {
    return $this->structure;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreBuildingProto::class, 'Google_Service_Contentwarehouse_GeostoreBuildingProto');
