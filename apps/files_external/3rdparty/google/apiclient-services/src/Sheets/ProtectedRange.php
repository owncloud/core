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

class ProtectedRange extends \Google\Collection
{
  protected $collection_key = 'unprotectedRanges';
  public $description;
  protected $editorsType = Editors::class;
  protected $editorsDataType = '';
  public $namedRangeId;
  public $protectedRangeId;
  protected $rangeType = GridRange::class;
  protected $rangeDataType = '';
  public $requestingUserCanEdit;
  protected $unprotectedRangesType = GridRange::class;
  protected $unprotectedRangesDataType = 'array';
  public $warningOnly;

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Editors
   */
  public function setEditors(Editors $editors)
  {
    $this->editors = $editors;
  }
  /**
   * @return Editors
   */
  public function getEditors()
  {
    return $this->editors;
  }
  public function setNamedRangeId($namedRangeId)
  {
    $this->namedRangeId = $namedRangeId;
  }
  public function getNamedRangeId()
  {
    return $this->namedRangeId;
  }
  public function setProtectedRangeId($protectedRangeId)
  {
    $this->protectedRangeId = $protectedRangeId;
  }
  public function getProtectedRangeId()
  {
    return $this->protectedRangeId;
  }
  /**
   * @param GridRange
   */
  public function setRange(GridRange $range)
  {
    $this->range = $range;
  }
  /**
   * @return GridRange
   */
  public function getRange()
  {
    return $this->range;
  }
  public function setRequestingUserCanEdit($requestingUserCanEdit)
  {
    $this->requestingUserCanEdit = $requestingUserCanEdit;
  }
  public function getRequestingUserCanEdit()
  {
    return $this->requestingUserCanEdit;
  }
  /**
   * @param GridRange[]
   */
  public function setUnprotectedRanges($unprotectedRanges)
  {
    $this->unprotectedRanges = $unprotectedRanges;
  }
  /**
   * @return GridRange[]
   */
  public function getUnprotectedRanges()
  {
    return $this->unprotectedRanges;
  }
  public function setWarningOnly($warningOnly)
  {
    $this->warningOnly = $warningOnly;
  }
  public function getWarningOnly()
  {
    return $this->warningOnly;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProtectedRange::class, 'Google_Service_Sheets_ProtectedRange');
