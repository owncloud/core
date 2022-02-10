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

class GooglePrivacyDlpV2DlpJob extends \Google\Collection
{
  protected $collection_key = 'errors';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $endTime;
  protected $errorsType = GooglePrivacyDlpV2Error::class;
  protected $errorsDataType = 'array';
  protected $inspectDetailsType = GooglePrivacyDlpV2InspectDataSourceDetails::class;
  protected $inspectDetailsDataType = '';
  /**
   * @var string
   */
  public $jobTriggerName;
  /**
   * @var string
   */
  public $name;
  protected $riskDetailsType = GooglePrivacyDlpV2AnalyzeDataSourceRiskDetails::class;
  protected $riskDetailsDataType = '';
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param GooglePrivacyDlpV2Error[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return GooglePrivacyDlpV2Error[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param GooglePrivacyDlpV2InspectDataSourceDetails
   */
  public function setInspectDetails(GooglePrivacyDlpV2InspectDataSourceDetails $inspectDetails)
  {
    $this->inspectDetails = $inspectDetails;
  }
  /**
   * @return GooglePrivacyDlpV2InspectDataSourceDetails
   */
  public function getInspectDetails()
  {
    return $this->inspectDetails;
  }
  /**
   * @param string
   */
  public function setJobTriggerName($jobTriggerName)
  {
    $this->jobTriggerName = $jobTriggerName;
  }
  /**
   * @return string
   */
  public function getJobTriggerName()
  {
    return $this->jobTriggerName;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GooglePrivacyDlpV2AnalyzeDataSourceRiskDetails
   */
  public function setRiskDetails(GooglePrivacyDlpV2AnalyzeDataSourceRiskDetails $riskDetails)
  {
    $this->riskDetails = $riskDetails;
  }
  /**
   * @return GooglePrivacyDlpV2AnalyzeDataSourceRiskDetails
   */
  public function getRiskDetails()
  {
    return $this->riskDetails;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2DlpJob::class, 'Google_Service_DLP_GooglePrivacyDlpV2DlpJob');
