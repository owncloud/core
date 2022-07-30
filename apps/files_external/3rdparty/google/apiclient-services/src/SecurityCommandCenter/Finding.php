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

namespace Google\Service\SecurityCommandCenter;

class Finding extends \Google\Collection
{
  protected $collection_key = 'processes';
  protected $accessType = Access::class;
  protected $accessDataType = '';
  /**
   * @var string
   */
  public $canonicalName;
  /**
   * @var string
   */
  public $category;
  protected $compliancesType = Compliance::class;
  protected $compliancesDataType = 'array';
  protected $connectionsType = Connection::class;
  protected $connectionsDataType = 'array';
  protected $contactsType = ContactDetails::class;
  protected $contactsDataType = 'map';
  protected $containersType = Container::class;
  protected $containersDataType = 'array';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $eventTime;
  protected $exfiltrationType = Exfiltration::class;
  protected $exfiltrationDataType = '';
  protected $externalSystemsType = GoogleCloudSecuritycenterV1ExternalSystem::class;
  protected $externalSystemsDataType = 'map';
  /**
   * @var string
   */
  public $externalUri;
  /**
   * @var string
   */
  public $findingClass;
  protected $iamBindingsType = IamBinding::class;
  protected $iamBindingsDataType = 'array';
  protected $indicatorType = Indicator::class;
  protected $indicatorDataType = '';
  protected $kubernetesType = Kubernetes::class;
  protected $kubernetesDataType = '';
  protected $mitreAttackType = MitreAttack::class;
  protected $mitreAttackDataType = '';
  /**
   * @var string
   */
  public $mute;
  /**
   * @var string
   */
  public $muteInitiator;
  /**
   * @var string
   */
  public $muteUpdateTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $nextSteps;
  /**
   * @var string
   */
  public $parent;
  protected $processesType = Process::class;
  protected $processesDataType = 'array';
  /**
   * @var string
   */
  public $resourceName;
  protected $securityMarksType = SecurityMarks::class;
  protected $securityMarksDataType = '';
  /**
   * @var string
   */
  public $severity;
  /**
   * @var array[]
   */
  public $sourceProperties;
  /**
   * @var string
   */
  public $state;
  protected $vulnerabilityType = Vulnerability::class;
  protected $vulnerabilityDataType = '';

  /**
   * @param Access
   */
  public function setAccess(Access $access)
  {
    $this->access = $access;
  }
  /**
   * @return Access
   */
  public function getAccess()
  {
    return $this->access;
  }
  /**
   * @param string
   */
  public function setCanonicalName($canonicalName)
  {
    $this->canonicalName = $canonicalName;
  }
  /**
   * @return string
   */
  public function getCanonicalName()
  {
    return $this->canonicalName;
  }
  /**
   * @param string
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return string
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param Compliance[]
   */
  public function setCompliances($compliances)
  {
    $this->compliances = $compliances;
  }
  /**
   * @return Compliance[]
   */
  public function getCompliances()
  {
    return $this->compliances;
  }
  /**
   * @param Connection[]
   */
  public function setConnections($connections)
  {
    $this->connections = $connections;
  }
  /**
   * @return Connection[]
   */
  public function getConnections()
  {
    return $this->connections;
  }
  /**
   * @param ContactDetails[]
   */
  public function setContacts($contacts)
  {
    $this->contacts = $contacts;
  }
  /**
   * @return ContactDetails[]
   */
  public function getContacts()
  {
    return $this->contacts;
  }
  /**
   * @param Container[]
   */
  public function setContainers($containers)
  {
    $this->containers = $containers;
  }
  /**
   * @return Container[]
   */
  public function getContainers()
  {
    return $this->containers;
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
  public function setEventTime($eventTime)
  {
    $this->eventTime = $eventTime;
  }
  /**
   * @return string
   */
  public function getEventTime()
  {
    return $this->eventTime;
  }
  /**
   * @param Exfiltration
   */
  public function setExfiltration(Exfiltration $exfiltration)
  {
    $this->exfiltration = $exfiltration;
  }
  /**
   * @return Exfiltration
   */
  public function getExfiltration()
  {
    return $this->exfiltration;
  }
  /**
   * @param GoogleCloudSecuritycenterV1ExternalSystem[]
   */
  public function setExternalSystems($externalSystems)
  {
    $this->externalSystems = $externalSystems;
  }
  /**
   * @return GoogleCloudSecuritycenterV1ExternalSystem[]
   */
  public function getExternalSystems()
  {
    return $this->externalSystems;
  }
  /**
   * @param string
   */
  public function setExternalUri($externalUri)
  {
    $this->externalUri = $externalUri;
  }
  /**
   * @return string
   */
  public function getExternalUri()
  {
    return $this->externalUri;
  }
  /**
   * @param string
   */
  public function setFindingClass($findingClass)
  {
    $this->findingClass = $findingClass;
  }
  /**
   * @return string
   */
  public function getFindingClass()
  {
    return $this->findingClass;
  }
  /**
   * @param IamBinding[]
   */
  public function setIamBindings($iamBindings)
  {
    $this->iamBindings = $iamBindings;
  }
  /**
   * @return IamBinding[]
   */
  public function getIamBindings()
  {
    return $this->iamBindings;
  }
  /**
   * @param Indicator
   */
  public function setIndicator(Indicator $indicator)
  {
    $this->indicator = $indicator;
  }
  /**
   * @return Indicator
   */
  public function getIndicator()
  {
    return $this->indicator;
  }
  /**
   * @param Kubernetes
   */
  public function setKubernetes(Kubernetes $kubernetes)
  {
    $this->kubernetes = $kubernetes;
  }
  /**
   * @return Kubernetes
   */
  public function getKubernetes()
  {
    return $this->kubernetes;
  }
  /**
   * @param MitreAttack
   */
  public function setMitreAttack(MitreAttack $mitreAttack)
  {
    $this->mitreAttack = $mitreAttack;
  }
  /**
   * @return MitreAttack
   */
  public function getMitreAttack()
  {
    return $this->mitreAttack;
  }
  /**
   * @param string
   */
  public function setMute($mute)
  {
    $this->mute = $mute;
  }
  /**
   * @return string
   */
  public function getMute()
  {
    return $this->mute;
  }
  /**
   * @param string
   */
  public function setMuteInitiator($muteInitiator)
  {
    $this->muteInitiator = $muteInitiator;
  }
  /**
   * @return string
   */
  public function getMuteInitiator()
  {
    return $this->muteInitiator;
  }
  /**
   * @param string
   */
  public function setMuteUpdateTime($muteUpdateTime)
  {
    $this->muteUpdateTime = $muteUpdateTime;
  }
  /**
   * @return string
   */
  public function getMuteUpdateTime()
  {
    return $this->muteUpdateTime;
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
  public function setNextSteps($nextSteps)
  {
    $this->nextSteps = $nextSteps;
  }
  /**
   * @return string
   */
  public function getNextSteps()
  {
    return $this->nextSteps;
  }
  /**
   * @param string
   */
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  /**
   * @return string
   */
  public function getParent()
  {
    return $this->parent;
  }
  /**
   * @param Process[]
   */
  public function setProcesses($processes)
  {
    $this->processes = $processes;
  }
  /**
   * @return Process[]
   */
  public function getProcesses()
  {
    return $this->processes;
  }
  /**
   * @param string
   */
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  /**
   * @return string
   */
  public function getResourceName()
  {
    return $this->resourceName;
  }
  /**
   * @param SecurityMarks
   */
  public function setSecurityMarks(SecurityMarks $securityMarks)
  {
    $this->securityMarks = $securityMarks;
  }
  /**
   * @return SecurityMarks
   */
  public function getSecurityMarks()
  {
    return $this->securityMarks;
  }
  /**
   * @param string
   */
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  /**
   * @return string
   */
  public function getSeverity()
  {
    return $this->severity;
  }
  /**
   * @param array[]
   */
  public function setSourceProperties($sourceProperties)
  {
    $this->sourceProperties = $sourceProperties;
  }
  /**
   * @return array[]
   */
  public function getSourceProperties()
  {
    return $this->sourceProperties;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param Vulnerability
   */
  public function setVulnerability(Vulnerability $vulnerability)
  {
    $this->vulnerability = $vulnerability;
  }
  /**
   * @return Vulnerability
   */
  public function getVulnerability()
  {
    return $this->vulnerability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Finding::class, 'Google_Service_SecurityCommandCenter_Finding');
