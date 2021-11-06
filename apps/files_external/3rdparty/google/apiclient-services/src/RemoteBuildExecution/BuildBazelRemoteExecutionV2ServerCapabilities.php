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

class BuildBazelRemoteExecutionV2ServerCapabilities extends \Google\Model
{
  protected $cacheCapabilitiesType = BuildBazelRemoteExecutionV2CacheCapabilities::class;
  protected $cacheCapabilitiesDataType = '';
  protected $deprecatedApiVersionType = BuildBazelSemverSemVer::class;
  protected $deprecatedApiVersionDataType = '';
  protected $executionCapabilitiesType = BuildBazelRemoteExecutionV2ExecutionCapabilities::class;
  protected $executionCapabilitiesDataType = '';
  protected $highApiVersionType = BuildBazelSemverSemVer::class;
  protected $highApiVersionDataType = '';
  protected $lowApiVersionType = BuildBazelSemverSemVer::class;
  protected $lowApiVersionDataType = '';

  /**
   * @param BuildBazelRemoteExecutionV2CacheCapabilities
   */
  public function setCacheCapabilities(BuildBazelRemoteExecutionV2CacheCapabilities $cacheCapabilities)
  {
    $this->cacheCapabilities = $cacheCapabilities;
  }
  /**
   * @return BuildBazelRemoteExecutionV2CacheCapabilities
   */
  public function getCacheCapabilities()
  {
    return $this->cacheCapabilities;
  }
  /**
   * @param BuildBazelSemverSemVer
   */
  public function setDeprecatedApiVersion(BuildBazelSemverSemVer $deprecatedApiVersion)
  {
    $this->deprecatedApiVersion = $deprecatedApiVersion;
  }
  /**
   * @return BuildBazelSemverSemVer
   */
  public function getDeprecatedApiVersion()
  {
    return $this->deprecatedApiVersion;
  }
  /**
   * @param BuildBazelRemoteExecutionV2ExecutionCapabilities
   */
  public function setExecutionCapabilities(BuildBazelRemoteExecutionV2ExecutionCapabilities $executionCapabilities)
  {
    $this->executionCapabilities = $executionCapabilities;
  }
  /**
   * @return BuildBazelRemoteExecutionV2ExecutionCapabilities
   */
  public function getExecutionCapabilities()
  {
    return $this->executionCapabilities;
  }
  /**
   * @param BuildBazelSemverSemVer
   */
  public function setHighApiVersion(BuildBazelSemverSemVer $highApiVersion)
  {
    $this->highApiVersion = $highApiVersion;
  }
  /**
   * @return BuildBazelSemverSemVer
   */
  public function getHighApiVersion()
  {
    return $this->highApiVersion;
  }
  /**
   * @param BuildBazelSemverSemVer
   */
  public function setLowApiVersion(BuildBazelSemverSemVer $lowApiVersion)
  {
    $this->lowApiVersion = $lowApiVersion;
  }
  /**
   * @return BuildBazelSemverSemVer
   */
  public function getLowApiVersion()
  {
    return $this->lowApiVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuildBazelRemoteExecutionV2ServerCapabilities::class, 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ServerCapabilities');
