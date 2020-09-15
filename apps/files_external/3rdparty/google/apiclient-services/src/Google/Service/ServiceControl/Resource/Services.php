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
   * Private Preview. This feature is only available for approved services. This
   * method provides admission control for services that are integrated with
   * [Service Infrastructure](/service-infrastructure). It checks whether an
   * operation should be allowed based on the service configuration and relevant
   * policies. It must be called before the operation is executed. For more
   * information, see [Admission Control](/service-infrastructure/docs/admission-
   * control). NOTE: The admission control has an expected policy propagation
   * delay of 60s. The caller **must** not depend on the most recent policy
   * changes. NOTE: The admission control has a hard limit of 1 referenced
   * resources per call. If an operation refers to more than 1 resources, the
   * caller must call the Check method multiple times. This method requires the
   * `servicemanagement.services.check` permission on the specified service. For
   * more information, see [Service Control API Access
   * Control](https://cloud.google.com/service-infrastructure/docs/service-control
   * /access-control). (services.check)
   *
   * @param string $serviceName The service name as specified in its service
   * configuration. For example, `"pubsub.googleapis.com"`. See
   * [google.api.Service](https://cloud.google.com/service-
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
   * Private Preview. This feature is only available for approved services. This
   * method provides telemetry reporting for services that are integrated with
   * [Service Infrastructure](/service-infrastructure). It reports a list of
   * operations that have occurred on a service. It must be called after the
   * operations have been executed. For more information, see [Telemetry Reporting
   * ](/service-infrastructure/docs/telemetry-reporting). NOTE: The telemetry
   * reporting has a hard limit of 1000 operations and 1MB per Report call. It is
   * recommended to have no more than 100 operations per call. This method
   * requires the `servicemanagement.services.report` permission on the specified
   * service. For more information, see [Service Control API Access
   * Control](https://cloud.google.com/service-infrastructure/docs/service-control
   * /access-control). (services.report)
   *
   * @param string $serviceName The service name as specified in its service
   * configuration. For example, `"pubsub.googleapis.com"`. See
   * [google.api.Service](https://cloud.google.com/service-
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
