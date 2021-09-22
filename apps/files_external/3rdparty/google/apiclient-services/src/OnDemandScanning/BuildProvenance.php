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

namespace Google\Service\OnDemandScanning;

class BuildProvenance extends \Google\Collection
{
  protected $collection_key = 'commands';
  public $buildOptions;
  public $builderVersion;
  protected $builtArtifactsType = Artifact::class;
  protected $builtArtifactsDataType = 'array';
  protected $commandsType = Command::class;
  protected $commandsDataType = 'array';
  public $createTime;
  public $creator;
  public $endTime;
  public $id;
  public $logsUri;
  public $projectId;
  protected $sourceProvenanceType = Source::class;
  protected $sourceProvenanceDataType = '';
  public $startTime;
  public $triggerId;

  public function setBuildOptions($buildOptions)
  {
    $this->buildOptions = $buildOptions;
  }
  public function getBuildOptions()
  {
    return $this->buildOptions;
  }
  public function setBuilderVersion($builderVersion)
  {
    $this->builderVersion = $builderVersion;
  }
  public function getBuilderVersion()
  {
    return $this->builderVersion;
  }
  /**
   * @param Artifact[]
   */
  public function setBuiltArtifacts($builtArtifacts)
  {
    $this->builtArtifacts = $builtArtifacts;
  }
  /**
   * @return Artifact[]
   */
  public function getBuiltArtifacts()
  {
    return $this->builtArtifacts;
  }
  /**
   * @param Command[]
   */
  public function setCommands($commands)
  {
    $this->commands = $commands;
  }
  /**
   * @return Command[]
   */
  public function getCommands()
  {
    return $this->commands;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCreator($creator)
  {
    $this->creator = $creator;
  }
  public function getCreator()
  {
    return $this->creator;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLogsUri($logsUri)
  {
    $this->logsUri = $logsUri;
  }
  public function getLogsUri()
  {
    return $this->logsUri;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param Source
   */
  public function setSourceProvenance(Source $sourceProvenance)
  {
    $this->sourceProvenance = $sourceProvenance;
  }
  /**
   * @return Source
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
  public function setTriggerId($triggerId)
  {
    $this->triggerId = $triggerId;
  }
  public function getTriggerId()
  {
    return $this->triggerId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuildProvenance::class, 'Google_Service_OnDemandScanning_BuildProvenance');
