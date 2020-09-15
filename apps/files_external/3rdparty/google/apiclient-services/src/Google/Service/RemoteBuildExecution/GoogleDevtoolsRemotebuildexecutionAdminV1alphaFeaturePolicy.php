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

class Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicy extends Google_Model
{
  protected $containerImageSourcesType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature';
  protected $containerImageSourcesDataType = '';
  protected $dockerAddCapabilitiesType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature';
  protected $dockerAddCapabilitiesDataType = '';
  protected $dockerChrootPathType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature';
  protected $dockerChrootPathDataType = '';
  protected $dockerNetworkType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature';
  protected $dockerNetworkDataType = '';
  protected $dockerPrivilegedType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature';
  protected $dockerPrivilegedDataType = '';
  protected $dockerRunAsRootType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature';
  protected $dockerRunAsRootDataType = '';
  protected $dockerRuntimeType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature';
  protected $dockerRuntimeDataType = '';
  protected $dockerSiblingContainersType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature';
  protected $dockerSiblingContainersDataType = '';
  public $linuxIsolation;

  /**
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function setContainerImageSources(Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature $containerImageSources)
  {
    $this->containerImageSources = $containerImageSources;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function getContainerImageSources()
  {
    return $this->containerImageSources;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function setDockerAddCapabilities(Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature $dockerAddCapabilities)
  {
    $this->dockerAddCapabilities = $dockerAddCapabilities;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function getDockerAddCapabilities()
  {
    return $this->dockerAddCapabilities;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function setDockerChrootPath(Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature $dockerChrootPath)
  {
    $this->dockerChrootPath = $dockerChrootPath;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function getDockerChrootPath()
  {
    return $this->dockerChrootPath;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function setDockerNetwork(Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature $dockerNetwork)
  {
    $this->dockerNetwork = $dockerNetwork;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function getDockerNetwork()
  {
    return $this->dockerNetwork;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function setDockerPrivileged(Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature $dockerPrivileged)
  {
    $this->dockerPrivileged = $dockerPrivileged;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function getDockerPrivileged()
  {
    return $this->dockerPrivileged;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function setDockerRunAsRoot(Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature $dockerRunAsRoot)
  {
    $this->dockerRunAsRoot = $dockerRunAsRoot;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function getDockerRunAsRoot()
  {
    return $this->dockerRunAsRoot;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function setDockerRuntime(Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature $dockerRuntime)
  {
    $this->dockerRuntime = $dockerRuntime;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function getDockerRuntime()
  {
    return $this->dockerRuntime;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function setDockerSiblingContainers(Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature $dockerSiblingContainers)
  {
    $this->dockerSiblingContainers = $dockerSiblingContainers;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function getDockerSiblingContainers()
  {
    return $this->dockerSiblingContainers;
  }
  public function setLinuxIsolation($linuxIsolation)
  {
    $this->linuxIsolation = $linuxIsolation;
  }
  public function getLinuxIsolation()
  {
    return $this->linuxIsolation;
  }
}
