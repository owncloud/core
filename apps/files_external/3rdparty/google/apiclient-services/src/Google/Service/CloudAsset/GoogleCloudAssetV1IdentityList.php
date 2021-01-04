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

class Google_Service_CloudAsset_GoogleCloudAssetV1IdentityList extends Google_Collection
{
  protected $collection_key = 'identities';
  protected $groupEdgesType = 'Google_Service_CloudAsset_GoogleCloudAssetV1Edge';
  protected $groupEdgesDataType = 'array';
  protected $identitiesType = 'Google_Service_CloudAsset_GoogleCloudAssetV1Identity';
  protected $identitiesDataType = 'array';

  /**
   * @param Google_Service_CloudAsset_GoogleCloudAssetV1Edge[]
   */
  public function setGroupEdges($groupEdges)
  {
    $this->groupEdges = $groupEdges;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleCloudAssetV1Edge[]
   */
  public function getGroupEdges()
  {
    return $this->groupEdges;
  }
  /**
   * @param Google_Service_CloudAsset_GoogleCloudAssetV1Identity[]
   */
  public function setIdentities($identities)
  {
    $this->identities = $identities;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleCloudAssetV1Identity[]
   */
  public function getIdentities()
  {
    return $this->identities;
  }
}
