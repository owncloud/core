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

class Google_Service_Replicapool_VmParams extends Google_Collection
{
  protected $collection_key = 'serviceAccounts';
  public $baseInstanceName;
  public $canIpForward;
  public $description;
  protected $disksToAttachType = 'Google_Service_Replicapool_ExistingDisk';
  protected $disksToAttachDataType = 'array';
  protected $disksToCreateType = 'Google_Service_Replicapool_NewDisk';
  protected $disksToCreateDataType = 'array';
  public $machineType;
  protected $metadataType = 'Google_Service_Replicapool_Metadata';
  protected $metadataDataType = '';
  protected $networkInterfacesType = 'Google_Service_Replicapool_NetworkInterface';
  protected $networkInterfacesDataType = 'array';
  public $onHostMaintenance;
  protected $serviceAccountsType = 'Google_Service_Replicapool_ServiceAccount';
  protected $serviceAccountsDataType = 'array';
  protected $tagsType = 'Google_Service_Replicapool_Tag';
  protected $tagsDataType = '';

  public function setBaseInstanceName($baseInstanceName)
  {
    $this->baseInstanceName = $baseInstanceName;
  }
  public function getBaseInstanceName()
  {
    return $this->baseInstanceName;
  }
  public function setCanIpForward($canIpForward)
  {
    $this->canIpForward = $canIpForward;
  }
  public function getCanIpForward()
  {
    return $this->canIpForward;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_Replicapool_ExistingDisk
   */
  public function setDisksToAttach($disksToAttach)
  {
    $this->disksToAttach = $disksToAttach;
  }
  /**
   * @return Google_Service_Replicapool_ExistingDisk
   */
  public function getDisksToAttach()
  {
    return $this->disksToAttach;
  }
  /**
   * @param Google_Service_Replicapool_NewDisk
   */
  public function setDisksToCreate($disksToCreate)
  {
    $this->disksToCreate = $disksToCreate;
  }
  /**
   * @return Google_Service_Replicapool_NewDisk
   */
  public function getDisksToCreate()
  {
    return $this->disksToCreate;
  }
  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
  public function getMachineType()
  {
    return $this->machineType;
  }
  /**
   * @param Google_Service_Replicapool_Metadata
   */
  public function setMetadata(Google_Service_Replicapool_Metadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_Replicapool_Metadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param Google_Service_Replicapool_NetworkInterface
   */
  public function setNetworkInterfaces($networkInterfaces)
  {
    $this->networkInterfaces = $networkInterfaces;
  }
  /**
   * @return Google_Service_Replicapool_NetworkInterface
   */
  public function getNetworkInterfaces()
  {
    return $this->networkInterfaces;
  }
  public function setOnHostMaintenance($onHostMaintenance)
  {
    $this->onHostMaintenance = $onHostMaintenance;
  }
  public function getOnHostMaintenance()
  {
    return $this->onHostMaintenance;
  }
  /**
   * @param Google_Service_Replicapool_ServiceAccount
   */
  public function setServiceAccounts($serviceAccounts)
  {
    $this->serviceAccounts = $serviceAccounts;
  }
  /**
   * @return Google_Service_Replicapool_ServiceAccount
   */
  public function getServiceAccounts()
  {
    return $this->serviceAccounts;
  }
  /**
   * @param Google_Service_Replicapool_Tag
   */
  public function setTags(Google_Service_Replicapool_Tag $tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return Google_Service_Replicapool_Tag
   */
  public function getTags()
  {
    return $this->tags;
  }
}
