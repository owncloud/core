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
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $findingId;
  protected $infoTypeType = GooglePrivacyDlpV2InfoType::class;
  protected $infoTypeDataType = '';
  /**
   * @var string
   */
  public $jobCreateTime;
  /**
   * @var string
   */
  public $jobName;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $likelihood;
  protected $locationType = GooglePrivacyDlpV2Location::class;
  protected $locationDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $quote;
  protected $quoteInfoType = GooglePrivacyDlpV2QuoteInfo::class;
  protected $quoteInfoDataType = '';
  /**
   * @var string
   */
  public $resourceName;
  /**
   * @var string
   */
  public $triggerName;

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
  public function setFindingId($findingId)
  {
    $this->findingId = $findingId;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setJobCreateTime($jobCreateTime)
  {
    $this->jobCreateTime = $jobCreateTime;
  }
  /**
   * @return string
   */
  public function getJobCreateTime()
  {
    return $this->jobCreateTime;
  }
  /**
   * @param string
   */
  public function setJobName($jobName)
  {
    $this->jobName = $jobName;
  }
  /**
   * @return string
   */
  public function getJobName()
  {
    return $this->jobName;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setLikelihood($likelihood)
  {
    $this->likelihood = $likelihood;
  }
  /**
   * @return string
   */
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
   * @param string
   */
  public function setQuote($quote)
  {
    $this->quote = $quote;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  /**
   * @return string
   */
  public function getResourceName()
  {
    return $this->resourceName;
  }
  /**
   * @param string
   */
  public function setTriggerName($triggerName)
  {
    $this->triggerName = $triggerName;
  }
  /**
   * @return string
   */
  public function getTriggerName()
  {
    return $this->triggerName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2Finding::class, 'Google_Service_DLP_GooglePrivacyDlpV2Finding');
