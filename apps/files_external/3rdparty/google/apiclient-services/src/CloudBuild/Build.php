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

namespace Google\Service\CloudBuild;

class Build extends \Google\Collection
{
  protected $collection_key = 'warnings';
  protected $approvalType = BuildApproval::class;
  protected $approvalDataType = '';
  protected $artifactsType = Artifacts::class;
  protected $artifactsDataType = '';
  protected $availableSecretsType = Secrets::class;
  protected $availableSecretsDataType = '';
  public $buildTriggerId;
  public $createTime;
  protected $failureInfoType = FailureInfo::class;
  protected $failureInfoDataType = '';
  public $finishTime;
  public $id;
  public $images;
  public $logUrl;
  public $logsBucket;
  public $name;
  protected $optionsType = BuildOptions::class;
  protected $optionsDataType = '';
  public $projectId;
  public $queueTtl;
  protected $resultsType = Results::class;
  protected $resultsDataType = '';
  protected $secretsType = Secret::class;
  protected $secretsDataType = 'array';
  public $serviceAccount;
  protected $sourceType = Source::class;
  protected $sourceDataType = '';
  protected $sourceProvenanceType = SourceProvenance::class;
  protected $sourceProvenanceDataType = '';
  public $startTime;
  public $status;
  public $statusDetail;
  protected $stepsType = BuildStep::class;
  protected $stepsDataType = 'array';
  public $substitutions;
  public $tags;
  public $timeout;
  protected $timingType = TimeSpan::class;
  protected $timingDataType = 'map';
  protected $warningsType = Warning::class;
  protected $warningsDataType = 'array';

  /**
   * @param BuildApproval
   */
  public function setApproval(BuildApproval $approval)
  {
    $this->approval = $approval;
  }
  /**
   * @return BuildApproval
   */
  public function getApproval()
  {
    return $this->approval;
  }
  /**
   * @param Artifacts
   */
  public function setArtifacts(Artifacts $artifacts)
  {
    $this->artifacts = $artifacts;
  }
  /**
   * @return Artifacts
   */
  public function getArtifacts()
  {
    return $this->artifacts;
  }
  /**
   * @param Secrets
   */
  public function setAvailableSecrets(Secrets $availableSecrets)
  {
    $this->availableSecrets = $availableSecrets;
  }
  /**
   * @return Secrets
   */
  public function getAvailableSecrets()
  {
    return $this->availableSecrets;
  }
  public function setBuildTriggerId($buildTriggerId)
  {
    $this->buildTriggerId = $buildTriggerId;
  }
  public function getBuildTriggerId()
  {
    return $this->buildTriggerId;
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
   * @param FailureInfo
   */
  public function setFailureInfo(FailureInfo $failureInfo)
  {
    $this->failureInfo = $failureInfo;
  }
  /**
   * @return FailureInfo
   */
  public function getFailureInfo()
  {
    return $this->failureInfo;
  }
  public function setFinishTime($finishTime)
  {
    $this->finishTime = $finishTime;
  }
  public function getFinishTime()
  {
    return $this->finishTime;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setImages($images)
  {
    $this->images = $images;
  }
  public function getImages()
  {
    return $this->images;
  }
  public function setLogUrl($logUrl)
  {
    $this->logUrl = $logUrl;
  }
  public function getLogUrl()
  {
    return $this->logUrl;
  }
  public function setLogsBucket($logsBucket)
  {
    $this->logsBucket = $logsBucket;
  }
  public function getLogsBucket()
  {
    return $this->logsBucket;
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
   * @param BuildOptions
   */
  public function setOptions(BuildOptions $options)
  {
    $this->options = $options;
  }
  /**
   * @return BuildOptions
   */
  public function getOptions()
  {
    return $this->options;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setQueueTtl($queueTtl)
  {
    $this->queueTtl = $queueTtl;
  }
  public function getQueueTtl()
  {
    return $this->queueTtl;
  }
  /**
   * @param Results
   */
  public function setResults(Results $results)
  {
    $this->results = $results;
  }
  /**
   * @return Results
   */
  public function getResults()
  {
    return $this->results;
  }
  /**
   * @param Secret[]
   */
  public function setSecrets($secrets)
  {
    $this->secrets = $secrets;
  }
  /**
   * @return Secret[]
   */
  public function getSecrets()
  {
    return $this->secrets;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param Source
   */
  public function setSource(Source $source)
  {
    $this->source = $source;
  }
  /**
   * @return Source
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param SourceProvenance
   */
  public function setSourceProvenance(SourceProvenance $sourceProvenance)
  {
    $this->sourceProvenance = $sourceProvenance;
  }
  /**
   * @return SourceProvenance
   */
  public function getSourceProvenance()
  {
    return $this->sourceProvenance;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatusDetail($statusDetail)
  {
    $this->statusDetail = $statusDetail;
  }
  public function getStatusDetail()
  {
    return $this->statusDetail;
  }
  /**
   * @param BuildStep[]
   */
  public function setSteps($steps)
  {
    $this->steps = $steps;
  }
  /**
   * @return BuildStep[]
   */
  public function getSteps()
  {
    return $this->steps;
  }
  public function setSubstitutions($substitutions)
  {
    $this->substitutions = $substitutions;
  }
  public function getSubstitutions()
  {
    return $this->substitutions;
  }
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  public function getTags()
  {
    return $this->tags;
  }
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  public function getTimeout()
  {
    return $this->timeout;
  }
  /**
   * @param TimeSpan[]
   */
  public function setTiming($timing)
  {
    $this->timing = $timing;
  }
  /**
   * @return TimeSpan[]
   */
  public function getTiming()
  {
    return $this->timing;
  }
  /**
   * @param Warning[]
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return Warning[]
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Build::class, 'Google_Service_CloudBuild_Build');
