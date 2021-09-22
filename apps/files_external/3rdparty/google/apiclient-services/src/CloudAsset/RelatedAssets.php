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

class RelatedAssets extends \Google\Collection
{
  protected $collection_key = 'assets';
  protected $assetsType = RelatedAsset::class;
  protected $assetsDataType = 'array';
  protected $relationshipAttributesType = RelationshipAttributes::class;
  protected $relationshipAttributesDataType = '';

  /**
   * @param RelatedAsset[]
   */
  public function setAssets($assets)
  {
    $this->assets = $assets;
  }
  /**
   * @return RelatedAsset[]
   */
  public function getAssets()
  {
    return $this->assets;
  }
  /**
   * @param RelationshipAttributes
   */
  public function setRelationshipAttributes(RelationshipAttributes $relationshipAttributes)
  {
    $this->relationshipAttributes = $relationshipAttributes;
  }
  /**
   * @return RelationshipAttributes
   */
  public function getRelationshipAttributes()
  {
    return $this->relationshipAttributes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RelatedAssets::class, 'Google_Service_CloudAsset_RelatedAssets');
