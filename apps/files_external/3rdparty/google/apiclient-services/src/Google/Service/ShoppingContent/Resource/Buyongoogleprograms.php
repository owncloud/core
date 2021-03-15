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
 * The "buyongoogleprograms" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $buyongoogleprograms = $contentService->buyongoogleprograms;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Buyongoogleprograms extends Google_Service_Resource
{
  /**
   * Retrieves a status of BoG program for your Merchant Center account.
   * (buyongoogleprograms.get)
   *
   * @param string $merchantId Required. The ID of the account.
   * @param string $regionCode The Program region code [ISO 3166-1
   * alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). Currently only US
   * is available.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_BuyOnGoogleProgramStatus
   */
  public function get($merchantId, $regionCode, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'regionCode' => $regionCode);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ShoppingContent_BuyOnGoogleProgramStatus");
  }
  /**
   * Onboards BoG in your Merchant Center account. By using this method, you agree
   * to the [Terms of Service](https://merchants.google.com/mc/termsofservice/tran
   * sactions/US/latest). (buyongoogleprograms.onboard)
   *
   * @param string $merchantId Required. The ID of the account.
   * @param string $regionCode The program region code [ISO 3166-1
   * alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). Currently only US
   * is available.
   * @param Google_Service_ShoppingContent_OnboardBuyOnGoogleProgramRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function onboard($merchantId, $regionCode, Google_Service_ShoppingContent_OnboardBuyOnGoogleProgramRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'regionCode' => $regionCode, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('onboard', array($params));
  }
}
