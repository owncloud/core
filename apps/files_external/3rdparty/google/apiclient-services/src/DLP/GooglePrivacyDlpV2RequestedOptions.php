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

class GooglePrivacyDlpV2RequestedOptions extends \Google\Model
{
  protected $jobConfigType = GooglePrivacyDlpV2InspectJobConfig::class;
  protected $jobConfigDataType = '';
  protected $snapshotInspectTemplateType = GooglePrivacyDlpV2InspectTemplate::class;
  protected $snapshotInspectTemplateDataType = '';

  /**
   * @param GooglePrivacyDlpV2InspectJobConfig
   */
  public function setJobConfig(GooglePrivacyDlpV2InspectJobConfig $jobConfig)
  {
    $this->jobConfig = $jobConfig;
  }
  /**
   * @return GooglePrivacyDlpV2InspectJobConfig
   */
  public function getJobConfig()
  {
    return $this->jobConfig;
  }
  /**
   * @param GooglePrivacyDlpV2InspectTemplate
   */
  public function setSnapshotInspectTemplate(GooglePrivacyDlpV2InspectTemplate $snapshotInspectTemplate)
  {
    $this->snapshotInspectTemplate = $snapshotInspectTemplate;
  }
  /**
   * @return GooglePrivacyDlpV2InspectTemplate
   */
  public function getSnapshotInspectTemplate()
  {
    return $this->snapshotInspectTemplate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2RequestedOptions::class, 'Google_Service_DLP_GooglePrivacyDlpV2RequestedOptions');
