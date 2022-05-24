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

class FeatureTile extends \Google\Collection
{
  protected $collection_key = 'providers';
  protected $coordinatesType = TileCoordinates::class;
  protected $coordinatesDataType = '';
  protected $featuresType = Feature::class;
  protected $featuresDataType = 'array';
  public $name;
  protected $providersType = ProviderInfo::class;
  protected $providersDataType = 'array';
  public $status;
  public $versionId;

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
   * @param Feature[]
   */
  public function setFeatures($features)
  {
    $this->features = $features;
  }
  /**
   * @return Feature[]
   */
  public function getFeatures()
  {
    return $this->features;
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
   * @param ProviderInfo[]
   */
  public function setProviders($providers)
  {
    $this->providers = $providers;
  }
  /**
   * @return ProviderInfo[]
   */
  public function getProviders()
  {
    return $this->providers;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setVersionId($versionId)
  {
    $this->versionId = $versionId;
  }
  public function getVersionId()
  {
    return $this->versionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FeatureTile::class, 'Google_Service_SemanticTile_FeatureTile');
