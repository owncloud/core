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

namespace Google\Service\AndroidEnterprise;

class Device extends \Google\Model
{
  /**
   * @var string
   */
  public $androidId;
  /**
   * @var string
   */
  public $managementType;
  protected $policyType = Policy::class;
  protected $policyDataType = '';
  protected $reportType = DeviceReport::class;
  protected $reportDataType = '';

  /**
   * @param string
   */
  public function setAndroidId($androidId)
  {
    $this->androidId = $androidId;
  }
  /**
   * @return string
   */
  public function getAndroidId()
  {
    return $this->androidId;
  }
  /**
   * @param string
   */
  public function setManagementType($managementType)
  {
    $this->managementType = $managementType;
  }
  /**
   * @return string
   */
  public function getManagementType()
  {
    return $this->managementType;
  }
  /**
   * @param Policy
   */
  public function setPolicy(Policy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return Policy
   */
  public function getPolicy()
  {
    return $this->policy;
  }
  /**
   * @param DeviceReport
   */
  public function setReport(DeviceReport $report)
  {
    $this->report = $report;
  }
  /**
   * @return DeviceReport
   */
  public function getReport()
  {
    return $this->report;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Device::class, 'Google_Service_AndroidEnterprise_Device');
