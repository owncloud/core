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

namespace Google\Service\SecurityCommandCenter;

class ListFindingsResult extends \Google\Model
{
  protected $findingType = Finding::class;
  protected $findingDataType = '';
  protected $resourceType = SecuritycenterResource::class;
  protected $resourceDataType = '';
  /**
   * @var string
   */
  public $stateChange;

  /**
   * @param Finding
   */
  public function setFinding(Finding $finding)
  {
    $this->finding = $finding;
  }
  /**
   * @return Finding
   */
  public function getFinding()
  {
    return $this->finding;
  }
  /**
   * @param SecuritycenterResource
   */
  public function setResource(SecuritycenterResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return SecuritycenterResource
   */
  public function getResource()
  {
    return $this->resource;
  }
  /**
   * @param string
   */
  public function setStateChange($stateChange)
  {
    $this->stateChange = $stateChange;
  }
  /**
   * @return string
   */
  public function getStateChange()
  {
    return $this->stateChange;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListFindingsResult::class, 'Google_Service_SecurityCommandCenter_ListFindingsResult');
