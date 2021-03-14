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

class Google_Service_CloudAsset_GoogleCloudAssetV1p7beta1RelatedAssets extends Google_Collection
{
  protected $collection_key = 'assets';
  protected $assetsType = 'Google_Service_CloudAsset_GoogleCloudAssetV1p7beta1RelatedAsset';
  protected $assetsDataType = 'array';
  protected $relationshipAttributesType = 'Google_Service_CloudAsset_GoogleCloudAssetV1p7beta1RelationshipAttributes';
  protected $relationshipAttributesDataType = '';

  /**
   * @param Google_Service_CloudAsset_GoogleCloudAssetV1p7beta1RelatedAsset[]
   */
  public function setAssets($assets)
  {
    $this->assets = $assets;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleCloudAssetV1p7beta1RelatedAsset[]
   */
  public function getAssets()
  {
    return $this->assets;
  }
  /**
   * @param Google_Service_CloudAsset_GoogleCloudAssetV1p7beta1RelationshipAttributes
   */
  public function setRelationshipAttributes(Google_Service_CloudAsset_GoogleCloudAssetV1p7beta1RelationshipAttributes $relationshipAttributes)
  {
    $this->relationshipAttributes = $relationshipAttributes;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleCloudAssetV1p7beta1RelationshipAttributes
   */
  public function getRelationshipAttributes()
  {
    return $this->relationshipAttributes;
  }
}
