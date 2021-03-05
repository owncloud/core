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

class Google_Service_WebRisk_GoogleCloudWebriskV1ThreatEntryRemovals extends Google_Model
{
  protected $rawIndicesType = 'Google_Service_WebRisk_GoogleCloudWebriskV1RawIndices';
  protected $rawIndicesDataType = '';
  protected $riceIndicesType = 'Google_Service_WebRisk_GoogleCloudWebriskV1RiceDeltaEncoding';
  protected $riceIndicesDataType = '';

  /**
   * @param Google_Service_WebRisk_GoogleCloudWebriskV1RawIndices
   */
  public function setRawIndices(Google_Service_WebRisk_GoogleCloudWebriskV1RawIndices $rawIndices)
  {
    $this->rawIndices = $rawIndices;
  }
  /**
   * @return Google_Service_WebRisk_GoogleCloudWebriskV1RawIndices
   */
  public function getRawIndices()
  {
    return $this->rawIndices;
  }
  /**
   * @param Google_Service_WebRisk_GoogleCloudWebriskV1RiceDeltaEncoding
   */
  public function setRiceIndices(Google_Service_WebRisk_GoogleCloudWebriskV1RiceDeltaEncoding $riceIndices)
  {
    $this->riceIndices = $riceIndices;
  }
  /**
   * @return Google_Service_WebRisk_GoogleCloudWebriskV1RiceDeltaEncoding
   */
  public function getRiceIndices()
  {
    return $this->riceIndices;
  }
}
