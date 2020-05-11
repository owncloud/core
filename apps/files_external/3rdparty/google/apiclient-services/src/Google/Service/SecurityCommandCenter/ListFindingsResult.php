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

class Google_Service_SecurityCommandCenter_ListFindingsResult extends Google_Model
{
  protected $findingType = 'Google_Service_SecurityCommandCenter_Finding';
  protected $findingDataType = '';
  protected $resourceType = 'Google_Service_SecurityCommandCenter_SecuritycenterResource';
  protected $resourceDataType = '';
  public $stateChange;

  /**
   * @param Google_Service_SecurityCommandCenter_Finding
   */
  public function setFinding(Google_Service_SecurityCommandCenter_Finding $finding)
  {
    $this->finding = $finding;
  }
  /**
   * @return Google_Service_SecurityCommandCenter_Finding
   */
  public function getFinding()
  {
    return $this->finding;
  }
  /**
   * @param Google_Service_SecurityCommandCenter_SecuritycenterResource
   */
  public function setResource(Google_Service_SecurityCommandCenter_SecuritycenterResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return Google_Service_SecurityCommandCenter_SecuritycenterResource
   */
  public function getResource()
  {
    return $this->resource;
  }
  public function setStateChange($stateChange)
  {
    $this->stateChange = $stateChange;
  }
  public function getStateChange()
  {
    return $this->stateChange;
  }
}
