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

/**
 * The "processors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $documentaiService = new Google_Service_Document(...);
 *   $processors = $documentaiService->processors;
 *  </code>
 */
class Google_Service_Document_Resource_ProjectsLocationsProcessors extends Google_Service_Resource
{
  /**
   * LRO endpoint to batch process many documents. The output is written to Cloud
   * Storage as JSON in the [Document] format. (processors.batchProcess)
   *
   * @param string $name Required. The processor resource name.
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3BatchProcessRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Document_GoogleLongrunningOperation
   */
  public function batchProcess($name, Google_Service_Document_GoogleCloudDocumentaiV1beta3BatchProcessRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchProcess', array($params), "Google_Service_Document_GoogleLongrunningOperation");
  }
  /**
   * Processes a single document. (processors.process)
   *
   * @param string $name Required. The processor resource name.
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3ProcessRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta3ProcessResponse
   */
  public function process($name, Google_Service_Document_GoogleCloudDocumentaiV1beta3ProcessRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('process', array($params), "Google_Service_Document_GoogleCloudDocumentaiV1beta3ProcessResponse");
  }
}
