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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2BigQueryOptions extends \Google\Collection
{
  protected $collection_key = 'identifyingFields';
  protected $excludedFieldsType = GooglePrivacyDlpV2FieldId::class;
  protected $excludedFieldsDataType = 'array';
  protected $identifyingFieldsType = GooglePrivacyDlpV2FieldId::class;
  protected $identifyingFieldsDataType = 'array';
  public $rowsLimit;
  public $rowsLimitPercent;
  public $sampleMethod;
  protected $tableReferenceType = GooglePrivacyDlpV2BigQueryTable::class;
  protected $tableReferenceDataType = '';

  /**
   * @param GooglePrivacyDlpV2FieldId[]
   */
  public function setExcludedFields($excludedFields)
  {
    $this->excludedFields = $excludedFields;
  }
  /**
   * @return GooglePrivacyDlpV2FieldId[]
   */
  public function getExcludedFields()
  {
    return $this->excludedFields;
  }
  /**
   * @param GooglePrivacyDlpV2FieldId[]
   */
  public function setIdentifyingFields($identifyingFields)
  {
    $this->identifyingFields = $identifyingFields;
  }
  /**
   * @return GooglePrivacyDlpV2FieldId[]
   */
  public function getIdentifyingFields()
  {
    return $this->identifyingFields;
  }
  public function setRowsLimit($rowsLimit)
  {
    $this->rowsLimit = $rowsLimit;
  }
  public function getRowsLimit()
  {
    return $this->rowsLimit;
  }
  public function setRowsLimitPercent($rowsLimitPercent)
  {
    $this->rowsLimitPercent = $rowsLimitPercent;
  }
  public function getRowsLimitPercent()
  {
    return $this->rowsLimitPercent;
  }
  public function setSampleMethod($sampleMethod)
  {
    $this->sampleMethod = $sampleMethod;
  }
  public function getSampleMethod()
  {
    return $this->sampleMethod;
  }
  /**
   * @param GooglePrivacyDlpV2BigQueryTable
   */
  public function setTableReference(GooglePrivacyDlpV2BigQueryTable $tableReference)
  {
    $this->tableReference = $tableReference;
  }
  /**
   * @return GooglePrivacyDlpV2BigQueryTable
   */
  public function getTableReference()
  {
    return $this->tableReference;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2BigQueryOptions::class, 'Google_Service_DLP_GooglePrivacyDlpV2BigQueryOptions');
