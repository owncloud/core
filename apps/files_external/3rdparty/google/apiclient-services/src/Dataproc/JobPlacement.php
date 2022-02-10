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

namespace Google\Service\Dataproc;

class JobPlacement extends \Google\Model
{
  /**
   * @var string[]
   */
  public $clusterLabels;
  /**
   * @var string
   */
  public $clusterName;
  /**
   * @var string
   */
  public $clusterUuid;

  /**
   * @param string[]
   */
  public function setClusterLabels($clusterLabels)
  {
    $this->clusterLabels = $clusterLabels;
  }
  /**
   * @return string[]
   */
  public function getClusterLabels()
  {
    return $this->clusterLabels;
  }
  /**
   * @param string
   */
  public function setClusterName($clusterName)
  {
    $this->clusterName = $clusterName;
  }
  /**
   * @return string
   */
  public function getClusterName()
  {
    return $this->clusterName;
  }
  /**
   * @param string
   */
  public function setClusterUuid($clusterUuid)
  {
    $this->clusterUuid = $clusterUuid;
  }
  /**
   * @return string
   */
  public function getClusterUuid()
  {
    return $this->clusterUuid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobPlacement::class, 'Google_Service_Dataproc_JobPlacement');
