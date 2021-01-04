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

class Google_Service_Apigee_GoogleCloudApigeeV1Developer extends Google_Collection
{
  protected $collection_key = 'companies';
  public $accessType;
  public $appFamily;
  public $apps;
  protected $attributesType = 'Google_Service_Apigee_GoogleCloudApigeeV1Attribute';
  protected $attributesDataType = 'array';
  public $companies;
  public $createdAt;
  public $developerId;
  public $email;
  public $firstName;
  public $lastModifiedAt;
  public $lastName;
  public $organizationName;
  public $status;
  public $userName;

  public function setAccessType($accessType)
  {
    $this->accessType = $accessType;
  }
  public function getAccessType()
  {
    return $this->accessType;
  }
  public function setAppFamily($appFamily)
  {
    $this->appFamily = $appFamily;
  }
  public function getAppFamily()
  {
    return $this->appFamily;
  }
  public function setApps($apps)
  {
    $this->apps = $apps;
  }
  public function getApps()
  {
    return $this->apps;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Attribute[]
   */
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Attribute[]
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  public function setCompanies($companies)
  {
    $this->companies = $companies;
  }
  public function getCompanies()
  {
    return $this->companies;
  }
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  public function setDeveloperId($developerId)
  {
    $this->developerId = $developerId;
  }
  public function getDeveloperId()
  {
    return $this->developerId;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setFirstName($firstName)
  {
    $this->firstName = $firstName;
  }
  public function getFirstName()
  {
    return $this->firstName;
  }
  public function setLastModifiedAt($lastModifiedAt)
  {
    $this->lastModifiedAt = $lastModifiedAt;
  }
  public function getLastModifiedAt()
  {
    return $this->lastModifiedAt;
  }
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
  }
  public function getLastName()
  {
    return $this->lastName;
  }
  public function setOrganizationName($organizationName)
  {
    $this->organizationName = $organizationName;
  }
  public function getOrganizationName()
  {
    return $this->organizationName;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setUserName($userName)
  {
    $this->userName = $userName;
  }
  public function getUserName()
  {
    return $this->userName;
  }
}
