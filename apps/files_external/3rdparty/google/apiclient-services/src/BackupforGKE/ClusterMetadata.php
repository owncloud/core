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

namespace Google\Service\BackupforGKE;

class ClusterMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $anthosVersion;
  /**
   * @var string[]
   */
  public $backupCrdVersions;
  /**
   * @var string
   */
  public $cluster;
  /**
   * @var string
   */
  public $gkeVersion;
  /**
   * @var string
   */
  public $k8sVersion;

  /**
   * @param string
   */
  public function setAnthosVersion($anthosVersion)
  {
    $this->anthosVersion = $anthosVersion;
  }
  /**
   * @return string
   */
  public function getAnthosVersion()
  {
    return $this->anthosVersion;
  }
  /**
   * @param string[]
   */
  public function setBackupCrdVersions($backupCrdVersions)
  {
    $this->backupCrdVersions = $backupCrdVersions;
  }
  /**
   * @return string[]
   */
  public function getBackupCrdVersions()
  {
    return $this->backupCrdVersions;
  }
  /**
   * @param string
   */
  public function setCluster($cluster)
  {
    $this->cluster = $cluster;
  }
  /**
   * @return string
   */
  public function getCluster()
  {
    return $this->cluster;
  }
  /**
   * @param string
   */
  public function setGkeVersion($gkeVersion)
  {
    $this->gkeVersion = $gkeVersion;
  }
  /**
   * @return string
   */
  public function getGkeVersion()
  {
    return $this->gkeVersion;
  }
  /**
   * @param string
   */
  public function setK8sVersion($k8sVersion)
  {
    $this->k8sVersion = $k8sVersion;
  }
  /**
   * @return string
   */
  public function getK8sVersion()
  {
    return $this->k8sVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ClusterMetadata::class, 'Google_Service_BackupforGKE_ClusterMetadata');
