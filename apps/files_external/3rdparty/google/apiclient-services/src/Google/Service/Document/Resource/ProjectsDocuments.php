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
 * The "documents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $documentaiService = new Google_Service_Document(...);
 *   $documents = $documentaiService->documents;
 *  </code>
 */
class Google_Service_Document_Resource_ProjectsDocuments extends Google_Service_Resource
{
  /**
   * LRO endpoint to batch process many documents. The output is written to Cloud
   * Storage as JSON in the [Document] format. (documents.batchProcess)
   *
   * @param string $parent Target project and location to make a call. Format:
   * `projects/{project-id}/locations/{location-id}`. If no location is specified,
   * a region will be chosen automatically.
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta2BatchProcessDocumentsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Document_GoogleLongrunningOperation
   */
  public function batchProcess($parent, Google_Service_Document_GoogleCloudDocumentaiV1beta2BatchProcessDocumentsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchProcess', array($params), "Google_Service_Document_GoogleLongrunningOperation");
  }
  /**
   * Processes a single document. (documents.process)
   *
   * @param string $parent Target project and location to make a call. Format:
   * `projects/{project-id}/locations/{location-id}`. If no location is specified,
   * a region will be chosen automatically. This field is only populated when used
   * in ProcessDocument method.
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta2ProcessDocumentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta2Document
   */
  public function process($parent, Google_Service_Document_GoogleCloudDocumentaiV1beta2ProcessDocumentRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('process', array($params), "Google_Service_Document_GoogleCloudDocumentaiV1beta2Document");
  }
}
