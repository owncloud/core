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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1EnvironmentConfig extends \Google\Collection
{
  protected $collection_key = 'targets';
  /**
   * @var string
   */
  public $arcConfigLocation;
  /**
   * @var string
   */
  public $createTime;
  protected $dataCollectorsType = GoogleCloudApigeeV1DataCollectorConfig::class;
  protected $dataCollectorsDataType = 'array';
  protected $debugMaskType = GoogleCloudApigeeV1DebugMask::class;
  protected $debugMaskDataType = '';
  protected $deploymentsType = GoogleCloudApigeeV1DeploymentConfig::class;
  protected $deploymentsDataType = 'array';
  /**
   * @var string[]
   */
  public $featureFlags;
  protected $flowhooksType = GoogleCloudApigeeV1FlowHookConfig::class;
  protected $flowhooksDataType = 'array';
  /**
   * @var string
   */
  public $forwardProxyUri;
  /**
   * @var string
   */
  public $gatewayConfigLocation;
  protected $keystoresType = GoogleCloudApigeeV1KeystoreConfig::class;
  protected $keystoresDataType = 'array';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $provider;
  /**
   * @var string
   */
  public $pubsubTopic;
  protected $resourceReferencesType = GoogleCloudApigeeV1ReferenceConfig::class;
  protected $resourceReferencesDataType = 'array';
  protected $resourcesType = GoogleCloudApigeeV1ResourceConfig::class;
  protected $resourcesDataType = 'array';
  /**
   * @var string
   */
  public $revisionId;
  /**
   * @var string
   */
  public $sequenceNumber;
  protected $targetsType = GoogleCloudApigeeV1TargetServerConfig::class;
  protected $targetsDataType = 'array';
  protected $traceConfigType = GoogleCloudApigeeV1RuntimeTraceConfig::class;
  protected $traceConfigDataType = '';
  /**
   * @var string
   */
  public $uid;

  /**
   * @param string
   */
  public function setArcConfigLocation($arcConfigLocation)
  {
    $this->arcConfigLocation = $arcConfigLocation;
  }
  /**
   * @return string
   */
  public function getArcConfigLocation()
  {
    return $this->arcConfigLocation;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param GoogleCloudApigeeV1DataCollectorConfig[]
   */
  public function setDataCollectors($dataCollectors)
  {
    $this->dataCollectors = $dataCollectors;
  }
  /**
   * @return GoogleCloudApigeeV1DataCollectorConfig[]
   */
  public function getDataCollectors()
  {
    return $this->dataCollectors;
  }
  /**
   * @param GoogleCloudApigeeV1DebugMask
   */
  public function setDebugMask(GoogleCloudApigeeV1DebugMask $debugMask)
  {
    $this->debugMask = $debugMask;
  }
  /**
   * @return GoogleCloudApigeeV1DebugMask
   */
  public function getDebugMask()
  {
    return $this->debugMask;
  }
  /**
   * @param GoogleCloudApigeeV1DeploymentConfig[]
   */
  public function setDeployments($deployments)
  {
    $this->deployments = $deployments;
  }
  /**
   * @return GoogleCloudApigeeV1DeploymentConfig[]
   */
  public function getDeployments()
  {
    return $this->deployments;
  }
  /**
   * @param string[]
   */
  public function setFeatureFlags($featureFlags)
  {
    $this->featureFlags = $featureFlags;
  }
  /**
   * @return string[]
   */
  public function getFeatureFlags()
  {
    return $this->featureFlags;
  }
  /**
   * @param GoogleCloudApigeeV1FlowHookConfig[]
   */
  public function setFlowhooks($flowhooks)
  {
    $this->flowhooks = $flowhooks;
  }
  /**
   * @return GoogleCloudApigeeV1FlowHookConfig[]
   */
  public function getFlowhooks()
  {
    return $this->flowhooks;
  }
  /**
   * @param string
   */
  public function setForwardProxyUri($forwardProxyUri)
  {
    $this->forwardProxyUri = $forwardProxyUri;
  }
  /**
   * @return string
   */
  public function getForwardProxyUri()
  {
    return $this->forwardProxyUri;
  }
  /**
   * @param string
   */
  public function setGatewayConfigLocation($gatewayConfigLocation)
  {
    $this->gatewayConfigLocation = $gatewayConfigLocation;
  }
  /**
   * @return string
   */
  public function getGatewayConfigLocation()
  {
    return $this->gatewayConfigLocation;
  }
  /**
   * @param GoogleCloudApigeeV1KeystoreConfig[]
   */
  public function setKeystores($keystores)
  {
    $this->keystores = $keystores;
  }
  /**
   * @return GoogleCloudApigeeV1KeystoreConfig[]
   */
  public function getKeystores()
  {
    return $this->keystores;
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
   * @param string
   */
  public function setProvider($provider)
  {
    $this->provider = $provider;
  }
  /**
   * @return string
   */
  public function getProvider()
  {
    return $this->provider;
  }
  /**
   * @param string
   */
  public function setPubsubTopic($pubsubTopic)
  {
    $this->pubsubTopic = $pubsubTopic;
  }
  /**
   * @return string
   */
  public function getPubsubTopic()
  {
    return $this->pubsubTopic;
  }
  /**
   * @param GoogleCloudApigeeV1ReferenceConfig[]
   */
  public function setResourceReferences($resourceReferences)
  {
    $this->resourceReferences = $resourceReferences;
  }
  /**
   * @return GoogleCloudApigeeV1ReferenceConfig[]
   */
  public function getResourceReferences()
  {
    return $this->resourceReferences;
  }
  /**
   * @param GoogleCloudApigeeV1ResourceConfig[]
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return GoogleCloudApigeeV1ResourceConfig[]
   */
  public function getResources()
  {
    return $this->resources;
  }
  /**
   * @param string
   */
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  /**
   * @return string
   */
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  /**
   * @param string
   */
  public function setSequenceNumber($sequenceNumber)
  {
    $this->sequenceNumber = $sequenceNumber;
  }
  /**
   * @return string
   */
  public function getSequenceNumber()
  {
    return $this->sequenceNumber;
  }
  /**
   * @param GoogleCloudApigeeV1TargetServerConfig[]
   */
  public function setTargets($targets)
  {
    $this->targets = $targets;
  }
  /**
   * @return GoogleCloudApigeeV1TargetServerConfig[]
   */
  public function getTargets()
  {
    return $this->targets;
  }
  /**
   * @param GoogleCloudApigeeV1RuntimeTraceConfig
   */
  public function setTraceConfig(GoogleCloudApigeeV1RuntimeTraceConfig $traceConfig)
  {
    $this->traceConfig = $traceConfig;
  }
  /**
   * @return GoogleCloudApigeeV1RuntimeTraceConfig
   */
  public function getTraceConfig()
  {
    return $this->traceConfig;
  }
  /**
   * @param string
   */
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1EnvironmentConfig::class, 'Google_Service_Apigee_GoogleCloudApigeeV1EnvironmentConfig');
