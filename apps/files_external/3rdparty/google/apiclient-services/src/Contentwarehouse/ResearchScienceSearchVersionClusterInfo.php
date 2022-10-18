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

class ResearchScienceSearchVersionClusterInfo extends \Google\Model
{
  /**
   * @var int
   */
  public $indexInVersionCluster;
  /**
   * @var int
   */
  public $numVersions;
  /**
   * @var string
   */
  public $versionClusterId;

  /**
   * @param int
   */
  public function setIndexInVersionCluster($indexInVersionCluster)
  {
    $this->indexInVersionCluster = $indexInVersionCluster;
  }
  /**
   * @return int
   */
  public function getIndexInVersionCluster()
  {
    return $this->indexInVersionCluster;
  }
  /**
   * @param int
   */
  public function setNumVersions($numVersions)
  {
    $this->numVersions = $numVersions;
  }
  /**
   * @return int
   */
  public function getNumVersions()
  {
    return $this->numVersions;
  }
  /**
   * @param string
   */
  public function setVersionClusterId($versionClusterId)
  {
    $this->versionClusterId = $versionClusterId;
  }
  /**
   * @return string
   */
  public function getVersionClusterId()
  {
    return $this->versionClusterId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScienceSearchVersionClusterInfo::class, 'Google_Service_Contentwarehouse_ResearchScienceSearchVersionClusterInfo');
