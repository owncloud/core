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

class Google_Service_CloudIdentity_ModifyMembershipRolesRequest extends Google_Collection
{
  protected $collection_key = 'updateRolesParams';
  protected $addRolesType = 'Google_Service_CloudIdentity_MembershipRole';
  protected $addRolesDataType = 'array';
  public $removeRoles;
  protected $updateRolesParamsType = 'Google_Service_CloudIdentity_UpdateMembershipRolesParams';
  protected $updateRolesParamsDataType = 'array';

  /**
   * @param Google_Service_CloudIdentity_MembershipRole[]
   */
  public function setAddRoles($addRoles)
  {
    $this->addRoles = $addRoles;
  }
  /**
   * @return Google_Service_CloudIdentity_MembershipRole[]
   */
  public function getAddRoles()
  {
    return $this->addRoles;
  }
  public function setRemoveRoles($removeRoles)
  {
    $this->removeRoles = $removeRoles;
  }
  public function getRemoveRoles()
  {
    return $this->removeRoles;
  }
  /**
   * @param Google_Service_CloudIdentity_UpdateMembershipRolesParams[]
   */
  public function setUpdateRolesParams($updateRolesParams)
  {
    $this->updateRolesParams = $updateRolesParams;
  }
  /**
   * @return Google_Service_CloudIdentity_UpdateMembershipRolesParams[]
   */
  public function getUpdateRolesParams()
  {
    return $this->updateRolesParams;
  }
}
