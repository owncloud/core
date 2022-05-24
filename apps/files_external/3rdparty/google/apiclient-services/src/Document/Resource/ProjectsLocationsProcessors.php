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
use Google\Service\Document\GoogleCloudDocumentaiV1DisableProcessorRequest;
use Google\Service\Document\GoogleCloudDocumentaiV1EnableProcessorRequest;
use Google\Service\Document\GoogleCloudDocumentaiV1ListProcessorsResponse;
use Google\Service\Document\GoogleCloudDocumentaiV1ProcessRequest;
use Google\Service\Document\GoogleCloudDocumentaiV1ProcessResponse;
use Google\Service\Document\GoogleCloudDocumentaiV1Processor;
use Google\Service\Document\GoogleCloudDocumentaiV1SetDefaultProcessorVersionRequest;
use Google\Service\Document\GoogleLongrunningOperation;

/**
 * The "processors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $documentaiService = new Google\Service\Document(...);
 *   $processors = $documentaiService->processors;
 *  </code>
 */
class ProjectsLocationsProcessors extends \Google\Service\Resource
{
  /**
   * LRO endpoint to batch process many documents. The output is written to Cloud
   * Storage as JSON in the [Document] format. (processors.batchProcess)
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
   * Creates a processor from the type processor that the user chose. The
   * processor will be at "ENABLED" state by default after its creation.
   * (processors.create)
   *
   * @param string $parent Required. The parent (project and location) under which
   * to create the processor. Format: `projects/{project}/locations/{location}`
   * @param GoogleCloudDocumentaiV1Processor $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDocumentaiV1Processor
   */
  public function create($parent, GoogleCloudDocumentaiV1Processor $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDocumentaiV1Processor::class);
  }
  /**
   * Deletes the processor, unloads all deployed model artifacts if it was enabled
   * and then deletes all artifacts associated with this processor.
   * (processors.delete)
   *
   * @param string $name Required. The processor resource name to be deleted.
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
   * Disables a processor (processors.disable)
   *
   * @param string $name Required. The processor resource name to be disabled.
   * @param GoogleCloudDocumentaiV1DisableProcessorRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function disable($name, GoogleCloudDocumentaiV1DisableProcessorRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('disable', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Enables a processor (processors.enable)
   *
   * @param string $name Required. The processor resource name to be enabled.
   * @param GoogleCloudDocumentaiV1EnableProcessorRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function enable($name, GoogleCloudDocumentaiV1EnableProcessorRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('enable', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets a processor detail. (processors.get)
   *
   * @param string $name Required. The processor resource name.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDocumentaiV1Processor
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDocumentaiV1Processor::class);
  }
  /**
   * Lists all processors which belong to this project.
   * (processors.listProjectsLocationsProcessors)
   *
   * @param string $parent Required. The parent (project and location) which owns
   * this collection of Processors. Format:
   * `projects/{project}/locations/{location}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of processors to return. If
   * unspecified, at most 50 processors will be returned. The maximum value is
   * 100; values above 100 will be coerced to 100.
   * @opt_param string pageToken We will return the processors sorted by creation
   * time. The page token will point to the next processor.
   * @return GoogleCloudDocumentaiV1ListProcessorsResponse
   */
  public function listProjectsLocationsProcessors($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDocumentaiV1ListProcessorsResponse::class);
  }
  /**
   * Processes a single document. (processors.process)
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
   * Set the default (active) version of a Processor that will be used in
   * ProcessDocument and BatchProcessDocuments.
   * (processors.setDefaultProcessorVersion)
   *
   * @param string $processor Required. The resource name of the Processor to
   * change default version.
   * @param GoogleCloudDocumentaiV1SetDefaultProcessorVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function setDefaultProcessorVersion($processor, GoogleCloudDocumentaiV1SetDefaultProcessorVersionRequest $postBody, $optParams = [])
  {
    $params = ['processor' => $processor, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setDefaultProcessorVersion', [$params], GoogleLongrunningOperation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsProcessors::class, 'Google_Service_Document_Resource_ProjectsLocationsProcessors');
