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

namespace Google\Service\Compute;

class NodeGroupsScopedList extends \Google\Collection
{
  protected $collection_key = 'nodeGroups';
  protected $nodeGroupsType = NodeGroup::class;
  protected $nodeGroupsDataType = 'array';
  protected $warningType = NodeGroupsScopedListWarning::class;
  protected $warningDataType = '';

  /**
   * @param NodeGroup[]
   */
  public function setNodeGroups($nodeGroups)
  {
    $this->nodeGroups = $nodeGroups;
  }
  /**
   * @return NodeGroup[]
   */
  public function getNodeGroups()
  {
    return $this->nodeGroups;
  }
  /**
   * @param NodeGroupsScopedListWarning
   */
  public function setWarning(NodeGroupsScopedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return NodeGroupsScopedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NodeGroupsScopedList::class, 'Google_Service_Compute_NodeGroupsScopedList');
