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

class GoogleCloudContactcenterinsightsV1AnalysisResult extends \Google\Model
{
  protected $callAnalysisMetadataType = GoogleCloudContactcenterinsightsV1AnalysisResultCallAnalysisMetadata::class;
  protected $callAnalysisMetadataDataType = '';
  public $endTime;

  /**
   * @param GoogleCloudContactcenterinsightsV1AnalysisResultCallAnalysisMetadata
   */
  public function setCallAnalysisMetadata(GoogleCloudContactcenterinsightsV1AnalysisResultCallAnalysisMetadata $callAnalysisMetadata)
  {
    $this->callAnalysisMetadata = $callAnalysisMetadata;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1AnalysisResultCallAnalysisMetadata
   */
  public function getCallAnalysisMetadata()
  {
    return $this->callAnalysisMetadata;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1AnalysisResult::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1AnalysisResult');
