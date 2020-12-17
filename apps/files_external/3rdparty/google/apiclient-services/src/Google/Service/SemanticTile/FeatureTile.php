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

class Google_Service_SemanticTile_FeatureTile extends Google_Collection
{
  protected $collection_key = 'providers';
  protected $coordinatesType = 'Google_Service_SemanticTile_TileCoordinates';
  protected $coordinatesDataType = '';
  protected $featuresType = 'Google_Service_SemanticTile_Feature';
  protected $featuresDataType = 'array';
  public $name;
  protected $providersType = 'Google_Service_SemanticTile_ProviderInfo';
  protected $providersDataType = 'array';
  public $status;
  public $versionId;

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
   * @param Google_Service_SemanticTile_Feature[]
   */
  public function setFeatures($features)
  {
    $this->features = $features;
  }
  /**
   * @return Google_Service_SemanticTile_Feature[]
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
   * @param Google_Service_SemanticTile_ProviderInfo[]
   */
  public function setProviders($providers)
  {
    $this->providers = $providers;
  }
  /**
   * @return Google_Service_SemanticTile_ProviderInfo[]
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
