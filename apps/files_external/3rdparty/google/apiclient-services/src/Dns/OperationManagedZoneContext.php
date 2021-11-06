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

namespace Google\Service\Dns;

class OperationManagedZoneContext extends \Google\Model
{
  protected $newValueType = ManagedZone::class;
  protected $newValueDataType = '';
  protected $oldValueType = ManagedZone::class;
  protected $oldValueDataType = '';

  /**
   * @param ManagedZone
   */
  public function setNewValue(ManagedZone $newValue)
  {
    $this->newValue = $newValue;
  }
  /**
   * @return ManagedZone
   */
  public function getNewValue()
  {
    return $this->newValue;
  }
  /**
   * @param ManagedZone
   */
  public function setOldValue(ManagedZone $oldValue)
  {
    $this->oldValue = $oldValue;
  }
  /**
   * @return ManagedZone
   */
  public function getOldValue()
  {
    return $this->oldValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OperationManagedZoneContext::class, 'Google_Service_Dns_OperationManagedZoneContext');
