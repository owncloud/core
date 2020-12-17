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

class Google_Service_DLP_GooglePrivacyDlpV2DeltaPresenceEstimationConfig extends Google_Collection
{
  protected $collection_key = 'quasiIds';
  protected $auxiliaryTablesType = 'Google_Service_DLP_GooglePrivacyDlpV2StatisticalTable';
  protected $auxiliaryTablesDataType = 'array';
  protected $quasiIdsType = 'Google_Service_DLP_GooglePrivacyDlpV2QuasiId';
  protected $quasiIdsDataType = 'array';
  public $regionCode;

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2StatisticalTable[]
   */
  public function setAuxiliaryTables($auxiliaryTables)
  {
    $this->auxiliaryTables = $auxiliaryTables;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2StatisticalTable[]
   */
  public function getAuxiliaryTables()
  {
    return $this->auxiliaryTables;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2QuasiId[]
   */
  public function setQuasiIds($quasiIds)
  {
    $this->quasiIds = $quasiIds;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2QuasiId[]
   */
  public function getQuasiIds()
  {
    return $this->quasiIds;
  }
  public function setRegionCode($regionCode)
  {
    $this->regionCode = $regionCode;
  }
  public function getRegionCode()
  {
    return $this->regionCode;
  }
}
