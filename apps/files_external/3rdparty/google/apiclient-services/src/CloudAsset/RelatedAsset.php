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

namespace Google\Service\CloudAsset;

class RelatedAsset extends \Google\Collection
{
  protected $collection_key = 'ancestors';
  /**
   * @var string[]
   */
  public $ancestors;
  /**
   * @var string
   */
  public $asset;
  /**
   * @var string
   */
  public $assetType;
  /**
   * @var string
   */
  public $relationshipType;

  /**
   * @param string[]
   */
  public function setAncestors($ancestors)
  {
    $this->ancestors = $ancestors;
  }
  /**
   * @return string[]
   */
  public function getAncestors()
  {
    return $this->ancestors;
  }
  /**
   * @param string
   */
  public function setAsset($asset)
  {
    $this->asset = $asset;
  }
  /**
   * @return string
   */
  public function getAsset()
  {
    return $this->asset;
  }
  /**
   * @param string
   */
  public function setAssetType($assetType)
  {
    $this->assetType = $assetType;
  }
  /**
   * @return string
   */
  public function getAssetType()
  {
    return $this->assetType;
  }
  /**
   * @param string
   */
  public function setRelationshipType($relationshipType)
  {
    $this->relationshipType = $relationshipType;
  }
  /**
   * @return string
   */
  public function getRelationshipType()
  {
    return $this->relationshipType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RelatedAsset::class, 'Google_Service_CloudAsset_RelatedAsset');
