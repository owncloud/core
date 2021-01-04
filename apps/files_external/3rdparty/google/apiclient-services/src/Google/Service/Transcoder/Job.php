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

class Google_Service_Transcoder_Job extends Google_Collection
{
  protected $collection_key = 'failureDetails';
  protected $configType = 'Google_Service_Transcoder_JobConfig';
  protected $configDataType = '';
  public $createTime;
  public $endTime;
  protected $failureDetailsType = 'Google_Service_Transcoder_FailureDetail';
  protected $failureDetailsDataType = 'array';
  public $failureReason;
  public $inputUri;
  public $name;
  protected $originUriType = 'Google_Service_Transcoder_OriginUri';
  protected $originUriDataType = '';
  public $outputUri;
  public $priority;
  protected $progressType = 'Google_Service_Transcoder_Progress';
  protected $progressDataType = '';
  public $startTime;
  public $state;
  public $templateId;

  /**
   * @param Google_Service_Transcoder_JobConfig
   */
  public function setConfig(Google_Service_Transcoder_JobConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return Google_Service_Transcoder_JobConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param Google_Service_Transcoder_FailureDetail[]
   */
  public function setFailureDetails($failureDetails)
  {
    $this->failureDetails = $failureDetails;
  }
  /**
   * @return Google_Service_Transcoder_FailureDetail[]
   */
  public function getFailureDetails()
  {
    return $this->failureDetails;
  }
  public function setFailureReason($failureReason)
  {
    $this->failureReason = $failureReason;
  }
  public function getFailureReason()
  {
    return $this->failureReason;
  }
  public function setInputUri($inputUri)
  {
    $this->inputUri = $inputUri;
  }
  public function getInputUri()
  {
    return $this->inputUri;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Transcoder_OriginUri
   */
  public function setOriginUri(Google_Service_Transcoder_OriginUri $originUri)
  {
    $this->originUri = $originUri;
  }
  /**
   * @return Google_Service_Transcoder_OriginUri
   */
  public function getOriginUri()
  {
    return $this->originUri;
  }
  public function setOutputUri($outputUri)
  {
    $this->outputUri = $outputUri;
  }
  public function getOutputUri()
  {
    return $this->outputUri;
  }
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  public function getPriority()
  {
    return $this->priority;
  }
  /**
   * @param Google_Service_Transcoder_Progress
   */
  public function setProgress(Google_Service_Transcoder_Progress $progress)
  {
    $this->progress = $progress;
  }
  /**
   * @return Google_Service_Transcoder_Progress
   */
  public function getProgress()
  {
    return $this->progress;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTemplateId($templateId)
  {
    $this->templateId = $templateId;
  }
  public function getTemplateId()
  {
    return $this->templateId;
  }
}
