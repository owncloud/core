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

use Google\Service\Document\GoogleCloudDocumentaiV1ReviewDocumentRequest;
use Google\Service\Document\GoogleLongrunningOperation;

/**
 * The "humanReviewConfig" collection of methods.
 * Typical usage is:
 *  <code>
 *   $documentaiService = new Google\Service\Document(...);
 *   $humanReviewConfig = $documentaiService->humanReviewConfig;
 *  </code>
 */
class ProjectsLocationsProcessorsHumanReviewConfig extends \Google\Service\Resource
{
  /**
   * Send a document for Human Review. The input document should be processed by
   * the specified processor. (humanReviewConfig.reviewDocument)
   *
   * @param string $humanReviewConfig Required. The resource name of the
   * HumanReviewConfig that the document will be reviewed with.
   * @param GoogleCloudDocumentaiV1ReviewDocumentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function reviewDocument($humanReviewConfig, GoogleCloudDocumentaiV1ReviewDocumentRequest $postBody, $optParams = [])
  {
    $params = ['humanReviewConfig' => $humanReviewConfig, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reviewDocument', [$params], GoogleLongrunningOperation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsProcessorsHumanReviewConfig::class, 'Google_Service_Document_Resource_ProjectsLocationsProcessorsHumanReviewConfig');
