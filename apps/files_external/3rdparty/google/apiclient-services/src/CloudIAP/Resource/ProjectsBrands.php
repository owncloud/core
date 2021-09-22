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

namespace Google\Service\CloudIAP\Resource;

use Google\Service\CloudIAP\Brand;
use Google\Service\CloudIAP\ListBrandsResponse;

/**
 * The "brands" collection of methods.
 * Typical usage is:
 *  <code>
 *   $iapService = new Google\Service\CloudIAP(...);
 *   $brands = $iapService->brands;
 *  </code>
 */
class ProjectsBrands extends \Google\Service\Resource
{
  /**
   * Constructs a new OAuth brand for the project if one does not exist. The
   * created brand is "internal only", meaning that OAuth clients created under it
   * only accept requests from users who belong to the same G Suite organization
   * as the project. The brand is created in an un-reviewed status. NOTE: The
   * "internal only" status can be manually changed in the Google Cloud console.
   * Requires that a brand does not already exist for the project, and that the
   * specified support email is owned by the caller. (brands.create)
   *
   * @param string $parent Required. GCP Project number/id under which the brand
   * is to be created. In the following format: projects/{project_number/id}.
   * @param Brand $postBody
   * @param array $optParams Optional parameters.
   * @return Brand
   */
  public function create($parent, Brand $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Brand::class);
  }
  /**
   * Retrieves the OAuth brand of the project. (brands.get)
   *
   * @param string $name Required. Name of the brand to be fetched. In the
   * following format: projects/{project_number/id}/brands/{brand}.
   * @param array $optParams Optional parameters.
   * @return Brand
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Brand::class);
  }
  /**
   * Lists the existing brands for the project. (brands.listProjectsBrands)
   *
   * @param string $parent Required. GCP Project number/id. In the following
   * format: projects/{project_number/id}.
   * @param array $optParams Optional parameters.
   * @return ListBrandsResponse
   */
  public function listProjectsBrands($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListBrandsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsBrands::class, 'Google_Service_CloudIAP_Resource_ProjectsBrands');
