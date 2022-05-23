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

namespace Google\Service\Monitoring;

class GkeWorkload extends \Google\Model
{
  /**
   * @var string
   */
  public $clusterName;
  /**
   * @var string
   */
  public $location;
  /**
   * @var string
   */
  public $namespaceName;
  /**
   * @var string
   */
  public $projectId;
  /**
   * @var string
   */
  public $topLevelControllerName;
  /**
   * @var string
   */
  public $topLevelControllerType;

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
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param string
   */
  public function setNamespaceName($namespaceName)
  {
    $this->namespaceName = $namespaceName;
  }
  /**
   * @return string
   */
  public function getNamespaceName()
  {
    return $this->namespaceName;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param string
   */
  public function setTopLevelControllerName($topLevelControllerName)
  {
    $this->topLevelControllerName = $topLevelControllerName;
  }
  /**
   * @return string
   */
  public function getTopLevelControllerName()
  {
    return $this->topLevelControllerName;
  }
  /**
   * @param string
   */
  public function setTopLevelControllerType($topLevelControllerType)
  {
    $this->topLevelControllerType = $topLevelControllerType;
  }
  /**
   * @return string
   */
  public function getTopLevelControllerType()
  {
    return $this->topLevelControllerType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GkeWorkload::class, 'Google_Service_Monitoring_GkeWorkload');
