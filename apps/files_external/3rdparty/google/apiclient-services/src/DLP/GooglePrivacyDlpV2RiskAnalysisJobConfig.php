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

class GooglePrivacyDlpV2RiskAnalysisJobConfig extends \Google\Collection
{
  protected $collection_key = 'actions';
  protected $actionsType = GooglePrivacyDlpV2Action::class;
  protected $actionsDataType = 'array';
  protected $privacyMetricType = GooglePrivacyDlpV2PrivacyMetric::class;
  protected $privacyMetricDataType = '';
  protected $sourceTableType = GooglePrivacyDlpV2BigQueryTable::class;
  protected $sourceTableDataType = '';

  /**
   * @param GooglePrivacyDlpV2Action[]
   */
  public function setActions($actions)
  {
    $this->actions = $actions;
  }
  /**
   * @return GooglePrivacyDlpV2Action[]
   */
  public function getActions()
  {
    return $this->actions;
  }
  /**
   * @param GooglePrivacyDlpV2PrivacyMetric
   */
  public function setPrivacyMetric(GooglePrivacyDlpV2PrivacyMetric $privacyMetric)
  {
    $this->privacyMetric = $privacyMetric;
  }
  /**
   * @return GooglePrivacyDlpV2PrivacyMetric
   */
  public function getPrivacyMetric()
  {
    return $this->privacyMetric;
  }
  /**
   * @param GooglePrivacyDlpV2BigQueryTable
   */
  public function setSourceTable(GooglePrivacyDlpV2BigQueryTable $sourceTable)
  {
    $this->sourceTable = $sourceTable;
  }
  /**
   * @return GooglePrivacyDlpV2BigQueryTable
   */
  public function getSourceTable()
  {
    return $this->sourceTable;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2RiskAnalysisJobConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2RiskAnalysisJobConfig');
