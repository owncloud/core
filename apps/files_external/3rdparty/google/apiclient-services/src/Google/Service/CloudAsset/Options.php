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

class Google_Service_CloudAsset_Options extends Google_Model
{
  public $analyzeServiceAccountImpersonation;
  public $expandGroups;
  public $expandResources;
  public $expandRoles;
  public $outputGroupEdges;
  public $outputResourceEdges;

  public function setAnalyzeServiceAccountImpersonation($analyzeServiceAccountImpersonation)
  {
    $this->analyzeServiceAccountImpersonation = $analyzeServiceAccountImpersonation;
  }
  public function getAnalyzeServiceAccountImpersonation()
  {
    return $this->analyzeServiceAccountImpersonation;
  }
  public function setExpandGroups($expandGroups)
  {
    $this->expandGroups = $expandGroups;
  }
  public function getExpandGroups()
  {
    return $this->expandGroups;
  }
  public function setExpandResources($expandResources)
  {
    $this->expandResources = $expandResources;
  }
  public function getExpandResources()
  {
    return $this->expandResources;
  }
  public function setExpandRoles($expandRoles)
  {
    $this->expandRoles = $expandRoles;
  }
  public function getExpandRoles()
  {
    return $this->expandRoles;
  }
  public function setOutputGroupEdges($outputGroupEdges)
  {
    $this->outputGroupEdges = $outputGroupEdges;
  }
  public function getOutputGroupEdges()
  {
    return $this->outputGroupEdges;
  }
  public function setOutputResourceEdges($outputResourceEdges)
  {
    $this->outputResourceEdges = $outputResourceEdges;
  }
  public function getOutputResourceEdges()
  {
    return $this->outputResourceEdges;
  }
}
