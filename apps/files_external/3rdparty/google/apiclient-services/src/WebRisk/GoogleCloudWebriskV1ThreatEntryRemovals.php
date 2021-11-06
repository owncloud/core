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

class GoogleCloudWebriskV1ThreatEntryRemovals extends \Google\Model
{
  protected $rawIndicesType = GoogleCloudWebriskV1RawIndices::class;
  protected $rawIndicesDataType = '';
  protected $riceIndicesType = GoogleCloudWebriskV1RiceDeltaEncoding::class;
  protected $riceIndicesDataType = '';

  /**
   * @param GoogleCloudWebriskV1RawIndices
   */
  public function setRawIndices(GoogleCloudWebriskV1RawIndices $rawIndices)
  {
    $this->rawIndices = $rawIndices;
  }
  /**
   * @return GoogleCloudWebriskV1RawIndices
   */
  public function getRawIndices()
  {
    return $this->rawIndices;
  }
  /**
   * @param GoogleCloudWebriskV1RiceDeltaEncoding
   */
  public function setRiceIndices(GoogleCloudWebriskV1RiceDeltaEncoding $riceIndices)
  {
    $this->riceIndices = $riceIndices;
  }
  /**
   * @return GoogleCloudWebriskV1RiceDeltaEncoding
   */
  public function getRiceIndices()
  {
    return $this->riceIndices;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudWebriskV1ThreatEntryRemovals::class, 'Google_Service_WebRisk_GoogleCloudWebriskV1ThreatEntryRemovals');
