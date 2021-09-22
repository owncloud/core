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

class GoogleAnalyticsAdminV1alphaEnhancedMeasurementSettings extends \Google\Model
{
  public $fileDownloadsEnabled;
  public $name;
  public $outboundClicksEnabled;
  public $pageChangesEnabled;
  public $pageLoadsEnabled;
  public $pageViewsEnabled;
  public $scrollsEnabled;
  public $searchQueryParameter;
  public $siteSearchEnabled;
  public $streamEnabled;
  public $uriQueryParameter;
  public $videoEngagementEnabled;

  public function setFileDownloadsEnabled($fileDownloadsEnabled)
  {
    $this->fileDownloadsEnabled = $fileDownloadsEnabled;
  }
  public function getFileDownloadsEnabled()
  {
    return $this->fileDownloadsEnabled;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOutboundClicksEnabled($outboundClicksEnabled)
  {
    $this->outboundClicksEnabled = $outboundClicksEnabled;
  }
  public function getOutboundClicksEnabled()
  {
    return $this->outboundClicksEnabled;
  }
  public function setPageChangesEnabled($pageChangesEnabled)
  {
    $this->pageChangesEnabled = $pageChangesEnabled;
  }
  public function getPageChangesEnabled()
  {
    return $this->pageChangesEnabled;
  }
  public function setPageLoadsEnabled($pageLoadsEnabled)
  {
    $this->pageLoadsEnabled = $pageLoadsEnabled;
  }
  public function getPageLoadsEnabled()
  {
    return $this->pageLoadsEnabled;
  }
  public function setPageViewsEnabled($pageViewsEnabled)
  {
    $this->pageViewsEnabled = $pageViewsEnabled;
  }
  public function getPageViewsEnabled()
  {
    return $this->pageViewsEnabled;
  }
  public function setScrollsEnabled($scrollsEnabled)
  {
    $this->scrollsEnabled = $scrollsEnabled;
  }
  public function getScrollsEnabled()
  {
    return $this->scrollsEnabled;
  }
  public function setSearchQueryParameter($searchQueryParameter)
  {
    $this->searchQueryParameter = $searchQueryParameter;
  }
  public function getSearchQueryParameter()
  {
    return $this->searchQueryParameter;
  }
  public function setSiteSearchEnabled($siteSearchEnabled)
  {
    $this->siteSearchEnabled = $siteSearchEnabled;
  }
  public function getSiteSearchEnabled()
  {
    return $this->siteSearchEnabled;
  }
  public function setStreamEnabled($streamEnabled)
  {
    $this->streamEnabled = $streamEnabled;
  }
  public function getStreamEnabled()
  {
    return $this->streamEnabled;
  }
  public function setUriQueryParameter($uriQueryParameter)
  {
    $this->uriQueryParameter = $uriQueryParameter;
  }
  public function getUriQueryParameter()
  {
    return $this->uriQueryParameter;
  }
  public function setVideoEngagementEnabled($videoEngagementEnabled)
  {
    $this->videoEngagementEnabled = $videoEngagementEnabled;
  }
  public function getVideoEngagementEnabled()
  {
    return $this->videoEngagementEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaEnhancedMeasurementSettings::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaEnhancedMeasurementSettings');
