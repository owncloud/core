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

namespace Google\Service\Document\Resource;

use Google\Service\Document\GoogleCloudDocumentaiV1BatchProcessRequest;
use Google\Service\Document\GoogleCloudDocumentaiV1DeployProcessorVersionRequest;
use Google\Service\Document\GoogleCloudDocumentaiV1ListProcessorVersionsResponse;
use Google\Service\Document\GoogleCloudDocumentaiV1ProcessRequest;
use Google\Service\Document\GoogleCloudDocumentaiV1ProcessResponse;
use Google\Service\Document\GoogleCloudDocumentaiV1ProcessorVersion;
use Google\Service\Document\GoogleCloudDocumentaiV1UndeployProcessorVersionRequest;
use Google\Service\Document\GoogleLongrunningOperation;

/**
 * The "processorVersions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $documentaiService = new Google\Service\Document(...);
 *   $processorVersions = $documentaiService->processorVersions;
 *  </code>
 */
class ProjectsLocationsProcessorsProcessorVersions extends \Google\Service\Resource
{
  /**
   * LRO endpoint to batch process many documents. The output is written to Cloud
   * Storage as JSON in the [Document] format. (processorVersions.batchProcess)
   *
   * @param string $name Required. The resource name of Processor or
   * ProcessorVersion. Format:
   * `projects/{project}/locations/{location}/processors/{processor}`, or `project
   * s/{project}/locations/{location}/processors/{processor}/processorVersions/{pr
   * ocessorVersion}`
   * @param GoogleCloudDocumentaiV1BatchProcessRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function batchProcess($name, GoogleCloudDocumentaiV1BatchProcessRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchProcess', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes the processor version, all artifacts under the processor version will
   * be deleted. (processorVersions.delete)
   *
   * @param string $name Required. The processor version resource name to be
   * deleted.
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deploys the processor version. (processorVersions.deploy)
   *
   * @param string $name Required. The processor version resource name to be
   * deployed.
   * @param GoogleCloudDocumentaiV1DeployProcessorVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function deploy($name, GoogleCloudDocumentaiV1DeployProcessorVersionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('deploy', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets a processor version detail. (processorVersions.get)
   *
   * @param string $name Required. The processor resource name.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDocumentaiV1ProcessorVersion
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDocumentaiV1ProcessorVersion::class);
  }
  /**
   * Lists all versions of a processor.
   * (processorVersions.listProjectsLocationsProcessorsProcessorVersions)
   *
   * @param string $parent Required. The parent (project, location and processor)
   * to list all versions. Format:
   * `projects/{project}/locations/{location}/processors/{processor}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of processor versions to return.
   * If unspecified, at most 10 processor versions will be returned. The maximum
   * value is 20; values above 20 will be coerced to 20.
   * @opt_param string pageToken We will return the processor versions sorted by
   * creation time. The page token will point to the next processor version.
   * @return GoogleCloudDocumentaiV1ListProcessorVersionsResponse
   */
  public function listProjectsLocationsProcessorsProcessorVersions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDocumentaiV1ListProcessorVersionsResponse::class);
  }
  /**
   * Processes a single document. (processorVersions.process)
   *
   * @param string $name Required. The resource name of the Processor or
   * ProcessorVersion to use for processing. If a Processor is specified, the
   * server will use its default version. Format:
   * `projects/{project}/locations/{location}/processors/{processor}`, or `project
   * s/{project}/locations/{location}/processors/{processor}/processorVersions/{pr
   * ocessorVersion}`
   * @param GoogleCloudDocumentaiV1ProcessRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDocumentaiV1ProcessResponse
   */
  public function process($name, GoogleCloudDocumentaiV1ProcessRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('process', [$params], GoogleCloudDocumentaiV1ProcessResponse::class);
  }
  /**
   * Undeploys the processor version. (processorVersions.undeploy)
   *
   * @param string $name Required. The processor version resource name to be
   * undeployed.
   * @param GoogleCloudDocumentaiV1UndeployProcessorVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function undeploy($name, GoogleCloudDocumentaiV1UndeployProcessorVersionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('undeploy', [$params], GoogleLongrunningOperation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsProcessorsProcessorVersions::class, 'Google_Service_Document_Resource_ProjectsLocationsProcessorsProcessorVersions');
