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

class Google_Service_DLP_GooglePrivacyDlpV2HybridFindingDetails extends Google_Model
{
  protected $containerDetailsType = 'Google_Service_DLP_GooglePrivacyDlpV2Container';
  protected $containerDetailsDataType = '';
  public $fileOffset;
  public $labels;
  public $rowOffset;
  protected $tableOptionsType = 'Google_Service_DLP_GooglePrivacyDlpV2TableOptions';
  protected $tableOptionsDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Container
   */
  public function setContainerDetails(Google_Service_DLP_GooglePrivacyDlpV2Container $containerDetails)
  {
    $this->containerDetails = $containerDetails;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Container
   */
  public function getContainerDetails()
  {
    return $this->containerDetails;
  }
  public function setFileOffset($fileOffset)
  {
    $this->fileOffset = $fileOffset;
  }
  public function getFileOffset()
  {
    return $this->fileOffset;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setRowOffset($rowOffset)
  {
    $this->rowOffset = $rowOffset;
  }
  public function getRowOffset()
  {
    return $this->rowOffset;
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
