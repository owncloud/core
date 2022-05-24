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

class GetMembershipGraphResponse extends \Google\Collection
{
  protected $collection_key = 'groups';
  protected $adjacencyListType = MembershipAdjacencyList::class;
  protected $adjacencyListDataType = 'array';
  protected $groupsType = Group::class;
  protected $groupsDataType = 'array';

  /**
   * @param MembershipAdjacencyList[]
   */
  public function setAdjacencyList($adjacencyList)
  {
    $this->adjacencyList = $adjacencyList;
  }
  /**
   * @return MembershipAdjacencyList[]
   */
  public function getAdjacencyList()
  {
    return $this->adjacencyList;
  }
  /**
   * @param Group[]
   */
  public function setGroups($groups)
  {
    $this->groups = $groups;
  }
  /**
   * @return Group[]
   */
  public function getGroups()
  {
    return $this->groups;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GetMembershipGraphResponse::class, 'Google_Service_CloudIdentity_GetMembershipGraphResponse');
