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

namespace Google\Service\RemoteBuildExecution;

class GoogleDevtoolsRemotebuildbotCommandEvents extends \Google\Model
{
  public $cmUsage;
  public $dockerCacheHit;
  public $dockerImageName;
  public $inputCacheMiss;
  public $numErrors;
  public $numWarnings;
  public $outputLocation;
  public $usedAsyncContainer;

  public function setCmUsage($cmUsage)
  {
    $this->cmUsage = $cmUsage;
  }
  public function getCmUsage()
  {
    return $this->cmUsage;
  }
  public function setDockerCacheHit($dockerCacheHit)
  {
    $this->dockerCacheHit = $dockerCacheHit;
  }
  public function getDockerCacheHit()
  {
    return $this->dockerCacheHit;
  }
  public function setDockerImageName($dockerImageName)
  {
    $this->dockerImageName = $dockerImageName;
  }
  public function getDockerImageName()
  {
    return $this->dockerImageName;
  }
  public function setInputCacheMiss($inputCacheMiss)
  {
    $this->inputCacheMiss = $inputCacheMiss;
  }
  public function getInputCacheMiss()
  {
    return $this->inputCacheMiss;
  }
  public function setNumErrors($numErrors)
  {
    $this->numErrors = $numErrors;
  }
  public function getNumErrors()
  {
    return $this->numErrors;
  }
  public function setNumWarnings($numWarnings)
  {
    $this->numWarnings = $numWarnings;
  }
  public function getNumWarnings()
  {
    return $this->numWarnings;
  }
  public function setOutputLocation($outputLocation)
  {
    $this->outputLocation = $outputLocation;
  }
  public function getOutputLocation()
  {
    return $this->outputLocation;
  }
  public function setUsedAsyncContainer($usedAsyncContainer)
  {
    $this->usedAsyncContainer = $usedAsyncContainer;
  }
  public function getUsedAsyncContainer()
  {
    return $this->usedAsyncContainer;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDevtoolsRemotebuildbotCommandEvents::class, 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotCommandEvents');
