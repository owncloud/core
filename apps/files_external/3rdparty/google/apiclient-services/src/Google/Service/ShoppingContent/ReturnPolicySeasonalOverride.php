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

class Google_Service_ShoppingContent_ReturnPolicySeasonalOverride extends Google_Model
{
  public $endDate;
  public $name;
  protected $policyType = 'Google_Service_ShoppingContent_ReturnPolicyPolicy';
  protected $policyDataType = '';
  public $startDate;

  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  public function getEndDate()
  {
    return $this->endDate;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_ShoppingContent_ReturnPolicyPolicy
   */
  public function setPolicy(Google_Service_ShoppingContent_ReturnPolicyPolicy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return Google_Service_ShoppingContent_ReturnPolicyPolicy
   */
  public function getPolicy()
  {
    return $this->policy;
  }
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  public function getStartDate()
  {
    return $this->startDate;
  }
}
