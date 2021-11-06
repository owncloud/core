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

class BuildBazelRemoteExecutionV2Action extends \Google\Model
{
  protected $commandDigestType = BuildBazelRemoteExecutionV2Digest::class;
  protected $commandDigestDataType = '';
  public $doNotCache;
  protected $inputRootDigestType = BuildBazelRemoteExecutionV2Digest::class;
  protected $inputRootDigestDataType = '';
  protected $platformType = BuildBazelRemoteExecutionV2Platform::class;
  protected $platformDataType = '';
  public $salt;
  public $timeout;

  /**
   * @param BuildBazelRemoteExecutionV2Digest
   */
  public function setCommandDigest(BuildBazelRemoteExecutionV2Digest $commandDigest)
  {
    $this->commandDigest = $commandDigest;
  }
  /**
   * @return BuildBazelRemoteExecutionV2Digest
   */
  public function getCommandDigest()
  {
    return $this->commandDigest;
  }
  public function setDoNotCache($doNotCache)
  {
    $this->doNotCache = $doNotCache;
  }
  public function getDoNotCache()
  {
    return $this->doNotCache;
  }
  /**
   * @param BuildBazelRemoteExecutionV2Digest
   */
  public function setInputRootDigest(BuildBazelRemoteExecutionV2Digest $inputRootDigest)
  {
    $this->inputRootDigest = $inputRootDigest;
  }
  /**
   * @return BuildBazelRemoteExecutionV2Digest
   */
  public function getInputRootDigest()
  {
    return $this->inputRootDigest;
  }
  /**
   * @param BuildBazelRemoteExecutionV2Platform
   */
  public function setPlatform(BuildBazelRemoteExecutionV2Platform $platform)
  {
    $this->platform = $platform;
  }
  /**
   * @return BuildBazelRemoteExecutionV2Platform
   */
  public function getPlatform()
  {
    return $this->platform;
  }
  public function setSalt($salt)
  {
    $this->salt = $salt;
  }
  public function getSalt()
  {
    return $this->salt;
  }
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  public function getTimeout()
  {
    return $this->timeout;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuildBazelRemoteExecutionV2Action::class, 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2Action');
