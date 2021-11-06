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

namespace Google\Service\DisplayVideo\Resource;

use Google\Service\DisplayVideo\BulkEditNegativeKeywordsRequest;
use Google\Service\DisplayVideo\BulkEditNegativeKeywordsResponse;
use Google\Service\DisplayVideo\DisplayvideoEmpty;
use Google\Service\DisplayVideo\ListNegativeKeywordsResponse;
use Google\Service\DisplayVideo\NegativeKeyword;
use Google\Service\DisplayVideo\ReplaceNegativeKeywordsRequest;
use Google\Service\DisplayVideo\ReplaceNegativeKeywordsResponse;

/**
 * The "negativeKeywords" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $negativeKeywords = $displayvideoService->negativeKeywords;
 *  </code>
 */
class AdvertisersNegativeKeywordListsNegativeKeywords extends \Google\Service\Resource
{
  /**
   * Bulk edits negative keywords in a single negative keyword list. The operation
   * will delete the negative keywords provided in
   * BulkEditNegativeKeywordsRequest.deleted_negative_keywords and then create the
   * negative keywords provided in
   * BulkEditNegativeKeywordsRequest.created_negative_keywords. This operation is
   * guaranteed to be atomic and will never result in a partial success or partial
   * failure. (negativeKeywords.bulkEdit)
   *
   * @param string $advertiserId Required. The ID of the DV360 advertiser to which
   * the parent negative keyword list belongs.
   * @param string $negativeKeywordListId Required. The ID of the parent negative
   * keyword list to which the negative keywords belong.
   * @param BulkEditNegativeKeywordsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BulkEditNegativeKeywordsResponse
   */
  public function bulkEdit($advertiserId, $negativeKeywordListId, BulkEditNegativeKeywordsRequest $postBody, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'negativeKeywordListId' => $negativeKeywordListId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('bulkEdit', [$params], BulkEditNegativeKeywordsResponse::class);
  }
  /**
   * Creates a negative keyword in a negative keyword list.
   * (negativeKeywords.create)
   *
   * @param string $advertiserId Required. The ID of the DV360 advertiser to which
   * the parent negative keyword list belongs.
   * @param string $negativeKeywordListId Required. The ID of the parent negative
   * keyword list in which the negative keyword will be created.
   * @param NegativeKeyword $postBody
   * @param array $optParams Optional parameters.
   * @return NegativeKeyword
   */
  public function create($advertiserId, $negativeKeywordListId, NegativeKeyword $postBody, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'negativeKeywordListId' => $negativeKeywordListId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], NegativeKeyword::class);
  }
  /**
   * Deletes a negative keyword from a negative keyword list.
   * (negativeKeywords.delete)
   *
   * @param string $advertiserId Required. The ID of the DV360 advertiser to which
   * the parent negative keyword list belongs.
   * @param string $negativeKeywordListId Required. The ID of the parent negative
   * keyword list to which the negative keyword belongs.
   * @param string $keywordValue Required. The keyword value of the negative
   * keyword to delete.
   * @param array $optParams Optional parameters.
   * @return DisplayvideoEmpty
   */
  public function delete($advertiserId, $negativeKeywordListId, $keywordValue, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'negativeKeywordListId' => $negativeKeywordListId, 'keywordValue' => $keywordValue];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DisplayvideoEmpty::class);
  }
  /**
   * Lists negative keywords in a negative keyword list.
   * (negativeKeywords.listAdvertisersNegativeKeywordListsNegativeKeywords)
   *
   * @param string $advertiserId Required. The ID of the DV360 advertiser to which
   * the parent negative keyword list belongs.
   * @param string $negativeKeywordListId Required. The ID of the parent negative
   * keyword list to which the requested negative keywords belong.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Allows filtering by negative keyword fields.
   * Supported syntax: * Filter expressions for negative keyword currently can
   * only contain at most one * restriction. * A restriction has the form of
   * `{field} {operator} {value}`. * The operator must be `CONTAINS (:)`. *
   * Supported fields: - `keywordValue` Examples: * All negative keywords for
   * which the keyword value contains "google": `keywordValue : "google"`
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `keywordValue` (default) The default sorting order is ascending. To
   * specify descending order for a field, a suffix " desc" should be added to the
   * field name. Example: `keywordValue desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `1000`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListNegativeKeywords` method. If not specified, the
   * first page of results will be returned.
   * @return ListNegativeKeywordsResponse
   */
  public function listAdvertisersNegativeKeywordListsNegativeKeywords($advertiserId, $negativeKeywordListId, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'negativeKeywordListId' => $negativeKeywordListId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListNegativeKeywordsResponse::class);
  }
  /**
   * Replaces all negative keywords in a single negative keyword list. The
   * operation will replace the keywords in a negative keyword list with keywords
   * provided in ReplaceNegativeKeywordsRequest.new_negative_keywords.
   * (negativeKeywords.replace)
   *
   * @param string $advertiserId Required. The ID of the DV360 advertiser to which
   * the parent negative keyword list belongs.
   * @param string $negativeKeywordListId Required. The ID of the parent negative
   * keyword list to which the negative keywords belong.
   * @param ReplaceNegativeKeywordsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ReplaceNegativeKeywordsResponse
   */
  public function replace($advertiserId, $negativeKeywordListId, ReplaceNegativeKeywordsRequest $postBody, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'negativeKeywordListId' => $negativeKeywordListId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('replace', [$params], ReplaceNegativeKeywordsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdvertisersNegativeKeywordListsNegativeKeywords::class, 'Google_Service_DisplayVideo_Resource_AdvertisersNegativeKeywordListsNegativeKeywords');
