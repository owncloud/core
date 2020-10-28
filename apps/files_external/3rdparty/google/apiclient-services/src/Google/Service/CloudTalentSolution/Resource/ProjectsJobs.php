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
 *   $jobsService = new Google_Service_CloudTalentSolution(...);
 *   $jobs = $jobsService->jobs;
 *  </code>
 */
class Google_Service_CloudTalentSolution_Resource_ProjectsJobs extends Google_Service_Resource
{
  /**
   * Deletes a list of Jobs by filter. (jobs.batchDelete)
   *
   * @param string $parent Required. The resource name of the project under which
   * the job is created. The format is "projects/{project_id}", for example,
   * "projects/api-test-project".
   * @param Google_Service_CloudTalentSolution_BatchDeleteJobsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTalentSolution_JobsEmpty
   */
  public function batchDelete($parent, Google_Service_CloudTalentSolution_BatchDeleteJobsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', array($params), "Google_Service_CloudTalentSolution_JobsEmpty");
  }
  /**
   * Creates a new job. Typically, the job becomes searchable within 10 seconds,
   * but it may take up to 5 minutes. (jobs.create)
   *
   * @param string $parent Required. The resource name of the project under which
   * the job is created. The format is "projects/{project_id}", for example,
   * "projects/api-test-project".
   * @param Google_Service_CloudTalentSolution_CreateJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTalentSolution_Job
   */
  public function create($parent, Google_Service_CloudTalentSolution_CreateJobRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudTalentSolution_Job");
  }
  /**
   * Deletes the specified job. Typically, the job becomes unsearchable within 10
   * seconds, but it may take up to 5 minutes. (jobs.delete)
   *
   * @param string $name Required. The resource name of the job to be deleted. The
   * format is "projects/{project_id}/jobs/{job_id}", for example, "projects/api-
   * test-project/jobs/1234".
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTalentSolution_JobsEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudTalentSolution_JobsEmpty");
  }
  /**
   * Retrieves the specified job, whose status is OPEN or recently EXPIRED within
   * the last 90 days. (jobs.get)
   *
   * @param string $name Required. The resource name of the job to retrieve. The
   * format is "projects/{project_id}/jobs/{job_id}", for example, "projects/api-
   * test-project/jobs/1234".
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTalentSolution_Job
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudTalentSolution_Job");
  }
  /**
   * Lists jobs by filter. (jobs.listProjectsJobs)
   *
   * @param string $parent Required. The resource name of the project under which
   * the job is created. The format is "projects/{project_id}", for example,
   * "projects/api-test-project".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string jobView Optional. The desired job attributes returned for
   * jobs in the search response. Defaults to JobView.JOB_VIEW_FULL if no value is
   * specified.
   * @opt_param string filter Required. The filter string specifies the jobs to be
   * enumerated. Supported operator: =, AND The fields eligible for filtering are:
   * * `companyName` (Required) * `requisitionId` (Optional) Sample Query: *
   * companyName = "projects/api-test-project/companies/123" * companyName =
   * "projects/api-test-project/companies/123" AND requisitionId = "req-1"
   * @opt_param int pageSize Optional. The maximum number of jobs to be returned
   * per page of results. If job_view is set to JobView.JOB_VIEW_ID_ONLY, the
   * maximum allowed page size is 1000. Otherwise, the maximum allowed page size
   * is 100. Default is 100 if empty or a number < 1 is specified.
   * @opt_param string pageToken Optional. The starting point of a query result.
   * @return Google_Service_CloudTalentSolution_ListJobsResponse
   */
  public function listProjectsJobs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudTalentSolution_ListJobsResponse");
  }
  /**
   * Updates specified job. Typically, updated contents become visible in search
   * results within 10 seconds, but it may take up to 5 minutes. (jobs.patch)
   *
   * @param string $name Required during job update. The resource name for the
   * job. This is generated by the service when a job is created. The format is
   * "projects/{project_id}/jobs/{job_id}", for example, "projects/api-test-
   * project/jobs/1234". Use of this field in job queries and API calls is
   * preferred over the use of requisition_id since this value is unique.
   * @param Google_Service_CloudTalentSolution_UpdateJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTalentSolution_Job
   */
  public function patch($name, Google_Service_CloudTalentSolution_UpdateJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudTalentSolution_Job");
  }
  /**
   * Searches for jobs using the provided SearchJobsRequest. This call constrains
   * the visibility of jobs present in the database, and only returns jobs that
   * the caller has permission to search against. (jobs.search)
   *
   * @param string $parent Required. The resource name of the project to search
   * within. The format is "projects/{project_id}", for example, "projects/api-
   * test-project".
   * @param Google_Service_CloudTalentSolution_SearchJobsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTalentSolution_SearchJobsResponse
   */
  public function search($parent, Google_Service_CloudTalentSolution_SearchJobsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_CloudTalentSolution_SearchJobsResponse");
  }
  /**
   * Searches for jobs using the provided SearchJobsRequest. This API call is
   * intended for the use case of targeting passive job seekers (for example, job
   * seekers who have signed up to receive email alerts about potential job
   * opportunities), and has different algorithmic adjustments that are targeted
   * to passive job seekers. This call constrains the visibility of jobs present
   * in the database, and only returns jobs the caller has permission to search
   * against. (jobs.searchForAlert)
   *
   * @param string $parent Required. The resource name of the project to search
   * within. The format is "projects/{project_id}", for example, "projects/api-
   * test-project".
   * @param Google_Service_CloudTalentSolution_SearchJobsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTalentSolution_SearchJobsResponse
   */
  public function searchForAlert($parent, Google_Service_CloudTalentSolution_SearchJobsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('searchForAlert', array($params), "Google_Service_CloudTalentSolution_SearchJobsResponse");
  }
}
