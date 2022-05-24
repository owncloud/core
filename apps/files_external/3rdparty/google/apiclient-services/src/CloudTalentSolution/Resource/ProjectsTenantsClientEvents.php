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

use Google\Service\CloudTalentSolution\ClientEvent;

/**
 * The "clientEvents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $jobsService = new Google\Service\CloudTalentSolution(...);
 *   $clientEvents = $jobsService->clientEvents;
 *  </code>
 */
class ProjectsTenantsClientEvents extends \Google\Service\Resource
{
  /**
   * Report events issued when end user interacts with customer's application that
   * uses Cloud Talent Solution. You may inspect the created events in [self
   * service tools](https://console.cloud.google.com/talent-solution/overview).
   * [Learn more](https://cloud.google.com/talent-solution/docs/management-tools)
   * about self service tools. (clientEvents.create)
   *
   * @param string $parent Required. Resource name of the tenant under which the
   * event is created. The format is "projects/{project_id}/tenants/{tenant_id}",
   * for example, "projects/foo/tenants/bar".
   * @param ClientEvent $postBody
   * @param array $optParams Optional parameters.
   * @return ClientEvent
   */
  public function create($parent, ClientEvent $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ClientEvent::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsTenantsClientEvents::class, 'Google_Service_CloudTalentSolution_Resource_ProjectsTenantsClientEvents');
