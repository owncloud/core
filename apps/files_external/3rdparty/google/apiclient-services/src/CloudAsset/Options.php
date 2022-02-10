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

namespace Google\Service\CloudAsset;

class Options extends \Google\Model
{
  /**
   * @var bool
   */
  public $analyzeServiceAccountImpersonation;
  /**
   * @var bool
   */
  public $expandGroups;
  /**
   * @var bool
   */
  public $expandResources;
  /**
   * @var bool
   */
  public $expandRoles;
  /**
   * @var bool
   */
  public $outputGroupEdges;
  /**
   * @var bool
   */
  public $outputResourceEdges;

  /**
   * @param bool
   */
  public function setAnalyzeServiceAccountImpersonation($analyzeServiceAccountImpersonation)
  {
    $this->analyzeServiceAccountImpersonation = $analyzeServiceAccountImpersonation;
  }
  /**
   * @return bool
   */
  public function getAnalyzeServiceAccountImpersonation()
  {
    return $this->analyzeServiceAccountImpersonation;
  }
  /**
   * @param bool
   */
  public function setExpandGroups($expandGroups)
  {
    $this->expandGroups = $expandGroups;
  }
  /**
   * @return bool
   */
  public function getExpandGroups()
  {
    return $this->expandGroups;
  }
  /**
   * @param bool
   */
  public function setExpandResources($expandResources)
  {
    $this->expandResources = $expandResources;
  }
  /**
   * @return bool
   */
  public function getExpandResources()
  {
    return $this->expandResources;
  }
  /**
   * @param bool
   */
  public function setExpandRoles($expandRoles)
  {
    $this->expandRoles = $expandRoles;
  }
  /**
   * @return bool
   */
  public function getExpandRoles()
  {
    return $this->expandRoles;
  }
  /**
   * @param bool
   */
  public function setOutputGroupEdges($outputGroupEdges)
  {
    $this->outputGroupEdges = $outputGroupEdges;
  }
  /**
   * @return bool
   */
  public function getOutputGroupEdges()
  {
    return $this->outputGroupEdges;
  }
  /**
   * @param bool
   */
  public function setOutputResourceEdges($outputResourceEdges)
  {
    $this->outputResourceEdges = $outputResourceEdges;
  }
  /**
   * @return bool
   */
  public function getOutputResourceEdges()
  {
    return $this->outputResourceEdges;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Options::class, 'Google_Service_CloudAsset_Options');
