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

class GoogleCloudApigeeV1Credential extends \Google\Collection
{
  protected $collection_key = 'scopes';
  protected $apiProductsType = GoogleCloudApigeeV1ApiProductRef::class;
  protected $apiProductsDataType = 'array';
  protected $attributesType = GoogleCloudApigeeV1Attribute::class;
  protected $attributesDataType = 'array';
  /**
   * @var string
   */
  public $consumerKey;
  /**
   * @var string
   */
  public $consumerSecret;
  /**
   * @var string
   */
  public $expiresAt;
  /**
   * @var string
   */
  public $issuedAt;
  /**
   * @var string[]
   */
  public $scopes;
  /**
   * @var string
   */
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
   * @param string
   */
  public function setConsumerKey($consumerKey)
  {
    $this->consumerKey = $consumerKey;
  }
  /**
   * @return string
   */
  public function getConsumerKey()
  {
    return $this->consumerKey;
  }
  /**
   * @param string
   */
  public function setConsumerSecret($consumerSecret)
  {
    $this->consumerSecret = $consumerSecret;
  }
  /**
   * @return string
   */
  public function getConsumerSecret()
  {
    return $this->consumerSecret;
  }
  /**
   * @param string
   */
  public function setExpiresAt($expiresAt)
  {
    $this->expiresAt = $expiresAt;
  }
  /**
   * @return string
   */
  public function getExpiresAt()
  {
    return $this->expiresAt;
  }
  /**
   * @param string
   */
  public function setIssuedAt($issuedAt)
  {
    $this->issuedAt = $issuedAt;
  }
  /**
   * @return string
   */
  public function getIssuedAt()
  {
    return $this->issuedAt;
  }
  /**
   * @param string[]
   */
  public function setScopes($scopes)
  {
    $this->scopes = $scopes;
  }
  /**
   * @return string[]
   */
  public function getScopes()
  {
    return $this->scopes;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1Credential::class, 'Google_Service_Apigee_GoogleCloudApigeeV1Credential');
