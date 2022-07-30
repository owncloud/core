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

namespace Google\Service\Drive;

class LabelFieldModification extends \Google\Collection
{
  protected $collection_key = 'setUserValues';
  /**
   * @var string
   */
  public $fieldId;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string[]
   */
  public $setDateValues;
  /**
   * @var string[]
   */
  public $setIntegerValues;
  /**
   * @var string[]
   */
  public $setSelectionValues;
  /**
   * @var string[]
   */
  public $setTextValues;
  /**
   * @var string[]
   */
  public $setUserValues;
  /**
   * @var bool
   */
  public $unsetValues;

  /**
   * @param string
   */
  public function setFieldId($fieldId)
  {
    $this->fieldId = $fieldId;
  }
  /**
   * @return string
   */
  public function getFieldId()
  {
    return $this->fieldId;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string[]
   */
  public function setSetDateValues($setDateValues)
  {
    $this->setDateValues = $setDateValues;
  }
  /**
   * @return string[]
   */
  public function getSetDateValues()
  {
    return $this->setDateValues;
  }
  /**
   * @param string[]
   */
  public function setSetIntegerValues($setIntegerValues)
  {
    $this->setIntegerValues = $setIntegerValues;
  }
  /**
   * @return string[]
   */
  public function getSetIntegerValues()
  {
    return $this->setIntegerValues;
  }
  /**
   * @param string[]
   */
  public function setSetSelectionValues($setSelectionValues)
  {
    $this->setSelectionValues = $setSelectionValues;
  }
  /**
   * @return string[]
   */
  public function getSetSelectionValues()
  {
    return $this->setSelectionValues;
  }
  /**
   * @param string[]
   */
  public function setSetTextValues($setTextValues)
  {
    $this->setTextValues = $setTextValues;
  }
  /**
   * @return string[]
   */
  public function getSetTextValues()
  {
    return $this->setTextValues;
  }
  /**
   * @param string[]
   */
  public function setSetUserValues($setUserValues)
  {
    $this->setUserValues = $setUserValues;
  }
  /**
   * @return string[]
   */
  public function getSetUserValues()
  {
    return $this->setUserValues;
  }
  /**
   * @param bool
   */
  public function setUnsetValues($unsetValues)
  {
    $this->unsetValues = $unsetValues;
  }
  /**
   * @return bool
   */
  public function getUnsetValues()
  {
    return $this->unsetValues;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LabelFieldModification::class, 'Google_Service_Drive_LabelFieldModification');
