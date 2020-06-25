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

class Google_Service_AndroidEnterprise_Device extends Google_Model
{
  public $androidId;
  public $managementType;
  protected $policyType = 'Google_Service_AndroidEnterprise_Policy';
  protected $policyDataType = '';
  protected $reportType = 'Google_Service_AndroidEnterprise_DeviceReport';
  protected $reportDataType = '';

  public function setAndroidId($androidId)
  {
    $this->androidId = $androidId;
  }
  public function getAndroidId()
  {
    return $this->androidId;
  }
  public function setManagementType($managementType)
  {
    $this->managementType = $managementType;
  }
  public function getManagementType()
  {
    return $this->managementType;
  }
  /**
   * @param Google_Service_AndroidEnterprise_Policy
   */
  public function setPolicy(Google_Service_AndroidEnterprise_Policy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return Google_Service_AndroidEnterprise_Policy
   */
  public function getPolicy()
  {
    return $this->policy;
  }
  /**
   * @param Google_Service_AndroidEnterprise_DeviceReport
   */
  public function setReport(Google_Service_AndroidEnterprise_DeviceReport $report)
  {
    $this->report = $report;
  }
  /**
   * @return Google_Service_AndroidEnterprise_DeviceReport
   */
  public function getReport()
  {
    return $this->report;
  }
}
