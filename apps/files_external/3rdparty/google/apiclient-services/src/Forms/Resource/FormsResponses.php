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

namespace Google\Service\Forms\Resource;

use Google\Service\Forms\FormResponse;
use Google\Service\Forms\ListFormResponsesResponse;

/**
 * The "responses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $formsService = new Google\Service\Forms(...);
 *   $responses = $formsService->responses;
 *  </code>
 */
class FormsResponses extends \Google\Service\Resource
{
  /**
   * Get one response from the form. (responses.get)
   *
   * @param string $formId Required. The form ID.
   * @param string $responseId Required. The response ID within the form.
   * @param array $optParams Optional parameters.
   * @return FormResponse
   */
  public function get($formId, $responseId, $optParams = [])
  {
    $params = ['formId' => $formId, 'responseId' => $responseId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], FormResponse::class);
  }
  /**
   * List a form's responses. (responses.listFormsResponses)
   *
   * @param string $formId Required. ID of the Form whose responses to list.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Which form responses to return. Currently, the only
   * supported filters are: * timestamp > *N* which means to get all form
   * responses submitted after (but not at) timestamp *N*. * timestamp >= *N*
   * which means to get all form responses submitted at and after timestamp *N*.
   * For both supported filters, timestamp must be formatted in RFC3339 UTC "Zulu"
   * format. Examples: "2014-10-02T15:01:23Z" and
   * "2014-10-02T15:01:23.045123456Z".
   * @opt_param int pageSize The maximum number of responses to return. The
   * service may return fewer than this value. If unspecified or zero, at most
   * 5000 responses are returned.
   * @opt_param string pageToken A page token returned by a previous list
   * response. If this field is set, the form and the values of the filter must be
   * the same as for the original request.
   * @return ListFormResponsesResponse
   */
  public function listFormsResponses($formId, $optParams = [])
  {
    $params = ['formId' => $formId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListFormResponsesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FormsResponses::class, 'Google_Service_Forms_Resource_FormsResponses');
