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

class UpdateSlicerSpecRequest extends \Google\Model
{
  public $fields;
  public $slicerId;
  protected $specType = SlicerSpec::class;
  protected $specDataType = '';

  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  public function getFields()
  {
    return $this->fields;
  }
  public function setSlicerId($slicerId)
  {
    $this->slicerId = $slicerId;
  }
  public function getSlicerId()
  {
    return $this->slicerId;
  }
  /**
   * @param SlicerSpec
   */
  public function setSpec(SlicerSpec $spec)
  {
    $this->spec = $spec;
  }
  /**
   * @return SlicerSpec
   */
  public function getSpec()
  {
    return $this->spec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateSlicerSpecRequest::class, 'Google_Service_Sheets_UpdateSlicerSpecRequest');
