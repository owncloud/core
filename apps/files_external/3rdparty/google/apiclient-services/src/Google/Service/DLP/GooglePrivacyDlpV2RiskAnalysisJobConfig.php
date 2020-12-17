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

class Google_Service_DLP_GooglePrivacyDlpV2RiskAnalysisJobConfig extends Google_Collection
{
  protected $collection_key = 'actions';
  protected $actionsType = 'Google_Service_DLP_GooglePrivacyDlpV2Action';
  protected $actionsDataType = 'array';
  protected $privacyMetricType = 'Google_Service_DLP_GooglePrivacyDlpV2PrivacyMetric';
  protected $privacyMetricDataType = '';
  protected $sourceTableType = 'Google_Service_DLP_GooglePrivacyDlpV2BigQueryTable';
  protected $sourceTableDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Action[]
   */
  public function setActions($actions)
  {
    $this->actions = $actions;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Action[]
   */
  public function getActions()
  {
    return $this->actions;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2PrivacyMetric
   */
  public function setPrivacyMetric(Google_Service_DLP_GooglePrivacyDlpV2PrivacyMetric $privacyMetric)
  {
    $this->privacyMetric = $privacyMetric;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2PrivacyMetric
   */
  public function getPrivacyMetric()
  {
    return $this->privacyMetric;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2BigQueryTable
   */
  public function setSourceTable(Google_Service_DLP_GooglePrivacyDlpV2BigQueryTable $sourceTable)
  {
    $this->sourceTable = $sourceTable;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2BigQueryTable
   */
  public function getSourceTable()
  {
    return $this->sourceTable;
  }
}
