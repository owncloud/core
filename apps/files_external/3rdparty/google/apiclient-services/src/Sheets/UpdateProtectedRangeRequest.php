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

class UpdateProtectedRangeRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $fields;
  protected $protectedRangeType = ProtectedRange::class;
  protected $protectedRangeDataType = '';

  /**
   * @param string
   */
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  /**
   * @return string
   */
  public function getFields()
  {
    return $this->fields;
  }
  /**
   * @param ProtectedRange
   */
  public function setProtectedRange(ProtectedRange $protectedRange)
  {
    $this->protectedRange = $protectedRange;
  }
  /**
   * @return ProtectedRange
   */
  public function getProtectedRange()
  {
    return $this->protectedRange;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateProtectedRangeRequest::class, 'Google_Service_Sheets_UpdateProtectedRangeRequest');
