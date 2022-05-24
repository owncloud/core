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

class BuildProvenance extends \Google\Collection
{
  protected $collection_key = 'commands';
  /**
   * @var string[]
   */
  public $buildOptions;
  /**
   * @var string
   */
  public $builderVersion;
  protected $builtArtifactsType = Artifact::class;
  protected $builtArtifactsDataType = 'array';
  protected $commandsType = Command::class;
  protected $commandsDataType = 'array';
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
  public $endTime;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $logsUri;
  /**
   * @var string
   */
  public $projectId;
  protected $sourceProvenanceType = Source::class;
  protected $sourceProvenanceDataType = '';
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $triggerId;

  /**
   * @param string[]
   */
  public function setBuildOptions($buildOptions)
  {
    $this->buildOptions = $buildOptions;
  }
  /**
   * @return string[]
   */
  public function getBuildOptions()
  {
    return $this->buildOptions;
  }
  /**
   * @param string
   */
  public function setBuilderVersion($builderVersion)
  {
    $this->builderVersion = $builderVersion;
  }
  /**
   * @return string
   */
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
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
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
   * @param string
   */
  public function setLogsUri($logsUri)
  {
    $this->logsUri = $logsUri;
  }
  /**
   * @return string
   */
  public function getLogsUri()
  {
    return $this->logsUri;
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
  public function setTriggerId($triggerId)
  {
    $this->triggerId = $triggerId;
  }
  /**
   * @return string
   */
  public function getTriggerId()
  {
    return $this->triggerId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuildProvenance::class, 'Google_Service_ContainerAnalysis_BuildProvenance');
