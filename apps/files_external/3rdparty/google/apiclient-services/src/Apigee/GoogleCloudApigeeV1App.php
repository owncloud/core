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

class GoogleCloudApigeeV1App extends \Google\Collection
{
  protected $collection_key = 'scopes';
  protected $apiProductsType = GoogleCloudApigeeV1ApiProductRef::class;
  protected $apiProductsDataType = 'array';
  public $appId;
  protected $attributesType = GoogleCloudApigeeV1Attribute::class;
  protected $attributesDataType = 'array';
  public $callbackUrl;
  public $companyName;
  public $createdAt;
  protected $credentialsType = GoogleCloudApigeeV1Credential::class;
  protected $credentialsDataType = 'array';
  public $developerId;
  public $keyExpiresIn;
  public $lastModifiedAt;
  public $name;
  public $scopes;
  public $status;

  /**
   * @param GoogleCloudApigeeV1ApiProductRef[]
   */
  public function setApiProducts($apiProducts)
  {
    $this->apiProducts = $apiProducts;
  }
  /**
   * @return GoogleCloudApigeeV1ApiProductRef[]
   */
  public function getApiProducts()
  {
    return $this->apiProducts;
  }
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  public function getAppId()
  {
    return $this->appId;
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
  public function setCallbackUrl($callbackUrl)
  {
    $this->callbackUrl = $callbackUrl;
  }
  public function getCallbackUrl()
  {
    return $this->callbackUrl;
  }
  public function setCompanyName($companyName)
  {
    $this->companyName = $companyName;
  }
  public function getCompanyName()
  {
    return $this->companyName;
  }
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  /**
   * @param GoogleCloudApigeeV1Credential[]
   */
  public function setCredentials($credentials)
  {
    $this->credentials = $credentials;
  }
  /**
   * @return GoogleCloudApigeeV1Credential[]
   */
  public function getCredentials()
  {
    return $this->credentials;
  }
  public function setDeveloperId($developerId)
  {
    $this->developerId = $developerId;
  }
  public function getDeveloperId()
  {
    return $this->developerId;
  }
  public function setKeyExpiresIn($keyExpiresIn)
  {
    $this->keyExpiresIn = $keyExpiresIn;
  }
  public function getKeyExpiresIn()
  {
    return $this->keyExpiresIn;
  }
  public function setLastModifiedAt($lastModifiedAt)
  {
    $this->lastModifiedAt = $lastModifiedAt;
  }
  public function getLastModifiedAt()
  {
    return $this->lastModifiedAt;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setScopes($scopes)
  {
    $this->scopes = $scopes;
  }
  public function getScopes()
  {
    return $this->scopes;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1App::class, 'Google_Service_Apigee_GoogleCloudApigeeV1App');
