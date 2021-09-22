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

namespace Google\Service\FactCheckTools\Resource;

use Google\Service\FactCheckTools\GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkupPage;
use Google\Service\FactCheckTools\GoogleFactcheckingFactchecktoolsV1alpha1ListClaimReviewMarkupPagesResponse;
use Google\Service\FactCheckTools\GoogleProtobufEmpty;

/**
 * The "pages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $factchecktoolsService = new Google\Service\FactCheckTools(...);
 *   $pages = $factchecktoolsService->pages;
 *  </code>
 */
class Pages extends \Google\Service\Resource
{
  /**
   * Create `ClaimReview` markup on a page. (pages.create)
   *
   * @param GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkupPage $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkupPage
   */
  public function create(GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkupPage $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkupPage::class);
  }
  /**
   * Delete all `ClaimReview` markup on a page. (pages.delete)
   *
   * @param string $name The name of the resource to delete, in the form of
   * `pages/{page_id}`.
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
   * Get all `ClaimReview` markup on a page. (pages.get)
   *
   * @param string $name The name of the resource to get, in the form of
   * `pages/{page_id}`.
   * @param array $optParams Optional parameters.
   * @return GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkupPage
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkupPage::class);
  }
  /**
   * List the `ClaimReview` markup pages for a specific URL or for an
   * organization. (pages.listPages)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int offset An integer that specifies the current offset (that is,
   * starting result location) in search results. This field is only considered if
   * `page_token` is unset, and if the request is not for a specific URL. For
   * example, 0 means to return results starting from the first matching result,
   * and 10 means to return from the 11th result.
   * @opt_param string organization The organization for which we want to fetch
   * markups for. For instance, "site.com". Cannot be specified along with an URL.
   * @opt_param int pageSize The pagination size. We will return up to that many
   * results. Defaults to 10 if not set. Has no effect if a URL is requested.
   * @opt_param string pageToken The pagination token. You may provide the
   * `next_page_token` returned from a previous List request, if any, in order to
   * get the next page. All other fields must have the same values as in the
   * previous request.
   * @opt_param string url The URL from which to get `ClaimReview` markup. There
   * will be at most one result. If markup is associated with a more canonical
   * version of the URL provided, we will return that URL instead. Cannot be
   * specified along with an organization.
   * @return GoogleFactcheckingFactchecktoolsV1alpha1ListClaimReviewMarkupPagesResponse
   */
  public function listPages($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleFactcheckingFactchecktoolsV1alpha1ListClaimReviewMarkupPagesResponse::class);
  }
  /**
   * Update for all `ClaimReview` markup on a page Note that this is a full
   * update. To retain the existing `ClaimReview` markup on a page, first perform
   * a Get operation, then modify the returned markup, and finally call Update
   * with the entire `ClaimReview` markup as the body. (pages.update)
   *
   * @param string $name The name of this `ClaimReview` markup page resource, in
   * the form of `pages/{page_id}`. Except for update requests, this field is
   * output-only and should not be set by the user.
   * @param GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkupPage $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkupPage
   */
  public function update($name, GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkupPage $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], GoogleFactcheckingFactchecktoolsV1alpha1ClaimReviewMarkupPage::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Pages::class, 'Google_Service_FactCheckTools_Resource_Pages');
