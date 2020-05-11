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

class Google_Service_Apigee_GoogleCloudApigeeV1ConsumerUser extends Google_Collection
{
  protected $collection_key = 'teams';
  public $active;
  protected $appsType = 'Google_Service_Apigee_GoogleCloudApigeeV1PortalApp';
  protected $appsDataType = 'array';
  protected $audiencesType = 'Google_Service_Apigee_GoogleCloudApigeeV1ConsumerAudience';
  protected $audiencesDataType = 'array';
  protected $customFieldValuesType = 'Google_Service_Apigee_GoogleCloudApigeeV1CustomFieldValue';
  protected $customFieldValuesDataType = 'array';
  public $email;
  public $id;
  protected $nameType = 'Google_Service_Apigee_GoogleCloudApigeeV1ConsumerName';
  protected $nameDataType = '';
  public $passwordLastModified;
  protected $teamsType = 'Google_Service_Apigee_GoogleCloudApigeeV1ConsumersTeam';
  protected $teamsDataType = 'array';
  public $verified;

  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
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
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1CustomFieldValue
   */
  public function setCustomFieldValues($customFieldValues)
  {
    $this->customFieldValues = $customFieldValues;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CustomFieldValue
   */
  public function getCustomFieldValues()
  {
    return $this->customFieldValues;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ConsumerName
   */
  public function setName(Google_Service_Apigee_GoogleCloudApigeeV1ConsumerName $name)
  {
    $this->name = $name;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ConsumerName
   */
  public function getName()
  {
    return $this->name;
  }
  public function setPasswordLastModified($passwordLastModified)
  {
    $this->passwordLastModified = $passwordLastModified;
  }
  public function getPasswordLastModified()
  {
    return $this->passwordLastModified;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ConsumersTeam
   */
  public function setTeams($teams)
  {
    $this->teams = $teams;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ConsumersTeam
   */
  public function getTeams()
  {
    return $this->teams;
  }
  public function setVerified($verified)
  {
    $this->verified = $verified;
  }
  public function getVerified()
  {
    return $this->verified;
  }
}
