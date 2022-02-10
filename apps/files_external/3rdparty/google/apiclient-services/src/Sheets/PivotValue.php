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

namespace Google\Service\Sheets;

class PivotValue extends \Google\Model
{
  /**
   * @var string
   */
  public $calculatedDisplayType;
  protected $dataSourceColumnReferenceType = DataSourceColumnReference::class;
  protected $dataSourceColumnReferenceDataType = '';
  /**
   * @var string
   */
  public $formula;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $sourceColumnOffset;
  /**
   * @var string
   */
  public $summarizeFunction;

  /**
   * @param string
   */
  public function setCalculatedDisplayType($calculatedDisplayType)
  {
    $this->calculatedDisplayType = $calculatedDisplayType;
  }
  /**
   * @return string
   */
  public function getCalculatedDisplayType()
  {
    return $this->calculatedDisplayType;
  }
  /**
   * @param DataSourceColumnReference
   */
  public function setDataSourceColumnReference(DataSourceColumnReference $dataSourceColumnReference)
  {
    $this->dataSourceColumnReference = $dataSourceColumnReference;
  }
  /**
   * @return DataSourceColumnReference
   */
  public function getDataSourceColumnReference()
  {
    return $this->dataSourceColumnReference;
  }
  /**
   * @param string
   */
  public function setFormula($formula)
  {
    $this->formula = $formula;
  }
  /**
   * @return string
   */
  public function getFormula()
  {
    return $this->formula;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param int
   */
  public function setSourceColumnOffset($sourceColumnOffset)
  {
    $this->sourceColumnOffset = $sourceColumnOffset;
  }
  /**
   * @return int
   */
  public function getSourceColumnOffset()
  {
    return $this->sourceColumnOffset;
  }
  /**
   * @param string
   */
  public function setSummarizeFunction($summarizeFunction)
  {
    $this->summarizeFunction = $summarizeFunction;
  }
  /**
   * @return string
   */
  public function getSummarizeFunction()
  {
    return $this->summarizeFunction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PivotValue::class, 'Google_Service_Sheets_PivotValue');
