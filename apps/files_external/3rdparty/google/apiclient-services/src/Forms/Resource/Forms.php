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

use Google\Service\Forms\BatchUpdateFormRequest;
use Google\Service\Forms\BatchUpdateFormResponse;
use Google\Service\Forms\Form;

/**
 * The "forms" collection of methods.
 * Typical usage is:
 *  <code>
 *   $formsService = new Google\Service\Forms(...);
 *   $forms = $formsService->forms;
 *  </code>
 */
class Forms extends \Google\Service\Resource
{
  /**
   * Change the form with a batch of updates. (forms.batchUpdate)
   *
   * @param string $formId Required. The form ID.
   * @param BatchUpdateFormRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchUpdateFormResponse
   */
  public function batchUpdate($formId, BatchUpdateFormRequest $postBody, $optParams = [])
  {
    $params = ['formId' => $formId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', [$params], BatchUpdateFormResponse::class);
  }
  /**
   * Create a new form using the title given in the provided form message in the
   * request. *Important:* Only the form.info.title and form.info.document_title
   * fields are copied to the new form. All other fields including the form
   * description, items and settings are disallowed. To create a new form and add
   * items, you must first call forms.create to create an empty form with a title
   * and (optional) document title, and then call forms.update to add the items.
   * (forms.create)
   *
   * @param Form $postBody
   * @param array $optParams Optional parameters.
   * @return Form
   */
  public function create(Form $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Form::class);
  }
  /**
   * Get a form. (forms.get)
   *
   * @param string $formId Required. The form ID.
   * @param array $optParams Optional parameters.
   * @return Form
   */
  public function get($formId, $optParams = [])
  {
    $params = ['formId' => $formId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Form::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Forms::class, 'Google_Service_Forms_Resource_Forms');
