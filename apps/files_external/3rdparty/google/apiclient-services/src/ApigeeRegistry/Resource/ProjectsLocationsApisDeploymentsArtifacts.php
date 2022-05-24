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

namespace Google\Service\ApigeeRegistry\Resource;

use Google\Service\ApigeeRegistry\ApigeeregistryEmpty;
use Google\Service\ApigeeRegistry\Artifact;
use Google\Service\ApigeeRegistry\HttpBody;
use Google\Service\ApigeeRegistry\ListArtifactsResponse;

/**
 * The "artifacts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeregistryService = new Google\Service\ApigeeRegistry(...);
 *   $artifacts = $apigeeregistryService->artifacts;
 *  </code>
 */
class ProjectsLocationsApisDeploymentsArtifacts extends \Google\Service\Resource
{
  /**
   * CreateArtifact creates a specified artifact. (artifacts.create)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * artifacts. Format: {parent}
   * @param Artifact $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string artifactId Required. The ID to use for the artifact, which
   * will become the final component of the artifact's resource name. This value
   * should be 4-63 characters, and valid characters are /a-z-/. Following
   * AIP-162, IDs must not have the form of a UUID.
   * @return Artifact
   */
  public function create($parent, Artifact $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Artifact::class);
  }
  /**
   * DeleteArtifact removes a specified artifact. (artifacts.delete)
   *
   * @param string $name Required. The name of the artifact to delete. Format:
   * {parent}/artifacts
   * @param array $optParams Optional parameters.
   * @return ApigeeregistryEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], ApigeeregistryEmpty::class);
  }
  /**
   * GetArtifact returns a specified artifact. (artifacts.get)
   *
   * @param string $name Required. The name of the artifact to retrieve. Format:
   * {parent}/artifacts
   * @param array $optParams Optional parameters.
   * @return Artifact
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Artifact::class);
  }
  /**
   * GetArtifactContents returns the contents of a specified artifact. If
   * artifacts are stored with GZip compression, the default behavior is to return
   * the artifact uncompressed (the mime_type response field indicates the exact
   * format returned). (artifacts.getContents)
   *
   * @param string $name Required. The name of the artifact whose contents should
   * be retrieved. Format: {parent}/artifacts
   * @param array $optParams Optional parameters.
   * @return HttpBody
   */
  public function getContents($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getContents', [$params], HttpBody::class);
  }
  /**
   * ListArtifacts returns matching artifacts.
   * (artifacts.listProjectsLocationsApisDeploymentsArtifacts)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * artifacts. Format: {parent}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter An expression that can be used to filter the list.
   * Filters use the Common Expression Language and can refer to all message
   * fields except contents.
   * @opt_param int pageSize The maximum number of artifacts to return. The
   * service may return fewer than this value. If unspecified, at most 50 values
   * will be returned. The maximum is 1000; values above 1000 will be coerced to
   * 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListArtifacts` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListArtifacts` must match the
   * call that provided the page token.
   * @return ListArtifactsResponse
   */
  public function listProjectsLocationsApisDeploymentsArtifacts($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListArtifactsResponse::class);
  }
  /**
   * ReplaceArtifact can be used to replace a specified artifact.
   * (artifacts.replaceArtifact)
   *
   * @param string $name Resource name.
   * @param Artifact $postBody
   * @param array $optParams Optional parameters.
   * @return Artifact
   */
  public function replaceArtifact($name, Artifact $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('replaceArtifact', [$params], Artifact::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsApisDeploymentsArtifacts::class, 'Google_Service_ApigeeRegistry_Resource_ProjectsLocationsApisDeploymentsArtifacts');
