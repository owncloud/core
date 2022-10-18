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

namespace Google\Service\Integrations\Resource;

use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaIntegrationTemplateVersion;
use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaListIntegrationTemplateVersionsResponse;

/**
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $integrationsService = new Google\Service\Integrations(...);
 *   $versions = $integrationsService->versions;
 *  </code>
 */
class ProjectsLocationsProductsIntegrationtemplatesVersions extends \Google\Service\Resource
{
  /**
   * Creates an IntegrationTemplateVersion. (versions.create)
   *
   * @param string $parent Required. The parent resource where this
   * TemplateVersion will be created. Format: projects/{project}/location/{locatio
   * n}/product/{product}/integrationtemplates/{integrationtemplate}
   * @param GoogleCloudIntegrationsV1alphaIntegrationTemplateVersion $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudIntegrationsV1alphaIntegrationTemplateVersion
   */
  public function create($parent, GoogleCloudIntegrationsV1alphaIntegrationTemplateVersion $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudIntegrationsV1alphaIntegrationTemplateVersion::class);
  }
  /**
   * Returns an IntegrationTemplateVersion in the specified project.
   * (versions.get)
   *
   * @param string $name Required. The TemplateVersion to retrieve. Format: projec
   * ts/{project}/locations/{location}/products/{product}/integrationtemplates/{in
   * tegrationtemplate}/versions/{version}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudIntegrationsV1alphaIntegrationTemplateVersion
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudIntegrationsV1alphaIntegrationTemplateVersion::class);
  }
  /**
   * Returns the list of all IntegrationTemplateVersions in the specified project.
   * (versions.listProjectsLocationsProductsIntegrationtemplatesVersions)
   *
   * @param string $parent Required. Format: projects/{project}/location/{location
   * }/product/{product}/integrationtemplates/{integrationtemplate}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter syntax: defined in the EBNF grammar.
   * @opt_param int pageSize The maximum number of IntegrationTemplateVersions to
   * return. The service may return fewer than this value. If unspecified, at most
   * 50 versions will be returned. The maximum value is 1000; values above 1000
   * will be coerced to 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListIntegrationTemplateVersions` call. Provide this to retrieve the
   * subsequent page. When paginating, all other parameters provided to
   * `ListIntegrationTemplateVersions` must match the call that provided the page
   * token.
   * @return GoogleCloudIntegrationsV1alphaListIntegrationTemplateVersionsResponse
   */
  public function listProjectsLocationsProductsIntegrationtemplatesVersions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudIntegrationsV1alphaListIntegrationTemplateVersionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsProductsIntegrationtemplatesVersions::class, 'Google_Service_Integrations_Resource_ProjectsLocationsProductsIntegrationtemplatesVersions');
