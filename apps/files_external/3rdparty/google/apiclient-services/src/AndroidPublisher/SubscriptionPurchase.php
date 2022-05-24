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

namespace Google\Service\AndroidPublisher;

class SubscriptionPurchase extends \Google\Model
{
  /**
   * @var int
   */
  public $acknowledgementState;
  /**
   * @var bool
   */
  public $autoRenewing;
  /**
   * @var string
   */
  public $autoResumeTimeMillis;
  /**
   * @var int
   */
  public $cancelReason;
  protected $cancelSurveyResultType = SubscriptionCancelSurveyResult::class;
  protected $cancelSurveyResultDataType = '';
  /**
   * @var string
   */
  public $countryCode;
  /**
   * @var string
   */
  public $developerPayload;
  /**
   * @var string
   */
  public $emailAddress;
  /**
   * @var string
   */
  public $expiryTimeMillis;
  /**
   * @var string
   */
  public $externalAccountId;
  /**
   * @var string
   */
  public $familyName;
  /**
   * @var string
   */
  public $givenName;
  protected $introductoryPriceInfoType = IntroductoryPriceInfo::class;
  protected $introductoryPriceInfoDataType = '';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $linkedPurchaseToken;
  /**
   * @var string
   */
  public $obfuscatedExternalAccountId;
  /**
   * @var string
   */
  public $obfuscatedExternalProfileId;
  /**
   * @var string
   */
  public $orderId;
  /**
   * @var int
   */
  public $paymentState;
  /**
   * @var string
   */
  public $priceAmountMicros;
  protected $priceChangeType = SubscriptionPriceChange::class;
  protected $priceChangeDataType = '';
  /**
   * @var string
   */
  public $priceCurrencyCode;
  /**
   * @var string
   */
  public $profileId;
  /**
   * @var string
   */
  public $profileName;
  /**
   * @var string
   */
  public $promotionCode;
  /**
   * @var int
   */
  public $promotionType;
  /**
   * @var int
   */
  public $purchaseType;
  /**
   * @var string
   */
  public $startTimeMillis;
  /**
   * @var string
   */
  public $userCancellationTimeMillis;

  /**
   * @param int
   */
  public function setAcknowledgementState($acknowledgementState)
  {
    $this->acknowledgementState = $acknowledgementState;
  }
  /**
   * @return int
   */
  public function getAcknowledgementState()
  {
    return $this->acknowledgementState;
  }
  /**
   * @param bool
   */
  public function setAutoRenewing($autoRenewing)
  {
    $this->autoRenewing = $autoRenewing;
  }
  /**
   * @return bool
   */
  public function getAutoRenewing()
  {
    return $this->autoRenewing;
  }
  /**
   * @param string
   */
  public function setAutoResumeTimeMillis($autoResumeTimeMillis)
  {
    $this->autoResumeTimeMillis = $autoResumeTimeMillis;
  }
  /**
   * @return string
   */
  public function getAutoResumeTimeMillis()
  {
    return $this->autoResumeTimeMillis;
  }
  /**
   * @param int
   */
  public function setCancelReason($cancelReason)
  {
    $this->cancelReason = $cancelReason;
  }
  /**
   * @return int
   */
  public function getCancelReason()
  {
    return $this->cancelReason;
  }
  /**
   * @param SubscriptionCancelSurveyResult
   */
  public function setCancelSurveyResult(SubscriptionCancelSurveyResult $cancelSurveyResult)
  {
    $this->cancelSurveyResult = $cancelSurveyResult;
  }
  /**
   * @return SubscriptionCancelSurveyResult
   */
  public function getCancelSurveyResult()
  {
    return $this->cancelSurveyResult;
  }
  /**
   * @param string
   */
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  /**
   * @return string
   */
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  /**
   * @param string
   */
  public function setDeveloperPayload($developerPayload)
  {
    $this->developerPayload = $developerPayload;
  }
  /**
   * @return string
   */
  public function getDeveloperPayload()
  {
    return $this->developerPayload;
  }
  /**
   * @param string
   */
  public function setEmailAddress($emailAddress)
  {
    $this->emailAddress = $emailAddress;
  }
  /**
   * @return string
   */
  public function getEmailAddress()
  {
    return $this->emailAddress;
  }
  /**
   * @param string
   */
  public function setExpiryTimeMillis($expiryTimeMillis)
  {
    $this->expiryTimeMillis = $expiryTimeMillis;
  }
  /**
   * @return string
   */
  public function getExpiryTimeMillis()
  {
    return $this->expiryTimeMillis;
  }
  /**
   * @param string
   */
  public function setExternalAccountId($externalAccountId)
  {
    $this->externalAccountId = $externalAccountId;
  }
  /**
   * @return string
   */
  public function getExternalAccountId()
  {
    return $this->externalAccountId;
  }
  /**
   * @param string
   */
  public function setFamilyName($familyName)
  {
    $this->familyName = $familyName;
  }
  /**
   * @return string
   */
  public function getFamilyName()
  {
    return $this->familyName;
  }
  /**
   * @param string
   */
  public function setGivenName($givenName)
  {
    $this->givenName = $givenName;
  }
  /**
   * @return string
   */
  public function getGivenName()
  {
    return $this->givenName;
  }
  /**
   * @param IntroductoryPriceInfo
   */
  public function setIntroductoryPriceInfo(IntroductoryPriceInfo $introductoryPriceInfo)
  {
    $this->introductoryPriceInfo = $introductoryPriceInfo;
  }
  /**
   * @return IntroductoryPriceInfo
   */
  public function getIntroductoryPriceInfo()
  {
    return $this->introductoryPriceInfo;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setLinkedPurchaseToken($linkedPurchaseToken)
  {
    $this->linkedPurchaseToken = $linkedPurchaseToken;
  }
  /**
   * @return string
   */
  public function getLinkedPurchaseToken()
  {
    return $this->linkedPurchaseToken;
  }
  /**
   * @param string
   */
  public function setObfuscatedExternalAccountId($obfuscatedExternalAccountId)
  {
    $this->obfuscatedExternalAccountId = $obfuscatedExternalAccountId;
  }
  /**
   * @return string
   */
  public function getObfuscatedExternalAccountId()
  {
    return $this->obfuscatedExternalAccountId;
  }
  /**
   * @param string
   */
  public function setObfuscatedExternalProfileId($obfuscatedExternalProfileId)
  {
    $this->obfuscatedExternalProfileId = $obfuscatedExternalProfileId;
  }
  /**
   * @return string
   */
  public function getObfuscatedExternalProfileId()
  {
    return $this->obfuscatedExternalProfileId;
  }
  /**
   * @param string
   */
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
  }
  /**
   * @return string
   */
  public function getOrderId()
  {
    return $this->orderId;
  }
  /**
   * @param int
   */
  public function setPaymentState($paymentState)
  {
    $this->paymentState = $paymentState;
  }
  /**
   * @return int
   */
  public function getPaymentState()
  {
    return $this->paymentState;
  }
  /**
   * @param string
   */
  public function setPriceAmountMicros($priceAmountMicros)
  {
    $this->priceAmountMicros = $priceAmountMicros;
  }
  /**
   * @return string
   */
  public function getPriceAmountMicros()
  {
    return $this->priceAmountMicros;
  }
  /**
   * @param SubscriptionPriceChange
   */
  public function setPriceChange(SubscriptionPriceChange $priceChange)
  {
    $this->priceChange = $priceChange;
  }
  /**
   * @return SubscriptionPriceChange
   */
  public function getPriceChange()
  {
    return $this->priceChange;
  }
  /**
   * @param string
   */
  public function setPriceCurrencyCode($priceCurrencyCode)
  {
    $this->priceCurrencyCode = $priceCurrencyCode;
  }
  /**
   * @return string
   */
  public function getPriceCurrencyCode()
  {
    return $this->priceCurrencyCode;
  }
  /**
   * @param string
   */
  public function setProfileId($profileId)
  {
    $this->profileId = $profileId;
  }
  /**
   * @return string
   */
  public function getProfileId()
  {
    return $this->profileId;
  }
  /**
   * @param string
   */
  public function setProfileName($profileName)
  {
    $this->profileName = $profileName;
  }
  /**
   * @return string
   */
  public function getProfileName()
  {
    return $this->profileName;
  }
  /**
   * @param string
   */
  public function setPromotionCode($promotionCode)
  {
    $this->promotionCode = $promotionCode;
  }
  /**
   * @return string
   */
  public function getPromotionCode()
  {
    return $this->promotionCode;
  }
  /**
   * @param int
   */
  public function setPromotionType($promotionType)
  {
    $this->promotionType = $promotionType;
  }
  /**
   * @return int
   */
  public function getPromotionType()
  {
    return $this->promotionType;
  }
  /**
   * @param int
   */
  public function setPurchaseType($purchaseType)
  {
    $this->purchaseType = $purchaseType;
  }
  /**
   * @return int
   */
  public function getPurchaseType()
  {
    return $this->purchaseType;
  }
  /**
   * @param string
   */
  public function setStartTimeMillis($startTimeMillis)
  {
    $this->startTimeMillis = $startTimeMillis;
  }
  /**
   * @return string
   */
  public function getStartTimeMillis()
  {
    return $this->startTimeMillis;
  }
  /**
   * @param string
   */
  public function setUserCancellationTimeMillis($userCancellationTimeMillis)
  {
    $this->userCancellationTimeMillis = $userCancellationTimeMillis;
  }
  /**
   * @return string
   */
  public function getUserCancellationTimeMillis()
  {
    return $this->userCancellationTimeMillis;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SubscriptionPurchase::class, 'Google_Service_AndroidPublisher_SubscriptionPurchase');
