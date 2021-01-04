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

class Google_Service_ServiceUsage_GoogleApiServiceusageV1ServiceConfig extends Google_Collection
{
  protected $collection_key = 'monitoredResources';
  protected $apisType = 'Google_Service_ServiceUsage_Api';
  protected $apisDataType = 'array';
  protected $authenticationType = 'Google_Service_ServiceUsage_Authentication';
  protected $authenticationDataType = '';
  protected $documentationType = 'Google_Service_ServiceUsage_Documentation';
  protected $documentationDataType = '';
  protected $endpointsType = 'Google_Service_ServiceUsage_Endpoint';
  protected $endpointsDataType = 'array';
  protected $monitoredResourcesType = 'Google_Service_ServiceUsage_MonitoredResourceDescriptor';
  protected $monitoredResourcesDataType = 'array';
  protected $monitoringType = 'Google_Service_ServiceUsage_Monitoring';
  protected $monitoringDataType = '';
  public $name;
  protected $quotaType = 'Google_Service_ServiceUsage_Quota';
  protected $quotaDataType = '';
  public $title;
  protected $usageType = 'Google_Service_ServiceUsage_Usage';
  protected $usageDataType = '';

  /**
   * @param Google_Service_ServiceUsage_Api[]
   */
  public function setApis($apis)
  {
    $this->apis = $apis;
  }
  /**
   * @return Google_Service_ServiceUsage_Api[]
   */
  public function getApis()
  {
    return $this->apis;
  }
  /**
   * @param Google_Service_ServiceUsage_Authentication
   */
  public function setAuthentication(Google_Service_ServiceUsage_Authentication $authentication)
  {
    $this->authentication = $authentication;
  }
  /**
   * @return Google_Service_ServiceUsage_Authentication
   */
  public function getAuthentication()
  {
    return $this->authentication;
  }
  /**
   * @param Google_Service_ServiceUsage_Documentation
   */
  public function setDocumentation(Google_Service_ServiceUsage_Documentation $documentation)
  {
    $this->documentation = $documentation;
  }
  /**
   * @return Google_Service_ServiceUsage_Documentation
   */
  public function getDocumentation()
  {
    return $this->documentation;
  }
  /**
   * @param Google_Service_ServiceUsage_Endpoint[]
   */
  public function setEndpoints($endpoints)
  {
    $this->endpoints = $endpoints;
  }
  /**
   * @return Google_Service_ServiceUsage_Endpoint[]
   */
  public function getEndpoints()
  {
    return $this->endpoints;
  }
  /**
   * @param Google_Service_ServiceUsage_MonitoredResourceDescriptor[]
   */
  public function setMonitoredResources($monitoredResources)
  {
    $this->monitoredResources = $monitoredResources;
  }
  /**
   * @return Google_Service_ServiceUsage_MonitoredResourceDescriptor[]
   */
  public function getMonitoredResources()
  {
    return $this->monitoredResources;
  }
  /**
   * @param Google_Service_ServiceUsage_Monitoring
   */
  public function setMonitoring(Google_Service_ServiceUsage_Monitoring $monitoring)
  {
    $this->monitoring = $monitoring;
  }
  /**
   * @return Google_Service_ServiceUsage_Monitoring
   */
  public function getMonitoring()
  {
    return $this->monitoring;
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
   * @param Google_Service_ServiceUsage_Quota
   */
  public function setQuota(Google_Service_ServiceUsage_Quota $quota)
  {
    $this->quota = $quota;
  }
  /**
   * @return Google_Service_ServiceUsage_Quota
   */
  public function getQuota()
  {
    return $this->quota;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param Google_Service_ServiceUsage_Usage
   */
  public function setUsage(Google_Service_ServiceUsage_Usage $usage)
  {
    $this->usage = $usage;
  }
  /**
   * @return Google_Service_ServiceUsage_Usage
   */
  public function getUsage()
  {
    return $this->usage;
  }
}
