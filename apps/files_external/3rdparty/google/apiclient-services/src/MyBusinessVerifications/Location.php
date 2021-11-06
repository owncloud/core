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

namespace Google\Service\MyBusinessVerifications;

class Location extends \Google\Model
{
  protected $addressType = PostalAddress::class;
  protected $addressDataType = '';
  public $name;
  public $primaryCategoryId;
  public $primaryPhone;
  public $websiteUri;

  /**
   * @param PostalAddress
   */
  public function setAddress(PostalAddress $address)
  {
    $this->address = $address;
  }
  /**
   * @return PostalAddress
   */
  public function getAddress()
  {
    return $this->address;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPrimaryCategoryId($primaryCategoryId)
  {
    $this->primaryCategoryId = $primaryCategoryId;
  }
  public function getPrimaryCategoryId()
  {
    return $this->primaryCategoryId;
  }
  public function setPrimaryPhone($primaryPhone)
  {
    $this->primaryPhone = $primaryPhone;
  }
  public function getPrimaryPhone()
  {
    return $this->primaryPhone;
  }
  public function setWebsiteUri($websiteUri)
  {
    $this->websiteUri = $websiteUri;
  }
  public function getWebsiteUri()
  {
    return $this->websiteUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Location::class, 'Google_Service_MyBusinessVerifications_Location');
