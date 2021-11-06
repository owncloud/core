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

class OSPolicyAssignmentReportOSPolicyComplianceOSPolicyResourceCompliance extends \Google\Collection
{
  protected $collection_key = 'configSteps';
  public $complianceState;
  public $complianceStateReason;
  protected $configStepsType = OSPolicyAssignmentReportOSPolicyComplianceOSPolicyResourceComplianceOSPolicyResourceConfigStep::class;
  protected $configStepsDataType = 'array';
  protected $execResourceOutputType = OSPolicyAssignmentReportOSPolicyComplianceOSPolicyResourceComplianceExecResourceOutput::class;
  protected $execResourceOutputDataType = '';
  public $osPolicyResourceId;

  public function setComplianceState($complianceState)
  {
    $this->complianceState = $complianceState;
  }
  public function getComplianceState()
  {
    return $this->complianceState;
  }
  public function setComplianceStateReason($complianceStateReason)
  {
    $this->complianceStateReason = $complianceStateReason;
  }
  public function getComplianceStateReason()
  {
    return $this->complianceStateReason;
  }
  /**
   * @param OSPolicyAssignmentReportOSPolicyComplianceOSPolicyResourceComplianceOSPolicyResourceConfigStep[]
   */
  public function setConfigSteps($configSteps)
  {
    $this->configSteps = $configSteps;
  }
  /**
   * @return OSPolicyAssignmentReportOSPolicyComplianceOSPolicyResourceComplianceOSPolicyResourceConfigStep[]
   */
  public function getConfigSteps()
  {
    return $this->configSteps;
  }
  /**
   * @param OSPolicyAssignmentReportOSPolicyComplianceOSPolicyResourceComplianceExecResourceOutput
   */
  public function setExecResourceOutput(OSPolicyAssignmentReportOSPolicyComplianceOSPolicyResourceComplianceExecResourceOutput $execResourceOutput)
  {
    $this->execResourceOutput = $execResourceOutput;
  }
  /**
   * @return OSPolicyAssignmentReportOSPolicyComplianceOSPolicyResourceComplianceExecResourceOutput
   */
  public function getExecResourceOutput()
  {
    return $this->execResourceOutput;
  }
  public function setOsPolicyResourceId($osPolicyResourceId)
  {
    $this->osPolicyResourceId = $osPolicyResourceId;
  }
  public function getOsPolicyResourceId()
  {
    return $this->osPolicyResourceId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OSPolicyAssignmentReportOSPolicyComplianceOSPolicyResourceCompliance::class, 'Google_Service_OSConfig_OSPolicyAssignmentReportOSPolicyComplianceOSPolicyResourceCompliance');
