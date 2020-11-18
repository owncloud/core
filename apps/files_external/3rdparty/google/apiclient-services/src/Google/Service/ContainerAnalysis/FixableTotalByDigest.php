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

class Google_Service_ContainerAnalysis_FixableTotalByDigest extends Google_Model
{
  public $fixableCount;
  protected $resourceType = 'Google_Service_ContainerAnalysis_ContaineranalysisResource';
  protected $resourceDataType = '';
  public $severity;
  public $totalCount;

  public function setFixableCount($fixableCount)
  {
    $this->fixableCount = $fixableCount;
  }
  public function getFixableCount()
  {
    return $this->fixableCount;
  }
  /**
   * @param Google_Service_ContainerAnalysis_ContaineranalysisResource
   */
  public function setResource(Google_Service_ContainerAnalysis_ContaineranalysisResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return Google_Service_ContainerAnalysis_ContaineranalysisResource
   */
  public function getResource()
  {
    return $this->resource;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  public function getSeverity()
  {
    return $this->severity;
  }
  public function setTotalCount($totalCount)
  {
    $this->totalCount = $totalCount;
  }
  public function getTotalCount()
  {
    return $this->totalCount;
  }
}
