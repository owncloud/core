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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2KMapEstimationConfig extends \Google\Collection
{
  protected $collection_key = 'quasiIds';
  protected $auxiliaryTablesType = GooglePrivacyDlpV2AuxiliaryTable::class;
  protected $auxiliaryTablesDataType = 'array';
  protected $quasiIdsType = GooglePrivacyDlpV2TaggedField::class;
  protected $quasiIdsDataType = 'array';
  public $regionCode;

  /**
   * @param GooglePrivacyDlpV2AuxiliaryTable[]
   */
  public function setAuxiliaryTables($auxiliaryTables)
  {
    $this->auxiliaryTables = $auxiliaryTables;
  }
  /**
   * @return GooglePrivacyDlpV2AuxiliaryTable[]
   */
  public function getAuxiliaryTables()
  {
    return $this->auxiliaryTables;
  }
  /**
   * @param GooglePrivacyDlpV2TaggedField[]
   */
  public function setQuasiIds($quasiIds)
  {
    $this->quasiIds = $quasiIds;
  }
  /**
   * @return GooglePrivacyDlpV2TaggedField[]
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2KMapEstimationConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2KMapEstimationConfig');
