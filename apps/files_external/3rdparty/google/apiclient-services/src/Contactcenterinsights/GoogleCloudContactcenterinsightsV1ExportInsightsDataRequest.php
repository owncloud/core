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

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1ExportInsightsDataRequest extends \Google\Model
{
  protected $bigQueryDestinationType = GoogleCloudContactcenterinsightsV1ExportInsightsDataRequestBigQueryDestination::class;
  protected $bigQueryDestinationDataType = '';
  /**
   * @var string
   */
  public $filter;
  /**
   * @var string
   */
  public $kmsKey;
  /**
   * @var string
   */
  public $parent;
  /**
   * @var string
   */
  public $writeDisposition;

  /**
   * @param GoogleCloudContactcenterinsightsV1ExportInsightsDataRequestBigQueryDestination
   */
  public function setBigQueryDestination(GoogleCloudContactcenterinsightsV1ExportInsightsDataRequestBigQueryDestination $bigQueryDestination)
  {
    $this->bigQueryDestination = $bigQueryDestination;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1ExportInsightsDataRequestBigQueryDestination
   */
  public function getBigQueryDestination()
  {
    return $this->bigQueryDestination;
  }
  /**
   * @param string
   */
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return string
   */
  public function getFilter()
  {
    return $this->filter;
  }
  /**
   * @param string
   */
  public function setKmsKey($kmsKey)
  {
    $this->kmsKey = $kmsKey;
  }
  /**
   * @return string
   */
  public function getKmsKey()
  {
    return $this->kmsKey;
  }
  /**
   * @param string
   */
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  /**
   * @return string
   */
  public function getParent()
  {
    return $this->parent;
  }
  /**
   * @param string
   */
  public function setWriteDisposition($writeDisposition)
  {
    $this->writeDisposition = $writeDisposition;
  }
  /**
   * @return string
   */
  public function getWriteDisposition()
  {
    return $this->writeDisposition;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1ExportInsightsDataRequest::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1ExportInsightsDataRequest');
