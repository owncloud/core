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

class TargetInstancesScopedList extends \Google\Collection
{
  protected $collection_key = 'targetInstances';
  protected $targetInstancesType = TargetInstance::class;
  protected $targetInstancesDataType = 'array';
  protected $warningType = TargetInstancesScopedListWarning::class;
  protected $warningDataType = '';

  /**
   * @param TargetInstance[]
   */
  public function setTargetInstances($targetInstances)
  {
    $this->targetInstances = $targetInstances;
  }
  /**
   * @return TargetInstance[]
   */
  public function getTargetInstances()
  {
    return $this->targetInstances;
  }
  /**
   * @param TargetInstancesScopedListWarning
   */
  public function setWarning(TargetInstancesScopedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return TargetInstancesScopedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetInstancesScopedList::class, 'Google_Service_Compute_TargetInstancesScopedList');
