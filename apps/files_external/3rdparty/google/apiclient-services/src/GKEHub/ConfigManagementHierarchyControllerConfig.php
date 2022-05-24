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

namespace Google\Service\GKEHub;

class ConfigManagementHierarchyControllerConfig extends \Google\Model
{
  /**
   * @var bool
   */
  public $enableHierarchicalResourceQuota;
  /**
   * @var bool
   */
  public $enablePodTreeLabels;
  /**
   * @var bool
   */
  public $enabled;

  /**
   * @param bool
   */
  public function setEnableHierarchicalResourceQuota($enableHierarchicalResourceQuota)
  {
    $this->enableHierarchicalResourceQuota = $enableHierarchicalResourceQuota;
  }
  /**
   * @return bool
   */
  public function getEnableHierarchicalResourceQuota()
  {
    return $this->enableHierarchicalResourceQuota;
  }
  /**
   * @param bool
   */
  public function setEnablePodTreeLabels($enablePodTreeLabels)
  {
    $this->enablePodTreeLabels = $enablePodTreeLabels;
  }
  /**
   * @return bool
   */
  public function getEnablePodTreeLabels()
  {
    return $this->enablePodTreeLabels;
  }
  /**
   * @param bool
   */
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  /**
   * @return bool
   */
  public function getEnabled()
  {
    return $this->enabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConfigManagementHierarchyControllerConfig::class, 'Google_Service_GKEHub_ConfigManagementHierarchyControllerConfig');
