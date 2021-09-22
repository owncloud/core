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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaApproveDisplayVideo360AdvertiserLinkProposalResponse extends \Google\Model
{
  protected $displayVideo360AdvertiserLinkType = GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink::class;
  protected $displayVideo360AdvertiserLinkDataType = '';

  /**
   * @param GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink
   */
  public function setDisplayVideo360AdvertiserLink(GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink $displayVideo360AdvertiserLink)
  {
    $this->displayVideo360AdvertiserLink = $displayVideo360AdvertiserLink;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink
   */
  public function getDisplayVideo360AdvertiserLink()
  {
    return $this->displayVideo360AdvertiserLink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaApproveDisplayVideo360AdvertiserLinkProposalResponse::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaApproveDisplayVideo360AdvertiserLinkProposalResponse');
