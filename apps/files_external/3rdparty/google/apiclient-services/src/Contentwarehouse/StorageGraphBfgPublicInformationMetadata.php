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

namespace Google\Service\Contentwarehouse;

class StorageGraphBfgPublicInformationMetadata extends \Google\Collection
{
  protected $collection_key = 'attributionUrl';
  /**
   * @var string[]
   */
  public $attributionUrl;
  /**
   * @var string
   */
  public $lastVerifiedDate;

  /**
   * @param string[]
   */
  public function setAttributionUrl($attributionUrl)
  {
    $this->attributionUrl = $attributionUrl;
  }
  /**
   * @return string[]
   */
  public function getAttributionUrl()
  {
    return $this->attributionUrl;
  }
  /**
   * @param string
   */
  public function setLastVerifiedDate($lastVerifiedDate)
  {
    $this->lastVerifiedDate = $lastVerifiedDate;
  }
  /**
   * @return string
   */
  public function getLastVerifiedDate()
  {
    return $this->lastVerifiedDate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StorageGraphBfgPublicInformationMetadata::class, 'Google_Service_Contentwarehouse_StorageGraphBfgPublicInformationMetadata');
