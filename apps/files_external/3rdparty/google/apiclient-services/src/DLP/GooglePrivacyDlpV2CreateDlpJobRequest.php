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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2CreateDlpJobRequest extends \Google\Model
{
  protected $inspectJobType = GooglePrivacyDlpV2InspectJobConfig::class;
  protected $inspectJobDataType = '';
  public $jobId;
  public $locationId;
  protected $riskJobType = GooglePrivacyDlpV2RiskAnalysisJobConfig::class;
  protected $riskJobDataType = '';

  /**
   * @param GooglePrivacyDlpV2InspectJobConfig
   */
  public function setInspectJob(GooglePrivacyDlpV2InspectJobConfig $inspectJob)
  {
    $this->inspectJob = $inspectJob;
  }
  /**
   * @return GooglePrivacyDlpV2InspectJobConfig
   */
  public function getInspectJob()
  {
    return $this->inspectJob;
  }
  public function setJobId($jobId)
  {
    $this->jobId = $jobId;
  }
  public function getJobId()
  {
    return $this->jobId;
  }
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  public function getLocationId()
  {
    return $this->locationId;
  }
  /**
   * @param GooglePrivacyDlpV2RiskAnalysisJobConfig
   */
  public function setRiskJob(GooglePrivacyDlpV2RiskAnalysisJobConfig $riskJob)
  {
    $this->riskJob = $riskJob;
  }
  /**
   * @return GooglePrivacyDlpV2RiskAnalysisJobConfig
   */
  public function getRiskJob()
  {
    return $this->riskJob;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2CreateDlpJobRequest::class, 'Google_Service_DLP_GooglePrivacyDlpV2CreateDlpJobRequest');
