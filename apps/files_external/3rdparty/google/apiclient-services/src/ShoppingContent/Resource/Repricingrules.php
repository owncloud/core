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

namespace Google\Service\ShoppingContent\Resource;

use Google\Service\ShoppingContent\ListRepricingRulesResponse;
use Google\Service\ShoppingContent\RepricingRule;

/**
 * The "repricingrules" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $repricingrules = $contentService->repricingrules;
 *  </code>
 */
class Repricingrules extends \Google\Service\Resource
{
  /**
   * Creates a repricing rule for your Merchant Center account.
   * (repricingrules.create)
   *
   * @param string $merchantId Required. The id of the merchant who owns the
   * repricing rule.
   * @param RepricingRule $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ruleId Required. The id of the rule to create.
   * @return RepricingRule
   */
  public function create($merchantId, RepricingRule $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], RepricingRule::class);
  }
  /**
   * Deletes a repricing rule in your Merchant Center account.
   * (repricingrules.delete)
   *
   * @param string $merchantId Required. The id of the merchant who owns the
   * repricing rule.
   * @param string $ruleId Required. The id of the rule to Delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($merchantId, $ruleId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'ruleId' => $ruleId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves a repricing rule from your Merchant Center account.
   * (repricingrules.get)
   *
   * @param string $merchantId Required. The id of the merchant who owns the
   * repricing rule.
   * @param string $ruleId Required. The id of the rule to retrieve.
   * @param array $optParams Optional parameters.
   * @return RepricingRule
   */
  public function get($merchantId, $ruleId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'ruleId' => $ruleId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], RepricingRule::class);
  }
  /**
   * Lists the repricing rules in your Merchant Center account.
   * (repricingrules.listRepricingrules)
   *
   * @param string $merchantId Required. The id of the merchant who owns the
   * repricing rule.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string countryCode [CLDR country
   * code](http://www.unicode.org/repos/cldr/tags/latest/common/main/en.xml) (e.g.
   * "US"), used as a filter on repricing rules.
   * @opt_param string languageCode The two-letter ISO 639-1 language code
   * associated with the repricing rule, used as a filter.
   * @opt_param int pageSize The maximum number of repricing rules to return. The
   * service may return fewer than this value. If unspecified, at most 50 rules
   * will be returned. The maximum value is 1000; values above 1000 will be
   * coerced to 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListRepricingRules` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListRepricingRules` must match
   * the call that provided the page token.
   * @return ListRepricingRulesResponse
   */
  public function listRepricingrules($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRepricingRulesResponse::class);
  }
  /**
   * Updates a repricing rule in your Merchant Center account. All mutable fields
   * will be overwritten in each update request. In each update, you must provide
   * all required mutable fields, or an error will be thrown. If you do not
   * provide an optional field in the update request, if that field currently
   * exists, it will be deleted from the rule. (repricingrules.patch)
   *
   * @param string $merchantId Required. The id of the merchant who owns the
   * repricing rule.
   * @param string $ruleId Required. The id of the rule to update.
   * @param RepricingRule $postBody
   * @param array $optParams Optional parameters.
   * @return RepricingRule
   */
  public function patch($merchantId, $ruleId, RepricingRule $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'ruleId' => $ruleId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], RepricingRule::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Repricingrules::class, 'Google_Service_ShoppingContent_Resource_Repricingrules');
