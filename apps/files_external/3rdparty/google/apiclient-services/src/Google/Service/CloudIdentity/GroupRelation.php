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

class Google_Service_CloudIdentity_GroupRelation extends Google_Collection
{
  protected $collection_key = 'roles';
  public $displayName;
  public $group;
  protected $groupKeyType = 'Google_Service_CloudIdentity_EntityKey';
  protected $groupKeyDataType = '';
  public $labels;
  public $relationType;
  protected $rolesType = 'Google_Service_CloudIdentity_TransitiveMembershipRole';
  protected $rolesDataType = 'array';

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setGroup($group)
  {
    $this->group = $group;
  }
  public function getGroup()
  {
    return $this->group;
  }
  /**
   * @param Google_Service_CloudIdentity_EntityKey
   */
  public function setGroupKey(Google_Service_CloudIdentity_EntityKey $groupKey)
  {
    $this->groupKey = $groupKey;
  }
  /**
   * @return Google_Service_CloudIdentity_EntityKey
   */
  public function getGroupKey()
  {
    return $this->groupKey;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setRelationType($relationType)
  {
    $this->relationType = $relationType;
  }
  public function getRelationType()
  {
    return $this->relationType;
  }
  /**
   * @param Google_Service_CloudIdentity_TransitiveMembershipRole[]
   */
  public function setRoles($roles)
  {
    $this->roles = $roles;
  }
  /**
   * @return Google_Service_CloudIdentity_TransitiveMembershipRole[]
   */
  public function getRoles()
  {
    return $this->roles;
  }
}
