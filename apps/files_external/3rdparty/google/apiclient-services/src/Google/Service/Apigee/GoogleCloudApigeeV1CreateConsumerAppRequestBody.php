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

class Google_Service_Apigee_GoogleCloudApigeeV1CreateConsumerAppRequestBody extends Google_Collection
{
  protected $collection_key = 'attributes';
  public $apiProducts;
  protected $attributesType = 'Google_Service_Apigee_GoogleCloudApigeeV1Attribute';
  protected $attributesDataType = 'array';
  public $callbackUrl;
  public $description;
  public $name;
  public $owner;
  public $ownerType;

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
  public function setCallbackUrl($callbackUrl)
  {
    $this->callbackUrl = $callbackUrl;
  }
  public function getCallbackUrl()
  {
    return $this->callbackUrl;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
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
}
