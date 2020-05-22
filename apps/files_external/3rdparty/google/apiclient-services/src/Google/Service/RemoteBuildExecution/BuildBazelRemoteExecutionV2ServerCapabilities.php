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

class Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ServerCapabilities extends Google_Model
{
  protected $cacheCapabilitiesType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2CacheCapabilities';
  protected $cacheCapabilitiesDataType = '';
  protected $deprecatedApiVersionType = 'Google_Service_RemoteBuildExecution_BuildBazelSemverSemVer';
  protected $deprecatedApiVersionDataType = '';
  protected $executionCapabilitiesType = 'Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecutionCapabilities';
  protected $executionCapabilitiesDataType = '';
  protected $highApiVersionType = 'Google_Service_RemoteBuildExecution_BuildBazelSemverSemVer';
  protected $highApiVersionDataType = '';
  protected $lowApiVersionType = 'Google_Service_RemoteBuildExecution_BuildBazelSemverSemVer';
  protected $lowApiVersionDataType = '';

  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2CacheCapabilities
   */
  public function setCacheCapabilities(Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2CacheCapabilities $cacheCapabilities)
  {
    $this->cacheCapabilities = $cacheCapabilities;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2CacheCapabilities
   */
  public function getCacheCapabilities()
  {
    return $this->cacheCapabilities;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelSemverSemVer
   */
  public function setDeprecatedApiVersion(Google_Service_RemoteBuildExecution_BuildBazelSemverSemVer $deprecatedApiVersion)
  {
    $this->deprecatedApiVersion = $deprecatedApiVersion;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelSemverSemVer
   */
  public function getDeprecatedApiVersion()
  {
    return $this->deprecatedApiVersion;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecutionCapabilities
   */
  public function setExecutionCapabilities(Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecutionCapabilities $executionCapabilities)
  {
    $this->executionCapabilities = $executionCapabilities;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ExecutionCapabilities
   */
  public function getExecutionCapabilities()
  {
    return $this->executionCapabilities;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelSemverSemVer
   */
  public function setHighApiVersion(Google_Service_RemoteBuildExecution_BuildBazelSemverSemVer $highApiVersion)
  {
    $this->highApiVersion = $highApiVersion;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelSemverSemVer
   */
  public function getHighApiVersion()
  {
    return $this->highApiVersion;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_BuildBazelSemverSemVer
   */
  public function setLowApiVersion(Google_Service_RemoteBuildExecution_BuildBazelSemverSemVer $lowApiVersion)
  {
    $this->lowApiVersion = $lowApiVersion;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_BuildBazelSemverSemVer
   */
  public function getLowApiVersion()
  {
    return $this->lowApiVersion;
  }
}
