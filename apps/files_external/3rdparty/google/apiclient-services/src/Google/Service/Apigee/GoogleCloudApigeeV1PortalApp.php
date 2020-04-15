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

class Google_Service_Apigee_GoogleCloudApigeeV1PortalApp extends Google_Collection
{
  protected $collection_key = 'credentials';
  protected $apiProductsType = 'Google_Service_Apigee_GoogleCloudApigeeV1ApiProductRef';
  protected $apiProductsDataType = 'array';
  protected $apiProductsFromCredentialsType = 'Google_Service_Apigee_GoogleCloudApigeeV1Credential';
  protected $apiProductsFromCredentialsDataType = 'array';
  public $callbackUrl;
  public $created;
  protected $credentialsType = 'Google_Service_Apigee_GoogleCloudApigeeV1Credential';
  protected $credentialsDataType = 'array';
  public $description;
  public $displayName;
  public $id;
  public $modified;
  public $name;
  public $owner;
  public $ownerType;
  public $status;

  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ApiProductRef
   */
  public function setApiProducts($apiProducts)
  {
    $this->apiProducts = $apiProducts;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiProductRef
   */
  public function getApiProducts()
  {
    return $this->apiProducts;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Credential
   */
  public function setApiProductsFromCredentials($apiProductsFromCredentials)
  {
    $this->apiProductsFromCredentials = $apiProductsFromCredentials;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Credential
   */
  public function getApiProductsFromCredentials()
  {
    return $this->apiProductsFromCredentials;
  }
  public function setCallbackUrl($callbackUrl)
  {
    $this->callbackUrl = $callbackUrl;
  }
  public function getCallbackUrl()
  {
    return $this->callbackUrl;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Credential
   */
  public function setCredentials($credentials)
  {
    $this->credentials = $credentials;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Credential
   */
  public function getCredentials()
  {
    return $this->credentials;
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
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setModified($modified)
  {
    $this->modified = $modified;
  }
  public function getModified()
  {
    return $this->modified;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOwner($owner)
  {
    $this->owner = $owner;
  }
  public function getOwner()
  {
    return $this->owner;
  }
  public function setOwnerType($ownerType)
  {
    $this->ownerType = $ownerType;
  }
  public function getOwnerType()
  {
    return $this->ownerType;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}
