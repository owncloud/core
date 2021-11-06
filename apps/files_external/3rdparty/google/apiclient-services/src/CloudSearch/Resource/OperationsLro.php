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

namespace Google\Service\CloudSearch\Resource;

use Google\Service\CloudSearch\ListOperationsResponse;

/**
 * The "lro" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsearchService = new Google\Service\CloudSearch(...);
 *   $lro = $cloudsearchService->lro;
 *  </code>
 */
class OperationsLro extends \Google\Service\Resource
{
  /**
   * Lists operations that match the specified filter in the request. If the
   * server doesn't support this method, it returns `UNIMPLEMENTED`. NOTE: the
   * `name` binding allows API services to override the binding to use different
   * resource name schemes, such as `users/operations`. To override the binding,
   * API services can add a binding such as `"/v1/{name=users}/operations"` to
   * their service configuration. For backwards compatibility, the default name
   * includes the operations collection id, however overriding users must ensure
   * the name binding is the parent resource, without the operations collection
   * id. (lro.listOperationsLro)
   *
   * @param string $name The name of the operation's parent resource.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The standard list filter.
   * @opt_param int pageSize The standard list page size.
   * @opt_param string pageToken The standard list page token.
   * @return ListOperationsResponse
   */
  public function listOperationsLro($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListOperationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OperationsLro::class, 'Google_Service_CloudSearch_Resource_OperationsLro');
