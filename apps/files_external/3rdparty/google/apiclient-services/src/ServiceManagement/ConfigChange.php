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

namespace Google\Service\ServiceManagement;

class ConfigChange extends \Google\Collection
{
  protected $collection_key = 'advices';
  protected $advicesType = Advice::class;
  protected $advicesDataType = 'array';
  public $changeType;
  public $element;
  public $newValue;
  public $oldValue;

  /**
   * @param Advice[]
   */
  public function setAdvices($advices)
  {
    $this->advices = $advices;
  }
  /**
   * @return Advice[]
   */
  public function getAdvices()
  {
    return $this->advices;
  }
  public function setChangeType($changeType)
  {
    $this->changeType = $changeType;
  }
  public function getChangeType()
  {
    return $this->changeType;
  }
  public function setElement($element)
  {
    $this->element = $element;
  }
  public function getElement()
  {
    return $this->element;
  }
  public function setNewValue($newValue)
  {
    $this->newValue = $newValue;
  }
  public function getNewValue()
  {
    return $this->newValue;
  }
  public function setOldValue($oldValue)
  {
    $this->oldValue = $oldValue;
  }
  public function getOldValue()
  {
    return $this->oldValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConfigChange::class, 'Google_Service_ServiceManagement_ConfigChange');
