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

class Google_Service_ContainerAnalysis_VulnerabilityDetails extends Google_Collection
{
  protected $collection_key = 'packageIssue';
  public $cvssScore;
  public $effectiveSeverity;
  protected $packageIssueType = 'Google_Service_ContainerAnalysis_PackageIssue';
  protected $packageIssueDataType = 'array';
  public $severity;
  public $type;

  public function setCvssScore($cvssScore)
  {
    $this->cvssScore = $cvssScore;
  }
  public function getCvssScore()
  {
    return $this->cvssScore;
  }
  public function setEffectiveSeverity($effectiveSeverity)
  {
    $this->effectiveSeverity = $effectiveSeverity;
  }
  public function getEffectiveSeverity()
  {
    return $this->effectiveSeverity;
  }
  /**
   * @param Google_Service_ContainerAnalysis_PackageIssue
   */
  public function setPackageIssue($packageIssue)
  {
    $this->packageIssue = $packageIssue;
  }
  /**
   * @return Google_Service_ContainerAnalysis_PackageIssue
   */
  public function getPackageIssue()
  {
    return $this->packageIssue;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  public function getSeverity()
  {
    return $this->severity;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
