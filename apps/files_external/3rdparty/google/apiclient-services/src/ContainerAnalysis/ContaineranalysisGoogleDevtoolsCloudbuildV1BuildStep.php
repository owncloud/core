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

class ContaineranalysisGoogleDevtoolsCloudbuildV1BuildStep extends \Google\Collection
{
  protected $collection_key = 'waitFor';
  /**
   * @var int[]
   */
  public $allowExitCodes;
  /**
   * @var bool
   */
  public $allowFailure;
  /**
   * @var string[]
   */
  public $args;
  /**
   * @var string
   */
  public $dir;
  /**
   * @var string
   */
  public $entrypoint;
  /**
   * @var string[]
   */
  public $env;
  /**
   * @var int
   */
  public $exitCode;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $name;
  protected $pullTimingType = ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan::class;
  protected $pullTimingDataType = '';
  /**
   * @var string
   */
  public $script;
  /**
   * @var string[]
   */
  public $secretEnv;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $timeout;
  protected $timingType = ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan::class;
  protected $timingDataType = '';
  protected $volumesType = ContaineranalysisGoogleDevtoolsCloudbuildV1Volume::class;
  protected $volumesDataType = 'array';
  /**
   * @var string[]
   */
  public $waitFor;

  /**
   * @param int[]
   */
  public function setAllowExitCodes($allowExitCodes)
  {
    $this->allowExitCodes = $allowExitCodes;
  }
  /**
   * @return int[]
   */
  public function getAllowExitCodes()
  {
    return $this->allowExitCodes;
  }
  /**
   * @param bool
   */
  public function setAllowFailure($allowFailure)
  {
    $this->allowFailure = $allowFailure;
  }
  /**
   * @return bool
   */
  public function getAllowFailure()
  {
    return $this->allowFailure;
  }
  /**
   * @param string[]
   */
  public function setArgs($args)
  {
    $this->args = $args;
  }
  /**
   * @return string[]
   */
  public function getArgs()
  {
    return $this->args;
  }
  /**
   * @param string
   */
  public function setDir($dir)
  {
    $this->dir = $dir;
  }
  /**
   * @return string
   */
  public function getDir()
  {
    return $this->dir;
  }
  /**
   * @param string
   */
  public function setEntrypoint($entrypoint)
  {
    $this->entrypoint = $entrypoint;
  }
  /**
   * @return string
   */
  public function getEntrypoint()
  {
    return $this->entrypoint;
  }
  /**
   * @param string[]
   */
  public function setEnv($env)
  {
    $this->env = $env;
  }
  /**
   * @return string[]
   */
  public function getEnv()
  {
    return $this->env;
  }
  /**
   * @param int
   */
  public function setExitCode($exitCode)
  {
    $this->exitCode = $exitCode;
  }
  /**
   * @return int
   */
  public function getExitCode()
  {
    return $this->exitCode;
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
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan
   */
  public function setPullTiming(ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan $pullTiming)
  {
    $this->pullTiming = $pullTiming;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan
   */
  public function getPullTiming()
  {
    return $this->pullTiming;
  }
  /**
   * @param string
   */
  public function setScript($script)
  {
    $this->script = $script;
  }
  /**
   * @return string
   */
  public function getScript()
  {
    return $this->script;
  }
  /**
   * @param string[]
   */
  public function setSecretEnv($secretEnv)
  {
    $this->secretEnv = $secretEnv;
  }
  /**
   * @return string[]
   */
  public function getSecretEnv()
  {
    return $this->secretEnv;
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
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan
   */
  public function setTiming(ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan $timing)
  {
    $this->timing = $timing;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan
   */
  public function getTiming()
  {
    return $this->timing;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1Volume[]
   */
  public function setVolumes($volumes)
  {
    $this->volumes = $volumes;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1Volume[]
   */
  public function getVolumes()
  {
    return $this->volumes;
  }
  /**
   * @param string[]
   */
  public function setWaitFor($waitFor)
  {
    $this->waitFor = $waitFor;
  }
  /**
   * @return string[]
   */
  public function getWaitFor()
  {
    return $this->waitFor;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContaineranalysisGoogleDevtoolsCloudbuildV1BuildStep::class, 'Google_Service_ContainerAnalysis_ContaineranalysisGoogleDevtoolsCloudbuildV1BuildStep');
