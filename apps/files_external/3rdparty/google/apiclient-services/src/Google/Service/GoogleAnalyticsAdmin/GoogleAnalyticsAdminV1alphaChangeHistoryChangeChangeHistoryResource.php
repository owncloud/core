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

class Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaChangeHistoryChangeChangeHistoryResource extends Google_Model
{
  protected $accountType = 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAccount';
  protected $accountDataType = '';
  protected $androidAppDataStreamType = 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAndroidAppDataStream';
  protected $androidAppDataStreamDataType = '';
  protected $firebaseLinkType = 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaFirebaseLink';
  protected $firebaseLinkDataType = '';
  protected $googleAdsLinkType = 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaGoogleAdsLink';
  protected $googleAdsLinkDataType = '';
  protected $iosAppDataStreamType = 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaIosAppDataStream';
  protected $iosAppDataStreamDataType = '';
  protected $propertyType = 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaProperty';
  protected $propertyDataType = '';
  protected $webDataStreamType = 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaWebDataStream';
  protected $webDataStreamDataType = '';

  /**
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAccount
   */
  public function setAccount(Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAccount $account)
  {
    $this->account = $account;
  }
  /**
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAccount
   */
  public function getAccount()
  {
    return $this->account;
  }
  /**
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAndroidAppDataStream
   */
  public function setAndroidAppDataStream(Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAndroidAppDataStream $androidAppDataStream)
  {
    $this->androidAppDataStream = $androidAppDataStream;
  }
  /**
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAndroidAppDataStream
   */
  public function getAndroidAppDataStream()
  {
    return $this->androidAppDataStream;
  }
  /**
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaFirebaseLink
   */
  public function setFirebaseLink(Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaFirebaseLink $firebaseLink)
  {
    $this->firebaseLink = $firebaseLink;
  }
  /**
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaFirebaseLink
   */
  public function getFirebaseLink()
  {
    return $this->firebaseLink;
  }
  /**
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaGoogleAdsLink
   */
  public function setGoogleAdsLink(Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaGoogleAdsLink $googleAdsLink)
  {
    $this->googleAdsLink = $googleAdsLink;
  }
  /**
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaGoogleAdsLink
   */
  public function getGoogleAdsLink()
  {
    return $this->googleAdsLink;
  }
  /**
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaIosAppDataStream
   */
  public function setIosAppDataStream(Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaIosAppDataStream $iosAppDataStream)
  {
    $this->iosAppDataStream = $iosAppDataStream;
  }
  /**
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaIosAppDataStream
   */
  public function getIosAppDataStream()
  {
    return $this->iosAppDataStream;
  }
  /**
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaProperty
   */
  public function setProperty(Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaProperty $property)
  {
    $this->property = $property;
  }
  /**
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaProperty
   */
  public function getProperty()
  {
    return $this->property;
  }
  /**
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaWebDataStream
   */
  public function setWebDataStream(Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaWebDataStream $webDataStream)
  {
    $this->webDataStream = $webDataStream;
  }
  /**
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaWebDataStream
   */
  public function getWebDataStream()
  {
    return $this->webDataStream;
  }
}
