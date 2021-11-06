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

namespace Google\Service\PagespeedInsights\Resource;

use Google\Service\PagespeedInsights\PagespeedApiPagespeedResponseV5;

/**
 * The "pagespeedapi" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pagespeedonlineService = new Google\Service\PagespeedInsights(...);
 *   $pagespeedapi = $pagespeedonlineService->pagespeedapi;
 *  </code>
 */
class Pagespeedapi extends \Google\Service\Resource
{
  /**
   * Runs PageSpeed analysis on the page at the specified URL, and returns
   * PageSpeed scores, a list of suggestions to make that page faster, and other
   * information. (pagespeedapi.runpagespeed)
   *
   * @param string $url Required. The URL to fetch and analyze
   * @param array $optParams Optional parameters.
   *
   * @opt_param string captchaToken The captcha token passed when filling out a
   * captcha.
   * @opt_param string category A Lighthouse category to run; if none are given,
   * only Performance category will be run
   * @opt_param string locale The locale used to localize formatted results
   * @opt_param string strategy The analysis strategy (desktop or mobile) to use,
   * and desktop is the default
   * @opt_param string utm_campaign Campaign name for analytics.
   * @opt_param string utm_source Campaign source for analytics.
   * @return PagespeedApiPagespeedResponseV5
   */
  public function runpagespeed($url, $optParams = [])
  {
    $params = ['url' => $url];
    $params = array_merge($params, $optParams);
    return $this->call('runpagespeed', [$params], PagespeedApiPagespeedResponseV5::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Pagespeedapi::class, 'Google_Service_PagespeedInsights_Resource_Pagespeedapi');
