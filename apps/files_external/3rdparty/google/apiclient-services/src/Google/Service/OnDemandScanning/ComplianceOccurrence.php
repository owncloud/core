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

class Google_Service_OnDemandScanning_ComplianceOccurrence extends Google_Collection
{
  protected $collection_key = 'nonCompliantFiles';
  public $nonComplianceReason;
  protected $nonCompliantFilesType = 'Google_Service_OnDemandScanning_NonCompliantFile';
  protected $nonCompliantFilesDataType = 'array';

  public function setNonComplianceReason($nonComplianceReason)
  {
    $this->nonComplianceReason = $nonComplianceReason;
  }
  public function getNonComplianceReason()
  {
    return $this->nonComplianceReason;
  }
  /**
   * @param Google_Service_OnDemandScanning_NonCompliantFile[]
   */
  public function setNonCompliantFiles($nonCompliantFiles)
  {
    $this->nonCompliantFiles = $nonCompliantFiles;
  }
  /**
   * @return Google_Service_OnDemandScanning_NonCompliantFile[]
   */
  public function getNonCompliantFiles()
  {
    return $this->nonCompliantFiles;
  }
}
