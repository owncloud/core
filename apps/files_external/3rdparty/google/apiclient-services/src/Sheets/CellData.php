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

class CellData extends \Google\Collection
{
  protected $collection_key = 'textFormatRuns';
  protected $dataSourceFormulaType = DataSourceFormula::class;
  protected $dataSourceFormulaDataType = '';
  protected $dataSourceTableType = DataSourceTable::class;
  protected $dataSourceTableDataType = '';
  protected $dataValidationType = DataValidationRule::class;
  protected $dataValidationDataType = '';
  protected $effectiveFormatType = CellFormat::class;
  protected $effectiveFormatDataType = '';
  protected $effectiveValueType = ExtendedValue::class;
  protected $effectiveValueDataType = '';
  public $formattedValue;
  public $hyperlink;
  public $note;
  protected $pivotTableType = PivotTable::class;
  protected $pivotTableDataType = '';
  protected $textFormatRunsType = TextFormatRun::class;
  protected $textFormatRunsDataType = 'array';
  protected $userEnteredFormatType = CellFormat::class;
  protected $userEnteredFormatDataType = '';
  protected $userEnteredValueType = ExtendedValue::class;
  protected $userEnteredValueDataType = '';

  /**
   * @param DataSourceFormula
   */
  public function setDataSourceFormula(DataSourceFormula $dataSourceFormula)
  {
    $this->dataSourceFormula = $dataSourceFormula;
  }
  /**
   * @return DataSourceFormula
   */
  public function getDataSourceFormula()
  {
    return $this->dataSourceFormula;
  }
  /**
   * @param DataSourceTable
   */
  public function setDataSourceTable(DataSourceTable $dataSourceTable)
  {
    $this->dataSourceTable = $dataSourceTable;
  }
  /**
   * @return DataSourceTable
   */
  public function getDataSourceTable()
  {
    return $this->dataSourceTable;
  }
  /**
   * @param DataValidationRule
   */
  public function setDataValidation(DataValidationRule $dataValidation)
  {
    $this->dataValidation = $dataValidation;
  }
  /**
   * @return DataValidationRule
   */
  public function getDataValidation()
  {
    return $this->dataValidation;
  }
  /**
   * @param CellFormat
   */
  public function setEffectiveFormat(CellFormat $effectiveFormat)
  {
    $this->effectiveFormat = $effectiveFormat;
  }
  /**
   * @return CellFormat
   */
  public function getEffectiveFormat()
  {
    return $this->effectiveFormat;
  }
  /**
   * @param ExtendedValue
   */
  public function setEffectiveValue(ExtendedValue $effectiveValue)
  {
    $this->effectiveValue = $effectiveValue;
  }
  /**
   * @return ExtendedValue
   */
  public function getEffectiveValue()
  {
    return $this->effectiveValue;
  }
  public function setFormattedValue($formattedValue)
  {
    $this->formattedValue = $formattedValue;
  }
  public function getFormattedValue()
  {
    return $this->formattedValue;
  }
  public function setHyperlink($hyperlink)
  {
    $this->hyperlink = $hyperlink;
  }
  public function getHyperlink()
  {
    return $this->hyperlink;
  }
  public function setNote($note)
  {
    $this->note = $note;
  }
  public function getNote()
  {
    return $this->note;
  }
  /**
   * @param PivotTable
   */
  public function setPivotTable(PivotTable $pivotTable)
  {
    $this->pivotTable = $pivotTable;
  }
  /**
   * @return PivotTable
   */
  public function getPivotTable()
  {
    return $this->pivotTable;
  }
  /**
   * @param TextFormatRun[]
   */
  public function setTextFormatRuns($textFormatRuns)
  {
    $this->textFormatRuns = $textFormatRuns;
  }
  /**
   * @return TextFormatRun[]
   */
  public function getTextFormatRuns()
  {
    return $this->textFormatRuns;
  }
  /**
   * @param CellFormat
   */
  public function setUserEnteredFormat(CellFormat $userEnteredFormat)
  {
    $this->userEnteredFormat = $userEnteredFormat;
  }
  /**
   * @return CellFormat
   */
  public function getUserEnteredFormat()
  {
    return $this->userEnteredFormat;
  }
  /**
   * @param ExtendedValue
   */
  public function setUserEnteredValue(ExtendedValue $userEnteredValue)
  {
    $this->userEnteredValue = $userEnteredValue;
  }
  /**
   * @return ExtendedValue
   */
  public function getUserEnteredValue()
  {
    return $this->userEnteredValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CellData::class, 'Google_Service_Sheets_CellData');
