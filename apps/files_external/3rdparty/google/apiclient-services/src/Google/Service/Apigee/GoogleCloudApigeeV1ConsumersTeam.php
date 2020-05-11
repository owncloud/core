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

class Google_Service_Apigee_GoogleCloudApigeeV1ConsumersTeam extends Google_Collection
{
  protected $collection_key = 'users';
  protected $appsType = 'Google_Service_Apigee_GoogleCloudApigeeV1PortalApp';
  protected $appsDataType = 'array';
  protected $audiencesType = 'Google_Service_Apigee_GoogleCloudApigeeV1ConsumerAudience';
  protected $audiencesDataType = 'array';
  public $created;
  public $description;
  public $id;
  public $memberCount;
  protected $membershipsType = 'Google_Service_Apigee_GoogleCloudApigeeV1ConsumerTeamMembership';
  protected $membershipsDataType = 'array';
  public $name;
  public $pointOfContact;
  protected $usersType = 'Google_Service_Apigee_GoogleCloudApigeeV1ConsumerUser';
  protected $usersDataType = 'array';

  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1PortalApp
   */
  public function setApps($apps)
  {
    $this->apps = $apps;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1PortalApp
   */
  public function getApps()
  {
    return $this->apps;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ConsumerAudience
   */
  public function setAudiences($audiences)
  {
    $this->audiences = $audiences;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ConsumerAudience
   */
  public function getAudiences()
  {
    return $this->audiences;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setMemberCount($memberCount)
  {
    $this->memberCount = $memberCount;
  }
  public function getMemberCount()
  {
    return $this->memberCount;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ConsumerTeamMembership
   */
  public function setMemberships($memberships)
  {
    $this->memberships = $memberships;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ConsumerTeamMembership
   */
  public function getMemberships()
  {
    return $this->memberships;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPointOfContact($pointOfContact)
  {
    $this->pointOfContact = $pointOfContact;
  }
  public function getPointOfContact()
  {
    return $this->pointOfContact;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ConsumerUser
   */
  public function setUsers($users)
  {
    $this->users = $users;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ConsumerUser
   */
  public function getUsers()
  {
    return $this->users;
  }
}
