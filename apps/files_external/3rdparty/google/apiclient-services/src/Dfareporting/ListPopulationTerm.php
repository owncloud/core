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

namespace Google\Service\Dfareporting;

class ListPopulationTerm extends \Google\Model
{
  /**
   * @var bool
   */
  public $contains;
  /**
   * @var bool
   */
  public $negation;
  /**
   * @var string
   */
  public $operator;
  /**
   * @var string
   */
  public $remarketingListId;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $value;
  /**
   * @var string
   */
  public $variableFriendlyName;
  /**
   * @var string
   */
  public $variableName;

  /**
   * @param bool
   */
  public function setContains($contains)
  {
    $this->contains = $contains;
  }
  /**
   * @return bool
   */
  public function getContains()
  {
    return $this->contains;
  }
  /**
   * @param bool
   */
  public function setNegation($negation)
  {
    $this->negation = $negation;
  }
  /**
   * @return bool
   */
  public function getNegation()
  {
    return $this->negation;
  }
  /**
   * @param string
   */
  public function setOperator($operator)
  {
    $this->operator = $operator;
  }
  /**
   * @return string
   */
  public function getOperator()
  {
    return $this->operator;
  }
  /**
   * @param string
   */
  public function setRemarketingListId($remarketingListId)
  {
    $this->remarketingListId = $remarketingListId;
  }
  /**
   * @return string
   */
  public function getRemarketingListId()
  {
    return $this->remarketingListId;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
  /**
   * @param string
   */
  public function setVariableFriendlyName($variableFriendlyName)
  {
    $this->variableFriendlyName = $variableFriendlyName;
  }
  /**
   * @return string
   */
  public function getVariableFriendlyName()
  {
    return $this->variableFriendlyName;
  }
  /**
   * @param string
   */
  public function setVariableName($variableName)
  {
    $this->variableName = $variableName;
  }
  /**
   * @return string
   */
  public function getVariableName()
  {
    return $this->variableName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListPopulationTerm::class, 'Google_Service_Dfareporting_ListPopulationTerm');
