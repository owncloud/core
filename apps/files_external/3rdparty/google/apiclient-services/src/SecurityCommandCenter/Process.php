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

namespace Google\Service\SecurityCommandCenter;

class Process extends \Google\Collection
{
  protected $collection_key = 'libraries';
  /**
   * @var string[]
   */
  public $args;
  /**
   * @var bool
   */
  public $argumentsTruncated;
  protected $binaryType = SecuritycenterFile::class;
  protected $binaryDataType = '';
  protected $envVariablesType = EnvironmentVariable::class;
  protected $envVariablesDataType = 'array';
  /**
   * @var bool
   */
  public $envVariablesTruncated;
  protected $librariesType = SecuritycenterFile::class;
  protected $librariesDataType = 'array';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $parentPid;
  /**
   * @var string
   */
  public $pid;
  protected $scriptType = SecuritycenterFile::class;
  protected $scriptDataType = '';

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
   * @param bool
   */
  public function setArgumentsTruncated($argumentsTruncated)
  {
    $this->argumentsTruncated = $argumentsTruncated;
  }
  /**
   * @return bool
   */
  public function getArgumentsTruncated()
  {
    return $this->argumentsTruncated;
  }
  /**
   * @param SecuritycenterFile
   */
  public function setBinary(SecuritycenterFile $binary)
  {
    $this->binary = $binary;
  }
  /**
   * @return SecuritycenterFile
   */
  public function getBinary()
  {
    return $this->binary;
  }
  /**
   * @param EnvironmentVariable[]
   */
  public function setEnvVariables($envVariables)
  {
    $this->envVariables = $envVariables;
  }
  /**
   * @return EnvironmentVariable[]
   */
  public function getEnvVariables()
  {
    return $this->envVariables;
  }
  /**
   * @param bool
   */
  public function setEnvVariablesTruncated($envVariablesTruncated)
  {
    $this->envVariablesTruncated = $envVariablesTruncated;
  }
  /**
   * @return bool
   */
  public function getEnvVariablesTruncated()
  {
    return $this->envVariablesTruncated;
  }
  /**
   * @param SecuritycenterFile[]
   */
  public function setLibraries($libraries)
  {
    $this->libraries = $libraries;
  }
  /**
   * @return SecuritycenterFile[]
   */
  public function getLibraries()
  {
    return $this->libraries;
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
  public function setParentPid($parentPid)
  {
    $this->parentPid = $parentPid;
  }
  /**
   * @return string
   */
  public function getParentPid()
  {
    return $this->parentPid;
  }
  /**
   * @param string
   */
  public function setPid($pid)
  {
    $this->pid = $pid;
  }
  /**
   * @return string
   */
  public function getPid()
  {
    return $this->pid;
  }
  /**
   * @param SecuritycenterFile
   */
  public function setScript(SecuritycenterFile $script)
  {
    $this->script = $script;
  }
  /**
   * @return SecuritycenterFile
   */
  public function getScript()
  {
    return $this->script;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Process::class, 'Google_Service_SecurityCommandCenter_Process');
