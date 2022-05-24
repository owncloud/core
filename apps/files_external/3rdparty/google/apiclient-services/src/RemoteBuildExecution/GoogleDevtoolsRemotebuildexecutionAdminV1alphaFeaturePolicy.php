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

class GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicy extends \Google\Model
{
  protected $containerImageSourcesType = GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature::class;
  protected $containerImageSourcesDataType = '';
  protected $dockerAddCapabilitiesType = GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature::class;
  protected $dockerAddCapabilitiesDataType = '';
  protected $dockerChrootPathType = GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature::class;
  protected $dockerChrootPathDataType = '';
  protected $dockerNetworkType = GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature::class;
  protected $dockerNetworkDataType = '';
  protected $dockerPrivilegedType = GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature::class;
  protected $dockerPrivilegedDataType = '';
  protected $dockerRunAsRootType = GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature::class;
  protected $dockerRunAsRootDataType = '';
  protected $dockerRuntimeType = GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature::class;
  protected $dockerRuntimeDataType = '';
  protected $dockerSiblingContainersType = GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature::class;
  protected $dockerSiblingContainersDataType = '';
  public $linuxIsolation;

  /**
   * @param GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function setContainerImageSources(GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature $containerImageSources)
  {
    $this->containerImageSources = $containerImageSources;
  }
  /**
   * @return GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function getContainerImageSources()
  {
    return $this->containerImageSources;
  }
  /**
   * @param GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function setDockerAddCapabilities(GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature $dockerAddCapabilities)
  {
    $this->dockerAddCapabilities = $dockerAddCapabilities;
  }
  /**
   * @return GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function getDockerAddCapabilities()
  {
    return $this->dockerAddCapabilities;
  }
  /**
   * @param GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function setDockerChrootPath(GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature $dockerChrootPath)
  {
    $this->dockerChrootPath = $dockerChrootPath;
  }
  /**
   * @return GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function getDockerChrootPath()
  {
    return $this->dockerChrootPath;
  }
  /**
   * @param GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function setDockerNetwork(GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature $dockerNetwork)
  {
    $this->dockerNetwork = $dockerNetwork;
  }
  /**
   * @return GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function getDockerNetwork()
  {
    return $this->dockerNetwork;
  }
  /**
   * @param GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function setDockerPrivileged(GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature $dockerPrivileged)
  {
    $this->dockerPrivileged = $dockerPrivileged;
  }
  /**
   * @return GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function getDockerPrivileged()
  {
    return $this->dockerPrivileged;
  }
  /**
   * @param GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function setDockerRunAsRoot(GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature $dockerRunAsRoot)
  {
    $this->dockerRunAsRoot = $dockerRunAsRoot;
  }
  /**
   * @return GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function getDockerRunAsRoot()
  {
    return $this->dockerRunAsRoot;
  }
  /**
   * @param GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function setDockerRuntime(GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature $dockerRuntime)
  {
    $this->dockerRuntime = $dockerRuntime;
  }
  /**
   * @return GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function getDockerRuntime()
  {
    return $this->dockerRuntime;
  }
  /**
   * @param GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
   */
  public function setDockerSiblingContainers(GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature $dockerSiblingContainers)
  {
    $this->dockerSiblingContainers = $dockerSiblingContainers;
  }
  /**
   * @return GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicyFeature
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicy::class, 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaFeaturePolicy');
