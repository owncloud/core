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

namespace Google\Service\Apigee\Resource;

use Google\Service\Apigee\GoogleCloudApigeeV1ArchiveDeployment;
use Google\Service\Apigee\GoogleCloudApigeeV1GenerateDownloadUrlRequest;
use Google\Service\Apigee\GoogleCloudApigeeV1GenerateDownloadUrlResponse;
use Google\Service\Apigee\GoogleCloudApigeeV1GenerateUploadUrlRequest;
use Google\Service\Apigee\GoogleCloudApigeeV1GenerateUploadUrlResponse;
use Google\Service\Apigee\GoogleCloudApigeeV1ListArchiveDeploymentsResponse;
use Google\Service\Apigee\GoogleLongrunningOperation;
use Google\Service\Apigee\GoogleProtobufEmpty;

/**
 * The "archiveDeployments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $archiveDeployments = $apigeeService->archiveDeployments;
 *  </code>
 */
class OrganizationsEnvironmentsArchiveDeployments extends \Google\Service\Resource
{
  /**
   * Creates a new ArchiveDeployment. (archiveDeployments.create)
   *
   * @param string $parent Required. The Environment this Archive Deployment will
   * be created in.
   * @param GoogleCloudApigeeV1ArchiveDeployment $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudApigeeV1ArchiveDeployment $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes an archive deployment. (archiveDeployments.delete)
   *
   * @param string $name Required. Name of the Archive Deployment in the following
   * format: `organizations/{org}/environments/{env}/archiveDeployments/{id}`.
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
   * Generates a signed URL for downloading the original zip file used to create
   * an Archive Deployment. The URL is only valid for a limited period and should
   * be used within minutes after generation. Each call returns a new upload URL.
   * (archiveDeployments.generateDownloadUrl)
   *
   * @param string $name Required. The name of the Archive Deployment you want to
   * download.
   * @param GoogleCloudApigeeV1GenerateDownloadUrlRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1GenerateDownloadUrlResponse
   */
  public function generateDownloadUrl($name, GoogleCloudApigeeV1GenerateDownloadUrlRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('generateDownloadUrl', [$params], GoogleCloudApigeeV1GenerateDownloadUrlResponse::class);
  }
  /**
   * Generates a signed URL for uploading an Archive zip file to Google Cloud
   * Storage. Once the upload is complete, the signed URL should be passed to
   * CreateArchiveDeployment. When uploading to the generated signed URL, please
   * follow these restrictions: * Source file type should be a zip file. * Source
   * file size should not exceed 1GB limit. * No credentials should be attached -
   * the signed URLs provide access to the target bucket using internal service
   * identity; if credentials were attached, the identity from the credentials
   * would be used, but that identity does not have permissions to upload files to
   * the URL. When making a HTTP PUT request, these two headers need to be
   * specified: * `content-type: application/zip` * `x-goog-content-length-range:
   * 0,1073741824` And this header SHOULD NOT be specified: * `Authorization:
   * Bearer YOUR_TOKEN` (archiveDeployments.generateUploadUrl)
   *
   * @param string $parent Required. The organization and environment to upload
   * to.
   * @param GoogleCloudApigeeV1GenerateUploadUrlRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1GenerateUploadUrlResponse
   */
  public function generateUploadUrl($parent, GoogleCloudApigeeV1GenerateUploadUrlRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('generateUploadUrl', [$params], GoogleCloudApigeeV1GenerateUploadUrlResponse::class);
  }
  /**
   * Gets the specified ArchiveDeployment. (archiveDeployments.get)
   *
   * @param string $name Required. Name of the Archive Deployment in the following
   * format: `organizations/{org}/environments/{env}/archiveDeployments/{id}`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1ArchiveDeployment
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1ArchiveDeployment::class);
  }
  /**
   * Lists the ArchiveDeployments in the specified Environment.
   * (archiveDeployments.listOrganizationsEnvironmentsArchiveDeployments)
   *
   * @param string $parent Required. Name of the Environment for which to list
   * Archive Deployments in the format: `organizations/{org}/environments/{env}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. An optional query used to return a subset
   * of Archive Deployments using the semantics defined in
   * https://google.aip.dev/160.
   * @opt_param int pageSize Optional. Maximum number of Archive Deployments to
   * return. If unspecified, at most 25 deployments will be returned.
   * @opt_param string pageToken Optional. Page token, returned from a previous
   * ListArchiveDeployments call, that you can use to retrieve the next page.
   * @return GoogleCloudApigeeV1ListArchiveDeploymentsResponse
   */
  public function listOrganizationsEnvironmentsArchiveDeployments($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1ListArchiveDeploymentsResponse::class);
  }
  /**
   * Updates an existing ArchiveDeployment. Labels can modified but most of the
   * other fields are not modifiable. (archiveDeployments.patch)
   *
   * @param string $name Name of the Archive Deployment in the following format:
   * `organizations/{org}/environments/{env}/archiveDeployments/{id}`.
   * @param GoogleCloudApigeeV1ArchiveDeployment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to be updated.
   * @return GoogleCloudApigeeV1ArchiveDeployment
   */
  public function patch($name, GoogleCloudApigeeV1ArchiveDeployment $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudApigeeV1ArchiveDeployment::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsEnvironmentsArchiveDeployments::class, 'Google_Service_Apigee_Resource_OrganizationsEnvironmentsArchiveDeployments');
