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

namespace Google\Service\CloudIdentity;

class ModifyMembershipRolesRequest extends \Google\Collection
{
  protected $collection_key = 'updateRolesParams';
  protected $addRolesType = MembershipRole::class;
  protected $addRolesDataType = 'array';
  /**
   * @var string[]
   */
  public $removeRoles;
  protected $updateRolesParamsType = UpdateMembershipRolesParams::class;
  protected $updateRolesParamsDataType = 'array';

  /**
   * @param MembershipRole[]
   */
  public function setAddRoles($addRoles)
  {
    $this->addRoles = $addRoles;
  }
  /**
   * @return MembershipRole[]
   */
  public function getAddRoles()
  {
    return $this->addRoles;
  }
  /**
   * @param string[]
   */
  public function setRemoveRoles($removeRoles)
  {
    $this->removeRoles = $removeRoles;
  }
  /**
   * @return string[]
   */
  public function getRemoveRoles()
  {
    return $this->removeRoles;
  }
  /**
   * @param UpdateMembershipRolesParams[]
   */
  public function setUpdateRolesParams($updateRolesParams)
  {
    $this->updateRolesParams = $updateRolesParams;
  }
  /**
   * @return UpdateMembershipRolesParams[]
   */
  public function getUpdateRolesParams()
  {
    return $this->updateRolesParams;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ModifyMembershipRolesRequest::class, 'Google_Service_CloudIdentity_ModifyMembershipRolesRequest');
