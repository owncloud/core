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

class Google_Service_CivicInfo_InternalFieldMetadataProto extends Google_Model
{
  public $isAuto;
  protected $sourceSummaryType = 'Google_Service_CivicInfo_InternalSourceSummaryProto';
  protected $sourceSummaryDataType = '';

  public function setIsAuto($isAuto)
  {
    $this->isAuto = $isAuto;
  }
  public function getIsAuto()
  {
    return $this->isAuto;
  }
  /**
   * @param Google_Service_CivicInfo_InternalSourceSummaryProto
   */
  public function setSourceSummary(Google_Service_CivicInfo_InternalSourceSummaryProto $sourceSummary)
  {
    $this->sourceSummary = $sourceSummary;
  }
  /**
   * @return Google_Service_CivicInfo_InternalSourceSummaryProto
   */
  public function getSourceSummary()
  {
    return $this->sourceSummary;
  }
}
