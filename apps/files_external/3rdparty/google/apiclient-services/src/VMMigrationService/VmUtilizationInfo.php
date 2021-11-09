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

namespace Google\Service\VMMigrationService;

class VmUtilizationInfo extends \Google\Model
{
  protected $utilizationType = VmUtilizationMetrics::class;
  protected $utilizationDataType = '';
  public $vmId;
  protected $vmwareVmDetailsType = VmwareVmDetails::class;
  protected $vmwareVmDetailsDataType = '';

  /**
   * @param VmUtilizationMetrics
   */
  public function setUtilization(VmUtilizationMetrics $utilization)
  {
    $this->utilization = $utilization;
  }
  /**
   * @return VmUtilizationMetrics
   */
  public function getUtilization()
  {
    return $this->utilization;
  }
  public function setVmId($vmId)
  {
    $this->vmId = $vmId;
  }
  public function getVmId()
  {
    return $this->vmId;
  }
  /**
   * @param VmwareVmDetails
   */
  public function setVmwareVmDetails(VmwareVmDetails $vmwareVmDetails)
  {
    $this->vmwareVmDetails = $vmwareVmDetails;
  }
  /**
   * @return VmwareVmDetails
   */
  public function getVmwareVmDetails()
  {
    return $this->vmwareVmDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VmUtilizationInfo::class, 'Google_Service_VMMigrationService_VmUtilizationInfo');
