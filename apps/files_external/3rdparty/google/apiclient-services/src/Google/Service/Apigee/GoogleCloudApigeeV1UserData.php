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

class Google_Service_Apigee_GoogleCloudApigeeV1UserData extends Google_Collection
{
  protected $collection_key = 'customFieldValues';
  protected $customFieldValuesType = 'Google_Service_Apigee_GoogleCloudApigeeV1CustomFieldValue';
  protected $customFieldValuesDataType = 'array';
  public $email;
  public $id;
  public $isActive;
  public $lastLogonTime;
  public $lastModified;
  public $name;
  public $password;
  public $verified;

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
  public function setIsActive($isActive)
  {
    $this->isActive = $isActive;
  }
  public function getIsActive()
  {
    return $this->isActive;
  }
  public function setLastLogonTime($lastLogonTime)
  {
    $this->lastLogonTime = $lastLogonTime;
  }
  public function getLastLogonTime()
  {
    return $this->lastLogonTime;
  }
  public function setLastModified($lastModified)
  {
    $this->lastModified = $lastModified;
  }
  public function getLastModified()
  {
    return $this->lastModified;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPassword($password)
  {
    $this->password = $password;
  }
  public function getPassword()
  {
    return $this->password;
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
