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

class Google_Service_OnDemandScanning_BuildOccurrence extends Google_Model
{
  protected $provenanceType = 'Google_Service_OnDemandScanning_BuildProvenance';
  protected $provenanceDataType = '';
  public $provenanceBytes;

  /**
   * @param Google_Service_OnDemandScanning_BuildProvenance
   */
  public function setProvenance(Google_Service_OnDemandScanning_BuildProvenance $provenance)
  {
    $this->provenance = $provenance;
  }
  /**
   * @return Google_Service_OnDemandScanning_BuildProvenance
   */
  public function getProvenance()
  {
    return $this->provenance;
  }
  public function setProvenanceBytes($provenanceBytes)
  {
    $this->provenanceBytes = $provenanceBytes;
  }
  public function getProvenanceBytes()
  {
    return $this->provenanceBytes;
  }
}
