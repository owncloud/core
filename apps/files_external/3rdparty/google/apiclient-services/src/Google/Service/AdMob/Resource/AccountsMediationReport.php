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

/**
 * The "mediationReport" collection of methods.
 * Typical usage is:
 *  <code>
 *   $admobService = new Google_Service_AdMob(...);
 *   $mediationReport = $admobService->mediationReport;
 *  </code>
 */
class Google_Service_AdMob_Resource_AccountsMediationReport extends Google_Service_Resource
{
  /**
   * Generates an AdMob Mediation report based on the provided report
   * specification. (mediationReport.generate)
   *
   * @param string $parent Resource name of the account to generate the report
   * for. Example: accounts/pub-9876543210987654
   * @param Google_Service_AdMob_GenerateMediationReportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdMob_GenerateMediationReportResponse
   */
  public function generate($parent, Google_Service_AdMob_GenerateMediationReportRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('generate', array($params), "Google_Service_AdMob_GenerateMediationReportResponse");
  }
}
