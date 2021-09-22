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

namespace Google\Service\CloudComposer\Resource;

use Google\Service\CloudComposer\Environment;
use Google\Service\CloudComposer\ListEnvironmentsResponse;
use Google\Service\CloudComposer\Operation;

/**
 * The "environments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $composerService = new Google\Service\CloudComposer(...);
 *   $environments = $composerService->environments;
 *  </code>
 */
class ProjectsLocationsEnvironments extends \Google\Service\Resource
{
  /**
   * Create a new environment. (environments.create)
   *
   * @param string $parent The parent must be of the form
   * "projects/{projectId}/locations/{locationId}".
   * @param Environment $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create($parent, Environment $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Delete an environment. (environments.delete)
   *
   * @param string $name The environment to delete, in the form:
   * "projects/{projectId}/locations/{locationId}/environments/{environmentId}"
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Get an existing environment. (environments.get)
   *
   * @param string $name The resource name of the environment to get, in the form:
   * "projects/{projectId}/locations/{locationId}/environments/{environmentId}"
   * @param array $optParams Optional parameters.
   * @return Environment
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Environment::class);
  }
  /**
   * List environments. (environments.listProjectsLocationsEnvironments)
   *
   * @param string $parent List environments in the given project and location, in
   * the form: "projects/{projectId}/locations/{locationId}"
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of environments to return.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @return ListEnvironmentsResponse
   */
  public function listProjectsLocationsEnvironments($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListEnvironmentsResponse::class);
  }
  /**
   * Update an environment. (environments.patch)
   *
   * @param string $name The relative resource name of the environment to update,
   * in the form:
   * "projects/{projectId}/locations/{locationId}/environments/{environmentId}"
   * @param Environment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. A comma-separated list of paths,
   * relative to `Environment`, of fields to update. For example, to set the
   * version of scikit-learn to install in the environment to 0.19.0 and to remove
   * an existing installation of numpy, the `updateMask` parameter would include
   * the following two `paths` values: "config.softwareConfig.pypiPackages.scikit-
   * learn" and "config.softwareConfig.pypiPackages.numpy". The included patch
   * environment would specify the scikit-learn version as follows: { "config":{
   * "softwareConfig":{ "pypiPackages":{ "scikit-learn":"==0.19.0" } } } } Note
   * that in the above example, any existing PyPI packages other than scikit-learn
   * and numpy will be unaffected. Only one update type may be included in a
   * single request's `updateMask`. For example, one cannot update both the PyPI
   * packages and labels in the same request. However, it is possible to update
   * multiple members of a map field simultaneously in the same request. For
   * example, to set the labels "label1" and "label2" while clearing "label3"
   * (assuming it already exists), one can provide the paths "labels.label1",
   * "labels.label2", and "labels.label3" and populate the patch environment as
   * follows: { "labels":{ "label1":"new-label1-value" "label2":"new-label2-value"
   * } } Note that in the above example, any existing labels that are not included
   * in the `updateMask` will be unaffected. It is also possible to replace an
   * entire map field by providing the map field's path in the `updateMask`. The
   * new value of the field will be that which is provided in the patch
   * environment. For example, to delete all pre-existing user-specified PyPI
   * packages and install botocore at version 1.7.14, the `updateMask` would
   * contain the path "config.softwareConfig.pypiPackages", and the patch
   * environment would be the following: { "config":{ "softwareConfig":{
   * "pypiPackages":{ "botocore":"==1.7.14" } } } } **Note:** Only the following
   * fields can be updated: * `config.softwareConfig.pypiPackages` * Replace all
   * custom custom PyPI packages. If a replacement package map is not included in
   * `environment`, all custom PyPI packages are cleared. It is an error to
   * provide both this mask and a mask specifying an individual package. *
   * `config.softwareConfig.pypiPackages.`packagename * Update the custom PyPI
   * package *packagename*, preserving other packages. To delete the package,
   * include it in `updateMask`, and omit the mapping for it in
   * `environment.config.softwareConfig.pypiPackages`. It is an error to provide
   * both a mask of this form and the `config.softwareConfig.pypiPackages` mask. *
   * `labels` * Replace all environment labels. If a replacement labels map is not
   * included in `environment`, all labels are cleared. It is an error to provide
   * both this mask and a mask specifying one or more individual labels. *
   * `labels.`labelName * Set the label named *labelName*, while preserving other
   * labels. To delete the label, include it in `updateMask` and omit its mapping
   * in `environment.labels`. It is an error to provide both a mask of this form
   * and the `labels` mask. * `config.nodeCount` * Horizontally scale the number
   * of nodes in the environment. An integer greater than or equal to 3 must be
   * provided in the `config.nodeCount` field. *
   * `config.webServerNetworkAccessControl` * Replace the environment's current
   * `WebServerNetworkAccessControl`. * `config.databaseConfig` * Replace the
   * environment's current `DatabaseConfig`. * `config.webServerConfig` * Replace
   * the environment's current `WebServerConfig`. *
   * `config.softwareConfig.airflowConfigOverrides` * Replace all Apache Airflow
   * config overrides. If a replacement config overrides map is not included in
   * `environment`, all config overrides are cleared. It is an error to provide
   * both this mask and a mask specifying one or more individual config overrides.
   * * `config.softwareConfig.airflowConfigOverrides.`section-name * Override the
   * Apache Airflow config property *name* in the section named *section*,
   * preserving other properties. To delete the property override, include it in
   * `updateMask` and omit its mapping in
   * `environment.config.softwareConfig.airflowConfigOverrides`. It is an error to
   * provide both a mask of this form and the
   * `config.softwareConfig.airflowConfigOverrides` mask. *
   * `config.softwareConfig.envVariables` * Replace all environment variables. If
   * a replacement environment variable map is not included in `environment`, all
   * custom environment variables are cleared. It is an error to provide both this
   * mask and a mask specifying one or more individual environment variables.
   * @return Operation
   */
  public function patch($name, Environment $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsEnvironments::class, 'Google_Service_CloudComposer_Resource_ProjectsLocationsEnvironments');
