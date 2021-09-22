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

class UpdateMembershipRolesParams extends \Google\Model
{
  public $fieldMask;
  protected $membershipRoleType = MembershipRole::class;
  protected $membershipRoleDataType = '';

  public function setFieldMask($fieldMask)
  {
    $this->fieldMask = $fieldMask;
  }
  public function getFieldMask()
  {
    return $this->fieldMask;
  }
  /**
   * @param MembershipRole
   */
  public function setMembershipRole(MembershipRole $membershipRole)
  {
    $this->membershipRole = $membershipRole;
  }
  /**
   * @return MembershipRole
   */
  public function getMembershipRole()
  {
    return $this->membershipRole;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateMembershipRolesParams::class, 'Google_Service_CloudIdentity_UpdateMembershipRolesParams');
