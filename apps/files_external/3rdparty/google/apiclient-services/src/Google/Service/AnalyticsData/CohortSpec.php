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

class Google_Service_AnalyticsData_CohortSpec extends Google_Collection
{
  protected $collection_key = 'cohorts';
  protected $cohortReportSettingsType = 'Google_Service_AnalyticsData_CohortReportSettings';
  protected $cohortReportSettingsDataType = '';
  protected $cohortsType = 'Google_Service_AnalyticsData_Cohort';
  protected $cohortsDataType = 'array';
  protected $cohortsRangeType = 'Google_Service_AnalyticsData_CohortsRange';
  protected $cohortsRangeDataType = '';

  /**
   * @param Google_Service_AnalyticsData_CohortReportSettings
   */
  public function setCohortReportSettings(Google_Service_AnalyticsData_CohortReportSettings $cohortReportSettings)
  {
    $this->cohortReportSettings = $cohortReportSettings;
  }
  /**
   * @return Google_Service_AnalyticsData_CohortReportSettings
   */
  public function getCohortReportSettings()
  {
    return $this->cohortReportSettings;
  }
  /**
   * @param Google_Service_AnalyticsData_Cohort[]
   */
  public function setCohorts($cohorts)
  {
    $this->cohorts = $cohorts;
  }
  /**
   * @return Google_Service_AnalyticsData_Cohort[]
   */
  public function getCohorts()
  {
    return $this->cohorts;
  }
  /**
   * @param Google_Service_AnalyticsData_CohortsRange
   */
  public function setCohortsRange(Google_Service_AnalyticsData_CohortsRange $cohortsRange)
  {
    $this->cohortsRange = $cohortsRange;
  }
  /**
   * @return Google_Service_AnalyticsData_CohortsRange
   */
  public function getCohortsRange()
  {
    return $this->cohortsRange;
  }
}
