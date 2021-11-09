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

class GoogleCloudApigeeV1ApiProxyRevision extends \Google\Collection
{
  protected $collection_key = 'teams';
  public $basepaths;
  protected $configurationVersionType = GoogleCloudApigeeV1ConfigVersion::class;
  protected $configurationVersionDataType = '';
  public $contextInfo;
  public $createdAt;
  public $description;
  public $displayName;
  public $entityMetaDataAsProperties;
  public $integrationEndpoints;
  public $lastModifiedAt;
  public $name;
  public $policies;
  public $proxies;
  public $proxyEndpoints;
  protected $resourceFilesType = GoogleCloudApigeeV1ResourceFiles::class;
  protected $resourceFilesDataType = '';
  public $resources;
  public $revision;
  public $sharedFlows;
  public $spec;
  public $targetEndpoints;
  public $targetServers;
  public $targets;
  public $teams;
  public $type;

  public function setBasepaths($basepaths)
  {
    $this->basepaths = $basepaths;
  }
  public function getBasepaths()
  {
    return $this->basepaths;
  }
  /**
   * @param GoogleCloudApigeeV1ConfigVersion
   */
  public function setConfigurationVersion(GoogleCloudApigeeV1ConfigVersion $configurationVersion)
  {
    $this->configurationVersion = $configurationVersion;
  }
  /**
   * @return GoogleCloudApigeeV1ConfigVersion
   */
  public function getConfigurationVersion()
  {
    return $this->configurationVersion;
  }
  public function setContextInfo($contextInfo)
  {
    $this->contextInfo = $contextInfo;
  }
  public function getContextInfo()
  {
    return $this->contextInfo;
  }
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEntityMetaDataAsProperties($entityMetaDataAsProperties)
  {
    $this->entityMetaDataAsProperties = $entityMetaDataAsProperties;
  }
  public function getEntityMetaDataAsProperties()
  {
    return $this->entityMetaDataAsProperties;
  }
  public function setIntegrationEndpoints($integrationEndpoints)
  {
    $this->integrationEndpoints = $integrationEndpoints;
  }
  public function getIntegrationEndpoints()
  {
    return $this->integrationEndpoints;
  }
  public function setLastModifiedAt($lastModifiedAt)
  {
    $this->lastModifiedAt = $lastModifiedAt;
  }
  public function getLastModifiedAt()
  {
    return $this->lastModifiedAt;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPolicies($policies)
  {
    $this->policies = $policies;
  }
  public function getPolicies()
  {
    return $this->policies;
  }
  public function setProxies($proxies)
  {
    $this->proxies = $proxies;
  }
  public function getProxies()
  {
    return $this->proxies;
  }
  public function setProxyEndpoints($proxyEndpoints)
  {
    $this->proxyEndpoints = $proxyEndpoints;
  }
  public function getProxyEndpoints()
  {
    return $this->proxyEndpoints;
  }
  /**
   * @param GoogleCloudApigeeV1ResourceFiles
   */
  public function setResourceFiles(GoogleCloudApigeeV1ResourceFiles $resourceFiles)
  {
    $this->resourceFiles = $resourceFiles;
  }
  /**
   * @return GoogleCloudApigeeV1ResourceFiles
   */
  public function getResourceFiles()
  {
    return $this->resourceFiles;
  }
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  public function getResources()
  {
    return $this->resources;
  }
  public function setRevision($revision)
  {
    $this->revision = $revision;
  }
  public function getRevision()
  {
    return $this->revision;
  }
  public function setSharedFlows($sharedFlows)
  {
    $this->sharedFlows = $sharedFlows;
  }
  public function getSharedFlows()
  {
    return $this->sharedFlows;
  }
  public function setSpec($spec)
  {
    $this->spec = $spec;
  }
  public function getSpec()
  {
    return $this->spec;
  }
  public function setTargetEndpoints($targetEndpoints)
  {
    $this->targetEndpoints = $targetEndpoints;
  }
  public function getTargetEndpoints()
  {
    return $this->targetEndpoints;
  }
  public function setTargetServers($targetServers)
  {
    $this->targetServers = $targetServers;
  }
  public function getTargetServers()
  {
    return $this->targetServers;
  }
  public function setTargets($targets)
  {
    $this->targets = $targets;
  }
  public function getTargets()
  {
    return $this->targets;
  }
  public function setTeams($teams)
  {
    $this->teams = $teams;
  }
  public function getTeams()
  {
    return $this->teams;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1ApiProxyRevision::class, 'Google_Service_Apigee_GoogleCloudApigeeV1ApiProxyRevision');
