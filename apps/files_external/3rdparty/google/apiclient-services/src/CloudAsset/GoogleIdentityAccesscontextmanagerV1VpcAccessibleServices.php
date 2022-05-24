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

namespace Google\Service\CloudAsset;

class GoogleIdentityAccesscontextmanagerV1VpcAccessibleServices extends \Google\Collection
{
  protected $collection_key = 'allowedServices';
  /**
   * @var string[]
   */
  public $allowedServices;
  /**
   * @var bool
   */
  public $enableRestriction;

  /**
   * @param string[]
   */
  public function setAllowedServices($allowedServices)
  {
    $this->allowedServices = $allowedServices;
  }
  /**
   * @return string[]
   */
  public function getAllowedServices()
  {
    return $this->allowedServices;
  }
  /**
   * @param bool
   */
  public function setEnableRestriction($enableRestriction)
  {
    $this->enableRestriction = $enableRestriction;
  }
  /**
   * @return bool
   */
  public function getEnableRestriction()
  {
    return $this->enableRestriction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleIdentityAccesscontextmanagerV1VpcAccessibleServices::class, 'Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1VpcAccessibleServices');
