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

class GoogleCloudApigeeV1Developer extends \Google\Collection
{
  protected $collection_key = 'companies';
  /**
   * @var string
   */
  public $accessType;
  /**
   * @var string
   */
  public $appFamily;
  /**
   * @var string[]
   */
  public $apps;
  protected $attributesType = GoogleCloudApigeeV1Attribute::class;
  protected $attributesDataType = 'array';
  /**
   * @var string[]
   */
  public $companies;
  /**
   * @var string
   */
  public $createdAt;
  /**
   * @var string
   */
  public $developerId;
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $firstName;
  /**
   * @var string
   */
  public $lastModifiedAt;
  /**
   * @var string
   */
  public $lastName;
  /**
   * @var string
   */
  public $organizationName;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $userName;

  /**
   * @param string
   */
  public function setAccessType($accessType)
  {
    $this->accessType = $accessType;
  }
  /**
   * @return string
   */
  public function getAccessType()
  {
    return $this->accessType;
  }
  /**
   * @param string
   */
  public function setAppFamily($appFamily)
  {
    $this->appFamily = $appFamily;
  }
  /**
   * @return string
   */
  public function getAppFamily()
  {
    return $this->appFamily;
  }
  /**
   * @param string[]
   */
  public function setApps($apps)
  {
    $this->apps = $apps;
  }
  /**
   * @return string[]
   */
  public function getApps()
  {
    return $this->apps;
  }
  /**
   * @param GoogleCloudApigeeV1Attribute[]
   */
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return GoogleCloudApigeeV1Attribute[]
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  /**
   * @param string[]
   */
  public function setCompanies($companies)
  {
    $this->companies = $companies;
  }
  /**
   * @return string[]
   */
  public function getCompanies()
  {
    return $this->companies;
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
  public function setDeveloperId($developerId)
  {
    $this->developerId = $developerId;
  }
  /**
   * @return string
   */
  public function getDeveloperId()
  {
    return $this->developerId;
  }
  /**
   * @param string
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }
  /**
   * @param string
   */
  public function setFirstName($firstName)
  {
    $this->firstName = $firstName;
  }
  /**
   * @return string
   */
  public function getFirstName()
  {
    return $this->firstName;
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
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
  }
  /**
   * @return string
   */
  public function getLastName()
  {
    return $this->lastName;
  }
  /**
   * @param string
   */
  public function setOrganizationName($organizationName)
  {
    $this->organizationName = $organizationName;
  }
  /**
   * @return string
   */
  public function getOrganizationName()
  {
    return $this->organizationName;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setUserName($userName)
  {
    $this->userName = $userName;
  }
  /**
   * @return string
   */
  public function getUserName()
  {
    return $this->userName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1Developer::class, 'Google_Service_Apigee_GoogleCloudApigeeV1Developer');
