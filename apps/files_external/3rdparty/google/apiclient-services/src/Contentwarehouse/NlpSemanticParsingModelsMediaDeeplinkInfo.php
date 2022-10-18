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

namespace Google\Service\Contentwarehouse;

class NlpSemanticParsingModelsMediaDeeplinkInfo extends \Google\Collection
{
  protected $collection_key = 'tag';
  /**
   * @var string
   */
  public $actionType;
  /**
   * @var string[]
   */
  public $blacklistedCountry;
  /**
   * @var string[]
   */
  public $country;
  /**
   * @var string
   */
  public $deeplink;
  /**
   * @var string
   */
  public $deeplinkForExecution;
  /**
   * @var bool
   */
  public $incompatibleWithCredentials;
  /**
   * @var string[]
   */
  public $offer;
  protected $paidOfferDetailType = NlpSemanticParsingModelsMediaPaidOfferDetail::class;
  protected $paidOfferDetailDataType = 'array';
  /**
   * @var string[]
   */
  public $platform;
  public $score;
  /**
   * @var string[]
   */
  public $subscriptionPackageName;
  /**
   * @var string[]
   */
  public $tag;
  protected $validTimeWindowType = NlpSemanticParsingModelsMediaDeeplinkInfoTimeWindow::class;
  protected $validTimeWindowDataType = '';
  /**
   * @var string
   */
  public $vuiId;
  protected $youtubeDeeplinkInfoType = NlpSemanticParsingModelsMediaYouTubeDeeplinkInfo::class;
  protected $youtubeDeeplinkInfoDataType = '';

  /**
   * @param string
   */
  public function setActionType($actionType)
  {
    $this->actionType = $actionType;
  }
  /**
   * @return string
   */
  public function getActionType()
  {
    return $this->actionType;
  }
  /**
   * @param string[]
   */
  public function setBlacklistedCountry($blacklistedCountry)
  {
    $this->blacklistedCountry = $blacklistedCountry;
  }
  /**
   * @return string[]
   */
  public function getBlacklistedCountry()
  {
    return $this->blacklistedCountry;
  }
  /**
   * @param string[]
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string[]
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param string
   */
  public function setDeeplink($deeplink)
  {
    $this->deeplink = $deeplink;
  }
  /**
   * @return string
   */
  public function getDeeplink()
  {
    return $this->deeplink;
  }
  /**
   * @param string
   */
  public function setDeeplinkForExecution($deeplinkForExecution)
  {
    $this->deeplinkForExecution = $deeplinkForExecution;
  }
  /**
   * @return string
   */
  public function getDeeplinkForExecution()
  {
    return $this->deeplinkForExecution;
  }
  /**
   * @param bool
   */
  public function setIncompatibleWithCredentials($incompatibleWithCredentials)
  {
    $this->incompatibleWithCredentials = $incompatibleWithCredentials;
  }
  /**
   * @return bool
   */
  public function getIncompatibleWithCredentials()
  {
    return $this->incompatibleWithCredentials;
  }
  /**
   * @param string[]
   */
  public function setOffer($offer)
  {
    $this->offer = $offer;
  }
  /**
   * @return string[]
   */
  public function getOffer()
  {
    return $this->offer;
  }
  /**
   * @param NlpSemanticParsingModelsMediaPaidOfferDetail[]
   */
  public function setPaidOfferDetail($paidOfferDetail)
  {
    $this->paidOfferDetail = $paidOfferDetail;
  }
  /**
   * @return NlpSemanticParsingModelsMediaPaidOfferDetail[]
   */
  public function getPaidOfferDetail()
  {
    return $this->paidOfferDetail;
  }
  /**
   * @param string[]
   */
  public function setPlatform($platform)
  {
    $this->platform = $platform;
  }
  /**
   * @return string[]
   */
  public function getPlatform()
  {
    return $this->platform;
  }
  public function setScore($score)
  {
    $this->score = $score;
  }
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param string[]
   */
  public function setSubscriptionPackageName($subscriptionPackageName)
  {
    $this->subscriptionPackageName = $subscriptionPackageName;
  }
  /**
   * @return string[]
   */
  public function getSubscriptionPackageName()
  {
    return $this->subscriptionPackageName;
  }
  /**
   * @param string[]
   */
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  /**
   * @return string[]
   */
  public function getTag()
  {
    return $this->tag;
  }
  /**
   * @param NlpSemanticParsingModelsMediaDeeplinkInfoTimeWindow
   */
  public function setValidTimeWindow(NlpSemanticParsingModelsMediaDeeplinkInfoTimeWindow $validTimeWindow)
  {
    $this->validTimeWindow = $validTimeWindow;
  }
  /**
   * @return NlpSemanticParsingModelsMediaDeeplinkInfoTimeWindow
   */
  public function getValidTimeWindow()
  {
    return $this->validTimeWindow;
  }
  /**
   * @param string
   */
  public function setVuiId($vuiId)
  {
    $this->vuiId = $vuiId;
  }
  /**
   * @return string
   */
  public function getVuiId()
  {
    return $this->vuiId;
  }
  /**
   * @param NlpSemanticParsingModelsMediaYouTubeDeeplinkInfo
   */
  public function setYoutubeDeeplinkInfo(NlpSemanticParsingModelsMediaYouTubeDeeplinkInfo $youtubeDeeplinkInfo)
  {
    $this->youtubeDeeplinkInfo = $youtubeDeeplinkInfo;
  }
  /**
   * @return NlpSemanticParsingModelsMediaYouTubeDeeplinkInfo
   */
  public function getYoutubeDeeplinkInfo()
  {
    return $this->youtubeDeeplinkInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsMediaDeeplinkInfo::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsMediaDeeplinkInfo');
