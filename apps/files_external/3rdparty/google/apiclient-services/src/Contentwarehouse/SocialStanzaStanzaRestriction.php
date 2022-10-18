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

class SocialStanzaStanzaRestriction extends \Google\Collection
{
  protected $collection_key = 'deleteReason';
  protected $abuseTypesType = AbuseiamAbuseType::class;
  protected $abuseTypesDataType = 'array';
  /**
   * @var string
   */
  public $appealState;
  protected $contentRestrictionType = AbuseiamContentRestriction::class;
  protected $contentRestrictionDataType = '';
  /**
   * @var string[]
   */
  public $deleteReason;
  protected $deliveryRestrictionType = SocialStanzaDeliveryRestriction::class;
  protected $deliveryRestrictionDataType = '';
  protected $destinationStreamType = AppsPeopleActivityBackendDestinationStream::class;
  protected $destinationStreamDataType = '';
  protected $moderationInfoType = SocialStanzaModerationInfo::class;
  protected $moderationInfoDataType = '';
  /**
   * @var string
   */
  public $moderationState;

  /**
   * @param AbuseiamAbuseType[]
   */
  public function setAbuseTypes($abuseTypes)
  {
    $this->abuseTypes = $abuseTypes;
  }
  /**
   * @return AbuseiamAbuseType[]
   */
  public function getAbuseTypes()
  {
    return $this->abuseTypes;
  }
  /**
   * @param string
   */
  public function setAppealState($appealState)
  {
    $this->appealState = $appealState;
  }
  /**
   * @return string
   */
  public function getAppealState()
  {
    return $this->appealState;
  }
  /**
   * @param AbuseiamContentRestriction
   */
  public function setContentRestriction(AbuseiamContentRestriction $contentRestriction)
  {
    $this->contentRestriction = $contentRestriction;
  }
  /**
   * @return AbuseiamContentRestriction
   */
  public function getContentRestriction()
  {
    return $this->contentRestriction;
  }
  /**
   * @param string[]
   */
  public function setDeleteReason($deleteReason)
  {
    $this->deleteReason = $deleteReason;
  }
  /**
   * @return string[]
   */
  public function getDeleteReason()
  {
    return $this->deleteReason;
  }
  /**
   * @param SocialStanzaDeliveryRestriction
   */
  public function setDeliveryRestriction(SocialStanzaDeliveryRestriction $deliveryRestriction)
  {
    $this->deliveryRestriction = $deliveryRestriction;
  }
  /**
   * @return SocialStanzaDeliveryRestriction
   */
  public function getDeliveryRestriction()
  {
    return $this->deliveryRestriction;
  }
  /**
   * @param AppsPeopleActivityBackendDestinationStream
   */
  public function setDestinationStream(AppsPeopleActivityBackendDestinationStream $destinationStream)
  {
    $this->destinationStream = $destinationStream;
  }
  /**
   * @return AppsPeopleActivityBackendDestinationStream
   */
  public function getDestinationStream()
  {
    return $this->destinationStream;
  }
  /**
   * @param SocialStanzaModerationInfo
   */
  public function setModerationInfo(SocialStanzaModerationInfo $moderationInfo)
  {
    $this->moderationInfo = $moderationInfo;
  }
  /**
   * @return SocialStanzaModerationInfo
   */
  public function getModerationInfo()
  {
    return $this->moderationInfo;
  }
  /**
   * @param string
   */
  public function setModerationState($moderationState)
  {
    $this->moderationState = $moderationState;
  }
  /**
   * @return string
   */
  public function getModerationState()
  {
    return $this->moderationState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocialStanzaStanzaRestriction::class, 'Google_Service_Contentwarehouse_SocialStanzaStanzaRestriction');
