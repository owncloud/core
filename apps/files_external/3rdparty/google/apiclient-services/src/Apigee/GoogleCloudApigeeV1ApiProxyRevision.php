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
  /**
   * @var string
   */
  public $archive;
  /**
   * @var string[]
   */
  public $basepaths;
  protected $configurationVersionType = GoogleCloudApigeeV1ConfigVersion::class;
  protected $configurationVersionDataType = '';
  /**
   * @var string
   */
  public $contextInfo;
  /**
   * @var string
   */
  public $createdAt;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string[]
   */
  public $entityMetaDataAsProperties;
  /**
   * @var string[]
   */
  public $integrationEndpoints;
  /**
   * @var string
   */
  public $lastModifiedAt;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $policies;
  /**
   * @var string[]
   */
  public $proxies;
  /**
   * @var string[]
   */
  public $proxyEndpoints;
  protected $resourceFilesType = GoogleCloudApigeeV1ResourceFiles::class;
  protected $resourceFilesDataType = '';
  /**
   * @var string[]
   */
  public $resources;
  /**
   * @var string
   */
  public $revision;
  /**
   * @var string[]
   */
  public $sharedFlows;
  /**
   * @var string
   */
  public $spec;
  /**
   * @var string[]
   */
  public $targetEndpoints;
  /**
   * @var string[]
   */
  public $targetServers;
  /**
   * @var string[]
   */
  public $targets;
  /**
   * @var string[]
   */
  public $teams;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setArchive($archive)
  {
    $this->archive = $archive;
  }
  /**
   * @return string
   */
  public function getArchive()
  {
    return $this->archive;
  }
  /**
   * @param string[]
   */
  public function setBasepaths($basepaths)
  {
    $this->basepaths = $basepaths;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param string
   */
  public function setContextInfo($contextInfo)
  {
    $this->contextInfo = $contextInfo;
  }
  /**
   * @return string
   */
  public function getContextInfo()
  {
    return $this->contextInfo;
  }
  /**
   * @param string
   */
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  /**
   * @return string
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
   * @param string[]
   */
  public function setEntityMetaDataAsProperties($entityMetaDataAsProperties)
  {
    $this->entityMetaDataAsProperties = $entityMetaDataAsProperties;
  }
  /**
   * @return string[]
   */
  public function getEntityMetaDataAsProperties()
  {
    return $this->entityMetaDataAsProperties;
  }
  /**
   * @param string[]
   */
  public function setIntegrationEndpoints($integrationEndpoints)
  {
    $this->integrationEndpoints = $integrationEndpoints;
  }
  /**
   * @return string[]
   */
  public function getIntegrationEndpoints()
  {
    return $this->integrationEndpoints;
  }
  /**
   * @param string
   */
  public function setLastModifiedAt($lastModifiedAt)
  {
    $this->lastModifiedAt = $lastModifiedAt;
  }
  /**
   * @return string
   */
  public function getLastModifiedAt()
  {
    return $this->lastModifiedAt;
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
   * @param string[]
   */
  public function setPolicies($policies)
  {
    $this->policies = $policies;
  }
  /**
   * @return string[]
   */
  public function getPolicies()
  {
    return $this->policies;
  }
  /**
   * @param string[]
   */
  public function setProxies($proxies)
  {
    $this->proxies = $proxies;
  }
  /**
   * @return string[]
   */
  public function getProxies()
  {
    return $this->proxies;
  }
  /**
   * @param string[]
   */
  public function setProxyEndpoints($proxyEndpoints)
  {
    $this->proxyEndpoints = $proxyEndpoints;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param string[]
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return string[]
   */
  public function getResources()
  {
    return $this->resources;
  }
  /**
   * @param string
   */
  public function setRevision($revision)
  {
    $this->revision = $revision;
  }
  /**
   * @return string
   */
  public function getRevision()
  {
    return $this->revision;
  }
  /**
   * @param string[]
   */
  public function setSharedFlows($sharedFlows)
  {
    $this->sharedFlows = $sharedFlows;
  }
  /**
   * @return string[]
   */
  public function getSharedFlows()
  {
    return $this->sharedFlows;
  }
  /**
   * @param string
   */
  public function setSpec($spec)
  {
    $this->spec = $spec;
  }
  /**
   * @return string
   */
  public function getSpec()
  {
    return $this->spec;
  }
  /**
   * @param string[]
   */
  public function setTargetEndpoints($targetEndpoints)
  {
    $this->targetEndpoints = $targetEndpoints;
  }
  /**
   * @return string[]
   */
  public function getTargetEndpoints()
  {
    return $this->targetEndpoints;
  }
  /**
   * @param string[]
   */
  public function setTargetServers($targetServers)
  {
    $this->targetServers = $targetServers;
  }
  /**
   * @return string[]
   */
  public function getTargetServers()
  {
    return $this->targetServers;
  }
  /**
   * @param string[]
   */
  public function setTargets($targets)
  {
    $this->targets = $targets;
  }
  /**
   * @return string[]
   */
  public function getTargets()
  {
    return $this->targets;
  }
  /**
   * @param string[]
   */
  public function setTeams($teams)
  {
    $this->teams = $teams;
  }
  /**
   * @return string[]
   */
  public function getTeams()
  {
    return $this->teams;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1ApiProxyRevision::class, 'Google_Service_Apigee_GoogleCloudApigeeV1ApiProxyRevision');
