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

namespace Google\Service\WebRisk;

class GoogleCloudWebriskV1ComputeThreatListDiffResponse extends \Google\Model
{
  protected $additionsType = GoogleCloudWebriskV1ThreatEntryAdditions::class;
  protected $additionsDataType = '';
  protected $checksumType = GoogleCloudWebriskV1ComputeThreatListDiffResponseChecksum::class;
  protected $checksumDataType = '';
  public $newVersionToken;
  public $recommendedNextDiff;
  protected $removalsType = GoogleCloudWebriskV1ThreatEntryRemovals::class;
  protected $removalsDataType = '';
  public $responseType;

  /**
   * @param GoogleCloudWebriskV1ThreatEntryAdditions
   */
  public function setAdditions(GoogleCloudWebriskV1ThreatEntryAdditions $additions)
  {
    $this->additions = $additions;
  }
  /**
   * @return GoogleCloudWebriskV1ThreatEntryAdditions
   */
  public function getAdditions()
  {
    return $this->additions;
  }
  /**
   * @param GoogleCloudWebriskV1ComputeThreatListDiffResponseChecksum
   */
  public function setChecksum(GoogleCloudWebriskV1ComputeThreatListDiffResponseChecksum $checksum)
  {
    $this->checksum = $checksum;
  }
  /**
   * @return GoogleCloudWebriskV1ComputeThreatListDiffResponseChecksum
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
   * @param GoogleCloudWebriskV1ThreatEntryRemovals
   */
  public function setRemovals(GoogleCloudWebriskV1ThreatEntryRemovals $removals)
  {
    $this->removals = $removals;
  }
  /**
   * @return GoogleCloudWebriskV1ThreatEntryRemovals
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudWebriskV1ComputeThreatListDiffResponse::class, 'Google_Service_WebRisk_GoogleCloudWebriskV1ComputeThreatListDiffResponse');
