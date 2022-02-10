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

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1Conversation extends \Google\Collection
{
  protected $collection_key = 'runtimeAnnotations';
  /**
   * @var string
   */
  public $agentId;
  protected $callMetadataType = GoogleCloudContactcenterinsightsV1ConversationCallMetadata::class;
  protected $callMetadataDataType = '';
  /**
   * @var string
   */
  public $createTime;
  protected $dataSourceType = GoogleCloudContactcenterinsightsV1ConversationDataSource::class;
  protected $dataSourceDataType = '';
  protected $dialogflowIntentsType = GoogleCloudContactcenterinsightsV1DialogflowIntent::class;
  protected $dialogflowIntentsDataType = 'map';
  /**
   * @var string
   */
  public $duration;
  /**
   * @var string
   */
  public $expireTime;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $languageCode;
  protected $latestAnalysisType = GoogleCloudContactcenterinsightsV1Analysis::class;
  protected $latestAnalysisDataType = '';
  /**
   * @var string
   */
  public $medium;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $obfuscatedUserId;
  protected $runtimeAnnotationsType = GoogleCloudContactcenterinsightsV1RuntimeAnnotation::class;
  protected $runtimeAnnotationsDataType = 'array';
  /**
   * @var string
   */
  public $startTime;
  protected $transcriptType = GoogleCloudContactcenterinsightsV1ConversationTranscript::class;
  protected $transcriptDataType = '';
  /**
   * @var string
   */
  public $ttl;
  /**
   * @var int
   */
  public $turnCount;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setAgentId($agentId)
  {
    $this->agentId = $agentId;
  }
  /**
   * @return string
   */
  public function getAgentId()
  {
    return $this->agentId;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1ConversationCallMetadata
   */
  public function setCallMetadata(GoogleCloudContactcenterinsightsV1ConversationCallMetadata $callMetadata)
  {
    $this->callMetadata = $callMetadata;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1ConversationCallMetadata
   */
  public function getCallMetadata()
  {
    return $this->callMetadata;
  }
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
   * @param GoogleCloudContactcenterinsightsV1ConversationDataSource
   */
  public function setDataSource(GoogleCloudContactcenterinsightsV1ConversationDataSource $dataSource)
  {
    $this->dataSource = $dataSource;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1ConversationDataSource
   */
  public function getDataSource()
  {
    return $this->dataSource;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1DialogflowIntent[]
   */
  public function setDialogflowIntents($dialogflowIntents)
  {
    $this->dialogflowIntents = $dialogflowIntents;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1DialogflowIntent[]
   */
  public function getDialogflowIntents()
  {
    return $this->dialogflowIntents;
  }
  /**
   * @param string
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return string
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param string
   */
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  /**
   * @return string
   */
  public function getExpireTime()
  {
    return $this->expireTime;
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
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1Analysis
   */
  public function setLatestAnalysis(GoogleCloudContactcenterinsightsV1Analysis $latestAnalysis)
  {
    $this->latestAnalysis = $latestAnalysis;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1Analysis
   */
  public function getLatestAnalysis()
  {
    return $this->latestAnalysis;
  }
  /**
   * @param string
   */
  public function setMedium($medium)
  {
    $this->medium = $medium;
  }
  /**
   * @return string
   */
  public function getMedium()
  {
    return $this->medium;
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
  public function setObfuscatedUserId($obfuscatedUserId)
  {
    $this->obfuscatedUserId = $obfuscatedUserId;
  }
  /**
   * @return string
   */
  public function getObfuscatedUserId()
  {
    return $this->obfuscatedUserId;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1RuntimeAnnotation[]
   */
  public function setRuntimeAnnotations($runtimeAnnotations)
  {
    $this->runtimeAnnotations = $runtimeAnnotations;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1RuntimeAnnotation[]
   */
  public function getRuntimeAnnotations()
  {
    return $this->runtimeAnnotations;
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
   * @param GoogleCloudContactcenterinsightsV1ConversationTranscript
   */
  public function setTranscript(GoogleCloudContactcenterinsightsV1ConversationTranscript $transcript)
  {
    $this->transcript = $transcript;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1ConversationTranscript
   */
  public function getTranscript()
  {
    return $this->transcript;
  }
  /**
   * @param string
   */
  public function setTtl($ttl)
  {
    $this->ttl = $ttl;
  }
  /**
   * @return string
   */
  public function getTtl()
  {
    return $this->ttl;
  }
  /**
   * @param int
   */
  public function setTurnCount($turnCount)
  {
    $this->turnCount = $turnCount;
  }
  /**
   * @return int
   */
  public function getTurnCount()
  {
    return $this->turnCount;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1Conversation::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1Conversation');
