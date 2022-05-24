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

class GoogleAnalyticsAdminV1alphaChangeHistoryChangeChangeHistoryResource extends \Google\Model
{
  protected $accountType = GoogleAnalyticsAdminV1alphaAccount::class;
  protected $accountDataType = '';
  protected $conversionEventType = GoogleAnalyticsAdminV1alphaConversionEvent::class;
  protected $conversionEventDataType = '';
  protected $customDimensionType = GoogleAnalyticsAdminV1alphaCustomDimension::class;
  protected $customDimensionDataType = '';
  protected $customMetricType = GoogleAnalyticsAdminV1alphaCustomMetric::class;
  protected $customMetricDataType = '';
  protected $dataRetentionSettingsType = GoogleAnalyticsAdminV1alphaDataRetentionSettings::class;
  protected $dataRetentionSettingsDataType = '';
  protected $dataStreamType = GoogleAnalyticsAdminV1alphaDataStream::class;
  protected $dataStreamDataType = '';
  protected $displayVideo360AdvertiserLinkType = GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink::class;
  protected $displayVideo360AdvertiserLinkDataType = '';
  protected $displayVideo360AdvertiserLinkProposalType = GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLinkProposal::class;
  protected $displayVideo360AdvertiserLinkProposalDataType = '';
  protected $firebaseLinkType = GoogleAnalyticsAdminV1alphaFirebaseLink::class;
  protected $firebaseLinkDataType = '';
  protected $googleAdsLinkType = GoogleAnalyticsAdminV1alphaGoogleAdsLink::class;
  protected $googleAdsLinkDataType = '';
  protected $googleSignalsSettingsType = GoogleAnalyticsAdminV1alphaGoogleSignalsSettings::class;
  protected $googleSignalsSettingsDataType = '';
  protected $measurementProtocolSecretType = GoogleAnalyticsAdminV1alphaMeasurementProtocolSecret::class;
  protected $measurementProtocolSecretDataType = '';
  protected $propertyType = GoogleAnalyticsAdminV1alphaProperty::class;
  protected $propertyDataType = '';

  /**
   * @param GoogleAnalyticsAdminV1alphaAccount
   */
  public function setAccount(GoogleAnalyticsAdminV1alphaAccount $account)
  {
    $this->account = $account;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAccount
   */
  public function getAccount()
  {
    return $this->account;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaConversionEvent
   */
  public function setConversionEvent(GoogleAnalyticsAdminV1alphaConversionEvent $conversionEvent)
  {
    $this->conversionEvent = $conversionEvent;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaConversionEvent
   */
  public function getConversionEvent()
  {
    return $this->conversionEvent;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaCustomDimension
   */
  public function setCustomDimension(GoogleAnalyticsAdminV1alphaCustomDimension $customDimension)
  {
    $this->customDimension = $customDimension;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaCustomDimension
   */
  public function getCustomDimension()
  {
    return $this->customDimension;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaCustomMetric
   */
  public function setCustomMetric(GoogleAnalyticsAdminV1alphaCustomMetric $customMetric)
  {
    $this->customMetric = $customMetric;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaCustomMetric
   */
  public function getCustomMetric()
  {
    return $this->customMetric;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaDataRetentionSettings
   */
  public function setDataRetentionSettings(GoogleAnalyticsAdminV1alphaDataRetentionSettings $dataRetentionSettings)
  {
    $this->dataRetentionSettings = $dataRetentionSettings;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaDataRetentionSettings
   */
  public function getDataRetentionSettings()
  {
    return $this->dataRetentionSettings;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaDataStream
   */
  public function setDataStream(GoogleAnalyticsAdminV1alphaDataStream $dataStream)
  {
    $this->dataStream = $dataStream;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaDataStream
   */
  public function getDataStream()
  {
    return $this->dataStream;
  }
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
  /**
   * @param GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLinkProposal
   */
  public function setDisplayVideo360AdvertiserLinkProposal(GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLinkProposal $displayVideo360AdvertiserLinkProposal)
  {
    $this->displayVideo360AdvertiserLinkProposal = $displayVideo360AdvertiserLinkProposal;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLinkProposal
   */
  public function getDisplayVideo360AdvertiserLinkProposal()
  {
    return $this->displayVideo360AdvertiserLinkProposal;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaFirebaseLink
   */
  public function setFirebaseLink(GoogleAnalyticsAdminV1alphaFirebaseLink $firebaseLink)
  {
    $this->firebaseLink = $firebaseLink;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaFirebaseLink
   */
  public function getFirebaseLink()
  {
    return $this->firebaseLink;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaGoogleAdsLink
   */
  public function setGoogleAdsLink(GoogleAnalyticsAdminV1alphaGoogleAdsLink $googleAdsLink)
  {
    $this->googleAdsLink = $googleAdsLink;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaGoogleAdsLink
   */
  public function getGoogleAdsLink()
  {
    return $this->googleAdsLink;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaGoogleSignalsSettings
   */
  public function setGoogleSignalsSettings(GoogleAnalyticsAdminV1alphaGoogleSignalsSettings $googleSignalsSettings)
  {
    $this->googleSignalsSettings = $googleSignalsSettings;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaGoogleSignalsSettings
   */
  public function getGoogleSignalsSettings()
  {
    return $this->googleSignalsSettings;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaMeasurementProtocolSecret
   */
  public function setMeasurementProtocolSecret(GoogleAnalyticsAdminV1alphaMeasurementProtocolSecret $measurementProtocolSecret)
  {
    $this->measurementProtocolSecret = $measurementProtocolSecret;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaMeasurementProtocolSecret
   */
  public function getMeasurementProtocolSecret()
  {
    return $this->measurementProtocolSecret;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaProperty
   */
  public function setProperty(GoogleAnalyticsAdminV1alphaProperty $property)
  {
    $this->property = $property;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaProperty
   */
  public function getProperty()
  {
    return $this->property;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaChangeHistoryChangeChangeHistoryResource::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaChangeHistoryChangeChangeHistoryResource');
