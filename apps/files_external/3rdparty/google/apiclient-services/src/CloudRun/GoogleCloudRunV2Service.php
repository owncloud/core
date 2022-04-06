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

namespace Google\Service\CloudRun;

class GoogleCloudRunV2Service extends \Google\Collection
{
  protected $collection_key = 'trafficStatuses';
  /**
   * @var string[]
   */
  public $annotations;
  protected $binaryAuthorizationType = GoogleCloudRunV2BinaryAuthorization::class;
  protected $binaryAuthorizationDataType = '';
  /**
   * @var string
   */
  public $client;
  /**
   * @var string
   */
  public $clientVersion;
  protected $conditionsType = GoogleCloudRunV2Condition::class;
  protected $conditionsDataType = 'array';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $creator;
  /**
   * @var string
   */
  public $deleteTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $expireTime;
  /**
   * @var string
   */
  public $generation;
  /**
   * @var string
   */
  public $ingress;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $lastModifier;
  /**
   * @var string
   */
  public $latestCreatedRevision;
  /**
   * @var string
   */
  public $latestReadyRevision;
  /**
   * @var string
   */
  public $launchStage;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $observedGeneration;
  /**
   * @var bool
   */
  public $reconciling;
  protected $templateType = GoogleCloudRunV2RevisionTemplate::class;
  protected $templateDataType = '';
  protected $terminalConditionType = GoogleCloudRunV2Condition::class;
  protected $terminalConditionDataType = '';
  protected $trafficType = GoogleCloudRunV2TrafficTarget::class;
  protected $trafficDataType = 'array';
  protected $trafficStatusesType = GoogleCloudRunV2TrafficTargetStatus::class;
  protected $trafficStatusesDataType = 'array';
  /**
   * @var string
   */
  public $uid;
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $uri;

  /**
   * @param string[]
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return string[]
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param GoogleCloudRunV2BinaryAuthorization
   */
  public function setBinaryAuthorization(GoogleCloudRunV2BinaryAuthorization $binaryAuthorization)
  {
    $this->binaryAuthorization = $binaryAuthorization;
  }
  /**
   * @return GoogleCloudRunV2BinaryAuthorization
   */
  public function getBinaryAuthorization()
  {
    return $this->binaryAuthorization;
  }
  /**
   * @param string
   */
  public function setClient($client)
  {
    $this->client = $client;
  }
  /**
   * @return string
   */
  public function getClient()
  {
    return $this->client;
  }
  /**
   * @param string
   */
  public function setClientVersion($clientVersion)
  {
    $this->clientVersion = $clientVersion;
  }
  /**
   * @return string
   */
  public function getClientVersion()
  {
    return $this->clientVersion;
  }
  /**
   * @param GoogleCloudRunV2Condition[]
   */
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  /**
   * @return GoogleCloudRunV2Condition[]
   */
  public function getConditions()
  {
    return $this->conditions;
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
   * @param string
   */
  public function setCreator($creator)
  {
    $this->creator = $creator;
  }
  /**
   * @return string
   */
  public function getCreator()
  {
    return $this->creator;
  }
  /**
   * @param string
   */
  public function setDeleteTime($deleteTime)
  {
    $this->deleteTime = $deleteTime;
  }
  /**
   * @return string
   */
  public function getDeleteTime()
  {
    return $this->deleteTime;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
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
   * @param string
   */
  public function setGeneration($generation)
  {
    $this->generation = $generation;
  }
  /**
   * @return string
   */
  public function getGeneration()
  {
    return $this->generation;
  }
  /**
   * @param string
   */
  public function setIngress($ingress)
  {
    $this->ingress = $ingress;
  }
  /**
   * @return string
   */
  public function getIngress()
  {
    return $this->ingress;
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
  public function setLastModifier($lastModifier)
  {
    $this->lastModifier = $lastModifier;
  }
  /**
   * @return string
   */
  public function getLastModifier()
  {
    return $this->lastModifier;
  }
  /**
   * @param string
   */
  public function setLatestCreatedRevision($latestCreatedRevision)
  {
    $this->latestCreatedRevision = $latestCreatedRevision;
  }
  /**
   * @return string
   */
  public function getLatestCreatedRevision()
  {
    return $this->latestCreatedRevision;
  }
  /**
   * @param string
   */
  public function setLatestReadyRevision($latestReadyRevision)
  {
    $this->latestReadyRevision = $latestReadyRevision;
  }
  /**
   * @return string
   */
  public function getLatestReadyRevision()
  {
    return $this->latestReadyRevision;
  }
  /**
   * @param string
   */
  public function setLaunchStage($launchStage)
  {
    $this->launchStage = $launchStage;
  }
  /**
   * @return string
   */
  public function getLaunchStage()
  {
    return $this->launchStage;
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
  public function setObservedGeneration($observedGeneration)
  {
    $this->observedGeneration = $observedGeneration;
  }
  /**
   * @return string
   */
  public function getObservedGeneration()
  {
    return $this->observedGeneration;
  }
  /**
   * @param bool
   */
  public function setReconciling($reconciling)
  {
    $this->reconciling = $reconciling;
  }
  /**
   * @return bool
   */
  public function getReconciling()
  {
    return $this->reconciling;
  }
  /**
   * @param GoogleCloudRunV2RevisionTemplate
   */
  public function setTemplate(GoogleCloudRunV2RevisionTemplate $template)
  {
    $this->template = $template;
  }
  /**
   * @return GoogleCloudRunV2RevisionTemplate
   */
  public function getTemplate()
  {
    return $this->template;
  }
  /**
   * @param GoogleCloudRunV2Condition
   */
  public function setTerminalCondition(GoogleCloudRunV2Condition $terminalCondition)
  {
    $this->terminalCondition = $terminalCondition;
  }
  /**
   * @return GoogleCloudRunV2Condition
   */
  public function getTerminalCondition()
  {
    return $this->terminalCondition;
  }
  /**
   * @param GoogleCloudRunV2TrafficTarget[]
   */
  public function setTraffic($traffic)
  {
    $this->traffic = $traffic;
  }
  /**
   * @return GoogleCloudRunV2TrafficTarget[]
   */
  public function getTraffic()
  {
    return $this->traffic;
  }
  /**
   * @param GoogleCloudRunV2TrafficTargetStatus[]
   */
  public function setTrafficStatuses($trafficStatuses)
  {
    $this->trafficStatuses = $trafficStatuses;
  }
  /**
   * @return GoogleCloudRunV2TrafficTargetStatus[]
   */
  public function getTrafficStatuses()
  {
    return $this->trafficStatuses;
  }
  /**
   * @param string
   */
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
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
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRunV2Service::class, 'Google_Service_CloudRun_GoogleCloudRunV2Service');
