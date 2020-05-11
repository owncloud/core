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

class Google_Service_CloudRun_Container extends Google_Collection
{
  protected $collection_key = 'volumeMounts';
  public $args;
  public $command;
  protected $envType = 'Google_Service_CloudRun_EnvVar';
  protected $envDataType = 'array';
  protected $envFromType = 'Google_Service_CloudRun_EnvFromSource';
  protected $envFromDataType = 'array';
  public $image;
  public $imagePullPolicy;
  protected $livenessProbeType = 'Google_Service_CloudRun_Probe';
  protected $livenessProbeDataType = '';
  public $name;
  protected $portsType = 'Google_Service_CloudRun_ContainerPort';
  protected $portsDataType = 'array';
  protected $readinessProbeType = 'Google_Service_CloudRun_Probe';
  protected $readinessProbeDataType = '';
  protected $resourcesType = 'Google_Service_CloudRun_ResourceRequirements';
  protected $resourcesDataType = '';
  protected $securityContextType = 'Google_Service_CloudRun_SecurityContext';
  protected $securityContextDataType = '';
  public $terminationMessagePath;
  public $terminationMessagePolicy;
  protected $volumeMountsType = 'Google_Service_CloudRun_VolumeMount';
  protected $volumeMountsDataType = 'array';
  public $workingDir;

  public function setArgs($args)
  {
    $this->args = $args;
  }
  public function getArgs()
  {
    return $this->args;
  }
  public function setCommand($command)
  {
    $this->command = $command;
  }
  public function getCommand()
  {
    return $this->command;
  }
  /**
   * @param Google_Service_CloudRun_EnvVar
   */
  public function setEnv($env)
  {
    $this->env = $env;
  }
  /**
   * @return Google_Service_CloudRun_EnvVar
   */
  public function getEnv()
  {
    return $this->env;
  }
  /**
   * @param Google_Service_CloudRun_EnvFromSource
   */
  public function setEnvFrom($envFrom)
  {
    $this->envFrom = $envFrom;
  }
  /**
   * @return Google_Service_CloudRun_EnvFromSource
   */
  public function getEnvFrom()
  {
    return $this->envFrom;
  }
  public function setImage($image)
  {
    $this->image = $image;
  }
  public function getImage()
  {
    return $this->image;
  }
  public function setImagePullPolicy($imagePullPolicy)
  {
    $this->imagePullPolicy = $imagePullPolicy;
  }
  public function getImagePullPolicy()
  {
    return $this->imagePullPolicy;
  }
  /**
   * @param Google_Service_CloudRun_Probe
   */
  public function setLivenessProbe(Google_Service_CloudRun_Probe $livenessProbe)
  {
    $this->livenessProbe = $livenessProbe;
  }
  /**
   * @return Google_Service_CloudRun_Probe
   */
  public function getLivenessProbe()
  {
    return $this->livenessProbe;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_CloudRun_ContainerPort
   */
  public function setPorts($ports)
  {
    $this->ports = $ports;
  }
  /**
   * @return Google_Service_CloudRun_ContainerPort
   */
  public function getPorts()
  {
    return $this->ports;
  }
  /**
   * @param Google_Service_CloudRun_Probe
   */
  public function setReadinessProbe(Google_Service_CloudRun_Probe $readinessProbe)
  {
    $this->readinessProbe = $readinessProbe;
  }
  /**
   * @return Google_Service_CloudRun_Probe
   */
  public function getReadinessProbe()
  {
    return $this->readinessProbe;
  }
  /**
   * @param Google_Service_CloudRun_ResourceRequirements
   */
  public function setResources(Google_Service_CloudRun_ResourceRequirements $resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return Google_Service_CloudRun_ResourceRequirements
   */
  public function getResources()
  {
    return $this->resources;
  }
  /**
   * @param Google_Service_CloudRun_SecurityContext
   */
  public function setSecurityContext(Google_Service_CloudRun_SecurityContext $securityContext)
  {
    $this->securityContext = $securityContext;
  }
  /**
   * @return Google_Service_CloudRun_SecurityContext
   */
  public function getSecurityContext()
  {
    return $this->securityContext;
  }
  public function setTerminationMessagePath($terminationMessagePath)
  {
    $this->terminationMessagePath = $terminationMessagePath;
  }
  public function getTerminationMessagePath()
  {
    return $this->terminationMessagePath;
  }
  public function setTerminationMessagePolicy($terminationMessagePolicy)
  {
    $this->terminationMessagePolicy = $terminationMessagePolicy;
  }
  public function getTerminationMessagePolicy()
  {
    return $this->terminationMessagePolicy;
  }
  /**
   * @param Google_Service_CloudRun_VolumeMount
   */
  public function setVolumeMounts($volumeMounts)
  {
    $this->volumeMounts = $volumeMounts;
  }
  /**
   * @return Google_Service_CloudRun_VolumeMount
   */
  public function getVolumeMounts()
  {
    return $this->volumeMounts;
  }
  public function setWorkingDir($workingDir)
  {
    $this->workingDir = $workingDir;
  }
  public function getWorkingDir()
  {
    return $this->workingDir;
  }
}
