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

class Google_Service_ContainerAnalysis_PackageIssue extends Google_Model
{
  protected $affectedLocationType = 'Google_Service_ContainerAnalysis_VulnerabilityLocation';
  protected $affectedLocationDataType = '';
  protected $fixedLocationType = 'Google_Service_ContainerAnalysis_VulnerabilityLocation';
  protected $fixedLocationDataType = '';
  public $severityName;

  /**
   * @param Google_Service_ContainerAnalysis_VulnerabilityLocation
   */
  public function setAffectedLocation(Google_Service_ContainerAnalysis_VulnerabilityLocation $affectedLocation)
  {
    $this->affectedLocation = $affectedLocation;
  }
  /**
   * @return Google_Service_ContainerAnalysis_VulnerabilityLocation
   */
  public function getAffectedLocation()
  {
    return $this->affectedLocation;
  }
  /**
   * @param Google_Service_ContainerAnalysis_VulnerabilityLocation
   */
  public function setFixedLocation(Google_Service_ContainerAnalysis_VulnerabilityLocation $fixedLocation)
  {
    $this->fixedLocation = $fixedLocation;
  }
  /**
   * @return Google_Service_ContainerAnalysis_VulnerabilityLocation
   */
  public function getFixedLocation()
  {
    return $this->fixedLocation;
  }
  public function setSeverityName($severityName)
  {
    $this->severityName = $severityName;
  }
  public function getSeverityName()
  {
    return $this->severityName;
  }
}
