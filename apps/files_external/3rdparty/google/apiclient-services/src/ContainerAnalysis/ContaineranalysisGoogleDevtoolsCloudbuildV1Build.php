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

namespace Google\Service\ContainerAnalysis;

class ContaineranalysisGoogleDevtoolsCloudbuildV1Build extends \Google\Collection
{
  protected $collection_key = 'warnings';
  protected $approvalType = ContaineranalysisGoogleDevtoolsCloudbuildV1BuildApproval::class;
  protected $approvalDataType = '';
  protected $artifactsType = ContaineranalysisGoogleDevtoolsCloudbuildV1Artifacts::class;
  protected $artifactsDataType = '';
  protected $availableSecretsType = ContaineranalysisGoogleDevtoolsCloudbuildV1Secrets::class;
  protected $availableSecretsDataType = '';
  /**
   * @var string
   */
  public $buildTriggerId;
  /**
   * @var string
   */
  public $createTime;
  protected $failureInfoType = ContaineranalysisGoogleDevtoolsCloudbuildV1BuildFailureInfo::class;
  protected $failureInfoDataType = '';
  /**
   * @var string
   */
  public $finishTime;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string[]
   */
  public $images;
  /**
   * @var string
   */
  public $logUrl;
  /**
   * @var string
   */
  public $logsBucket;
  /**
   * @var string
   */
  public $name;
  protected $optionsType = ContaineranalysisGoogleDevtoolsCloudbuildV1BuildOptions::class;
  protected $optionsDataType = '';
  /**
   * @var string
   */
  public $projectId;
  /**
   * @var string
   */
  public $queueTtl;
  protected $resultsType = ContaineranalysisGoogleDevtoolsCloudbuildV1Results::class;
  protected $resultsDataType = '';
  protected $secretsType = ContaineranalysisGoogleDevtoolsCloudbuildV1Secret::class;
  protected $secretsDataType = 'array';
  /**
   * @var string
   */
  public $serviceAccount;
  protected $sourceType = ContaineranalysisGoogleDevtoolsCloudbuildV1Source::class;
  protected $sourceDataType = '';
  protected $sourceProvenanceType = ContaineranalysisGoogleDevtoolsCloudbuildV1SourceProvenance::class;
  protected $sourceProvenanceDataType = '';
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $statusDetail;
  protected $stepsType = ContaineranalysisGoogleDevtoolsCloudbuildV1BuildStep::class;
  protected $stepsDataType = 'array';
  /**
   * @var string[]
   */
  public $substitutions;
  /**
   * @var string[]
   */
  public $tags;
  /**
   * @var string
   */
  public $timeout;
  protected $timingType = ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan::class;
  protected $timingDataType = 'map';
  protected $warningsType = ContaineranalysisGoogleDevtoolsCloudbuildV1BuildWarning::class;
  protected $warningsDataType = 'array';

  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1BuildApproval
   */
  public function setApproval(ContaineranalysisGoogleDevtoolsCloudbuildV1BuildApproval $approval)
  {
    $this->approval = $approval;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1BuildApproval
   */
  public function getApproval()
  {
    return $this->approval;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1Artifacts
   */
  public function setArtifacts(ContaineranalysisGoogleDevtoolsCloudbuildV1Artifacts $artifacts)
  {
    $this->artifacts = $artifacts;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1Artifacts
   */
  public function getArtifacts()
  {
    return $this->artifacts;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1Secrets
   */
  public function setAvailableSecrets(ContaineranalysisGoogleDevtoolsCloudbuildV1Secrets $availableSecrets)
  {
    $this->availableSecrets = $availableSecrets;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1Secrets
   */
  public function getAvailableSecrets()
  {
    return $this->availableSecrets;
  }
  /**
   * @param string
   */
  public function setBuildTriggerId($buildTriggerId)
  {
    $this->buildTriggerId = $buildTriggerId;
  }
  /**
   * @return string
   */
  public function getBuildTriggerId()
  {
    return $this->buildTriggerId;
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
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1BuildFailureInfo
   */
  public function setFailureInfo(ContaineranalysisGoogleDevtoolsCloudbuildV1BuildFailureInfo $failureInfo)
  {
    $this->failureInfo = $failureInfo;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1BuildFailureInfo
   */
  public function getFailureInfo()
  {
    return $this->failureInfo;
  }
  /**
   * @param string
   */
  public function setFinishTime($finishTime)
  {
    $this->finishTime = $finishTime;
  }
  /**
   * @return string
   */
  public function getFinishTime()
  {
    return $this->finishTime;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string[]
   */
  public function setImages($images)
  {
    $this->images = $images;
  }
  /**
   * @return string[]
   */
  public function getImages()
  {
    return $this->images;
  }
  /**
   * @param string
   */
  public function setLogUrl($logUrl)
  {
    $this->logUrl = $logUrl;
  }
  /**
   * @return string
   */
  public function getLogUrl()
  {
    return $this->logUrl;
  }
  /**
   * @param string
   */
  public function setLogsBucket($logsBucket)
  {
    $this->logsBucket = $logsBucket;
  }
  /**
   * @return string
   */
  public function getLogsBucket()
  {
    return $this->logsBucket;
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
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1BuildOptions
   */
  public function setOptions(ContaineranalysisGoogleDevtoolsCloudbuildV1BuildOptions $options)
  {
    $this->options = $options;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1BuildOptions
   */
  public function getOptions()
  {
    return $this->options;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param string
   */
  public function setQueueTtl($queueTtl)
  {
    $this->queueTtl = $queueTtl;
  }
  /**
   * @return string
   */
  public function getQueueTtl()
  {
    return $this->queueTtl;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1Results
   */
  public function setResults(ContaineranalysisGoogleDevtoolsCloudbuildV1Results $results)
  {
    $this->results = $results;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1Results
   */
  public function getResults()
  {
    return $this->results;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1Secret[]
   */
  public function setSecrets($secrets)
  {
    $this->secrets = $secrets;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1Secret[]
   */
  public function getSecrets()
  {
    return $this->secrets;
  }
  /**
   * @param string
   */
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return string
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1Source
   */
  public function setSource(ContaineranalysisGoogleDevtoolsCloudbuildV1Source $source)
  {
    $this->source = $source;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1Source
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1SourceProvenance
   */
  public function setSourceProvenance(ContaineranalysisGoogleDevtoolsCloudbuildV1SourceProvenance $sourceProvenance)
  {
    $this->sourceProvenance = $sourceProvenance;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1SourceProvenance
   */
  public function getSourceProvenance()
  {
    return $this->sourceProvenance;
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
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setStatusDetail($statusDetail)
  {
    $this->statusDetail = $statusDetail;
  }
  /**
   * @return string
   */
  public function getStatusDetail()
  {
    return $this->statusDetail;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1BuildStep[]
   */
  public function setSteps($steps)
  {
    $this->steps = $steps;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1BuildStep[]
   */
  public function getSteps()
  {
    return $this->steps;
  }
  /**
   * @param string[]
   */
  public function setSubstitutions($substitutions)
  {
    $this->substitutions = $substitutions;
  }
  /**
   * @return string[]
   */
  public function getSubstitutions()
  {
    return $this->substitutions;
  }
  /**
   * @param string[]
   */
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return string[]
   */
  public function getTags()
  {
    return $this->tags;
  }
  /**
   * @param string
   */
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  /**
   * @return string
   */
  public function getTimeout()
  {
    return $this->timeout;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan[]
   */
  public function setTiming($timing)
  {
    $this->timing = $timing;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan[]
   */
  public function getTiming()
  {
    return $this->timing;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1BuildWarning[]
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1BuildWarning[]
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContaineranalysisGoogleDevtoolsCloudbuildV1Build::class, 'Google_Service_ContainerAnalysis_ContaineranalysisGoogleDevtoolsCloudbuildV1Build');
