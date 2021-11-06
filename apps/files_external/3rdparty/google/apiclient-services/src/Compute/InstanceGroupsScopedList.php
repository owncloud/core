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

class InstanceGroupsScopedList extends \Google\Collection
{
  protected $collection_key = 'instanceGroups';
  protected $instanceGroupsType = InstanceGroup::class;
  protected $instanceGroupsDataType = 'array';
  protected $warningType = InstanceGroupsScopedListWarning::class;
  protected $warningDataType = '';

  /**
   * @param InstanceGroup[]
   */
  public function setInstanceGroups($instanceGroups)
  {
    $this->instanceGroups = $instanceGroups;
  }
  /**
   * @return InstanceGroup[]
   */
  public function getInstanceGroups()
  {
    return $this->instanceGroups;
  }
  /**
   * @param InstanceGroupsScopedListWarning
   */
  public function setWarning(InstanceGroupsScopedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return InstanceGroupsScopedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceGroupsScopedList::class, 'Google_Service_Compute_InstanceGroupsScopedList');
