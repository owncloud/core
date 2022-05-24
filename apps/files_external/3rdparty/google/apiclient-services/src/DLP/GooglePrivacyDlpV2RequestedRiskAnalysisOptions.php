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

class GooglePrivacyDlpV2RequestedRiskAnalysisOptions extends \Google\Model
{
  protected $jobConfigType = GooglePrivacyDlpV2RiskAnalysisJobConfig::class;
  protected $jobConfigDataType = '';

  /**
   * @param GooglePrivacyDlpV2RiskAnalysisJobConfig
   */
  public function setJobConfig(GooglePrivacyDlpV2RiskAnalysisJobConfig $jobConfig)
  {
    $this->jobConfig = $jobConfig;
  }
  /**
   * @return GooglePrivacyDlpV2RiskAnalysisJobConfig
   */
  public function getJobConfig()
  {
    return $this->jobConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2RequestedRiskAnalysisOptions::class, 'Google_Service_DLP_GooglePrivacyDlpV2RequestedRiskAnalysisOptions');
