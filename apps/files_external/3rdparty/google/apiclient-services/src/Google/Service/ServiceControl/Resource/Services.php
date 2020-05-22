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
 * The "services" collection of methods.
 * Typical usage is:
 *  <code>
 *   $servicecontrolService = new Google_Service_ServiceControl(...);
 *   $services = $servicecontrolService->services;
 *  </code>
 */
class Google_Service_ServiceControl_Resource_Services extends Google_Service_Resource
{
  /**
   * Attempts to allocate quota for the specified consumer. It should be called
   * before the operation is executed.
   *
   * This method requires the `servicemanagement.services.quota` permission on the
   * specified service. For more information, see [Cloud
   * IAM](https://cloud.google.com/iam).
   *
   * **NOTE:** The client **must** fail-open on server errors `INTERNAL`,
   * `UNKNOWN`, `DEADLINE_EXCEEDED`, and `UNAVAILABLE`. To ensure system
   * reliability, the server may inject these errors to prohibit any hard
   * dependency on the quota functionality. (services.allocateQuota)
   *
   * @param string $serviceName Name of the service as specified in the service
   * configuration. For example, `"pubsub.googleapis.com"`.
   *
   * See google.api.Service for the definition of a service name.
   * @param Google_Service_ServiceControl_AllocateQuotaRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceControl_AllocateQuotaResponse
   */
  public function allocateQuota($serviceName, Google_Service_ServiceControl_AllocateQuotaRequest $postBody, $optParams = array())
  {
    $params = array('serviceName' => $serviceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('allocateQuota', array($params), "Google_Service_ServiceControl_AllocateQuotaResponse");
  }
  /**
   * Checks whether an operation on a service should be allowed to proceed based
   * on the configuration of the service and related policies. It must be called
   * before the operation is executed.
   *
   * If feasible, the client should cache the check results and reuse them for 60
   * seconds. In case of any server errors, the client should rely on the cached
   * results for much longer time to avoid outage. WARNING: There is general 60s
   * delay for the configuration and policy propagation, therefore callers MUST
   * NOT depend on the `Check` method having the latest policy information.
   *
   * NOTE: the CheckRequest has the size limit of 64KB.
   *
   * This method requires the `servicemanagement.services.check` permission on the
   * specified service. For more information, see [Cloud
   * IAM](https://cloud.google.com/iam). (services.check)
   *
   * @param string $serviceName The service name as specified in its service
   * configuration. For example, `"pubsub.googleapis.com"`.
   *
   * See [google.api.Service](https://cloud.google.com/service-
   * management/reference/rpc/google.api#google.api.Service) for the definition of
   * a service name.
   * @param Google_Service_ServiceControl_CheckRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceControl_CheckResponse
   */
  public function check($serviceName, Google_Service_ServiceControl_CheckRequest $postBody, $optParams = array())
  {
    $params = array('serviceName' => $serviceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('check', array($params), "Google_Service_ServiceControl_CheckResponse");
  }
  /**
   * Reports operation results to Google Service Control, such as logs and
   * metrics. It should be called after an operation is completed.
   *
   * If feasible, the client should aggregate reporting data for up to 5 seconds
   * to reduce API traffic. Limiting aggregation to 5 seconds is to reduce data
   * loss during client crashes. Clients should carefully choose the aggregation
   * time window to avoid data loss risk more than 0.01% for business and
   * compliance reasons.
   *
   * NOTE: the ReportRequest has the size limit (wire-format byte size) of 1MB.
   *
   * This method requires the `servicemanagement.services.report` permission on
   * the specified service. For more information, see [Google Cloud
   * IAM](https://cloud.google.com/iam). (services.report)
   *
   * @param string $serviceName The service name as specified in its service
   * configuration. For example, `"pubsub.googleapis.com"`.
   *
   * See [google.api.Service](https://cloud.google.com/service-
   * management/reference/rpc/google.api#google.api.Service) for the definition of
   * a service name.
   * @param Google_Service_ServiceControl_ReportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceControl_ReportResponse
   */
  public function report($serviceName, Google_Service_ServiceControl_ReportRequest $postBody, $optParams = array())
  {
    $params = array('serviceName' => $serviceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('report', array($params), "Google_Service_ServiceControl_ReportResponse");
  }
}
