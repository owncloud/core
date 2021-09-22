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

namespace Google\Service\Container;

class Cluster extends \Google\Collection
{
  protected $collection_key = 'nodePools';
  protected $addonsConfigType = AddonsConfig::class;
  protected $addonsConfigDataType = '';
  protected $authenticatorGroupsConfigType = AuthenticatorGroupsConfig::class;
  protected $authenticatorGroupsConfigDataType = '';
  protected $autopilotType = Autopilot::class;
  protected $autopilotDataType = '';
  protected $autoscalingType = ClusterAutoscaling::class;
  protected $autoscalingDataType = '';
  protected $binaryAuthorizationType = BinaryAuthorization::class;
  protected $binaryAuthorizationDataType = '';
  public $clusterIpv4Cidr;
  protected $conditionsType = StatusCondition::class;
  protected $conditionsDataType = 'array';
  protected $confidentialNodesType = ConfidentialNodes::class;
  protected $confidentialNodesDataType = '';
  public $createTime;
  public $currentMasterVersion;
  public $currentNodeCount;
  public $currentNodeVersion;
  protected $databaseEncryptionType = DatabaseEncryption::class;
  protected $databaseEncryptionDataType = '';
  protected $defaultMaxPodsConstraintType = MaxPodsConstraint::class;
  protected $defaultMaxPodsConstraintDataType = '';
  public $description;
  public $enableKubernetesAlpha;
  public $enableTpu;
  public $endpoint;
  public $expireTime;
  public $id;
  public $initialClusterVersion;
  public $initialNodeCount;
  public $instanceGroupUrls;
  protected $ipAllocationPolicyType = IPAllocationPolicy::class;
  protected $ipAllocationPolicyDataType = '';
  public $labelFingerprint;
  protected $legacyAbacType = LegacyAbac::class;
  protected $legacyAbacDataType = '';
  public $location;
  public $locations;
  protected $loggingConfigType = LoggingConfig::class;
  protected $loggingConfigDataType = '';
  public $loggingService;
  protected $maintenancePolicyType = MaintenancePolicy::class;
  protected $maintenancePolicyDataType = '';
  protected $masterAuthType = MasterAuth::class;
  protected $masterAuthDataType = '';
  protected $masterAuthorizedNetworksConfigType = MasterAuthorizedNetworksConfig::class;
  protected $masterAuthorizedNetworksConfigDataType = '';
  protected $monitoringConfigType = MonitoringConfig::class;
  protected $monitoringConfigDataType = '';
  public $monitoringService;
  public $name;
  public $network;
  protected $networkConfigType = NetworkConfig::class;
  protected $networkConfigDataType = '';
  protected $networkPolicyType = NetworkPolicy::class;
  protected $networkPolicyDataType = '';
  protected $nodeConfigType = NodeConfig::class;
  protected $nodeConfigDataType = '';
  public $nodeIpv4CidrSize;
  protected $nodePoolsType = NodePool::class;
  protected $nodePoolsDataType = 'array';
  protected $notificationConfigType = NotificationConfig::class;
  protected $notificationConfigDataType = '';
  protected $privateClusterConfigType = PrivateClusterConfig::class;
  protected $privateClusterConfigDataType = '';
  protected $releaseChannelType = ReleaseChannel::class;
  protected $releaseChannelDataType = '';
  public $resourceLabels;
  protected $resourceUsageExportConfigType = ResourceUsageExportConfig::class;
  protected $resourceUsageExportConfigDataType = '';
  public $selfLink;
  public $servicesIpv4Cidr;
  protected $shieldedNodesType = ShieldedNodes::class;
  protected $shieldedNodesDataType = '';
  public $status;
  public $statusMessage;
  public $subnetwork;
  public $tpuIpv4CidrBlock;
  protected $verticalPodAutoscalingType = VerticalPodAutoscaling::class;
  protected $verticalPodAutoscalingDataType = '';
  protected $workloadIdentityConfigType = WorkloadIdentityConfig::class;
  protected $workloadIdentityConfigDataType = '';
  public $zone;

  /**
   * @param AddonsConfig
   */
  public function setAddonsConfig(AddonsConfig $addonsConfig)
  {
    $this->addonsConfig = $addonsConfig;
  }
  /**
   * @return AddonsConfig
   */
  public function getAddonsConfig()
  {
    return $this->addonsConfig;
  }
  /**
   * @param AuthenticatorGroupsConfig
   */
  public function setAuthenticatorGroupsConfig(AuthenticatorGroupsConfig $authenticatorGroupsConfig)
  {
    $this->authenticatorGroupsConfig = $authenticatorGroupsConfig;
  }
  /**
   * @return AuthenticatorGroupsConfig
   */
  public function getAuthenticatorGroupsConfig()
  {
    return $this->authenticatorGroupsConfig;
  }
  /**
   * @param Autopilot
   */
  public function setAutopilot(Autopilot $autopilot)
  {
    $this->autopilot = $autopilot;
  }
  /**
   * @return Autopilot
   */
  public function getAutopilot()
  {
    return $this->autopilot;
  }
  /**
   * @param ClusterAutoscaling
   */
  public function setAutoscaling(ClusterAutoscaling $autoscaling)
  {
    $this->autoscaling = $autoscaling;
  }
  /**
   * @return ClusterAutoscaling
   */
  public function getAutoscaling()
  {
    return $this->autoscaling;
  }
  /**
   * @param BinaryAuthorization
   */
  public function setBinaryAuthorization(BinaryAuthorization $binaryAuthorization)
  {
    $this->binaryAuthorization = $binaryAuthorization;
  }
  /**
   * @return BinaryAuthorization
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
   * @param StatusCondition[]
   */
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  /**
   * @return StatusCondition[]
   */
  public function getConditions()
  {
    return $this->conditions;
  }
  /**
   * @param ConfidentialNodes
   */
  public function setConfidentialNodes(ConfidentialNodes $confidentialNodes)
  {
    $this->confidentialNodes = $confidentialNodes;
  }
  /**
   * @return ConfidentialNodes
   */
  public function getConfidentialNodes()
  {
    return $this->confidentialNodes;
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
   * @param DatabaseEncryption
   */
  public function setDatabaseEncryption(DatabaseEncryption $databaseEncryption)
  {
    $this->databaseEncryption = $databaseEncryption;
  }
  /**
   * @return DatabaseEncryption
   */
  public function getDatabaseEncryption()
  {
    return $this->databaseEncryption;
  }
  /**
   * @param MaxPodsConstraint
   */
  public function setDefaultMaxPodsConstraint(MaxPodsConstraint $defaultMaxPodsConstraint)
  {
    $this->defaultMaxPodsConstraint = $defaultMaxPodsConstraint;
  }
  /**
   * @return MaxPodsConstraint
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
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
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
   * @param IPAllocationPolicy
   */
  public function setIpAllocationPolicy(IPAllocationPolicy $ipAllocationPolicy)
  {
    $this->ipAllocationPolicy = $ipAllocationPolicy;
  }
  /**
   * @return IPAllocationPolicy
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
   * @param LegacyAbac
   */
  public function setLegacyAbac(LegacyAbac $legacyAbac)
  {
    $this->legacyAbac = $legacyAbac;
  }
  /**
   * @return LegacyAbac
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
  /**
   * @param LoggingConfig
   */
  public function setLoggingConfig(LoggingConfig $loggingConfig)
  {
    $this->loggingConfig = $loggingConfig;
  }
  /**
   * @return LoggingConfig
   */
  public function getLoggingConfig()
  {
    return $this->loggingConfig;
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
   * @param MaintenancePolicy
   */
  public function setMaintenancePolicy(MaintenancePolicy $maintenancePolicy)
  {
    $this->maintenancePolicy = $maintenancePolicy;
  }
  /**
   * @return MaintenancePolicy
   */
  public function getMaintenancePolicy()
  {
    return $this->maintenancePolicy;
  }
  /**
   * @param MasterAuth
   */
  public function setMasterAuth(MasterAuth $masterAuth)
  {
    $this->masterAuth = $masterAuth;
  }
  /**
   * @return MasterAuth
   */
  public function getMasterAuth()
  {
    return $this->masterAuth;
  }
  /**
   * @param MasterAuthorizedNetworksConfig
   */
  public function setMasterAuthorizedNetworksConfig(MasterAuthorizedNetworksConfig $masterAuthorizedNetworksConfig)
  {
    $this->masterAuthorizedNetworksConfig = $masterAuthorizedNetworksConfig;
  }
  /**
   * @return MasterAuthorizedNetworksConfig
   */
  public function getMasterAuthorizedNetworksConfig()
  {
    return $this->masterAuthorizedNetworksConfig;
  }
  /**
   * @param MonitoringConfig
   */
  public function setMonitoringConfig(MonitoringConfig $monitoringConfig)
  {
    $this->monitoringConfig = $monitoringConfig;
  }
  /**
   * @return MonitoringConfig
   */
  public function getMonitoringConfig()
  {
    return $this->monitoringConfig;
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
   * @param NetworkConfig
   */
  public function setNetworkConfig(NetworkConfig $networkConfig)
  {
    $this->networkConfig = $networkConfig;
  }
  /**
   * @return NetworkConfig
   */
  public function getNetworkConfig()
  {
    return $this->networkConfig;
  }
  /**
   * @param NetworkPolicy
   */
  public function setNetworkPolicy(NetworkPolicy $networkPolicy)
  {
    $this->networkPolicy = $networkPolicy;
  }
  /**
   * @return NetworkPolicy
   */
  public function getNetworkPolicy()
  {
    return $this->networkPolicy;
  }
  /**
   * @param NodeConfig
   */
  public function setNodeConfig(NodeConfig $nodeConfig)
  {
    $this->nodeConfig = $nodeConfig;
  }
  /**
   * @return NodeConfig
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
   * @param NodePool[]
   */
  public function setNodePools($nodePools)
  {
    $this->nodePools = $nodePools;
  }
  /**
   * @return NodePool[]
   */
  public function getNodePools()
  {
    return $this->nodePools;
  }
  /**
   * @param NotificationConfig
   */
  public function setNotificationConfig(NotificationConfig $notificationConfig)
  {
    $this->notificationConfig = $notificationConfig;
  }
  /**
   * @return NotificationConfig
   */
  public function getNotificationConfig()
  {
    return $this->notificationConfig;
  }
  /**
   * @param PrivateClusterConfig
   */
  public function setPrivateClusterConfig(PrivateClusterConfig $privateClusterConfig)
  {
    $this->privateClusterConfig = $privateClusterConfig;
  }
  /**
   * @return PrivateClusterConfig
   */
  public function getPrivateClusterConfig()
  {
    return $this->privateClusterConfig;
  }
  /**
   * @param ReleaseChannel
   */
  public function setReleaseChannel(ReleaseChannel $releaseChannel)
  {
    $this->releaseChannel = $releaseChannel;
  }
  /**
   * @return ReleaseChannel
   */
  public function getReleaseChannel()
  {
    return $this->releaseChannel;
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
   * @param ResourceUsageExportConfig
   */
  public function setResourceUsageExportConfig(ResourceUsageExportConfig $resourceUsageExportConfig)
  {
    $this->resourceUsageExportConfig = $resourceUsageExportConfig;
  }
  /**
   * @return ResourceUsageExportConfig
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
   * @param ShieldedNodes
   */
  public function setShieldedNodes(ShieldedNodes $shieldedNodes)
  {
    $this->shieldedNodes = $shieldedNodes;
  }
  /**
   * @return ShieldedNodes
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
   * @param VerticalPodAutoscaling
   */
  public function setVerticalPodAutoscaling(VerticalPodAutoscaling $verticalPodAutoscaling)
  {
    $this->verticalPodAutoscaling = $verticalPodAutoscaling;
  }
  /**
   * @return VerticalPodAutoscaling
   */
  public function getVerticalPodAutoscaling()
  {
    return $this->verticalPodAutoscaling;
  }
  /**
   * @param WorkloadIdentityConfig
   */
  public function setWorkloadIdentityConfig(WorkloadIdentityConfig $workloadIdentityConfig)
  {
    $this->workloadIdentityConfig = $workloadIdentityConfig;
  }
  /**
   * @return WorkloadIdentityConfig
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Cluster::class, 'Google_Service_Container_Cluster');
