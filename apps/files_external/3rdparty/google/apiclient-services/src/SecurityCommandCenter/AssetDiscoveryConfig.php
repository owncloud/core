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

namespace Google\Service\SecurityCommandCenter;

class AssetDiscoveryConfig extends \Google\Collection
{
  protected $collection_key = 'projectIds';
  /**
   * @var string[]
   */
  public $folderIds;
  /**
   * @var string
   */
  public $inclusionMode;
  /**
   * @var string[]
   */
  public $projectIds;

  /**
   * @param string[]
   */
  public function setFolderIds($folderIds)
  {
    $this->folderIds = $folderIds;
  }
  /**
   * @return string[]
   */
  public function getFolderIds()
  {
    return $this->folderIds;
  }
  /**
   * @param string
   */
  public function setInclusionMode($inclusionMode)
  {
    $this->inclusionMode = $inclusionMode;
  }
  /**
   * @return string
   */
  public function getInclusionMode()
  {
    return $this->inclusionMode;
  }
  /**
   * @param string[]
   */
  public function setProjectIds($projectIds)
  {
    $this->projectIds = $projectIds;
  }
  /**
   * @return string[]
   */
  public function getProjectIds()
  {
    return $this->projectIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssetDiscoveryConfig::class, 'Google_Service_SecurityCommandCenter_AssetDiscoveryConfig');
