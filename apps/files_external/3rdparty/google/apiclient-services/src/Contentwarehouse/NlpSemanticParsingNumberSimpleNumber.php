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

class NlpSemanticParsingNumberSimpleNumber extends \Google\Model
{
  /**
   * @var string
   */
  public $decimalMark;
  /**
   * @var string
   */
  public $groupingDelimiter;
  /**
   * @var string
   */
  public $groupingSystem;
  /**
   * @var string
   */
  public $normalizedValue;
  /**
   * @var string
   */
  public $prefix;
  /**
   * @var string
   */
  public $suffix;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setDecimalMark($decimalMark)
  {
    $this->decimalMark = $decimalMark;
  }
  /**
   * @return string
   */
  public function getDecimalMark()
  {
    return $this->decimalMark;
  }
  /**
   * @param string
   */
  public function setGroupingDelimiter($groupingDelimiter)
  {
    $this->groupingDelimiter = $groupingDelimiter;
  }
  /**
   * @return string
   */
  public function getGroupingDelimiter()
  {
    return $this->groupingDelimiter;
  }
  /**
   * @param string
   */
  public function setGroupingSystem($groupingSystem)
  {
    $this->groupingSystem = $groupingSystem;
  }
  /**
   * @return string
   */
  public function getGroupingSystem()
  {
    return $this->groupingSystem;
  }
  /**
   * @param string
   */
  public function setNormalizedValue($normalizedValue)
  {
    $this->normalizedValue = $normalizedValue;
  }
  /**
   * @return string
   */
  public function getNormalizedValue()
  {
    return $this->normalizedValue;
  }
  /**
   * @param string
   */
  public function setPrefix($prefix)
  {
    $this->prefix = $prefix;
  }
  /**
   * @return string
   */
  public function getPrefix()
  {
    return $this->prefix;
  }
  /**
   * @param string
   */
  public function setSuffix($suffix)
  {
    $this->suffix = $suffix;
  }
  /**
   * @return string
   */
  public function getSuffix()
  {
    return $this->suffix;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingNumberSimpleNumber::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingNumberSimpleNumber');
