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

namespace Google\Service\Iam;

class Permission extends \Google\Model
{
  /**
   * @var bool
   */
  public $apiDisabled;
  /**
   * @var string
   */
  public $customRolesSupportLevel;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $onlyInPredefinedRoles;
  /**
   * @var string
   */
  public $primaryPermission;
  /**
   * @var string
   */
  public $stage;
  /**
   * @var string
   */
  public $title;

  /**
   * @param bool
   */
  public function setApiDisabled($apiDisabled)
  {
    $this->apiDisabled = $apiDisabled;
  }
  /**
   * @return bool
   */
  public function getApiDisabled()
  {
    return $this->apiDisabled;
  }
  /**
   * @param string
   */
  public function setCustomRolesSupportLevel($customRolesSupportLevel)
  {
    $this->customRolesSupportLevel = $customRolesSupportLevel;
  }
  /**
   * @return string
   */
  public function getCustomRolesSupportLevel()
  {
    return $this->customRolesSupportLevel;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
   * @param bool
   */
  public function setOnlyInPredefinedRoles($onlyInPredefinedRoles)
  {
    $this->onlyInPredefinedRoles = $onlyInPredefinedRoles;
  }
  /**
   * @return bool
   */
  public function getOnlyInPredefinedRoles()
  {
    return $this->onlyInPredefinedRoles;
  }
  /**
   * @param string
   */
  public function setPrimaryPermission($primaryPermission)
  {
    $this->primaryPermission = $primaryPermission;
  }
  /**
   * @return string
   */
  public function getPrimaryPermission()
  {
    return $this->primaryPermission;
  }
  /**
   * @param string
   */
  public function setStage($stage)
  {
    $this->stage = $stage;
  }
  /**
   * @return string
   */
  public function getStage()
  {
    return $this->stage;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Permission::class, 'Google_Service_Iam_Permission');
