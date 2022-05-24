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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1ExportRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $csvDelimiter;
  /**
   * @var string
   */
  public $datastoreName;
  protected $dateRangeType = GoogleCloudApigeeV1DateRange::class;
  protected $dateRangeDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $outputFormat;

  /**
   * @param string
   */
  public function setCsvDelimiter($csvDelimiter)
  {
    $this->csvDelimiter = $csvDelimiter;
  }
  /**
   * @return string
   */
  public function getCsvDelimiter()
  {
    return $this->csvDelimiter;
  }
  /**
   * @param string
   */
  public function setDatastoreName($datastoreName)
  {
    $this->datastoreName = $datastoreName;
  }
  /**
   * @return string
   */
  public function getDatastoreName()
  {
    return $this->datastoreName;
  }
  /**
   * @param GoogleCloudApigeeV1DateRange
   */
  public function setDateRange(GoogleCloudApigeeV1DateRange $dateRange)
  {
    $this->dateRange = $dateRange;
  }
  /**
   * @return GoogleCloudApigeeV1DateRange
   */
  public function getDateRange()
  {
    return $this->dateRange;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
   * @param string
   */
  public function setOutputFormat($outputFormat)
  {
    $this->outputFormat = $outputFormat;
  }
  /**
   * @return string
   */
  public function getOutputFormat()
  {
    return $this->outputFormat;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1ExportRequest::class, 'Google_Service_Apigee_GoogleCloudApigeeV1ExportRequest');
