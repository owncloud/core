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

class Google_Service_DLP_GooglePrivacyDlpV2Finding extends Google_Model
{
  public $createTime;
  public $findingId;
  protected $infoTypeType = 'Google_Service_DLP_GooglePrivacyDlpV2InfoType';
  protected $infoTypeDataType = '';
  public $jobCreateTime;
  public $jobName;
  public $labels;
  public $likelihood;
  protected $locationType = 'Google_Service_DLP_GooglePrivacyDlpV2Location';
  protected $locationDataType = '';
  public $name;
  public $quote;
  protected $quoteInfoType = 'Google_Service_DLP_GooglePrivacyDlpV2QuoteInfo';
  protected $quoteInfoDataType = '';
  public $resourceName;
  public $triggerName;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setFindingId($findingId)
  {
    $this->findingId = $findingId;
  }
  public function getFindingId()
  {
    return $this->findingId;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2InfoType
   */
  public function setInfoType(Google_Service_DLP_GooglePrivacyDlpV2InfoType $infoType)
  {
    $this->infoType = $infoType;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2InfoType
   */
  public function getInfoType()
  {
    return $this->infoType;
  }
  public function setJobCreateTime($jobCreateTime)
  {
    $this->jobCreateTime = $jobCreateTime;
  }
  public function getJobCreateTime()
  {
    return $this->jobCreateTime;
  }
  public function setJobName($jobName)
  {
    $this->jobName = $jobName;
  }
  public function getJobName()
  {
    return $this->jobName;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLikelihood($likelihood)
  {
    $this->likelihood = $likelihood;
  }
  public function getLikelihood()
  {
    return $this->likelihood;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Location
   */
  public function setLocation(Google_Service_DLP_GooglePrivacyDlpV2Location $location)
  {
    $this->location = $location;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Location
   */
  public function getLocation()
  {
    return $this->location;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setQuote($quote)
  {
    $this->quote = $quote;
  }
  public function getQuote()
  {
    return $this->quote;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2QuoteInfo
   */
  public function setQuoteInfo(Google_Service_DLP_GooglePrivacyDlpV2QuoteInfo $quoteInfo)
  {
    $this->quoteInfo = $quoteInfo;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2QuoteInfo
   */
  public function getQuoteInfo()
  {
    return $this->quoteInfo;
  }
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  public function getResourceName()
  {
    return $this->resourceName;
  }
  public function setTriggerName($triggerName)
  {
    $this->triggerName = $triggerName;
  }
  public function getTriggerName()
  {
    return $this->triggerName;
  }
}
