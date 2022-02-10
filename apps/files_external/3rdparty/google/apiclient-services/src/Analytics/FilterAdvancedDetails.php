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

namespace Google\Service\Analytics;

class FilterAdvancedDetails extends \Google\Model
{
  /**
   * @var bool
   */
  public $caseSensitive;
  /**
   * @var string
   */
  public $extractA;
  /**
   * @var string
   */
  public $extractB;
  /**
   * @var string
   */
  public $fieldA;
  /**
   * @var int
   */
  public $fieldAIndex;
  /**
   * @var bool
   */
  public $fieldARequired;
  /**
   * @var string
   */
  public $fieldB;
  /**
   * @var int
   */
  public $fieldBIndex;
  /**
   * @var bool
   */
  public $fieldBRequired;
  /**
   * @var string
   */
  public $outputConstructor;
  /**
   * @var string
   */
  public $outputToField;
  /**
   * @var int
   */
  public $outputToFieldIndex;
  /**
   * @var bool
   */
  public $overrideOutputField;

  /**
   * @param bool
   */
  public function setCaseSensitive($caseSensitive)
  {
    $this->caseSensitive = $caseSensitive;
  }
  /**
   * @return bool
   */
  public function getCaseSensitive()
  {
    return $this->caseSensitive;
  }
  /**
   * @param string
   */
  public function setExtractA($extractA)
  {
    $this->extractA = $extractA;
  }
  /**
   * @return string
   */
  public function getExtractA()
  {
    return $this->extractA;
  }
  /**
   * @param string
   */
  public function setExtractB($extractB)
  {
    $this->extractB = $extractB;
  }
  /**
   * @return string
   */
  public function getExtractB()
  {
    return $this->extractB;
  }
  /**
   * @param string
   */
  public function setFieldA($fieldA)
  {
    $this->fieldA = $fieldA;
  }
  /**
   * @return string
   */
  public function getFieldA()
  {
    return $this->fieldA;
  }
  /**
   * @param int
   */
  public function setFieldAIndex($fieldAIndex)
  {
    $this->fieldAIndex = $fieldAIndex;
  }
  /**
   * @return int
   */
  public function getFieldAIndex()
  {
    return $this->fieldAIndex;
  }
  /**
   * @param bool
   */
  public function setFieldARequired($fieldARequired)
  {
    $this->fieldARequired = $fieldARequired;
  }
  /**
   * @return bool
   */
  public function getFieldARequired()
  {
    return $this->fieldARequired;
  }
  /**
   * @param string
   */
  public function setFieldB($fieldB)
  {
    $this->fieldB = $fieldB;
  }
  /**
   * @return string
   */
  public function getFieldB()
  {
    return $this->fieldB;
  }
  /**
   * @param int
   */
  public function setFieldBIndex($fieldBIndex)
  {
    $this->fieldBIndex = $fieldBIndex;
  }
  /**
   * @return int
   */
  public function getFieldBIndex()
  {
    return $this->fieldBIndex;
  }
  /**
   * @param bool
   */
  public function setFieldBRequired($fieldBRequired)
  {
    $this->fieldBRequired = $fieldBRequired;
  }
  /**
   * @return bool
   */
  public function getFieldBRequired()
  {
    return $this->fieldBRequired;
  }
  /**
   * @param string
   */
  public function setOutputConstructor($outputConstructor)
  {
    $this->outputConstructor = $outputConstructor;
  }
  /**
   * @return string
   */
  public function getOutputConstructor()
  {
    return $this->outputConstructor;
  }
  /**
   * @param string
   */
  public function setOutputToField($outputToField)
  {
    $this->outputToField = $outputToField;
  }
  /**
   * @return string
   */
  public function getOutputToField()
  {
    return $this->outputToField;
  }
  /**
   * @param int
   */
  public function setOutputToFieldIndex($outputToFieldIndex)
  {
    $this->outputToFieldIndex = $outputToFieldIndex;
  }
  /**
   * @return int
   */
  public function getOutputToFieldIndex()
  {
    return $this->outputToFieldIndex;
  }
  /**
   * @param bool
   */
  public function setOverrideOutputField($overrideOutputField)
  {
    $this->overrideOutputField = $overrideOutputField;
  }
  /**
   * @return bool
   */
  public function getOverrideOutputField()
  {
    return $this->overrideOutputField;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FilterAdvancedDetails::class, 'Google_Service_Analytics_FilterAdvancedDetails');
