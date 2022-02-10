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

namespace Google\Service\Dfareporting;

class AccountPermission extends \Google\Collection
{
  protected $collection_key = 'accountProfiles';
  /**
   * @var string[]
   */
  public $accountProfiles;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $level;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $permissionGroupId;

  /**
   * @param string[]
   */
  public function setAccountProfiles($accountProfiles)
  {
    $this->accountProfiles = $accountProfiles;
  }
  /**
   * @return string[]
   */
  public function getAccountProfiles()
  {
    return $this->accountProfiles;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
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
  public function setLevel($level)
  {
    $this->level = $level;
  }
  /**
   * @return string
   */
  public function getLevel()
  {
    return $this->level;
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
  public function setPermissionGroupId($permissionGroupId)
  {
    $this->permissionGroupId = $permissionGroupId;
  }
  /**
   * @return string
   */
  public function getPermissionGroupId()
  {
    return $this->permissionGroupId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountPermission::class, 'Google_Service_Dfareporting_AccountPermission');
