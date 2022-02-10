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

namespace Google\Service\AnalyticsData;

class ResponseMetaData extends \Google\Model
{
  /**
   * @var string
   */
  public $currencyCode;
  /**
   * @var bool
   */
  public $dataLossFromOtherRow;
  /**
   * @var string
   */
  public $emptyReason;
  protected $schemaRestrictionResponseType = SchemaRestrictionResponse::class;
  protected $schemaRestrictionResponseDataType = '';
  /**
   * @var bool
   */
  public $subjectToThresholding;
  /**
   * @var string
   */
  public $timeZone;

  /**
   * @param string
   */
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  /**
   * @return string
   */
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  /**
   * @param bool
   */
  public function setDataLossFromOtherRow($dataLossFromOtherRow)
  {
    $this->dataLossFromOtherRow = $dataLossFromOtherRow;
  }
  /**
   * @return bool
   */
  public function getDataLossFromOtherRow()
  {
    return $this->dataLossFromOtherRow;
  }
  /**
   * @param string
   */
  public function setEmptyReason($emptyReason)
  {
    $this->emptyReason = $emptyReason;
  }
  /**
   * @return string
   */
  public function getEmptyReason()
  {
    return $this->emptyReason;
  }
  /**
   * @param SchemaRestrictionResponse
   */
  public function setSchemaRestrictionResponse(SchemaRestrictionResponse $schemaRestrictionResponse)
  {
    $this->schemaRestrictionResponse = $schemaRestrictionResponse;
  }
  /**
   * @return SchemaRestrictionResponse
   */
  public function getSchemaRestrictionResponse()
  {
    return $this->schemaRestrictionResponse;
  }
  /**
   * @param bool
   */
  public function setSubjectToThresholding($subjectToThresholding)
  {
    $this->subjectToThresholding = $subjectToThresholding;
  }
  /**
   * @return bool
   */
  public function getSubjectToThresholding()
  {
    return $this->subjectToThresholding;
  }
  /**
   * @param string
   */
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return string
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResponseMetaData::class, 'Google_Service_AnalyticsData_ResponseMetaData');
