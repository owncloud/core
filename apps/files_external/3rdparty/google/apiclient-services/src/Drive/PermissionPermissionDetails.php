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

namespace Google\Service\Drive;

class PermissionPermissionDetails extends \Google\Model
{
  /**
   * @var bool
   */
  public $inherited;
  /**
   * @var string
   */
  public $inheritedFrom;
  /**
   * @var string
   */
  public $permissionType;
  /**
   * @var string
   */
  public $role;

  /**
   * @param bool
   */
  public function setInherited($inherited)
  {
    $this->inherited = $inherited;
  }
  /**
   * @return bool
   */
  public function getInherited()
  {
    return $this->inherited;
  }
  /**
   * @param string
   */
  public function setInheritedFrom($inheritedFrom)
  {
    $this->inheritedFrom = $inheritedFrom;
  }
  /**
   * @return string
   */
  public function getInheritedFrom()
  {
    return $this->inheritedFrom;
  }
  /**
   * @param string
   */
  public function setPermissionType($permissionType)
  {
    $this->permissionType = $permissionType;
  }
  /**
   * @return string
   */
  public function getPermissionType()
  {
    return $this->permissionType;
  }
  /**
   * @param string
   */
  public function setRole($role)
  {
    $this->role = $role;
  }
  /**
   * @return string
   */
  public function getRole()
  {
    return $this->role;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PermissionPermissionDetails::class, 'Google_Service_Drive_PermissionPermissionDetails');
