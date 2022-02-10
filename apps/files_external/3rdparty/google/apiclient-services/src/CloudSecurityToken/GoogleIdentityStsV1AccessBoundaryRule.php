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

namespace Google\Service\CloudSecurityToken;

class GoogleIdentityStsV1AccessBoundaryRule extends \Google\Collection
{
  protected $collection_key = 'availablePermissions';
  protected $availabilityConditionType = GoogleTypeExpr::class;
  protected $availabilityConditionDataType = '';
  /**
   * @var string[]
   */
  public $availablePermissions;
  /**
   * @var string
   */
  public $availableResource;

  /**
   * @param GoogleTypeExpr
   */
  public function setAvailabilityCondition(GoogleTypeExpr $availabilityCondition)
  {
    $this->availabilityCondition = $availabilityCondition;
  }
  /**
   * @return GoogleTypeExpr
   */
  public function getAvailabilityCondition()
  {
    return $this->availabilityCondition;
  }
  /**
   * @param string[]
   */
  public function setAvailablePermissions($availablePermissions)
  {
    $this->availablePermissions = $availablePermissions;
  }
  /**
   * @return string[]
   */
  public function getAvailablePermissions()
  {
    return $this->availablePermissions;
  }
  /**
   * @param string
   */
  public function setAvailableResource($availableResource)
  {
    $this->availableResource = $availableResource;
  }
  /**
   * @return string
   */
  public function getAvailableResource()
  {
    return $this->availableResource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleIdentityStsV1AccessBoundaryRule::class, 'Google_Service_CloudSecurityToken_GoogleIdentityStsV1AccessBoundaryRule');
