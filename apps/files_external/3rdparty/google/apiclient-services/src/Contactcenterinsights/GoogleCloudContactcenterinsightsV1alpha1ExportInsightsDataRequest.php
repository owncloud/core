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

class GoogleCloudContactcenterinsightsV1alpha1ExportInsightsDataRequest extends \Google\Model
{
  protected $bigQueryDestinationType = GoogleCloudContactcenterinsightsV1alpha1ExportInsightsDataRequestBigQueryDestination::class;
  protected $bigQueryDestinationDataType = '';
  public $filter;
  public $kmsKey;
  public $parent;

  /**
   * @param GoogleCloudContactcenterinsightsV1alpha1ExportInsightsDataRequestBigQueryDestination
   */
  public function setBigQueryDestination(GoogleCloudContactcenterinsightsV1alpha1ExportInsightsDataRequestBigQueryDestination $bigQueryDestination)
  {
    $this->bigQueryDestination = $bigQueryDestination;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1alpha1ExportInsightsDataRequestBigQueryDestination
   */
  public function getBigQueryDestination()
  {
    return $this->bigQueryDestination;
  }
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  public function getFilter()
  {
    return $this->filter;
  }
  public function setKmsKey($kmsKey)
  {
    $this->kmsKey = $kmsKey;
  }
  public function getKmsKey()
  {
    return $this->kmsKey;
  }
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  public function getParent()
  {
    return $this->parent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1alpha1ExportInsightsDataRequest::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1alpha1ExportInsightsDataRequest');
