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

namespace Google\Service\Appengine\Resource;

use Google\Service\Appengine\Application;
use Google\Service\Appengine\Operation;
use Google\Service\Appengine\RepairApplicationRequest;

/**
 * The "apps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $appengineService = new Google\Service\Appengine(...);
 *   $apps = $appengineService->apps;
 *  </code>
 */
class Apps extends \Google\Service\Resource
{
  /**
   * Creates an App Engine application for a Google Cloud Platform project.
   * Required fields: id - The ID of the target Cloud Platform project. location -
   * The region (https://cloud.google.com/appengine/docs/locations) where you want
   * the App Engine application located.For more information about App Engine
   * applications, see Managing Projects, Applications, and Billing
   * (https://cloud.google.com/appengine/docs/standard/python/console/).
   * (apps.create)
   *
   * @param Application $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create(Application $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Gets information about an application. (apps.get)
   *
   * @param string $appsId Part of `name`. Name of the Application resource to
   * get. Example: apps/myapp.
   * @param array $optParams Optional parameters.
   * @return Application
   */
  public function get($appsId, $optParams = [])
  {
    $params = ['appsId' => $appsId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Application::class);
  }
  /**
   * Updates the specified Application resource. You can update the following
   * fields: auth_domain - Google authentication domain for controlling user
   * access to the application. default_cookie_expiration - Cookie expiration
   * policy for the application. iap - Identity-Aware Proxy properties for the
   * application. (apps.patch)
   *
   * @param string $appsId Part of `name`. Name of the Application resource to
   * update. Example: apps/myapp.
   * @param Application $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Standard field mask for the set of
   * fields to be updated.
   * @return Operation
   */
  public function patch($appsId, Application $postBody, $optParams = [])
  {
    $params = ['appsId' => $appsId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Recreates the required App Engine features for the specified App Engine
   * application, for example a Cloud Storage bucket or App Engine service
   * account. Use this method if you receive an error message about a missing
   * feature, for example, Error retrieving the App Engine service account. If you
   * have deleted your App Engine service account, this will not be able to
   * recreate it. Instead, you should attempt to use the IAM undelete API if
   * possible at https://cloud.google.com/iam/reference/rest/v1/projects.serviceAc
   * counts/undelete?apix_params=%7B"name"%3A"projects%2F-%2FserviceAccounts%2Funi
   * que_id"%2C"resource"%3A%7B%7D%7D . If the deletion was recent, the numeric ID
   * can be found in the Cloud Console Activity Log. (apps.repair)
   *
   * @param string $appsId Part of `name`. Name of the application to repair.
   * Example: apps/myapp
   * @param RepairApplicationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function repair($appsId, RepairApplicationRequest $postBody, $optParams = [])
  {
    $params = ['appsId' => $appsId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('repair', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Apps::class, 'Google_Service_Appengine_Resource_Apps');
