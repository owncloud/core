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

class Google_Service_Container_Cluster extends Google_Collection
{
  protected $collection_key = 'nodePools';
  protected $addonsConfigType = 'Google_Service_Container_AddonsConfig';
  protected $addonsConfigDataType = '';
  protected $authenticatorGroupsConfigType = 'Google_Service_Container_AuthenticatorGroupsConfig';
  protected $authenticatorGroupsConfigDataType = '';
  protected $autoscalingType = 'Google_Service_Container_ClusterAutoscaling';
  protected $autoscalingDataType = '';
  protected $binaryAuthorizationType = 'Google_Service_Container_BinaryAuthorization';
  protected $binaryAuthorizationDataType = '';
  public $clusterIpv4Cidr;
  protected $conditionsType = 'Google_Service_Container_StatusCondition';
  protected $conditionsDataType = 'array';
  public $createTime;
  public $currentMasterVersion;
  public $currentNodeCount;
  public $currentNodeVersion;
  protected $databaseEncryptionType = 'Google_Service_Container_DatabaseEncryption';
  protected $databaseEncryptionDataType = '';
  protected $defaultMaxPodsConstraintType = 'Google_Service_Container_MaxPodsConstraint';
  protected $defaultMaxPodsConstraintDataType = '';
  public $description;
  public $enableKubernetesAlpha;
  public $enableTpu;
  public $endpoint;
  public $expireTime;
  public $initialClusterVersion;
  public $initialNodeCount;
  public $instanceGroupUrls;
  protected $ipAllocationPolicyType = 'Google_Service_Container_IPAllocationPolicy';
  protected $ipAllocationPolicyDataType = '';
  public $labelFingerprint;
  protected $legacyAbacType = 'Google_Service_Container_LegacyAbac';
  protected $legacyAbacDataType = '';
  public $location;
  public $locations;
  public $loggingService;
  protected $maintenancePolicyType = 'Google_Service_Container_MaintenancePolicy';
  protected $maintenancePolicyDataType = '';
  protected $masterAuthType = 'Google_Service_Container_MasterAuth';
  protected $masterAuthDataType = '';
  protected $masterAuthorizedNetworksConfigType = 'Google_Service_Container_MasterAuthorizedNetworksConfig';
  protected $masterAuthorizedNetworksConfigDataType = '';
  public $monitoringService;
  public $name;
  public $network;
  protected $networkConfigType = 'Google_Service_Container_NetworkConfig';
  protected $networkConfigDataType = '';
  protected $networkPolicyType = 'Google_Service_Container_NetworkPolicy';
  protected $networkPolicyDataType = '';
  protected $nodeConfigType = 'Google_Service_Container_NodeConfig';
  protected $nodeConfigDataType = '';
  public $nodeIpv4CidrSize;
  protected $nodePoolsType = 'Google_Service_Container_NodePool';
  protected $nodePoolsDataType = 'array';
  protected $privateClusterConfigType = 'Google_Service_Container_PrivateClusterConfig';
  protected $privateClusterConfigDataType = '';
  public $resourceLabels;
  protected $resourceUsageExportConfigType = 'Google_Service_Container_ResourceUsageExportConfig';
  protected $resourceUsageExportConfigDataType = '';
  public $selfLink;
  public $servicesIpv4Cidr;
  protected $shieldedNodesType = 'Google_Service_Container_ShieldedNodes';
  protected $shieldedNodesDataType = '';
  public $status;
  public $statusMessage;
  public $subnetwork;
  public $tpuIpv4CidrBlock;
  protected $verticalPodAutoscalingType = 'Google_Service_Container_VerticalPodAutoscaling';
  protected $verticalPodAutoscalingDataType = '';
  protected $workloadIdentityConfigType = 'Google_Service_Container_WorkloadIdentityConfig';
  protected $workloadIdentityConfigDataType = '';
  public $zone;

  /**
   * @param Google_Service_Container_AddonsConfig
   */
  public function setAddonsConfig(Google_Service_Container_AddonsConfig $addonsConfig)
  {
    $this->addonsConfig = $addonsConfig;
  }
  /**
   * @return Google_Service_Container_AddonsConfig
   */
  public function getAddonsConfig()
  {
    return $this->addonsConfig;
  }
  /**
   * @param Google_Service_Container_AuthenticatorGroupsConfig
   */
  public function setAuthenticatorGroupsConfig(Google_Service_Container_AuthenticatorGroupsConfig $authenticatorGroupsConfig)
  {
    $this->authenticatorGroupsConfig = $authenticatorGroupsConfig;
  }
  /**
   * @return Google_Service_Container_AuthenticatorGroupsConfig
   */
  public function getAuthenticatorGroupsConfig()
  {
    return $this->authenticatorGroupsConfig;
  }
  /**
   * @param Google_Service_Container_ClusterAutoscaling
   */
  public function setAutoscaling(Google_Service_Container_ClusterAutoscaling $autoscaling)
  {
    $this->autoscaling = $autoscaling;
  }
  /**
   * @return Google_Service_Container_ClusterAutoscaling
   */
  public function getAutoscaling()
  {
    return $this->autoscaling;
  }
  /**
   * @param Google_Service_Container_BinaryAuthorization
   */
  public function setBinaryAuthorization(Google_Service_Container_BinaryAuthorization $binaryAuthorization)
  {
    $this->binaryAuthorization = $binaryAuthorization;
  }
  /**
   * @return Google_Service_Container_BinaryAuthorization
   */
  public function getBinaryAuthorization()
  {
    return $this->binaryAuthorization;
  }
  public function setClusterIpv4Cidr($clusterIpv4Cidr)
  {
    $this->clusterIpv4Cidr = $clusterIpv4Cidr;
  }
  public function getClusterIpv4Cidr()
  {
    return $this->clusterIpv4Cidr;
  }
  /**
   * @param Google_Service_Container_StatusCondition
   */
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  /**
   * @return Google_Service_Container_StatusCondition
   */
  public function getConditions()
  {
    return $this->conditions;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCurrentMasterVersion($currentMasterVersion)
  {
    $this->currentMasterVersion = $currentMasterVersion;
  }
  public function getCurrentMasterVersion()
  {
    return $this->currentMasterVersion;
  }
  public function setCurrentNodeCount($currentNodeCount)
  {
    $this->currentNodeCount = $currentNodeCount;
  }
  public function getCurrentNodeCount()
  {
    return $this->currentNodeCount;
  }
  public function setCurrentNodeVersion($currentNodeVersion)
  {
    $this->currentNodeVersion = $currentNodeVersion;
  }
  public function getCurrentNodeVersion()
  {
    return $this->currentNodeVersion;
  }
  /**
   * @param Google_Service_Container_DatabaseEncryption
   */
  public function setDatabaseEncryption(Google_Service_Container_DatabaseEncryption $databaseEncryption)
  {
    $this->databaseEncryption = $databaseEncryption;
  }
  /**
   * @return Google_Service_Container_DatabaseEncryption
   */
  public function getDatabaseEncryption()
  {
    return $this->databaseEncryption;
  }
  /**
   * @param Google_Service_Container_MaxPodsConstraint
   */
  public function setDefaultMaxPodsConstraint(Google_Service_Container_MaxPodsConstraint $defaultMaxPodsConstraint)
  {
    $this->defaultMaxPodsConstraint = $defaultMaxPodsConstraint;
  }
  /**
   * @return Google_Service_Container_MaxPodsConstraint
   */
  public function getDefaultMaxPodsConstraint()
  {
    return $this->defaultMaxPodsConstraint;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEnableKubernetesAlpha($enableKubernetesAlpha)
  {
    $this->enableKubernetesAlpha = $enableKubernetesAlpha;
  }
  public function getEnableKubernetesAlpha()
  {
    return $this->enableKubernetesAlpha;
  }
  public function setEnableTpu($enableTpu)
  {
    $this->enableTpu = $enableTpu;
  }
  public function getEnableTpu()
  {
    return $this->enableTpu;
  }
  public function setEndpoint($endpoint)
  {
    $this->endpoint = $endpoint;
  }
  public function getEndpoint()
  {
    return $this->endpoint;
  }
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  public function setInitialClusterVersion($initialClusterVersion)
  {
    $this->initialClusterVersion = $initialClusterVersion;
  }
  public function getInitialClusterVersion()
  {
    return $this->initialClusterVersion;
  }
  public function setInitialNodeCount($initialNodeCount)
  {
    $this->initialNodeCount = $initialNodeCount;
  }
  public function getInitialNodeCount()
  {
    return $this->initialNodeCount;
  }
  public function setInstanceGroupUrls($instanceGroupUrls)
  {
    $this->instanceGroupUrls = $instanceGroupUrls;
  }
  public function getInstanceGroupUrls()
  {
    return $this->instanceGroupUrls;
  }
  /**
   * @param Google_Service_Container_IPAllocationPolicy
   */
  public function setIpAllocationPolicy(Google_Service_Container_IPAllocationPolicy $ipAllocationPolicy)
  {
    $this->ipAllocationPolicy = $ipAllocationPolicy;
  }
  /**
   * @return Google_Service_Container_IPAllocationPolicy
   */
  public function getIpAllocationPolicy()
  {
    return $this->ipAllocationPolicy;
  }
  public function setLabelFingerprint($labelFingerprint)
  {
    $this->labelFingerprint = $labelFingerprint;
  }
  public function getLabelFingerprint()
  {
    return $this->labelFingerprint;
  }
  /**
   * @param Google_Service_Container_LegacyAbac
   */
  public function setLegacyAbac(Google_Service_Container_LegacyAbac $legacyAbac)
  {
    $this->legacyAbac = $legacyAbac;
  }
  /**
   * @return Google_Service_Container_LegacyAbac
   */
  public function getLegacyAbac()
  {
    return $this->legacyAbac;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setLocations($locations)
  {
    $this->locations = $locations;
  }
  public function getLocations()
  {
    return $this->locations;
  }
  public function setLoggingService($loggingService)
  {
    $this->loggingService = $loggingService;
  }
  public function getLoggingService()
  {
    return $this->loggingService;
  }
  /**
   * @param Google_Service_Container_MaintenancePolicy
   */
  public function setMaintenancePolicy(Google_Service_Container_MaintenancePolicy $maintenancePolicy)
  {
    $this->maintenancePolicy = $maintenancePolicy;
  }
  /**
   * @return Google_Service_Container_MaintenancePolicy
   */
  public function getMaintenancePolicy()
  {
    return $this->maintenancePolicy;
  }
  /**
   * @param Google_Service_Container_MasterAuth
   */
  public function setMasterAuth(Google_Service_Container_MasterAuth $masterAuth)
  {
    $this->masterAuth = $masterAuth;
  }
  /**
   * @return Google_Service_Container_MasterAuth
   */
  public function getMasterAuth()
  {
    return $this->masterAuth;
  }
  /**
   * @param Google_Service_Container_MasterAuthorizedNetworksConfig
   */
  public function setMasterAuthorizedNetworksConfig(Google_Service_Container_MasterAuthorizedNetworksConfig $masterAuthorizedNetworksConfig)
  {
    $this->masterAuthorizedNetworksConfig = $masterAuthorizedNetworksConfig;
  }
  /**
   * @return Google_Service_Container_MasterAuthorizedNetworksConfig
   */
  public function getMasterAuthorizedNetworksConfig()
  {
    return $this->masterAuthorizedNetworksConfig;
  }
  public function setMonitoringService($monitoringService)
  {
    $this->monitoringService = $monitoringService;
  }
  public function getMonitoringService()
  {
    return $this->monitoringService;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
  /**
   * @param Google_Service_Container_NetworkConfig
   */
  public function setNetworkConfig(Google_Service_Container_NetworkConfig $networkConfig)
  {
    $this->networkConfig = $networkConfig;
  }
  /**
   * @return Google_Service_Container_NetworkConfig
   */
  public function getNetworkConfig()
  {
    return $this->networkConfig;
  }
  /**
   * @param Google_Service_Container_NetworkPolicy
   */
  public function setNetworkPolicy(Google_Service_Container_NetworkPolicy $networkPolicy)
  {
    $this->networkPolicy = $networkPolicy;
  }
  /**
   * @return Google_Service_Container_NetworkPolicy
   */
  public function getNetworkPolicy()
  {
    return $this->networkPolicy;
  }
  /**
   * @param Google_Service_Container_NodeConfig
   */
  public function setNodeConfig(Google_Service_Container_NodeConfig $nodeConfig)
  {
    $this->nodeConfig = $nodeConfig;
  }
  /**
   * @return Google_Service_Container_NodeConfig
   */
  public function getNodeConfig()
  {
    return $this->nodeConfig;
  }
  public function setNodeIpv4CidrSize($nodeIpv4CidrSize)
  {
    $this->nodeIpv4CidrSize = $nodeIpv4CidrSize;
  }
  public function getNodeIpv4CidrSize()
  {
    return $this->nodeIpv4CidrSize;
  }
  /**
   * @param Google_Service_Container_NodePool
   */
  public function setNodePools($nodePools)
  {
    $this->nodePools = $nodePools;
  }
  /**
   * @return Google_Service_Container_NodePool
   */
  public function getNodePools()
  {
    return $this->nodePools;
  }
  /**
   * @param Google_Service_Container_PrivateClusterConfig
   */
  public function setPrivateClusterConfig(Google_Service_Container_PrivateClusterConfig $privateClusterConfig)
  {
    $this->privateClusterConfig = $privateClusterConfig;
  }
  /**
   * @return Google_Service_Container_PrivateClusterConfig
   */
  public function getPrivateClusterConfig()
  {
    return $this->privateClusterConfig;
  }
  public function setResourceLabels($resourceLabels)
  {
    $this->resourceLabels = $resourceLabels;
  }
  public function getResourceLabels()
  {
    return $this->resourceLabels;
  }
  /**
   * @param Google_Service_Container_ResourceUsageExportConfig
   */
  public function setResourceUsageExportConfig(Google_Service_Container_ResourceUsageExportConfig $resourceUsageExportConfig)
  {
    $this->resourceUsageExportConfig = $resourceUsageExportConfig;
  }
  /**
   * @return Google_Service_Container_ResourceUsageExportConfig
   */
  public function getResourceUsageExportConfig()
  {
    return $this->resourceUsageExportConfig;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setServicesIpv4Cidr($servicesIpv4Cidr)
  {
    $this->servicesIpv4Cidr = $servicesIpv4Cidr;
  }
  public function getServicesIpv4Cidr()
  {
    return $this->servicesIpv4Cidr;
  }
  /**
   * @param Google_Service_Container_ShieldedNodes
   */
  public function setShieldedNodes(Google_Service_Container_ShieldedNodes $shieldedNodes)
  {
    $this->shieldedNodes = $shieldedNodes;
  }
  /**
   * @return Google_Service_Container_ShieldedNodes
   */
  public function getShieldedNodes()
  {
    return $this->shieldedNodes;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatusMessage($statusMessage)
  {
    $this->statusMessage = $statusMessage;
  }
  public function getStatusMessage()
  {
    return $this->statusMessage;
  }
  public function setSubnetwork($subnetwork)
  {
    $this->subnetwork = $subnetwork;
  }
  public function getSubnetwork()
  {
    return $this->subnetwork;
  }
  public function setTpuIpv4CidrBlock($tpuIpv4CidrBlock)
  {
    $this->tpuIpv4CidrBlock = $tpuIpv4CidrBlock;
  }
  public function getTpuIpv4CidrBlock()
  {
    return $this->tpuIpv4CidrBlock;
  }
  /**
   * @param Google_Service_Container_VerticalPodAutoscaling
   */
  public function setVerticalPodAutoscaling(Google_Service_Container_VerticalPodAutoscaling $verticalPodAutoscaling)
  {
    $this->verticalPodAutoscaling = $verticalPodAutoscaling;
  }
  /**
   * @return Google_Service_Container_VerticalPodAutoscaling
   */
  public function getVerticalPodAutoscaling()
  {
    return $this->verticalPodAutoscaling;
  }
  /**
   * @param Google_Service_Container_WorkloadIdentityConfig
   */
  public function setWorkloadIdentityConfig(Google_Service_Container_WorkloadIdentityConfig $workloadIdentityConfig)
  {
    $this->workloadIdentityConfig = $workloadIdentityConfig;
  }
  /**
   * @return Google_Service_Container_WorkloadIdentityConfig
   */
  public function getWorkloadIdentityConfig()
  {
    return $this->workloadIdentityConfig;
  }
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  public function getZone()
  {
    return $this->zone;
  }
}
