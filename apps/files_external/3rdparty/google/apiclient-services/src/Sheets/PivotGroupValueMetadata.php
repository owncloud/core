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

namespace Google\Service\Sheets;

class PivotGroupValueMetadata extends \Google\Model
{
  public $collapsed;
  protected $valueType = ExtendedValue::class;
  protected $valueDataType = '';

  public function setCollapsed($collapsed)
  {
    $this->collapsed = $collapsed;
  }
  public function getCollapsed()
  {
    return $this->collapsed;
  }
  /**
   * @param ExtendedValue
   */
  public function setValue(ExtendedValue $value)
  {
    $this->value = $value;
  }
  /**
   * @return ExtendedValue
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PivotGroupValueMetadata::class, 'Google_Service_Sheets_PivotGroupValueMetadata');
