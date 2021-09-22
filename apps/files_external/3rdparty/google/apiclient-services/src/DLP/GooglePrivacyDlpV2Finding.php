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

class GooglePrivacyDlpV2Finding extends \Google\Model
{
  public $createTime;
  public $findingId;
  protected $infoTypeType = GooglePrivacyDlpV2InfoType::class;
  protected $infoTypeDataType = '';
  public $jobCreateTime;
  public $jobName;
  public $labels;
  public $likelihood;
  protected $locationType = GooglePrivacyDlpV2Location::class;
  protected $locationDataType = '';
  public $name;
  public $quote;
  protected $quoteInfoType = GooglePrivacyDlpV2QuoteInfo::class;
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
   * @param GooglePrivacyDlpV2InfoType
   */
  public function setInfoType(GooglePrivacyDlpV2InfoType $infoType)
  {
    $this->infoType = $infoType;
  }
  /**
   * @return GooglePrivacyDlpV2InfoType
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
   * @param GooglePrivacyDlpV2Location
   */
  public function setLocation(GooglePrivacyDlpV2Location $location)
  {
    $this->location = $location;
  }
  /**
   * @return GooglePrivacyDlpV2Location
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
   * @param GooglePrivacyDlpV2QuoteInfo
   */
  public function setQuoteInfo(GooglePrivacyDlpV2QuoteInfo $quoteInfo)
  {
    $this->quoteInfo = $quoteInfo;
  }
  /**
   * @return GooglePrivacyDlpV2QuoteInfo
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2Finding::class, 'Google_Service_DLP_GooglePrivacyDlpV2Finding');
