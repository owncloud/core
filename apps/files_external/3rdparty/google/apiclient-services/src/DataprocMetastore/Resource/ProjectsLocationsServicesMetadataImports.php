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

namespace Google\Service\DataprocMetastore\Resource;

use Google\Service\DataprocMetastore\ListMetadataImportsResponse;
use Google\Service\DataprocMetastore\MetadataImport;
use Google\Service\DataprocMetastore\Operation;

/**
 * The "metadataImports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $metastoreService = new Google\Service\DataprocMetastore(...);
 *   $metadataImports = $metastoreService->metadataImports;
 *  </code>
 */
class ProjectsLocationsServicesMetadataImports extends \Google\Service\Resource
{
  /**
   * Creates a new MetadataImport in a given project and location.
   * (metadataImports.create)
   *
   * @param string $parent Required. The relative resource name of the service in
   * which to create a metastore import, in the following
   * form:projects/{project_number}/locations/{location_id}/services/{service_id}.
   * @param MetadataImport $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string metadataImportId Required. The ID of the metadata import,
   * which is used as the final component of the metadata import's name.This value
   * must be between 1 and 64 characters long, begin with a letter, end with a
   * letter or number, and consist of alpha-numeric ASCII characters or hyphens.
   * @opt_param string requestId Optional. A request ID. Specify a unique request
   * ID to allow the server to ignore the request if it has completed. The server
   * will ignore subsequent requests that provide a duplicate request ID for at
   * least 60 minutes after the first request.For example, if an initial request
   * times out, followed by another request with the same request ID, the server
   * ignores the second request to prevent the creation of duplicate
   * commitments.The request ID must be a valid UUID
   * (https://en.wikipedia.org/wiki/Universally_unique_identifier#Format) A zero
   * UUID (00000000-0000-0000-0000-000000000000) is not supported.
   * @return Operation
   */
  public function create($parent, MetadataImport $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Gets details of a single import. (metadataImports.get)
   *
   * @param string $name Required. The relative resource name of the metadata
   * import to retrieve, in the following form:projects/{project_number}/locations
   * /{location_id}/services/{service_id}/metadataImports/{import_id}.
   * @param array $optParams Optional parameters.
   * @return MetadataImport
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], MetadataImport::class);
  }
  /**
   * Lists imports in a service.
   * (metadataImports.listProjectsLocationsServicesMetadataImports)
   *
   * @param string $parent Required. The relative resource name of the service
   * whose metadata imports to list, in the following form:projects/{project_numbe
   * r}/locations/{location_id}/services/{service_id}/metadataImports.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter to apply to list results.
   * @opt_param string orderBy Optional. Specify the ordering of results as
   * described in Sorting Order
   * (https://cloud.google.com/apis/design/design_patterns#sorting_order). If not
   * specified, the results will be sorted in the default order.
   * @opt_param int pageSize Optional. The maximum number of imports to return.
   * The response may contain less than the maximum number. If unspecified, no
   * more than 500 imports are returned. The maximum value is 1000; values above
   * 1000 are changed to 1000.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * DataprocMetastore.ListServices call. Provide this token to retrieve the
   * subsequent page.To retrieve the first page, supply an empty page token.When
   * paginating, other parameters provided to DataprocMetastore.ListServices must
   * match the call that provided the page token.
   * @return ListMetadataImportsResponse
   */
  public function listProjectsLocationsServicesMetadataImports($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListMetadataImportsResponse::class);
  }
  /**
   * Updates a single import. Only the description field of MetadataImport is
   * supported to be updated. (metadataImports.patch)
   *
   * @param string $name Immutable. The relative resource name of the metadata
   * import, of the form:projects/{project_number}/locations/{location_id}/service
   * s/{service_id}/metadataImports/{metadata_import_id}.
   * @param MetadataImport $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A request ID. Specify a unique request
   * ID to allow the server to ignore the request if it has completed. The server
   * will ignore subsequent requests that provide a duplicate request ID for at
   * least 60 minutes after the first request.For example, if an initial request
   * times out, followed by another request with the same request ID, the server
   * ignores the second request to prevent the creation of duplicate
   * commitments.The request ID must be a valid UUID
   * (https://en.wikipedia.org/wiki/Universally_unique_identifier#Format) A zero
   * UUID (00000000-0000-0000-0000-000000000000) is not supported.
   * @opt_param string updateMask Required. A field mask used to specify the
   * fields to be overwritten in the metadata import resource by the update.
   * Fields specified in the update_mask are relative to the resource (not to the
   * full request). A field is overwritten if it is in the mask.
   * @return Operation
   */
  public function patch($name, MetadataImport $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsServicesMetadataImports::class, 'Google_Service_DataprocMetastore_Resource_ProjectsLocationsServicesMetadataImports');
