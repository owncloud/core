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

namespace Google\Service\ToolResults;

class AndroidRoboTest extends \Google\Model
{
  /**
   * @var string
   */
  public $appInitialActivity;
  /**
   * @var string
   */
  public $bootstrapPackageId;
  /**
   * @var string
   */
  public $bootstrapRunnerClass;
  /**
   * @var int
   */
  public $maxDepth;
  /**
   * @var int
   */
  public $maxSteps;

  /**
   * @param string
   */
  public function setAppInitialActivity($appInitialActivity)
  {
    $this->appInitialActivity = $appInitialActivity;
  }
  /**
   * @return string
   */
  public function getAppInitialActivity()
  {
    return $this->appInitialActivity;
  }
  /**
   * @param string
   */
  public function setBootstrapPackageId($bootstrapPackageId)
  {
    $this->bootstrapPackageId = $bootstrapPackageId;
  }
  /**
   * @return string
   */
  public function getBootstrapPackageId()
  {
    return $this->bootstrapPackageId;
  }
  /**
   * @param string
   */
  public function setBootstrapRunnerClass($bootstrapRunnerClass)
  {
    $this->bootstrapRunnerClass = $bootstrapRunnerClass;
  }
  /**
   * @return string
   */
  public function getBootstrapRunnerClass()
  {
    return $this->bootstrapRunnerClass;
  }
  /**
   * @param int
   */
  public function setMaxDepth($maxDepth)
  {
    $this->maxDepth = $maxDepth;
  }
  /**
   * @return int
   */
  public function getMaxDepth()
  {
    return $this->maxDepth;
  }
  /**
   * @param int
   */
  public function setMaxSteps($maxSteps)
  {
    $this->maxSteps = $maxSteps;
  }
  /**
   * @return int
   */
  public function getMaxSteps()
  {
    return $this->maxSteps;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AndroidRoboTest::class, 'Google_Service_ToolResults_AndroidRoboTest');
