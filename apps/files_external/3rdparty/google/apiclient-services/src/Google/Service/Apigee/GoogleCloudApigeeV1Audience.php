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

class Google_Service_Apigee_GoogleCloudApigeeV1Audience extends Google_Collection
{
  protected $collection_key = 'users';
  public $created;
  public $description;
  public $id;
  public $membershipType;
  public $name;
  public $resources;
  protected $teamsType = 'Google_Service_Apigee_GoogleCloudApigeeV1ConsumerTeam';
  protected $teamsDataType = 'array';
  protected $usersType = 'Google_Service_Apigee_GoogleCloudApigeeV1UserData';
  protected $usersDataType = 'array';

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
  public function setMembershipType($membershipType)
  {
    $this->membershipType = $membershipType;
  }
  public function getMembershipType()
  {
    return $this->membershipType;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  public function getResources()
  {
    return $this->resources;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ConsumerTeam
   */
  public function setTeams($teams)
  {
    $this->teams = $teams;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ConsumerTeam
   */
  public function getTeams()
  {
    return $this->teams;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1UserData
   */
  public function setUsers($users)
  {
    $this->users = $users;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1UserData
   */
  public function getUsers()
  {
    return $this->users;
  }
}
