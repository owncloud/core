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

class Google_Service_Apigee_GoogleCloudApigeeV1CompanyAppKey extends Google_Collection
{
  protected $collection_key = 'scopes';
  public $apiProducts;
  protected $attributesType = 'Google_Service_Apigee_GoogleCloudApigeeV1Attribute';
  protected $attributesDataType = 'array';
  public $consumerKey;
  public $consumerSecret;
  public $expiresAt;
  public $issuedAt;
  public $scopes;
  public $status;

  public function setApiProducts($apiProducts)
  {
    $this->apiProducts = $apiProducts;
  }
  public function getApiProducts()
  {
    return $this->apiProducts;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Attribute
   */
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Attribute
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  public function setConsumerKey($consumerKey)
  {
    $this->consumerKey = $consumerKey;
  }
  public function getConsumerKey()
  {
    return $this->consumerKey;
  }
  public function setConsumerSecret($consumerSecret)
  {
    $this->consumerSecret = $consumerSecret;
  }
  public function getConsumerSecret()
  {
    return $this->consumerSecret;
  }
  public function setExpiresAt($expiresAt)
  {
    $this->expiresAt = $expiresAt;
  }
  public function getExpiresAt()
  {
    return $this->expiresAt;
  }
  public function setIssuedAt($issuedAt)
  {
    $this->issuedAt = $issuedAt;
  }
  public function getIssuedAt()
  {
    return $this->issuedAt;
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
