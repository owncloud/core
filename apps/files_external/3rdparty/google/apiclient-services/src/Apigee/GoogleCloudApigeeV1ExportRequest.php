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
  public $csvDelimiter;
  public $datastoreName;
  protected $dateRangeType = GoogleCloudApigeeV1DateRange::class;
  protected $dateRangeDataType = '';
  public $description;
  public $name;
  public $outputFormat;

  public function setCsvDelimiter($csvDelimiter)
  {
    $this->csvDelimiter = $csvDelimiter;
  }
  public function getCsvDelimiter()
  {
    return $this->csvDelimiter;
  }
  public function setDatastoreName($datastoreName)
  {
    $this->datastoreName = $datastoreName;
  }
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
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOutputFormat($outputFormat)
  {
    $this->outputFormat = $outputFormat;
  }
  public function getOutputFormat()
  {
    return $this->outputFormat;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1ExportRequest::class, 'Google_Service_Apigee_GoogleCloudApigeeV1ExportRequest');
