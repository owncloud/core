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
  /**
   * @var string
   */
  public $description;
  protected $editorsType = Editors::class;
  protected $editorsDataType = '';
  /**
   * @var string
   */
  public $namedRangeId;
  /**
   * @var int
   */
  public $protectedRangeId;
  protected $rangeType = GridRange::class;
  protected $rangeDataType = '';
  /**
   * @var bool
   */
  public $requestingUserCanEdit;
  protected $unprotectedRangesType = GridRange::class;
  protected $unprotectedRangesDataType = 'array';
  /**
   * @var bool
   */
  public $warningOnly;

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setNamedRangeId($namedRangeId)
  {
    $this->namedRangeId = $namedRangeId;
  }
  /**
   * @return string
   */
  public function getNamedRangeId()
  {
    return $this->namedRangeId;
  }
  /**
   * @param int
   */
  public function setProtectedRangeId($protectedRangeId)
  {
    $this->protectedRangeId = $protectedRangeId;
  }
  /**
   * @return int
   */
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
  /**
   * @param bool
   */
  public function setRequestingUserCanEdit($requestingUserCanEdit)
  {
    $this->requestingUserCanEdit = $requestingUserCanEdit;
  }
  /**
   * @return bool
   */
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
  /**
   * @param bool
   */
  public function setWarningOnly($warningOnly)
  {
    $this->warningOnly = $warningOnly;
  }
  /**
   * @return bool
   */
  public function getWarningOnly()
  {
    return $this->warningOnly;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProtectedRange::class, 'Google_Service_Sheets_ProtectedRange');
