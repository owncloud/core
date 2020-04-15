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

class Google_Service_ContainerAnalysis_VulnerabilityType extends Google_Collection
{
  protected $collection_key = 'details';
  public $cvssScore;
  protected $detailsType = 'Google_Service_ContainerAnalysis_Detail';
  protected $detailsDataType = 'array';
  public $severity;

  public function setCvssScore($cvssScore)
  {
    $this->cvssScore = $cvssScore;
  }
  public function getCvssScore()
  {
    return $this->cvssScore;
  }
  /**
   * @param Google_Service_ContainerAnalysis_Detail
   */
  public function setDetails($details)
  {
    $this->details = $details;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Detail
   */
  public function getDetails()
  {
    return $this->details;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  public function getSeverity()
  {
    return $this->severity;
  }
}
