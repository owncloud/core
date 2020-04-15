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
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $jobsService = new Google_Service_JobService(...);
 *   $jobs = $jobsService->jobs;
 *  </code>
 */
class Google_Service_JobService_Resource_CompaniesJobs extends Google_Service_Resource
{
  /**
   * Deprecated. Use ListJobs instead.
   *
   * Lists all jobs associated with a company. (jobs.listCompaniesJobs)
   *
   * @param string $companyName Required.
   *
   * The resource name of the company that owns the jobs to be listed, such as,
   * "companies/0000aaaa-1111-bbbb-2222-cccc3333dddd".
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeJobsCount Deprecated. Please DO NOT use this field
   * except for small companies. Suggest counting jobs page by page instead.
   *
   * Optional.
   *
   * Set to true if the total number of open jobs is to be returned.
   *
   * Defaults to false.
   * @opt_param string pageToken Optional.
   *
   * The starting point of a query result.
   * @opt_param bool idsOnly Optional.
   *
   * If set to `true`, only job ID, job requisition ID and language code will be
   * returned.
   *
   * A typical use is to synchronize job repositories.
   *
   * Defaults to false.
   * @opt_param int pageSize Optional.
   *
   * The maximum number of jobs to be returned per page of results.
   *
   * If ids_only is set to true, the maximum allowed page size is 1000. Otherwise,
   * the maximum allowed page size is 100.
   *
   * Default is 100 if empty or a number < 1 is specified.
   * @opt_param string jobRequisitionId Optional.
   *
   * The requisition ID, also known as posting ID, assigned by the company to the
   * job.
   *
   * The maximum number of allowable characters is 225.
   * @return Google_Service_JobService_ListCompanyJobsResponse
   */
  public function listCompaniesJobs($companyName, $optParams = array())
  {
    $params = array('companyName' => $companyName);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_JobService_ListCompanyJobsResponse");
  }
}
