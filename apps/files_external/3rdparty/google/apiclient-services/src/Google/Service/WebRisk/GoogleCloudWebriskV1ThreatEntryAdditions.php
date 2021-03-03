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

class Google_Service_WebRisk_GoogleCloudWebriskV1ThreatEntryAdditions extends Google_Collection
{
  protected $collection_key = 'rawHashes';
  protected $rawHashesType = 'Google_Service_WebRisk_GoogleCloudWebriskV1RawHashes';
  protected $rawHashesDataType = 'array';
  protected $riceHashesType = 'Google_Service_WebRisk_GoogleCloudWebriskV1RiceDeltaEncoding';
  protected $riceHashesDataType = '';

  /**
   * @param Google_Service_WebRisk_GoogleCloudWebriskV1RawHashes[]
   */
  public function setRawHashes($rawHashes)
  {
    $this->rawHashes = $rawHashes;
  }
  /**
   * @return Google_Service_WebRisk_GoogleCloudWebriskV1RawHashes[]
   */
  public function getRawHashes()
  {
    return $this->rawHashes;
  }
  /**
   * @param Google_Service_WebRisk_GoogleCloudWebriskV1RiceDeltaEncoding
   */
  public function setRiceHashes(Google_Service_WebRisk_GoogleCloudWebriskV1RiceDeltaEncoding $riceHashes)
  {
    $this->riceHashes = $riceHashes;
  }
  /**
   * @return Google_Service_WebRisk_GoogleCloudWebriskV1RiceDeltaEncoding
   */
  public function getRiceHashes()
  {
    return $this->riceHashes;
  }
}
