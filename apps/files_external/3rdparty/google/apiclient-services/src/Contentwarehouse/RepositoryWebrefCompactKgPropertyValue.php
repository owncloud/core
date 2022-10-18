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

class RepositoryWebrefCompactKgPropertyValue extends \Google\Collection
{
  protected $collection_key = 'value';
  /**
   * @var string
   */
  public $encodedMid;
  /**
   * @var string
   */
  public $hrid;
  protected $valueType = RepositoryWebrefCompactKgValue::class;
  protected $valueDataType = 'array';
  /**
   * @var string
   */
  public $valueStatus;

  /**
   * @param string
   */
  public function setEncodedMid($encodedMid)
  {
    $this->encodedMid = $encodedMid;
  }
  /**
   * @return string
   */
  public function getEncodedMid()
  {
    return $this->encodedMid;
  }
  /**
   * @param string
   */
  public function setHrid($hrid)
  {
    $this->hrid = $hrid;
  }
  /**
   * @return string
   */
  public function getHrid()
  {
    return $this->hrid;
  }
  /**
   * @param RepositoryWebrefCompactKgValue[]
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return RepositoryWebrefCompactKgValue[]
   */
  public function getValue()
  {
    return $this->value;
  }
  /**
   * @param string
   */
  public function setValueStatus($valueStatus)
  {
    $this->valueStatus = $valueStatus;
  }
  /**
   * @return string
   */
  public function getValueStatus()
  {
    return $this->valueStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefCompactKgPropertyValue::class, 'Google_Service_Contentwarehouse_RepositoryWebrefCompactKgPropertyValue');
