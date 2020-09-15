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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $jobsService = new Google_Service_CloudTalentSolution(...);
 *   $projects = $jobsService->projects;
 *  </code>
 */
class Google_Service_CloudTalentSolution_Resource_Projects extends Google_Service_Resource
{
  /**
   * Completes the specified prefix with keyword suggestions. Intended for use by
   * a job search auto-complete search box. (projects.complete)
   *
   * @param string $name Required. Resource name of project the completion is
   * performed within. The format is "projects/{project_id}", for example,
   * "projects/api-test-project".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string type Optional. The completion topic. The default is
   * CompletionType.COMBINED.
   * @opt_param string scope Optional. The scope of the completion. The defaults
   * is CompletionScope.PUBLIC.
   * @opt_param string companyName Optional. If provided, restricts completion to
   * specified company. The format is
   * "projects/{project_id}/companies/{company_id}", for example, "projects/api-
   * test-project/companies/foo".
   * @opt_param string query Required. The query used to generate suggestions. The
   * maximum number of allowed characters is 255.
   * @opt_param string languageCode Deprecated. Use language_codes instead.
   * Optional. The language of the query. This is the BCP-47 language code, such
   * as "en-US" or "sr-Latn". For more information, see [Tags for Identifying
   * Languages](https://tools.ietf.org/html/bcp47). For CompletionType.JOB_TITLE
   * type, only open jobs with the same language_code are returned. For
   * CompletionType.COMPANY_NAME type, only companies having open jobs with the
   * same language_code are returned. For CompletionType.COMBINED type, only open
   * jobs with the same language_code or companies having open jobs with the same
   * language_code are returned. The maximum number of allowed characters is 255.
   * @opt_param string languageCodes Optional. The list of languages of the query.
   * This is the BCP-47 language code, such as "en-US" or "sr-Latn". For more
   * information, see [Tags for Identifying
   * Languages](https://tools.ietf.org/html/bcp47). For CompletionType.JOB_TITLE
   * type, only open jobs with the same language_codes are returned. For
   * CompletionType.COMPANY_NAME type, only companies having open jobs with the
   * same language_codes are returned. For CompletionType.COMBINED type, only open
   * jobs with the same language_codes or companies having open jobs with the same
   * language_codes are returned. The maximum number of allowed characters is 255.
   * @opt_param int pageSize Required. Completion result count. The maximum
   * allowed page size is 10.
   * @return Google_Service_CloudTalentSolution_CompleteQueryResponse
   */
  public function complete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('complete', array($params), "Google_Service_CloudTalentSolution_CompleteQueryResponse");
  }
}
