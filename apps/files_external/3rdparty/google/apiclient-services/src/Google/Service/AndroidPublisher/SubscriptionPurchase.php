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

class Google_Service_AndroidPublisher_SubscriptionPurchase extends Google_Model
{
  public $acknowledgementState;
  public $autoRenewing;
  public $autoResumeTimeMillis;
  public $cancelReason;
  protected $cancelSurveyResultType = 'Google_Service_AndroidPublisher_SubscriptionCancelSurveyResult';
  protected $cancelSurveyResultDataType = '';
  public $countryCode;
  public $developerPayload;
  public $emailAddress;
  public $expiryTimeMillis;
  public $externalAccountId;
  public $familyName;
  public $givenName;
  protected $introductoryPriceInfoType = 'Google_Service_AndroidPublisher_IntroductoryPriceInfo';
  protected $introductoryPriceInfoDataType = '';
  public $kind;
  public $linkedPurchaseToken;
  public $orderId;
  public $paymentState;
  public $priceAmountMicros;
  protected $priceChangeType = 'Google_Service_AndroidPublisher_SubscriptionPriceChange';
  protected $priceChangeDataType = '';
  public $priceCurrencyCode;
  public $profileId;
  public $profileName;
  public $promotionCode;
  public $promotionType;
  public $purchaseType;
  public $startTimeMillis;
  public $userCancellationTimeMillis;

  public function setAcknowledgementState($acknowledgementState)
  {
    $this->acknowledgementState = $acknowledgementState;
  }
  public function getAcknowledgementState()
  {
    return $this->acknowledgementState;
  }
  public function setAutoRenewing($autoRenewing)
  {
    $this->autoRenewing = $autoRenewing;
  }
  public function getAutoRenewing()
  {
    return $this->autoRenewing;
  }
  public function setAutoResumeTimeMillis($autoResumeTimeMillis)
  {
    $this->autoResumeTimeMillis = $autoResumeTimeMillis;
  }
  public function getAutoResumeTimeMillis()
  {
    return $this->autoResumeTimeMillis;
  }
  public function setCancelReason($cancelReason)
  {
    $this->cancelReason = $cancelReason;
  }
  public function getCancelReason()
  {
    return $this->cancelReason;
  }
  /**
   * @param Google_Service_AndroidPublisher_SubscriptionCancelSurveyResult
   */
  public function setCancelSurveyResult(Google_Service_AndroidPublisher_SubscriptionCancelSurveyResult $cancelSurveyResult)
  {
    $this->cancelSurveyResult = $cancelSurveyResult;
  }
  /**
   * @return Google_Service_AndroidPublisher_SubscriptionCancelSurveyResult
   */
  public function getCancelSurveyResult()
  {
    return $this->cancelSurveyResult;
  }
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  public function setDeveloperPayload($developerPayload)
  {
    $this->developerPayload = $developerPayload;
  }
  public function getDeveloperPayload()
  {
    return $this->developerPayload;
  }
  public function setEmailAddress($emailAddress)
  {
    $this->emailAddress = $emailAddress;
  }
  public function getEmailAddress()
  {
    return $this->emailAddress;
  }
  public function setExpiryTimeMillis($expiryTimeMillis)
  {
    $this->expiryTimeMillis = $expiryTimeMillis;
  }
  public function getExpiryTimeMillis()
  {
    return $this->expiryTimeMillis;
  }
  public function setExternalAccountId($externalAccountId)
  {
    $this->externalAccountId = $externalAccountId;
  }
  public function getExternalAccountId()
  {
    return $this->externalAccountId;
  }
  public function setFamilyName($familyName)
  {
    $this->familyName = $familyName;
  }
  public function getFamilyName()
  {
    return $this->familyName;
  }
  public function setGivenName($givenName)
  {
    $this->givenName = $givenName;
  }
  public function getGivenName()
  {
    return $this->givenName;
  }
  /**
   * @param Google_Service_AndroidPublisher_IntroductoryPriceInfo
   */
  public function setIntroductoryPriceInfo(Google_Service_AndroidPublisher_IntroductoryPriceInfo $introductoryPriceInfo)
  {
    $this->introductoryPriceInfo = $introductoryPriceInfo;
  }
  /**
   * @return Google_Service_AndroidPublisher_IntroductoryPriceInfo
   */
  public function getIntroductoryPriceInfo()
  {
    return $this->introductoryPriceInfo;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLinkedPurchaseToken($linkedPurchaseToken)
  {
    $this->linkedPurchaseToken = $linkedPurchaseToken;
  }
  public function getLinkedPurchaseToken()
  {
    return $this->linkedPurchaseToken;
  }
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
  }
  public function getOrderId()
  {
    return $this->orderId;
  }
  public function setPaymentState($paymentState)
  {
    $this->paymentState = $paymentState;
  }
  public function getPaymentState()
  {
    return $this->paymentState;
  }
  public function setPriceAmountMicros($priceAmountMicros)
  {
    $this->priceAmountMicros = $priceAmountMicros;
  }
  public function getPriceAmountMicros()
  {
    return $this->priceAmountMicros;
  }
  /**
   * @param Google_Service_AndroidPublisher_SubscriptionPriceChange
   */
  public function setPriceChange(Google_Service_AndroidPublisher_SubscriptionPriceChange $priceChange)
  {
    $this->priceChange = $priceChange;
  }
  /**
   * @return Google_Service_AndroidPublisher_SubscriptionPriceChange
   */
  public function getPriceChange()
  {
    return $this->priceChange;
  }
  public function setPriceCurrencyCode($priceCurrencyCode)
  {
    $this->priceCurrencyCode = $priceCurrencyCode;
  }
  public function getPriceCurrencyCode()
  {
    return $this->priceCurrencyCode;
  }
  public function setProfileId($profileId)
  {
    $this->profileId = $profileId;
  }
  public function getProfileId()
  {
    return $this->profileId;
  }
  public function setProfileName($profileName)
  {
    $this->profileName = $profileName;
  }
  public function getProfileName()
  {
    return $this->profileName;
  }
  public function setPromotionCode($promotionCode)
  {
    $this->promotionCode = $promotionCode;
  }
  public function getPromotionCode()
  {
    return $this->promotionCode;
  }
  public function setPromotionType($promotionType)
  {
    $this->promotionType = $promotionType;
  }
  public function getPromotionType()
  {
    return $this->promotionType;
  }
  public function setPurchaseType($purchaseType)
  {
    $this->purchaseType = $purchaseType;
  }
  public function getPurchaseType()
  {
    return $this->purchaseType;
  }
  public function setStartTimeMillis($startTimeMillis)
  {
    $this->startTimeMillis = $startTimeMillis;
  }
  public function getStartTimeMillis()
  {
    return $this->startTimeMillis;
  }
  public function setUserCancellationTimeMillis($userCancellationTimeMillis)
  {
    $this->userCancellationTimeMillis = $userCancellationTimeMillis;
  }
  public function getUserCancellationTimeMillis()
  {
    return $this->userCancellationTimeMillis;
  }
}
