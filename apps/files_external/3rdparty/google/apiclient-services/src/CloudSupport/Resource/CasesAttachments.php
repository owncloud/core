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

namespace Google\Service\CloudSupport\Resource;

use Google\Service\CloudSupport\ListAttachmentsResponse;

/**
 * The "attachments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsupportService = new Google\Service\CloudSupport(...);
 *   $attachments = $cloudsupportService->attachments;
 *  </code>
 */
class CasesAttachments extends \Google\Service\Resource
{
  /**
   * Retrieve all attachments associated with a support case.
   * (attachments.listCasesAttachments)
   *
   * @param string $parent Required. The resource name of Case object for which
   * attachments should be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of attachments fetched with each
   * request. If not provided, the default is 10. The maximum page size that will
   * be returned is 100.
   * @opt_param string pageToken A token identifying the page of results to
   * return. If unspecified, the first page is retrieved.
   * @return ListAttachmentsResponse
   */
  public function listCasesAttachments($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAttachmentsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CasesAttachments::class, 'Google_Service_CloudSupport_Resource_CasesAttachments');
