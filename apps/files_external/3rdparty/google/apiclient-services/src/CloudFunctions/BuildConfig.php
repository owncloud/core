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

namespace Google\Service\CloudFunctions;

class BuildConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $build;
  /**
   * @var string
   */
  public $dockerRepository;
  /**
   * @var string
   */
  public $entryPoint;
  /**
   * @var string[]
   */
  public $environmentVariables;
  /**
   * @var string
   */
  public $runtime;
  protected $sourceType = Source::class;
  protected $sourceDataType = '';
  protected $sourceProvenanceType = SourceProvenance::class;
  protected $sourceProvenanceDataType = '';
  /**
   * @var string
   */
  public $workerPool;

  /**
   * @param string
   */
  public function setBuild($build)
  {
    $this->build = $build;
  }
  /**
   * @return string
   */
  public function getBuild()
  {
    return $this->build;
  }
  /**
   * @param string
   */
  public function setDockerRepository($dockerRepository)
  {
    $this->dockerRepository = $dockerRepository;
  }
  /**
   * @return string
   */
  public function getDockerRepository()
  {
    return $this->dockerRepository;
  }
  /**
   * @param string
   */
  public function setEntryPoint($entryPoint)
  {
    $this->entryPoint = $entryPoint;
  }
  /**
   * @return string
   */
  public function getEntryPoint()
  {
    return $this->entryPoint;
  }
  /**
   * @param string[]
   */
  public function setEnvironmentVariables($environmentVariables)
  {
    $this->environmentVariables = $environmentVariables;
  }
  /**
   * @return string[]
   */
  public function getEnvironmentVariables()
  {
    return $this->environmentVariables;
  }
  /**
   * @param string
   */
  public function setRuntime($runtime)
  {
    $this->runtime = $runtime;
  }
  /**
   * @return string
   */
  public function getRuntime()
  {
    return $this->runtime;
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
  /**
   * @param string
   */
  public function setWorkerPool($workerPool)
  {
    $this->workerPool = $workerPool;
  }
  /**
   * @return string
   */
  public function getWorkerPool()
  {
    return $this->workerPool;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuildConfig::class, 'Google_Service_CloudFunctions_BuildConfig');
