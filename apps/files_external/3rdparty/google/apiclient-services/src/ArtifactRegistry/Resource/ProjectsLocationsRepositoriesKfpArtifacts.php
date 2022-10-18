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

namespace Google\Service\ArtifactRegistry\Resource;

use Google\Service\ArtifactRegistry\UploadKfpArtifactMediaResponse;
use Google\Service\ArtifactRegistry\UploadKfpArtifactRequest;

/**
 * The "kfpArtifacts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $artifactregistryService = new Google\Service\ArtifactRegistry(...);
 *   $kfpArtifacts = $artifactregistryService->kfpArtifacts;
 *  </code>
 */
class ProjectsLocationsRepositoriesKfpArtifacts extends \Google\Service\Resource
{
  /**
   * Directly uploads a KFP artifact. The returned Operation will complete once
   * the resource is uploaded. Package, Version, and File resources will be
   * created based on the uploaded artifact. Uploaded artifacts that conflict with
   * existing resources will be overwritten. (kfpArtifacts.upload)
   *
   * @param string $parent The resource name of the repository where the KFP
   * artifact will be uploaded.
   * @param UploadKfpArtifactRequest $postBody
   * @param array $optParams Optional parameters.
   * @return UploadKfpArtifactMediaResponse
   */
  public function upload($parent, UploadKfpArtifactRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('upload', [$params], UploadKfpArtifactMediaResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsRepositoriesKfpArtifacts::class, 'Google_Service_ArtifactRegistry_Resource_ProjectsLocationsRepositoriesKfpArtifacts');
