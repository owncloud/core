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

namespace Google\Service\CloudComposer;

class CheckUpgradeResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $buildLogUri;
  /**
   * @var string
   */
  public $containsPypiModulesConflict;
  /**
   * @var string
   */
  public $imageVersion;
  /**
   * @var string
   */
  public $pypiConflictBuildLogExtract;
  /**
   * @var string[]
   */
  public $pypiDependencies;

  /**
   * @param string
   */
  public function setBuildLogUri($buildLogUri)
  {
    $this->buildLogUri = $buildLogUri;
  }
  /**
   * @return string
   */
  public function getBuildLogUri()
  {
    return $this->buildLogUri;
  }
  /**
   * @param string
   */
  public function setContainsPypiModulesConflict($containsPypiModulesConflict)
  {
    $this->containsPypiModulesConflict = $containsPypiModulesConflict;
  }
  /**
   * @return string
   */
  public function getContainsPypiModulesConflict()
  {
    return $this->containsPypiModulesConflict;
  }
  /**
   * @param string
   */
  public function setImageVersion($imageVersion)
  {
    $this->imageVersion = $imageVersion;
  }
  /**
   * @return string
   */
  public function getImageVersion()
  {
    return $this->imageVersion;
  }
  /**
   * @param string
   */
  public function setPypiConflictBuildLogExtract($pypiConflictBuildLogExtract)
  {
    $this->pypiConflictBuildLogExtract = $pypiConflictBuildLogExtract;
  }
  /**
   * @return string
   */
  public function getPypiConflictBuildLogExtract()
  {
    return $this->pypiConflictBuildLogExtract;
  }
  /**
   * @param string[]
   */
  public function setPypiDependencies($pypiDependencies)
  {
    $this->pypiDependencies = $pypiDependencies;
  }
  /**
   * @return string[]
   */
  public function getPypiDependencies()
  {
    return $this->pypiDependencies;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CheckUpgradeResponse::class, 'Google_Service_CloudComposer_CheckUpgradeResponse');
