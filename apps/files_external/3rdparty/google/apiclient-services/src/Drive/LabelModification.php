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

class LabelModification extends \Google\Collection
{
  protected $collection_key = 'fieldModifications';
  protected $fieldModificationsType = LabelFieldModification::class;
  protected $fieldModificationsDataType = 'array';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $labelId;
  /**
   * @var bool
   */
  public $removeLabel;

  /**
   * @param LabelFieldModification[]
   */
  public function setFieldModifications($fieldModifications)
  {
    $this->fieldModifications = $fieldModifications;
  }
  /**
   * @return LabelFieldModification[]
   */
  public function getFieldModifications()
  {
    return $this->fieldModifications;
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
   * @param string
   */
  public function setLabelId($labelId)
  {
    $this->labelId = $labelId;
  }
  /**
   * @return string
   */
  public function getLabelId()
  {
    return $this->labelId;
  }
  /**
   * @param bool
   */
  public function setRemoveLabel($removeLabel)
  {
    $this->removeLabel = $removeLabel;
  }
  /**
   * @return bool
   */
  public function getRemoveLabel()
  {
    return $this->removeLabel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LabelModification::class, 'Google_Service_Drive_LabelModification');
