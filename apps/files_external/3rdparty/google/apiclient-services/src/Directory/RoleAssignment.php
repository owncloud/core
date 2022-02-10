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

namespace Google\Service\Directory;

class RoleAssignment extends \Google\Model
{
  /**
   * @var string
   */
  public $assignedTo;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $orgUnitId;
  /**
   * @var string
   */
  public $roleAssignmentId;
  /**
   * @var string
   */
  public $roleId;
  /**
   * @var string
   */
  public $scopeType;

  /**
   * @param string
   */
  public function setAssignedTo($assignedTo)
  {
    $this->assignedTo = $assignedTo;
  }
  /**
   * @return string
   */
  public function getAssignedTo()
  {
    return $this->assignedTo;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setOrgUnitId($orgUnitId)
  {
    $this->orgUnitId = $orgUnitId;
  }
  /**
   * @return string
   */
  public function getOrgUnitId()
  {
    return $this->orgUnitId;
  }
  /**
   * @param string
   */
  public function setRoleAssignmentId($roleAssignmentId)
  {
    $this->roleAssignmentId = $roleAssignmentId;
  }
  /**
   * @return string
   */
  public function getRoleAssignmentId()
  {
    return $this->roleAssignmentId;
  }
  /**
   * @param string
   */
  public function setRoleId($roleId)
  {
    $this->roleId = $roleId;
  }
  /**
   * @return string
   */
  public function getRoleId()
  {
    return $this->roleId;
  }
  /**
   * @param string
   */
  public function setScopeType($scopeType)
  {
    $this->scopeType = $scopeType;
  }
  /**
   * @return string
   */
  public function getScopeType()
  {
    return $this->scopeType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RoleAssignment::class, 'Google_Service_Directory_RoleAssignment');
