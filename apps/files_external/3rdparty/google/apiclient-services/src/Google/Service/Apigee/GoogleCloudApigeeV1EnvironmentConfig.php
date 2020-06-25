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

class Google_Service_Apigee_GoogleCloudApigeeV1EnvironmentConfig extends Google_Collection
{
  protected $collection_key = 'targets';
  public $createTime;
  protected $debugMaskType = 'Google_Service_Apigee_GoogleCloudApigeeV1DebugMask';
  protected $debugMaskDataType = '';
  protected $deploymentsType = 'Google_Service_Apigee_GoogleCloudApigeeV1DeploymentConfig';
  protected $deploymentsDataType = 'array';
  public $featureFlags;
  protected $flowhooksType = 'Google_Service_Apigee_GoogleCloudApigeeV1FlowHookConfig';
  protected $flowhooksDataType = 'array';
  protected $keystoresType = 'Google_Service_Apigee_GoogleCloudApigeeV1KeystoreConfig';
  protected $keystoresDataType = 'array';
  public $name;
  public $provider;
  public $pubsubTopic;
  protected $resourceReferencesType = 'Google_Service_Apigee_GoogleCloudApigeeV1ReferenceConfig';
  protected $resourceReferencesDataType = 'array';
  protected $resourcesType = 'Google_Service_Apigee_GoogleCloudApigeeV1ResourceConfig';
  protected $resourcesDataType = 'array';
  public $revisionId;
  public $sequenceNumber;
  protected $targetsType = 'Google_Service_Apigee_GoogleCloudApigeeV1TargetServerConfig';
  protected $targetsDataType = 'array';
  public $uid;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1DebugMask
   */
  public function setDebugMask(Google_Service_Apigee_GoogleCloudApigeeV1DebugMask $debugMask)
  {
    $this->debugMask = $debugMask;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DebugMask
   */
  public function getDebugMask()
  {
    return $this->debugMask;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1DeploymentConfig
   */
  public function setDeployments($deployments)
  {
    $this->deployments = $deployments;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DeploymentConfig
   */
  public function getDeployments()
  {
    return $this->deployments;
  }
  public function setFeatureFlags($featureFlags)
  {
    $this->featureFlags = $featureFlags;
  }
  public function getFeatureFlags()
  {
    return $this->featureFlags;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1FlowHookConfig
   */
  public function setFlowhooks($flowhooks)
  {
    $this->flowhooks = $flowhooks;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1FlowHookConfig
   */
  public function getFlowhooks()
  {
    return $this->flowhooks;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1KeystoreConfig
   */
  public function setKeystores($keystores)
  {
    $this->keystores = $keystores;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1KeystoreConfig
   */
  public function getKeystores()
  {
    return $this->keystores;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProvider($provider)
  {
    $this->provider = $provider;
  }
  public function getProvider()
  {
    return $this->provider;
  }
  public function setPubsubTopic($pubsubTopic)
  {
    $this->pubsubTopic = $pubsubTopic;
  }
  public function getPubsubTopic()
  {
    return $this->pubsubTopic;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ReferenceConfig
   */
  public function setResourceReferences($resourceReferences)
  {
    $this->resourceReferences = $resourceReferences;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ReferenceConfig
   */
  public function getResourceReferences()
  {
    return $this->resourceReferences;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ResourceConfig
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ResourceConfig
   */
  public function getResources()
  {
    return $this->resources;
  }
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  public function setSequenceNumber($sequenceNumber)
  {
    $this->sequenceNumber = $sequenceNumber;
  }
  public function getSequenceNumber()
  {
    return $this->sequenceNumber;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1TargetServerConfig
   */
  public function setTargets($targets)
  {
    $this->targets = $targets;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1TargetServerConfig
   */
  public function getTargets()
  {
    return $this->targets;
  }
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  public function getUid()
  {
    return $this->uid;
  }
}
