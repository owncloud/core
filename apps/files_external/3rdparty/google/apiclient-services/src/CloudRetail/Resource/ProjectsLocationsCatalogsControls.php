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

namespace Google\Service\CloudRetail\Resource;

use Google\Service\CloudRetail\GoogleCloudRetailV2Control;
use Google\Service\CloudRetail\GoogleCloudRetailV2ListControlsResponse;
use Google\Service\CloudRetail\GoogleProtobufEmpty;

/**
 * The "controls" collection of methods.
 * Typical usage is:
 *  <code>
 *   $retailService = new Google\Service\CloudRetail(...);
 *   $controls = $retailService->controls;
 *  </code>
 */
class ProjectsLocationsCatalogsControls extends \Google\Service\Resource
{
  /**
   * Creates a Control. If the Control to create already exists, an ALREADY_EXISTS
   * error is returned. (controls.create)
   *
   * @param string $parent Required. Full resource name of parent catalog. Format:
   * `projects/{project_number}/locations/{location_id}/catalogs/{catalog_id}`
   * @param GoogleCloudRetailV2Control $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string controlId Required. The ID to use for the Control, which
   * will become the final component of the Control's resource name. This value
   * should be 4-63 characters, and valid characters are /a-z-_/.
   * @return GoogleCloudRetailV2Control
   */
  public function create($parent, GoogleCloudRetailV2Control $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudRetailV2Control::class);
  }
  /**
   * Deletes a Control. If the Control to delete does not exist, a NOT_FOUND error
   * is returned. (controls.delete)
   *
   * @param string $name Required. The resource name of the Control to delete.
   * Format: `projects/{project_number}/locations/{location_id}/catalogs/{catalog_
   * id}/controls/{control_id}`
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets a Control. (controls.get)
   *
   * @param string $name Required. The resource name of the Control to get.
   * Format: `projects/{project_number}/locations/{location_id}/catalogs/{catalog_
   * id}/controls/{control_id}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRetailV2Control
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudRetailV2Control::class);
  }
  /**
   * Lists all Controls by their parent Catalog.
   * (controls.listProjectsLocationsCatalogsControls)
   *
   * @param string $parent Required. The catalog resource name. Format:
   * `projects/{project_number}/locations/{location_id}/catalogs/{catalog_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. A filter to apply on the list results.
   * Supported features: * List all the products under the parent branch if filter
   * is unset. * List controls that are used in a single ServingConfig:
   * 'serving_config = "boosted_home_page_cvr"'
   * @opt_param int pageSize Optional. Maximum number of results to return. If
   * unspecified, defaults to 50. Max allowed value is 1000.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListControls` call. Provide this to retrieve the subsequent page.
   * @return GoogleCloudRetailV2ListControlsResponse
   */
  public function listProjectsLocationsCatalogsControls($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudRetailV2ListControlsResponse::class);
  }
  /**
   * Updates a Control. Control cannot be set to a different oneof field, if so an
   * INVALID_ARGUMENT is returned. If the Control to update does not exist, a
   * NOT_FOUND error is returned. (controls.patch)
   *
   * @param string $name Immutable. Fully qualified name
   * `projects/locations/global/catalogs/controls`
   * @param GoogleCloudRetailV2Control $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Indicates which fields in the provided Control
   * to update. The following are NOT supported: * Control.name If not set or
   * empty, all supported fields are updated.
   * @return GoogleCloudRetailV2Control
   */
  public function patch($name, GoogleCloudRetailV2Control $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudRetailV2Control::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsCatalogsControls::class, 'Google_Service_CloudRetail_Resource_ProjectsLocationsCatalogsControls');
