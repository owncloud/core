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

namespace Google\Service\Directory;

class AuxiliaryMessage extends \Google\Model
{
  /**
   * @var string
   */
  public $auxiliaryMessage;
  /**
   * @var string
   */
  public $fieldMask;
  /**
   * @var string
   */
  public $severity;

  /**
   * @param string
   */
  public function setAuxiliaryMessage($auxiliaryMessage)
  {
    $this->auxiliaryMessage = $auxiliaryMessage;
  }
  /**
   * @return string
   */
  public function getAuxiliaryMessage()
  {
    return $this->auxiliaryMessage;
  }
  /**
   * @param string
   */
  public function setFieldMask($fieldMask)
  {
    $this->fieldMask = $fieldMask;
  }
  /**
   * @return string
   */
  public function getFieldMask()
  {
    return $this->fieldMask;
  }
  /**
   * @param string
   */
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  /**
   * @return string
   */
  public function getSeverity()
  {
    return $this->severity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AuxiliaryMessage::class, 'Google_Service_Directory_AuxiliaryMessage');
