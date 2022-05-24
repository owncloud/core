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

namespace Google\Service\CloudTalentSolution\Resource;

use Google\Service\CloudTalentSolution\BatchCreateJobsRequest;
use Google\Service\CloudTalentSolution\BatchDeleteJobsRequest;
use Google\Service\CloudTalentSolution\BatchUpdateJobsRequest;
use Google\Service\CloudTalentSolution\Job;
use Google\Service\CloudTalentSolution\JobsEmpty;
use Google\Service\CloudTalentSolution\ListJobsResponse;
use Google\Service\CloudTalentSolution\Operation;
use Google\Service\CloudTalentSolution\SearchJobsRequest;
use Google\Service\CloudTalentSolution\SearchJobsResponse;

/**
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $jobsService = new Google\Service\CloudTalentSolution(...);
 *   $jobs = $jobsService->jobs;
 *  </code>
 */
class ProjectsTenantsJobs extends \Google\Service\Resource
{
  /**
   * Begins executing a batch create jobs operation. (jobs.batchCreate)
   *
   * @param string $parent Required. The resource name of the tenant under which
   * the job is created. The format is
   * "projects/{project_id}/tenants/{tenant_id}". For example,
   * "projects/foo/tenants/bar".
   * @param BatchCreateJobsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function batchCreate($parent, BatchCreateJobsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchCreate', [$params], Operation::class);
  }
  /**
   * Begins executing a batch delete jobs operation. (jobs.batchDelete)
   *
   * @param string $parent Required. The resource name of the tenant under which
   * the job is created. The format is
   * "projects/{project_id}/tenants/{tenant_id}". For example,
   * "projects/foo/tenants/bar". The parent of all of the jobs specified in
   * `names` must match this field.
   * @param BatchDeleteJobsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function batchDelete($parent, BatchDeleteJobsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', [$params], Operation::class);
  }
  /**
   * Begins executing a batch update jobs operation. (jobs.batchUpdate)
   *
   * @param string $parent Required. The resource name of the tenant under which
   * the job is created. The format is
   * "projects/{project_id}/tenants/{tenant_id}". For example,
   * "projects/foo/tenants/bar".
   * @param BatchUpdateJobsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function batchUpdate($parent, BatchUpdateJobsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', [$params], Operation::class);
  }
  /**
   * Creates a new job. Typically, the job becomes searchable within 10 seconds,
   * but it may take up to 5 minutes. (jobs.create)
   *
   * @param string $parent Required. The resource name of the tenant under which
   * the job is created. The format is
   * "projects/{project_id}/tenants/{tenant_id}". For example,
   * "projects/foo/tenants/bar".
   * @param Job $postBody
   * @param array $optParams Optional parameters.
   * @return Job
   */
  public function create($parent, Job $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Job::class);
  }
  /**
   * Deletes the specified job. Typically, the job becomes unsearchable within 10
   * seconds, but it may take up to 5 minutes. (jobs.delete)
   *
   * @param string $name Required. The resource name of the job to be deleted. The
   * format is "projects/{project_id}/tenants/{tenant_id}/jobs/{job_id}". For
   * example, "projects/foo/tenants/bar/jobs/baz".
   * @param array $optParams Optional parameters.
   * @return JobsEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], JobsEmpty::class);
  }
  /**
   * Retrieves the specified job, whose status is OPEN or recently EXPIRED within
   * the last 90 days. (jobs.get)
   *
   * @param string $name Required. The resource name of the job to retrieve. The
   * format is "projects/{project_id}/tenants/{tenant_id}/jobs/{job_id}". For
   * example, "projects/foo/tenants/bar/jobs/baz".
   * @param array $optParams Optional parameters.
   * @return Job
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Job::class);
  }
  /**
   * Lists jobs by filter. (jobs.listProjectsTenantsJobs)
   *
   * @param string $parent Required. The resource name of the tenant under which
   * the job is created. The format is
   * "projects/{project_id}/tenants/{tenant_id}". For example,
   * "projects/foo/tenants/bar".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Required. The filter string specifies the jobs to be
   * enumerated. Supported operator: =, AND The fields eligible for filtering are:
   * * `companyName` * `requisitionId` * `status` Available values: OPEN, EXPIRED,
   * ALL. Defaults to OPEN if no value is specified. At least one of `companyName`
   * and `requisitionId` must present or an INVALID_ARGUMENT error is thrown.
   * Sample Query: * companyName = "projects/foo/tenants/bar/companies/baz" *
   * companyName = "projects/foo/tenants/bar/companies/baz" AND requisitionId =
   * "req-1" * companyName = "projects/foo/tenants/bar/companies/baz" AND status =
   * "EXPIRED" * requisitionId = "req-1" * requisitionId = "req-1" AND status =
   * "EXPIRED"
   * @opt_param string jobView The desired job attributes returned for jobs in the
   * search response. Defaults to JobView.JOB_VIEW_FULL if no value is specified.
   * @opt_param int pageSize The maximum number of jobs to be returned per page of
   * results. If job_view is set to JobView.JOB_VIEW_ID_ONLY, the maximum allowed
   * page size is 1000. Otherwise, the maximum allowed page size is 100. Default
   * is 100 if empty or a number < 1 is specified.
   * @opt_param string pageToken The starting point of a query result.
   * @return ListJobsResponse
   */
  public function listProjectsTenantsJobs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListJobsResponse::class);
  }
  /**
   * Updates specified job. Typically, updated contents become visible in search
   * results within 10 seconds, but it may take up to 5 minutes. (jobs.patch)
   *
   * @param string $name Required during job update. The resource name for the
   * job. This is generated by the service when a job is created. The format is
   * "projects/{project_id}/tenants/{tenant_id}/jobs/{job_id}". For example,
   * "projects/foo/tenants/bar/jobs/baz". Use of this field in job queries and API
   * calls is preferred over the use of requisition_id since this value is unique.
   * @param Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Strongly recommended for the best service
   * experience. If update_mask is provided, only the specified fields in job are
   * updated. Otherwise all the fields are updated. A field mask to restrict the
   * fields that are updated. Only top level fields of Job are supported.
   * @return Job
   */
  public function patch($name, Job $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Job::class);
  }
  /**
   * Searches for jobs using the provided SearchJobsRequest. This call constrains
   * the visibility of jobs present in the database, and only returns jobs that
   * the caller has permission to search against. (jobs.search)
   *
   * @param string $parent Required. The resource name of the tenant to search
   * within. The format is "projects/{project_id}/tenants/{tenant_id}". For
   * example, "projects/foo/tenants/bar".
   * @param SearchJobsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SearchJobsResponse
   */
  public function search($parent, SearchJobsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], SearchJobsResponse::class);
  }
  /**
   * Searches for jobs using the provided SearchJobsRequest. This API call is
   * intended for the use case of targeting passive job seekers (for example, job
   * seekers who have signed up to receive email alerts about potential job
   * opportunities), it has different algorithmic adjustments that are designed to
   * specifically target passive job seekers. This call constrains the visibility
   * of jobs present in the database, and only returns jobs the caller has
   * permission to search against. (jobs.searchForAlert)
   *
   * @param string $parent Required. The resource name of the tenant to search
   * within. The format is "projects/{project_id}/tenants/{tenant_id}". For
   * example, "projects/foo/tenants/bar".
   * @param SearchJobsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SearchJobsResponse
   */
  public function searchForAlert($parent, SearchJobsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('searchForAlert', [$params], SearchJobsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsTenantsJobs::class, 'Google_Service_CloudTalentSolution_Resource_ProjectsTenantsJobs');
