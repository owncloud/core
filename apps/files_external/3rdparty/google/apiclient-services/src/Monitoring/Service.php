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

namespace Google\Service\Monitoring;

class Service extends \Google\Model
{
  protected $appEngineType = AppEngine::class;
  protected $appEngineDataType = '';
  protected $basicServiceType = BasicService::class;
  protected $basicServiceDataType = '';
  protected $cloudEndpointsType = CloudEndpoints::class;
  protected $cloudEndpointsDataType = '';
  protected $cloudRunType = CloudRun::class;
  protected $cloudRunDataType = '';
  protected $clusterIstioType = ClusterIstio::class;
  protected $clusterIstioDataType = '';
  protected $customType = Custom::class;
  protected $customDataType = '';
  /**
   * @var string
   */
  public $displayName;
  protected $gkeNamespaceType = GkeNamespace::class;
  protected $gkeNamespaceDataType = '';
  protected $gkeServiceType = GkeService::class;
  protected $gkeServiceDataType = '';
  protected $gkeWorkloadType = GkeWorkload::class;
  protected $gkeWorkloadDataType = '';
  protected $istioCanonicalServiceType = IstioCanonicalService::class;
  protected $istioCanonicalServiceDataType = '';
  protected $meshIstioType = MeshIstio::class;
  protected $meshIstioDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $telemetryType = Telemetry::class;
  protected $telemetryDataType = '';
  /**
   * @var string[]
   */
  public $userLabels;

  /**
   * @param AppEngine
   */
  public function setAppEngine(AppEngine $appEngine)
  {
    $this->appEngine = $appEngine;
  }
  /**
   * @return AppEngine
   */
  public function getAppEngine()
  {
    return $this->appEngine;
  }
  /**
   * @param BasicService
   */
  public function setBasicService(BasicService $basicService)
  {
    $this->basicService = $basicService;
  }
  /**
   * @return BasicService
   */
  public function getBasicService()
  {
    return $this->basicService;
  }
  /**
   * @param CloudEndpoints
   */
  public function setCloudEndpoints(CloudEndpoints $cloudEndpoints)
  {
    $this->cloudEndpoints = $cloudEndpoints;
  }
  /**
   * @return CloudEndpoints
   */
  public function getCloudEndpoints()
  {
    return $this->cloudEndpoints;
  }
  /**
   * @param CloudRun
   */
  public function setCloudRun(CloudRun $cloudRun)
  {
    $this->cloudRun = $cloudRun;
  }
  /**
   * @return CloudRun
   */
  public function getCloudRun()
  {
    return $this->cloudRun;
  }
  /**
   * @param ClusterIstio
   */
  public function setClusterIstio(ClusterIstio $clusterIstio)
  {
    $this->clusterIstio = $clusterIstio;
  }
  /**
   * @return ClusterIstio
   */
  public function getClusterIstio()
  {
    return $this->clusterIstio;
  }
  /**
   * @param Custom
   */
  public function setCustom(Custom $custom)
  {
    $this->custom = $custom;
  }
  /**
   * @return Custom
   */
  public function getCustom()
  {
    return $this->custom;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param GkeNamespace
   */
  public function setGkeNamespace(GkeNamespace $gkeNamespace)
  {
    $this->gkeNamespace = $gkeNamespace;
  }
  /**
   * @return GkeNamespace
   */
  public function getGkeNamespace()
  {
    return $this->gkeNamespace;
  }
  /**
   * @param GkeService
   */
  public function setGkeService(GkeService $gkeService)
  {
    $this->gkeService = $gkeService;
  }
  /**
   * @return GkeService
   */
  public function getGkeService()
  {
    return $this->gkeService;
  }
  /**
   * @param GkeWorkload
   */
  public function setGkeWorkload(GkeWorkload $gkeWorkload)
  {
    $this->gkeWorkload = $gkeWorkload;
  }
  /**
   * @return GkeWorkload
   */
  public function getGkeWorkload()
  {
    return $this->gkeWorkload;
  }
  /**
   * @param IstioCanonicalService
   */
  public function setIstioCanonicalService(IstioCanonicalService $istioCanonicalService)
  {
    $this->istioCanonicalService = $istioCanonicalService;
  }
  /**
   * @return IstioCanonicalService
   */
  public function getIstioCanonicalService()
  {
    return $this->istioCanonicalService;
  }
  /**
   * @param MeshIstio
   */
  public function setMeshIstio(MeshIstio $meshIstio)
  {
    $this->meshIstio = $meshIstio;
  }
  /**
   * @return MeshIstio
   */
  public function getMeshIstio()
  {
    return $this->meshIstio;
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
   * @param Telemetry
   */
  public function setTelemetry(Telemetry $telemetry)
  {
    $this->telemetry = $telemetry;
  }
  /**
   * @return Telemetry
   */
  public function getTelemetry()
  {
    return $this->telemetry;
  }
  /**
   * @param string[]
   */
  public function setUserLabels($userLabels)
  {
    $this->userLabels = $userLabels;
  }
  /**
   * @return string[]
   */
  public function getUserLabels()
  {
    return $this->userLabels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Service::class, 'Google_Service_Monitoring_Service');
