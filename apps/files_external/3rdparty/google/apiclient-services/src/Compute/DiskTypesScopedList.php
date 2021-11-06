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

class DiskTypesScopedList extends \Google\Collection
{
  protected $collection_key = 'diskTypes';
  protected $diskTypesType = DiskType::class;
  protected $diskTypesDataType = 'array';
  protected $warningType = DiskTypesScopedListWarning::class;
  protected $warningDataType = '';

  /**
   * @param DiskType[]
   */
  public function setDiskTypes($diskTypes)
  {
    $this->diskTypes = $diskTypes;
  }
  /**
   * @return DiskType[]
   */
  public function getDiskTypes()
  {
    return $this->diskTypes;
  }
  /**
   * @param DiskTypesScopedListWarning
   */
  public function setWarning(DiskTypesScopedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return DiskTypesScopedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DiskTypesScopedList::class, 'Google_Service_Compute_DiskTypesScopedList');
