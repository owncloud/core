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

namespace Google\Service\Compute;

class GuestAttributes extends \Google\Model
{
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $queryPath;
  protected $queryValueType = GuestAttributesValue::class;
  protected $queryValueDataType = '';
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $variableKey;
  /**
   * @var string
   */
  public $variableValue;

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
  public function setQueryPath($queryPath)
  {
    $this->queryPath = $queryPath;
  }
  /**
   * @return string
   */
  public function getQueryPath()
  {
    return $this->queryPath;
  }
  /**
   * @param GuestAttributesValue
   */
  public function setQueryValue(GuestAttributesValue $queryValue)
  {
    $this->queryValue = $queryValue;
  }
  /**
   * @return GuestAttributesValue
   */
  public function getQueryValue()
  {
    return $this->queryValue;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param string
   */
  public function setVariableKey($variableKey)
  {
    $this->variableKey = $variableKey;
  }
  /**
   * @return string
   */
  public function getVariableKey()
  {
    return $this->variableKey;
  }
  /**
   * @param string
   */
  public function setVariableValue($variableValue)
  {
    $this->variableValue = $variableValue;
  }
  /**
   * @return string
   */
  public function getVariableValue()
  {
    return $this->variableValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GuestAttributes::class, 'Google_Service_Compute_GuestAttributes');
