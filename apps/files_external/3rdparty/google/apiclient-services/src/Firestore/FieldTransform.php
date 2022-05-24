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

namespace Google\Service\Firestore;

class FieldTransform extends \Google\Model
{
  protected $appendMissingElementsType = ArrayValue::class;
  protected $appendMissingElementsDataType = '';
  /**
   * @var string
   */
  public $fieldPath;
  protected $incrementType = Value::class;
  protected $incrementDataType = '';
  protected $maximumType = Value::class;
  protected $maximumDataType = '';
  protected $minimumType = Value::class;
  protected $minimumDataType = '';
  protected $removeAllFromArrayType = ArrayValue::class;
  protected $removeAllFromArrayDataType = '';
  /**
   * @var string
   */
  public $setToServerValue;

  /**
   * @param ArrayValue
   */
  public function setAppendMissingElements(ArrayValue $appendMissingElements)
  {
    $this->appendMissingElements = $appendMissingElements;
  }
  /**
   * @return ArrayValue
   */
  public function getAppendMissingElements()
  {
    return $this->appendMissingElements;
  }
  /**
   * @param string
   */
  public function setFieldPath($fieldPath)
  {
    $this->fieldPath = $fieldPath;
  }
  /**
   * @return string
   */
  public function getFieldPath()
  {
    return $this->fieldPath;
  }
  /**
   * @param Value
   */
  public function setIncrement(Value $increment)
  {
    $this->increment = $increment;
  }
  /**
   * @return Value
   */
  public function getIncrement()
  {
    return $this->increment;
  }
  /**
   * @param Value
   */
  public function setMaximum(Value $maximum)
  {
    $this->maximum = $maximum;
  }
  /**
   * @return Value
   */
  public function getMaximum()
  {
    return $this->maximum;
  }
  /**
   * @param Value
   */
  public function setMinimum(Value $minimum)
  {
    $this->minimum = $minimum;
  }
  /**
   * @return Value
   */
  public function getMinimum()
  {
    return $this->minimum;
  }
  /**
   * @param ArrayValue
   */
  public function setRemoveAllFromArray(ArrayValue $removeAllFromArray)
  {
    $this->removeAllFromArray = $removeAllFromArray;
  }
  /**
   * @return ArrayValue
   */
  public function getRemoveAllFromArray()
  {
    return $this->removeAllFromArray;
  }
  /**
   * @param string
   */
  public function setSetToServerValue($setToServerValue)
  {
    $this->setToServerValue = $setToServerValue;
  }
  /**
   * @return string
   */
  public function getSetToServerValue()
  {
    return $this->setToServerValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FieldTransform::class, 'Google_Service_Firestore_FieldTransform');
