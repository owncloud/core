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

namespace Google\Service\OSConfig;

class OSPolicyAssignmentReportOSPolicyCompliance extends \Google\Collection
{
  protected $collection_key = 'osPolicyResourceCompliances';
  /**
   * @var string
   */
  public $complianceState;
  /**
   * @var string
   */
  public $complianceStateReason;
  /**
   * @var string
   */
  public $osPolicyId;
  protected $osPolicyResourceCompliancesType = OSPolicyAssignmentReportOSPolicyComplianceOSPolicyResourceCompliance::class;
  protected $osPolicyResourceCompliancesDataType = 'array';

  /**
   * @param string
   */
  public function setComplianceState($complianceState)
  {
    $this->complianceState = $complianceState;
  }
  /**
   * @return string
   */
  public function getComplianceState()
  {
    return $this->complianceState;
  }
  /**
   * @param string
   */
  public function setComplianceStateReason($complianceStateReason)
  {
    $this->complianceStateReason = $complianceStateReason;
  }
  /**
   * @return string
   */
  public function getComplianceStateReason()
  {
    return $this->complianceStateReason;
  }
  /**
   * @param string
   */
  public function setOsPolicyId($osPolicyId)
  {
    $this->osPolicyId = $osPolicyId;
  }
  /**
   * @return string
   */
  public function getOsPolicyId()
  {
    return $this->osPolicyId;
  }
  /**
   * @param OSPolicyAssignmentReportOSPolicyComplianceOSPolicyResourceCompliance[]
   */
  public function setOsPolicyResourceCompliances($osPolicyResourceCompliances)
  {
    $this->osPolicyResourceCompliances = $osPolicyResourceCompliances;
  }
  /**
   * @return OSPolicyAssignmentReportOSPolicyComplianceOSPolicyResourceCompliance[]
   */
  public function getOsPolicyResourceCompliances()
  {
    return $this->osPolicyResourceCompliances;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OSPolicyAssignmentReportOSPolicyCompliance::class, 'Google_Service_OSConfig_OSPolicyAssignmentReportOSPolicyCompliance');
