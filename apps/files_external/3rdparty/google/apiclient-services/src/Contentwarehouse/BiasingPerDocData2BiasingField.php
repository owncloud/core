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

class BiasingPerDocData2BiasingField extends \Google\Model
{
  /**
   * @var string
   */
  public $compressedName;
  public $value;
  /**
   * @var int
   */
  public $valueFloat;
  /**
   * @var int
   */
  public $valueInt;

  /**
   * @param string
   */
  public function setCompressedName($compressedName)
  {
    $this->compressedName = $compressedName;
  }
  /**
   * @return string
   */
  public function getCompressedName()
  {
    return $this->compressedName;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
  /**
   * @param int
   */
  public function setValueFloat($valueFloat)
  {
    $this->valueFloat = $valueFloat;
  }
  /**
   * @return int
   */
  public function getValueFloat()
  {
    return $this->valueFloat;
  }
  /**
   * @param int
   */
  public function setValueInt($valueInt)
  {
    $this->valueInt = $valueInt;
  }
  /**
   * @return int
   */
  public function getValueInt()
  {
    return $this->valueInt;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BiasingPerDocData2BiasingField::class, 'Google_Service_Contentwarehouse_BiasingPerDocData2BiasingField');
