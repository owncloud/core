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

namespace Google\Service\AndroidEnterprise;

class ManagedProperty extends \Google\Collection
{
  protected $collection_key = 'valueStringArray';
  /**
   * @var string
   */
  public $key;
  /**
   * @var bool
   */
  public $valueBool;
  protected $valueBundleType = ManagedPropertyBundle::class;
  protected $valueBundleDataType = '';
  protected $valueBundleArrayType = ManagedPropertyBundle::class;
  protected $valueBundleArrayDataType = 'array';
  /**
   * @var int
   */
  public $valueInteger;
  /**
   * @var string
   */
  public $valueString;
  /**
   * @var string[]
   */
  public $valueStringArray;

  /**
   * @param string
   */
  public function setKey($key)
  {
    $this->key = $key;
  }
  /**
   * @return string
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param bool
   */
  public function setValueBool($valueBool)
  {
    $this->valueBool = $valueBool;
  }
  /**
   * @return bool
   */
  public function getValueBool()
  {
    return $this->valueBool;
  }
  /**
   * @param ManagedPropertyBundle
   */
  public function setValueBundle(ManagedPropertyBundle $valueBundle)
  {
    $this->valueBundle = $valueBundle;
  }
  /**
   * @return ManagedPropertyBundle
   */
  public function getValueBundle()
  {
    return $this->valueBundle;
  }
  /**
   * @param ManagedPropertyBundle[]
   */
  public function setValueBundleArray($valueBundleArray)
  {
    $this->valueBundleArray = $valueBundleArray;
  }
  /**
   * @return ManagedPropertyBundle[]
   */
  public function getValueBundleArray()
  {
    return $this->valueBundleArray;
  }
  /**
   * @param int
   */
  public function setValueInteger($valueInteger)
  {
    $this->valueInteger = $valueInteger;
  }
  /**
   * @return int
   */
  public function getValueInteger()
  {
    return $this->valueInteger;
  }
  /**
   * @param string
   */
  public function setValueString($valueString)
  {
    $this->valueString = $valueString;
  }
  /**
   * @return string
   */
  public function getValueString()
  {
    return $this->valueString;
  }
  /**
   * @param string[]
   */
  public function setValueStringArray($valueStringArray)
  {
    $this->valueStringArray = $valueStringArray;
  }
  /**
   * @return string[]
   */
  public function getValueStringArray()
  {
    return $this->valueStringArray;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagedProperty::class, 'Google_Service_AndroidEnterprise_ManagedProperty');
