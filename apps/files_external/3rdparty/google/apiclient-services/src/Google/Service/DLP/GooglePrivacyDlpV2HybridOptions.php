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

class Google_Service_DLP_GooglePrivacyDlpV2HybridOptions extends Google_Collection
{
  protected $collection_key = 'requiredFindingLabelKeys';
  public $description;
  public $labels;
  public $requiredFindingLabelKeys;
  protected $tableOptionsType = 'Google_Service_DLP_GooglePrivacyDlpV2TableOptions';
  protected $tableOptionsDataType = '';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setRequiredFindingLabelKeys($requiredFindingLabelKeys)
  {
    $this->requiredFindingLabelKeys = $requiredFindingLabelKeys;
  }
  public function getRequiredFindingLabelKeys()
  {
    return $this->requiredFindingLabelKeys;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2TableOptions
   */
  public function setTableOptions(Google_Service_DLP_GooglePrivacyDlpV2TableOptions $tableOptions)
  {
    $this->tableOptions = $tableOptions;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2TableOptions
   */
  public function getTableOptions()
  {
    return $this->tableOptions;
  }
}
