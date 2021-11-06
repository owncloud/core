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
  public $agentId;
  protected $callMetadataType = GoogleCloudContactcenterinsightsV1ConversationCallMetadata::class;
  protected $callMetadataDataType = '';
  public $createTime;
  protected $dataSourceType = GoogleCloudContactcenterinsightsV1ConversationDataSource::class;
  protected $dataSourceDataType = '';
  protected $dialogflowIntentsType = GoogleCloudContactcenterinsightsV1DialogflowIntent::class;
  protected $dialogflowIntentsDataType = 'map';
  public $duration;
  public $expireTime;
  public $labels;
  public $languageCode;
  protected $latestAnalysisType = GoogleCloudContactcenterinsightsV1Analysis::class;
  protected $latestAnalysisDataType = '';
  public $medium;
  public $name;
  protected $runtimeAnnotationsType = GoogleCloudContactcenterinsightsV1RuntimeAnnotation::class;
  protected $runtimeAnnotationsDataType = 'array';
  public $startTime;
  protected $transcriptType = GoogleCloudContactcenterinsightsV1ConversationTranscript::class;
  protected $transcriptDataType = '';
  public $ttl;
  public $turnCount;
  public $updateTime;

  public function setAgentId($agentId)
  {
    $this->agentId = $agentId;
  }
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
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
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
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
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
  public function setMedium($medium)
  {
    $this->medium = $medium;
  }
  public function getMedium()
  {
    return $this->medium;
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
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
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
  public function setTtl($ttl)
  {
    $this->ttl = $ttl;
  }
  public function getTtl()
  {
    return $this->ttl;
  }
  public function setTurnCount($turnCount)
  {
    $this->turnCount = $turnCount;
  }
  public function getTurnCount()
  {
    return $this->turnCount;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1Conversation::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1Conversation');
