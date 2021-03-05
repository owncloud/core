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

class Google_Service_Monitoring_Service extends Google_Model
{
  protected $appEngineType = 'Google_Service_Monitoring_AppEngine';
  protected $appEngineDataType = '';
  protected $cloudEndpointsType = 'Google_Service_Monitoring_CloudEndpoints';
  protected $cloudEndpointsDataType = '';
  protected $clusterIstioType = 'Google_Service_Monitoring_ClusterIstio';
  protected $clusterIstioDataType = '';
  protected $customType = 'Google_Service_Monitoring_Custom';
  protected $customDataType = '';
  public $displayName;
  protected $istioCanonicalServiceType = 'Google_Service_Monitoring_IstioCanonicalService';
  protected $istioCanonicalServiceDataType = '';
  protected $meshIstioType = 'Google_Service_Monitoring_MeshIstio';
  protected $meshIstioDataType = '';
  public $name;
  protected $telemetryType = 'Google_Service_Monitoring_Telemetry';
  protected $telemetryDataType = '';

  /**
   * @param Google_Service_Monitoring_AppEngine
   */
  public function setAppEngine(Google_Service_Monitoring_AppEngine $appEngine)
  {
    $this->appEngine = $appEngine;
  }
  /**
   * @return Google_Service_Monitoring_AppEngine
   */
  public function getAppEngine()
  {
    return $this->appEngine;
  }
  /**
   * @param Google_Service_Monitoring_CloudEndpoints
   */
  public function setCloudEndpoints(Google_Service_Monitoring_CloudEndpoints $cloudEndpoints)
  {
    $this->cloudEndpoints = $cloudEndpoints;
  }
  /**
   * @return Google_Service_Monitoring_CloudEndpoints
   */
  public function getCloudEndpoints()
  {
    return $this->cloudEndpoints;
  }
  /**
   * @param Google_Service_Monitoring_ClusterIstio
   */
  public function setClusterIstio(Google_Service_Monitoring_ClusterIstio $clusterIstio)
  {
    $this->clusterIstio = $clusterIstio;
  }
  /**
   * @return Google_Service_Monitoring_ClusterIstio
   */
  public function getClusterIstio()
  {
    return $this->clusterIstio;
  }
  /**
   * @param Google_Service_Monitoring_Custom
   */
  public function setCustom(Google_Service_Monitoring_Custom $custom)
  {
    $this->custom = $custom;
  }
  /**
   * @return Google_Service_Monitoring_Custom
   */
  public function getCustom()
  {
    return $this->custom;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_Monitoring_IstioCanonicalService
   */
  public function setIstioCanonicalService(Google_Service_Monitoring_IstioCanonicalService $istioCanonicalService)
  {
    $this->istioCanonicalService = $istioCanonicalService;
  }
  /**
   * @return Google_Service_Monitoring_IstioCanonicalService
   */
  public function getIstioCanonicalService()
  {
    return $this->istioCanonicalService;
  }
  /**
   * @param Google_Service_Monitoring_MeshIstio
   */
  public function setMeshIstio(Google_Service_Monitoring_MeshIstio $meshIstio)
  {
    $this->meshIstio = $meshIstio;
  }
  /**
   * @return Google_Service_Monitoring_MeshIstio
   */
  public function getMeshIstio()
  {
    return $this->meshIstio;
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
   * @param Google_Service_Monitoring_Telemetry
   */
  public function setTelemetry(Google_Service_Monitoring_Telemetry $telemetry)
  {
    $this->telemetry = $telemetry;
  }
  /**
   * @return Google_Service_Monitoring_Telemetry
   */
  public function getTelemetry()
  {
    return $this->telemetry;
  }
}
