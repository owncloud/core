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

namespace Google\Service\Contentwarehouse;

class FocusBackendContactPointer extends \Google\Model
{
  /**
   * @var string
   */
  public $annotationId;
  protected $deviceRawContactIdType = FocusBackendDeviceRawContactId::class;
  protected $deviceRawContactIdDataType = '';
  /**
   * @var string
   */
  public $focusContactId;
  protected $otherContactIdType = FocusBackendOtherContactId::class;
  protected $otherContactIdDataType = '';
  protected $secondaryIdType = FocusBackendSecondaryContactId::class;
  protected $secondaryIdDataType = '';

  /**
   * @param string
   */
  public function setAnnotationId($annotationId)
  {
    $this->annotationId = $annotationId;
  }
  /**
   * @return string
   */
  public function getAnnotationId()
  {
    return $this->annotationId;
  }
  /**
   * @param FocusBackendDeviceRawContactId
   */
  public function setDeviceRawContactId(FocusBackendDeviceRawContactId $deviceRawContactId)
  {
    $this->deviceRawContactId = $deviceRawContactId;
  }
  /**
   * @return FocusBackendDeviceRawContactId
   */
  public function getDeviceRawContactId()
  {
    return $this->deviceRawContactId;
  }
  /**
   * @param string
   */
  public function setFocusContactId($focusContactId)
  {
    $this->focusContactId = $focusContactId;
  }
  /**
   * @return string
   */
  public function getFocusContactId()
  {
    return $this->focusContactId;
  }
  /**
   * @param FocusBackendOtherContactId
   */
  public function setOtherContactId(FocusBackendOtherContactId $otherContactId)
  {
    $this->otherContactId = $otherContactId;
  }
  /**
   * @return FocusBackendOtherContactId
   */
  public function getOtherContactId()
  {
    return $this->otherContactId;
  }
  /**
   * @param FocusBackendSecondaryContactId
   */
  public function setSecondaryId(FocusBackendSecondaryContactId $secondaryId)
  {
    $this->secondaryId = $secondaryId;
  }
  /**
   * @return FocusBackendSecondaryContactId
   */
  public function getSecondaryId()
  {
    return $this->secondaryId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FocusBackendContactPointer::class, 'Google_Service_Contentwarehouse_FocusBackendContactPointer');
