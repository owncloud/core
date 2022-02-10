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

class GroupRelation extends \Google\Collection
{
  protected $collection_key = 'roles';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $group;
  protected $groupKeyType = EntityKey::class;
  protected $groupKeyDataType = '';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $relationType;
  protected $rolesType = TransitiveMembershipRole::class;
  protected $rolesDataType = 'array';

  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setGroup($group)
  {
    $this->group = $group;
  }
  /**
   * @return string
   */
  public function getGroup()
  {
    return $this->group;
  }
  /**
   * @param EntityKey
   */
  public function setGroupKey(EntityKey $groupKey)
  {
    $this->groupKey = $groupKey;
  }
  /**
   * @return EntityKey
   */
  public function getGroupKey()
  {
    return $this->groupKey;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setRelationType($relationType)
  {
    $this->relationType = $relationType;
  }
  /**
   * @return string
   */
  public function getRelationType()
  {
    return $this->relationType;
  }
  /**
   * @param TransitiveMembershipRole[]
   */
  public function setRoles($roles)
  {
    $this->roles = $roles;
  }
  /**
   * @return TransitiveMembershipRole[]
   */
  public function getRoles()
  {
    return $this->roles;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GroupRelation::class, 'Google_Service_CloudIdentity_GroupRelation');
