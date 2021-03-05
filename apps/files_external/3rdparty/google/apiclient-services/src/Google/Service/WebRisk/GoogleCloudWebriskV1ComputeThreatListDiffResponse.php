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

class Google_Service_WebRisk_GoogleCloudWebriskV1ComputeThreatListDiffResponse extends Google_Model
{
  protected $additionsType = 'Google_Service_WebRisk_GoogleCloudWebriskV1ThreatEntryAdditions';
  protected $additionsDataType = '';
  protected $checksumType = 'Google_Service_WebRisk_GoogleCloudWebriskV1ComputeThreatListDiffResponseChecksum';
  protected $checksumDataType = '';
  public $newVersionToken;
  public $recommendedNextDiff;
  protected $removalsType = 'Google_Service_WebRisk_GoogleCloudWebriskV1ThreatEntryRemovals';
  protected $removalsDataType = '';
  public $responseType;

  /**
   * @param Google_Service_WebRisk_GoogleCloudWebriskV1ThreatEntryAdditions
   */
  public function setAdditions(Google_Service_WebRisk_GoogleCloudWebriskV1ThreatEntryAdditions $additions)
  {
    $this->additions = $additions;
  }
  /**
   * @return Google_Service_WebRisk_GoogleCloudWebriskV1ThreatEntryAdditions
   */
  public function getAdditions()
  {
    return $this->additions;
  }
  /**
   * @param Google_Service_WebRisk_GoogleCloudWebriskV1ComputeThreatListDiffResponseChecksum
   */
  public function setChecksum(Google_Service_WebRisk_GoogleCloudWebriskV1ComputeThreatListDiffResponseChecksum $checksum)
  {
    $this->checksum = $checksum;
  }
  /**
   * @return Google_Service_WebRisk_GoogleCloudWebriskV1ComputeThreatListDiffResponseChecksum
   */
  public function getChecksum()
  {
    return $this->checksum;
  }
  public function setNewVersionToken($newVersionToken)
  {
    $this->newVersionToken = $newVersionToken;
  }
  public function getNewVersionToken()
  {
    return $this->newVersionToken;
  }
  public function setRecommendedNextDiff($recommendedNextDiff)
  {
    $this->recommendedNextDiff = $recommendedNextDiff;
  }
  public function getRecommendedNextDiff()
  {
    return $this->recommendedNextDiff;
  }
  /**
   * @param Google_Service_WebRisk_GoogleCloudWebriskV1ThreatEntryRemovals
   */
  public function setRemovals(Google_Service_WebRisk_GoogleCloudWebriskV1ThreatEntryRemovals $removals)
  {
    $this->removals = $removals;
  }
  /**
   * @return Google_Service_WebRisk_GoogleCloudWebriskV1ThreatEntryRemovals
   */
  public function getRemovals()
  {
    return $this->removals;
  }
  public function setResponseType($responseType)
  {
    $this->responseType = $responseType;
  }
  public function getResponseType()
  {
    return $this->responseType;
  }
}
