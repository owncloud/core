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

class Google_Service_Sheets_CellData extends Google_Collection
{
  protected $collection_key = 'textFormatRuns';
  protected $dataSourceFormulaType = 'Google_Service_Sheets_DataSourceFormula';
  protected $dataSourceFormulaDataType = '';
  protected $dataSourceTableType = 'Google_Service_Sheets_DataSourceTable';
  protected $dataSourceTableDataType = '';
  protected $dataValidationType = 'Google_Service_Sheets_DataValidationRule';
  protected $dataValidationDataType = '';
  protected $effectiveFormatType = 'Google_Service_Sheets_CellFormat';
  protected $effectiveFormatDataType = '';
  protected $effectiveValueType = 'Google_Service_Sheets_ExtendedValue';
  protected $effectiveValueDataType = '';
  public $formattedValue;
  public $hyperlink;
  public $note;
  protected $pivotTableType = 'Google_Service_Sheets_PivotTable';
  protected $pivotTableDataType = '';
  protected $textFormatRunsType = 'Google_Service_Sheets_TextFormatRun';
  protected $textFormatRunsDataType = 'array';
  protected $userEnteredFormatType = 'Google_Service_Sheets_CellFormat';
  protected $userEnteredFormatDataType = '';
  protected $userEnteredValueType = 'Google_Service_Sheets_ExtendedValue';
  protected $userEnteredValueDataType = '';

  /**
   * @param Google_Service_Sheets_DataSourceFormula
   */
  public function setDataSourceFormula(Google_Service_Sheets_DataSourceFormula $dataSourceFormula)
  {
    $this->dataSourceFormula = $dataSourceFormula;
  }
  /**
   * @return Google_Service_Sheets_DataSourceFormula
   */
  public function getDataSourceFormula()
  {
    return $this->dataSourceFormula;
  }
  /**
   * @param Google_Service_Sheets_DataSourceTable
   */
  public function setDataSourceTable(Google_Service_Sheets_DataSourceTable $dataSourceTable)
  {
    $this->dataSourceTable = $dataSourceTable;
  }
  /**
   * @return Google_Service_Sheets_DataSourceTable
   */
  public function getDataSourceTable()
  {
    return $this->dataSourceTable;
  }
  /**
   * @param Google_Service_Sheets_DataValidationRule
   */
  public function setDataValidation(Google_Service_Sheets_DataValidationRule $dataValidation)
  {
    $this->dataValidation = $dataValidation;
  }
  /**
   * @return Google_Service_Sheets_DataValidationRule
   */
  public function getDataValidation()
  {
    return $this->dataValidation;
  }
  /**
   * @param Google_Service_Sheets_CellFormat
   */
  public function setEffectiveFormat(Google_Service_Sheets_CellFormat $effectiveFormat)
  {
    $this->effectiveFormat = $effectiveFormat;
  }
  /**
   * @return Google_Service_Sheets_CellFormat
   */
  public function getEffectiveFormat()
  {
    return $this->effectiveFormat;
  }
  /**
   * @param Google_Service_Sheets_ExtendedValue
   */
  public function setEffectiveValue(Google_Service_Sheets_ExtendedValue $effectiveValue)
  {
    $this->effectiveValue = $effectiveValue;
  }
  /**
   * @return Google_Service_Sheets_ExtendedValue
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
   * @param Google_Service_Sheets_PivotTable
   */
  public function setPivotTable(Google_Service_Sheets_PivotTable $pivotTable)
  {
    $this->pivotTable = $pivotTable;
  }
  /**
   * @return Google_Service_Sheets_PivotTable
   */
  public function getPivotTable()
  {
    return $this->pivotTable;
  }
  /**
   * @param Google_Service_Sheets_TextFormatRun
   */
  public function setTextFormatRuns($textFormatRuns)
  {
    $this->textFormatRuns = $textFormatRuns;
  }
  /**
   * @return Google_Service_Sheets_TextFormatRun
   */
  public function getTextFormatRuns()
  {
    return $this->textFormatRuns;
  }
  /**
   * @param Google_Service_Sheets_CellFormat
   */
  public function setUserEnteredFormat(Google_Service_Sheets_CellFormat $userEnteredFormat)
  {
    $this->userEnteredFormat = $userEnteredFormat;
  }
  /**
   * @return Google_Service_Sheets_CellFormat
   */
  public function getUserEnteredFormat()
  {
    return $this->userEnteredFormat;
  }
  /**
   * @param Google_Service_Sheets_ExtendedValue
   */
  public function setUserEnteredValue(Google_Service_Sheets_ExtendedValue $userEnteredValue)
  {
    $this->userEnteredValue = $userEnteredValue;
  }
  /**
   * @return Google_Service_Sheets_ExtendedValue
   */
  public function getUserEnteredValue()
  {
    return $this->userEnteredValue;
  }
}
