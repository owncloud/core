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

namespace Google\Service\Keep;

class Permission extends \Google\Model
{
  /**
   * @var bool
   */
  public $deleted;
  /**
   * @var string
   */
  public $email;
  protected $familyType = Family::class;
  protected $familyDataType = '';
  protected $groupType = Group::class;
  protected $groupDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $role;
  protected $userType = User::class;
  protected $userDataType = '';

  /**
   * @param bool
   */
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  /**
   * @return bool
   */
  public function getDeleted()
  {
    return $this->deleted;
  }
  /**
   * @param string
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }
  /**
   * @param Family
   */
  public function setFamily(Family $family)
  {
    $this->family = $family;
  }
  /**
   * @return Family
   */
  public function getFamily()
  {
    return $this->family;
  }
  /**
   * @param Group
   */
  public function setGroup(Group $group)
  {
    $this->group = $group;
  }
  /**
   * @return Group
   */
  public function getGroup()
  {
    return $this->group;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
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
  /**
   * @param User
   */
  public function setUser(User $user)
  {
    $this->user = $user;
  }
  /**
   * @return User
   */
  public function getUser()
  {
    return $this->user;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Permission::class, 'Google_Service_Keep_Permission');
