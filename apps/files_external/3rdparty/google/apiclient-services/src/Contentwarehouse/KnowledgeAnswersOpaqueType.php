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

class KnowledgeAnswersOpaqueType extends \Google\Model
{
  protected $aogTypeType = KnowledgeAnswersOpaqueAogType::class;
  protected $aogTypeDataType = '';
  protected $appAnnotationTypeType = KnowledgeAnswersOpaqueAppAnnotationType::class;
  protected $appAnnotationTypeDataType = '';
  protected $audioTypeType = KnowledgeAnswersOpaqueAudioType::class;
  protected $audioTypeDataType = '';
  protected $calendarEventTypeType = KnowledgeAnswersOpaqueCalendarEventType::class;
  protected $calendarEventTypeDataType = '';
  protected $calendarEventWrapperTypeType = KnowledgeAnswersOpaqueCalendarEventWrapperType::class;
  protected $calendarEventWrapperTypeDataType = '';
  protected $calendarReferenceTypeType = KnowledgeAnswersOpaqueCalendarReferenceType::class;
  protected $calendarReferenceTypeDataType = '';
  protected $complexQueriesRewriteTypeType = KnowledgeAnswersOpaqueComplexQueriesRewriteType::class;
  protected $complexQueriesRewriteTypeDataType = '';
  protected $componentReferenceTypeType = KnowledgeAnswersOpaqueComponentReferenceIndexType::class;
  protected $componentReferenceTypeDataType = '';
  protected $deviceIdTypeType = KnowledgeAnswersOpaqueDeviceIdType::class;
  protected $deviceIdTypeDataType = '';
  protected $deviceTypeType = KnowledgeAnswersOpaqueDeviceType::class;
  protected $deviceTypeDataType = '';
  protected $deviceUserIdentityTypeType = KnowledgeAnswersOpaqueDeviceUserIdentityType::class;
  protected $deviceUserIdentityTypeDataType = '';
  protected $homeAutomationDeviceTypeType = KnowledgeAnswersOpaqueHomeAutomationDeviceType::class;
  protected $homeAutomationDeviceTypeDataType = '';
  protected $locationTypeType = KnowledgeAnswersOpaqueLocationType::class;
  protected $locationTypeDataType = '';
  protected $mediaTypeType = KnowledgeAnswersOpaqueMediaType::class;
  protected $mediaTypeDataType = '';
  protected $messageNotificationTypeType = KnowledgeAnswersOpaqueMessageNotificationType::class;
  protected $messageNotificationTypeDataType = '';
  protected $moneyTypeType = KnowledgeAnswersOpaqueMoneyType::class;
  protected $moneyTypeDataType = '';
  protected $narrativeNewsProviderTypeType = KnowledgeAnswersOpaqueNewsProviderType::class;
  protected $narrativeNewsProviderTypeDataType = '';
  protected $onDeviceTypeType = KnowledgeAnswersOpaqueOnDeviceType::class;
  protected $onDeviceTypeDataType = '';
  protected $personTypeType = KnowledgeAnswersOpaquePersonType::class;
  protected $personTypeDataType = '';
  protected $personalIntelligenceEntityTypeType = KnowledgeAnswersOpaquePersonalIntelligenceEntityType::class;
  protected $personalIntelligenceEntityTypeDataType = '';
  protected $productivityListItemTypeType = KnowledgeAnswersOpaqueProductivityListItemType::class;
  protected $productivityListItemTypeDataType = '';
  protected $recurrenceTypeType = KnowledgeAnswersOpaqueRecurrenceType::class;
  protected $recurrenceTypeDataType = '';
  protected $reminderTypeType = KnowledgeAnswersOpaqueReminderType::class;
  protected $reminderTypeDataType = '';
  protected $remodelingsType = NlpMeaningMeaningRemodelings::class;
  protected $remodelingsDataType = '';
  protected $shoppingMerchantTypeType = KnowledgeAnswersOpaqueShoppingMerchantType::class;
  protected $shoppingMerchantTypeDataType = '';
  protected $shoppingOfferTypeType = KnowledgeAnswersOpaqueShoppingOfferType::class;
  protected $shoppingOfferTypeDataType = '';
  protected $shoppingProductExpressionTypeType = KnowledgeAnswersOpaqueShoppingProductExpressionType::class;
  protected $shoppingProductExpressionTypeDataType = '';
  protected $shoppingProductTypeType = KnowledgeAnswersOpaqueShoppingProductType::class;
  protected $shoppingProductTypeDataType = '';
  protected $shoppingStoreTypeType = KnowledgeAnswersOpaqueShoppingStoreType::class;
  protected $shoppingStoreTypeDataType = '';
  protected $timerTypeType = KnowledgeAnswersOpaqueTimerType::class;
  protected $timerTypeDataType = '';

  /**
   * @param KnowledgeAnswersOpaqueAogType
   */
  public function setAogType(KnowledgeAnswersOpaqueAogType $aogType)
  {
    $this->aogType = $aogType;
  }
  /**
   * @return KnowledgeAnswersOpaqueAogType
   */
  public function getAogType()
  {
    return $this->aogType;
  }
  /**
   * @param KnowledgeAnswersOpaqueAppAnnotationType
   */
  public function setAppAnnotationType(KnowledgeAnswersOpaqueAppAnnotationType $appAnnotationType)
  {
    $this->appAnnotationType = $appAnnotationType;
  }
  /**
   * @return KnowledgeAnswersOpaqueAppAnnotationType
   */
  public function getAppAnnotationType()
  {
    return $this->appAnnotationType;
  }
  /**
   * @param KnowledgeAnswersOpaqueAudioType
   */
  public function setAudioType(KnowledgeAnswersOpaqueAudioType $audioType)
  {
    $this->audioType = $audioType;
  }
  /**
   * @return KnowledgeAnswersOpaqueAudioType
   */
  public function getAudioType()
  {
    return $this->audioType;
  }
  /**
   * @param KnowledgeAnswersOpaqueCalendarEventType
   */
  public function setCalendarEventType(KnowledgeAnswersOpaqueCalendarEventType $calendarEventType)
  {
    $this->calendarEventType = $calendarEventType;
  }
  /**
   * @return KnowledgeAnswersOpaqueCalendarEventType
   */
  public function getCalendarEventType()
  {
    return $this->calendarEventType;
  }
  /**
   * @param KnowledgeAnswersOpaqueCalendarEventWrapperType
   */
  public function setCalendarEventWrapperType(KnowledgeAnswersOpaqueCalendarEventWrapperType $calendarEventWrapperType)
  {
    $this->calendarEventWrapperType = $calendarEventWrapperType;
  }
  /**
   * @return KnowledgeAnswersOpaqueCalendarEventWrapperType
   */
  public function getCalendarEventWrapperType()
  {
    return $this->calendarEventWrapperType;
  }
  /**
   * @param KnowledgeAnswersOpaqueCalendarReferenceType
   */
  public function setCalendarReferenceType(KnowledgeAnswersOpaqueCalendarReferenceType $calendarReferenceType)
  {
    $this->calendarReferenceType = $calendarReferenceType;
  }
  /**
   * @return KnowledgeAnswersOpaqueCalendarReferenceType
   */
  public function getCalendarReferenceType()
  {
    return $this->calendarReferenceType;
  }
  /**
   * @param KnowledgeAnswersOpaqueComplexQueriesRewriteType
   */
  public function setComplexQueriesRewriteType(KnowledgeAnswersOpaqueComplexQueriesRewriteType $complexQueriesRewriteType)
  {
    $this->complexQueriesRewriteType = $complexQueriesRewriteType;
  }
  /**
   * @return KnowledgeAnswersOpaqueComplexQueriesRewriteType
   */
  public function getComplexQueriesRewriteType()
  {
    return $this->complexQueriesRewriteType;
  }
  /**
   * @param KnowledgeAnswersOpaqueComponentReferenceIndexType
   */
  public function setComponentReferenceType(KnowledgeAnswersOpaqueComponentReferenceIndexType $componentReferenceType)
  {
    $this->componentReferenceType = $componentReferenceType;
  }
  /**
   * @return KnowledgeAnswersOpaqueComponentReferenceIndexType
   */
  public function getComponentReferenceType()
  {
    return $this->componentReferenceType;
  }
  /**
   * @param KnowledgeAnswersOpaqueDeviceIdType
   */
  public function setDeviceIdType(KnowledgeAnswersOpaqueDeviceIdType $deviceIdType)
  {
    $this->deviceIdType = $deviceIdType;
  }
  /**
   * @return KnowledgeAnswersOpaqueDeviceIdType
   */
  public function getDeviceIdType()
  {
    return $this->deviceIdType;
  }
  /**
   * @param KnowledgeAnswersOpaqueDeviceType
   */
  public function setDeviceType(KnowledgeAnswersOpaqueDeviceType $deviceType)
  {
    $this->deviceType = $deviceType;
  }
  /**
   * @return KnowledgeAnswersOpaqueDeviceType
   */
  public function getDeviceType()
  {
    return $this->deviceType;
  }
  /**
   * @param KnowledgeAnswersOpaqueDeviceUserIdentityType
   */
  public function setDeviceUserIdentityType(KnowledgeAnswersOpaqueDeviceUserIdentityType $deviceUserIdentityType)
  {
    $this->deviceUserIdentityType = $deviceUserIdentityType;
  }
  /**
   * @return KnowledgeAnswersOpaqueDeviceUserIdentityType
   */
  public function getDeviceUserIdentityType()
  {
    return $this->deviceUserIdentityType;
  }
  /**
   * @param KnowledgeAnswersOpaqueHomeAutomationDeviceType
   */
  public function setHomeAutomationDeviceType(KnowledgeAnswersOpaqueHomeAutomationDeviceType $homeAutomationDeviceType)
  {
    $this->homeAutomationDeviceType = $homeAutomationDeviceType;
  }
  /**
   * @return KnowledgeAnswersOpaqueHomeAutomationDeviceType
   */
  public function getHomeAutomationDeviceType()
  {
    return $this->homeAutomationDeviceType;
  }
  /**
   * @param KnowledgeAnswersOpaqueLocationType
   */
  public function setLocationType(KnowledgeAnswersOpaqueLocationType $locationType)
  {
    $this->locationType = $locationType;
  }
  /**
   * @return KnowledgeAnswersOpaqueLocationType
   */
  public function getLocationType()
  {
    return $this->locationType;
  }
  /**
   * @param KnowledgeAnswersOpaqueMediaType
   */
  public function setMediaType(KnowledgeAnswersOpaqueMediaType $mediaType)
  {
    $this->mediaType = $mediaType;
  }
  /**
   * @return KnowledgeAnswersOpaqueMediaType
   */
  public function getMediaType()
  {
    return $this->mediaType;
  }
  /**
   * @param KnowledgeAnswersOpaqueMessageNotificationType
   */
  public function setMessageNotificationType(KnowledgeAnswersOpaqueMessageNotificationType $messageNotificationType)
  {
    $this->messageNotificationType = $messageNotificationType;
  }
  /**
   * @return KnowledgeAnswersOpaqueMessageNotificationType
   */
  public function getMessageNotificationType()
  {
    return $this->messageNotificationType;
  }
  /**
   * @param KnowledgeAnswersOpaqueMoneyType
   */
  public function setMoneyType(KnowledgeAnswersOpaqueMoneyType $moneyType)
  {
    $this->moneyType = $moneyType;
  }
  /**
   * @return KnowledgeAnswersOpaqueMoneyType
   */
  public function getMoneyType()
  {
    return $this->moneyType;
  }
  /**
   * @param KnowledgeAnswersOpaqueNewsProviderType
   */
  public function setNarrativeNewsProviderType(KnowledgeAnswersOpaqueNewsProviderType $narrativeNewsProviderType)
  {
    $this->narrativeNewsProviderType = $narrativeNewsProviderType;
  }
  /**
   * @return KnowledgeAnswersOpaqueNewsProviderType
   */
  public function getNarrativeNewsProviderType()
  {
    return $this->narrativeNewsProviderType;
  }
  /**
   * @param KnowledgeAnswersOpaqueOnDeviceType
   */
  public function setOnDeviceType(KnowledgeAnswersOpaqueOnDeviceType $onDeviceType)
  {
    $this->onDeviceType = $onDeviceType;
  }
  /**
   * @return KnowledgeAnswersOpaqueOnDeviceType
   */
  public function getOnDeviceType()
  {
    return $this->onDeviceType;
  }
  /**
   * @param KnowledgeAnswersOpaquePersonType
   */
  public function setPersonType(KnowledgeAnswersOpaquePersonType $personType)
  {
    $this->personType = $personType;
  }
  /**
   * @return KnowledgeAnswersOpaquePersonType
   */
  public function getPersonType()
  {
    return $this->personType;
  }
  /**
   * @param KnowledgeAnswersOpaquePersonalIntelligenceEntityType
   */
  public function setPersonalIntelligenceEntityType(KnowledgeAnswersOpaquePersonalIntelligenceEntityType $personalIntelligenceEntityType)
  {
    $this->personalIntelligenceEntityType = $personalIntelligenceEntityType;
  }
  /**
   * @return KnowledgeAnswersOpaquePersonalIntelligenceEntityType
   */
  public function getPersonalIntelligenceEntityType()
  {
    return $this->personalIntelligenceEntityType;
  }
  /**
   * @param KnowledgeAnswersOpaqueProductivityListItemType
   */
  public function setProductivityListItemType(KnowledgeAnswersOpaqueProductivityListItemType $productivityListItemType)
  {
    $this->productivityListItemType = $productivityListItemType;
  }
  /**
   * @return KnowledgeAnswersOpaqueProductivityListItemType
   */
  public function getProductivityListItemType()
  {
    return $this->productivityListItemType;
  }
  /**
   * @param KnowledgeAnswersOpaqueRecurrenceType
   */
  public function setRecurrenceType(KnowledgeAnswersOpaqueRecurrenceType $recurrenceType)
  {
    $this->recurrenceType = $recurrenceType;
  }
  /**
   * @return KnowledgeAnswersOpaqueRecurrenceType
   */
  public function getRecurrenceType()
  {
    return $this->recurrenceType;
  }
  /**
   * @param KnowledgeAnswersOpaqueReminderType
   */
  public function setReminderType(KnowledgeAnswersOpaqueReminderType $reminderType)
  {
    $this->reminderType = $reminderType;
  }
  /**
   * @return KnowledgeAnswersOpaqueReminderType
   */
  public function getReminderType()
  {
    return $this->reminderType;
  }
  /**
   * @param NlpMeaningMeaningRemodelings
   */
  public function setRemodelings(NlpMeaningMeaningRemodelings $remodelings)
  {
    $this->remodelings = $remodelings;
  }
  /**
   * @return NlpMeaningMeaningRemodelings
   */
  public function getRemodelings()
  {
    return $this->remodelings;
  }
  /**
   * @param KnowledgeAnswersOpaqueShoppingMerchantType
   */
  public function setShoppingMerchantType(KnowledgeAnswersOpaqueShoppingMerchantType $shoppingMerchantType)
  {
    $this->shoppingMerchantType = $shoppingMerchantType;
  }
  /**
   * @return KnowledgeAnswersOpaqueShoppingMerchantType
   */
  public function getShoppingMerchantType()
  {
    return $this->shoppingMerchantType;
  }
  /**
   * @param KnowledgeAnswersOpaqueShoppingOfferType
   */
  public function setShoppingOfferType(KnowledgeAnswersOpaqueShoppingOfferType $shoppingOfferType)
  {
    $this->shoppingOfferType = $shoppingOfferType;
  }
  /**
   * @return KnowledgeAnswersOpaqueShoppingOfferType
   */
  public function getShoppingOfferType()
  {
    return $this->shoppingOfferType;
  }
  /**
   * @param KnowledgeAnswersOpaqueShoppingProductExpressionType
   */
  public function setShoppingProductExpressionType(KnowledgeAnswersOpaqueShoppingProductExpressionType $shoppingProductExpressionType)
  {
    $this->shoppingProductExpressionType = $shoppingProductExpressionType;
  }
  /**
   * @return KnowledgeAnswersOpaqueShoppingProductExpressionType
   */
  public function getShoppingProductExpressionType()
  {
    return $this->shoppingProductExpressionType;
  }
  /**
   * @param KnowledgeAnswersOpaqueShoppingProductType
   */
  public function setShoppingProductType(KnowledgeAnswersOpaqueShoppingProductType $shoppingProductType)
  {
    $this->shoppingProductType = $shoppingProductType;
  }
  /**
   * @return KnowledgeAnswersOpaqueShoppingProductType
   */
  public function getShoppingProductType()
  {
    return $this->shoppingProductType;
  }
  /**
   * @param KnowledgeAnswersOpaqueShoppingStoreType
   */
  public function setShoppingStoreType(KnowledgeAnswersOpaqueShoppingStoreType $shoppingStoreType)
  {
    $this->shoppingStoreType = $shoppingStoreType;
  }
  /**
   * @return KnowledgeAnswersOpaqueShoppingStoreType
   */
  public function getShoppingStoreType()
  {
    return $this->shoppingStoreType;
  }
  /**
   * @param KnowledgeAnswersOpaqueTimerType
   */
  public function setTimerType(KnowledgeAnswersOpaqueTimerType $timerType)
  {
    $this->timerType = $timerType;
  }
  /**
   * @return KnowledgeAnswersOpaqueTimerType
   */
  public function getTimerType()
  {
    return $this->timerType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersOpaqueType::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersOpaqueType');
