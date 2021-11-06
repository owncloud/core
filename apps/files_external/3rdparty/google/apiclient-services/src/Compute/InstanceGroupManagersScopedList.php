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

class InstanceGroupManagersScopedList extends \Google\Collection
{
  protected $collection_key = 'instanceGroupManagers';
  protected $instanceGroupManagersType = InstanceGroupManager::class;
  protected $instanceGroupManagersDataType = 'array';
  protected $warningType = InstanceGroupManagersScopedListWarning::class;
  protected $warningDataType = '';

  /**
   * @param InstanceGroupManager[]
   */
  public function setInstanceGroupManagers($instanceGroupManagers)
  {
    $this->instanceGroupManagers = $instanceGroupManagers;
  }
  /**
   * @return InstanceGroupManager[]
   */
  public function getInstanceGroupManagers()
  {
    return $this->instanceGroupManagers;
  }
  /**
   * @param InstanceGroupManagersScopedListWarning
   */
  public function setWarning(InstanceGroupManagersScopedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return InstanceGroupManagersScopedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceGroupManagersScopedList::class, 'Google_Service_Compute_InstanceGroupManagersScopedList');
