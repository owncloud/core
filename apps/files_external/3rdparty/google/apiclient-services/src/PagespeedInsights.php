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

namespace Google\Service;

use Google\Client;

/**
 * Service definition for PagespeedInsights (v5).
 *
 * <p>
 * The PageSpeed Insights API lets you analyze the performance of your website
 * with a simple API. It offers tailored suggestions for how you can optimize
 * your site, and lets you easily integrate PageSpeed Insights analysis into
 * your development tools and workflow.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/speed/docs/insights/v5/about" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class PagespeedInsights extends \Google\Service
{
  /** Associate you with your personal info on Google. */
  const OPENID =
      "openid";

  public $pagespeedapi;

  /**
   * Constructs the internal representation of the PagespeedInsights service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://pagespeedonline.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v5';
    $this->serviceName = 'pagespeedonline';

    $this->pagespeedapi = new PagespeedInsights\Resource\Pagespeedapi(
        $this,
        $this->serviceName,
        'pagespeedapi',
        [
          'methods' => [
            'runpagespeed' => [
              'path' => 'pagespeedonline/v5/runPagespeed',
              'httpMethod' => 'GET',
              'parameters' => [
                'url' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'captchaToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'category' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'strategy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'utm_campaign' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'utm_source' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PagespeedInsights::class, 'Google_Service_PagespeedInsights');
