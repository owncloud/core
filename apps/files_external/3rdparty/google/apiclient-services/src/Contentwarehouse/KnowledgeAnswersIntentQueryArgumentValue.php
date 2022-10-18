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

class KnowledgeAnswersIntentQueryArgumentValue extends \Google\Collection
{
  protected $collection_key = 'sensitivity';
  protected $aogSlotType = NlpSemanticParsingProtoActionsOnGoogleAogSlot::class;
  protected $aogSlotDataType = '';
  protected $appAnnotationType = NlpSemanticParsingAppAnnotation::class;
  protected $appAnnotationDataType = '';
  protected $audioType = NlpSemanticParsingModelsMediaAudio::class;
  protected $audioDataType = '';
  protected $calendarEventType = AssistantApiCoreTypesCalendarEvent::class;
  protected $calendarEventDataType = '';
  protected $calendarEventWrapperType = AssistantApiCoreTypesCalendarEventWrapper::class;
  protected $calendarEventWrapperDataType = '';
  protected $calendarReferenceType = QualityQrewriteCalendarReference::class;
  protected $calendarReferenceDataType = '';
  protected $complexQueriesRewriteType = QualityGenieComplexQueriesComplexQueriesOutputRewrite::class;
  protected $complexQueriesRewriteDataType = '';
  protected $componentReferenceType = RepositoryWebrefComponentReference::class;
  protected $componentReferenceDataType = '';
  protected $coreferenceType = KnowledgeAnswersIntentQueryCoreference::class;
  protected $coreferenceDataType = '';
  protected $dateTimeType = NlpSemanticParsingDatetimeDateTime::class;
  protected $dateTimeDataType = '';
  protected $deviceType = NlpSemanticParsingModelsMediaCastDeviceAnnotation::class;
  protected $deviceDataType = '';
  protected $deviceIdType = AssistantApiCoreTypesDeviceId::class;
  protected $deviceIdDataType = '';
  protected $deviceUserIdentityType = AssistantApiCoreTypesDeviceUserIdentity::class;
  protected $deviceUserIdentityDataType = '';
  protected $durationType = NlpSemanticParsingDatetimeDuration::class;
  protected $durationDataType = '';
  protected $funcallType = KnowledgeAnswersIntentQueryFunctionCall::class;
  protected $funcallDataType = '';
  protected $homeAutomationDeviceType = AssistantVerticalsHomeautomationProtoHomeAutomationDevice::class;
  protected $homeAutomationDeviceDataType = '';
  protected $locationType = NlpSemanticParsingLocalLocation::class;
  protected $locationDataType = '';
  protected $mediaType = NlpSemanticParsingModelsMediaMediaAnnotation::class;
  protected $mediaDataType = '';
  protected $messageNotificationType = AssistantApiCoreTypesMessageNotification::class;
  protected $messageNotificationDataType = '';
  protected $moneyType = NlpSemanticParsingModelsMoneyMoney::class;
  protected $moneyDataType = '';
  protected $narrativeNewsProviderType = NlpSemanticParsingModelsNarrativeNewsNewsProvider::class;
  protected $narrativeNewsProviderDataType = '';
  protected $numberType = NlpSemanticParsingNumberNumber::class;
  protected $numberDataType = '';
  protected $onDeviceType = NlpSemanticParsingModelsOnDevice::class;
  protected $onDeviceDataType = '';
  protected $personType = NlpSemanticParsingModelsPersonPerson::class;
  protected $personDataType = '';
  protected $personalIntelligenceEntityType = NlpSemanticParsingPersonalIntelligenceEntity::class;
  protected $personalIntelligenceEntityDataType = '';
  protected $productivityListItemType = AssistantProductivityListItem::class;
  protected $productivityListItemDataType = '';
  protected $recurrenceType = NlpSemanticParsingModelsRecurrence::class;
  protected $recurrenceDataType = '';
  protected $reminderType = QualityActionsReminder::class;
  protected $reminderDataType = '';
  protected $sensitiveValueType = KnowledgeAnswersIntentQuerySensitiveArgumentValueGuard::class;
  protected $sensitiveValueDataType = '';
  protected $sensitivityType = KnowledgeAnswersSensitivitySensitivity::class;
  protected $sensitivityDataType = 'array';
  protected $shoppingMerchantType = NlpSemanticParsingModelsShoppingAssistantMerchant::class;
  protected $shoppingMerchantDataType = '';
  protected $shoppingOfferType = NlpSemanticParsingModelsShoppingAssistantOffer::class;
  protected $shoppingOfferDataType = '';
  protected $shoppingProductType = NlpSemanticParsingModelsShoppingAssistantProduct::class;
  protected $shoppingProductDataType = '';
  protected $shoppingProductExpressionType = NlpSemanticParsingModelsShoppingAssistantProductExpression::class;
  protected $shoppingProductExpressionDataType = '';
  protected $shoppingStoreType = NlpSemanticParsingModelsShoppingAssistantStore::class;
  protected $shoppingStoreDataType = '';
  protected $simpleValueType = KnowledgeAnswersIntentQuerySimpleValue::class;
  protected $simpleValueDataType = '';
  protected $timerType = QualityActionsTimer::class;
  protected $timerDataType = '';
  protected $timezoneType = NlpSemanticParsingDatetimeTimeZone::class;
  protected $timezoneDataType = '';

  /**
   * @param NlpSemanticParsingProtoActionsOnGoogleAogSlot
   */
  public function setAogSlot(NlpSemanticParsingProtoActionsOnGoogleAogSlot $aogSlot)
  {
    $this->aogSlot = $aogSlot;
  }
  /**
   * @return NlpSemanticParsingProtoActionsOnGoogleAogSlot
   */
  public function getAogSlot()
  {
    return $this->aogSlot;
  }
  /**
   * @param NlpSemanticParsingAppAnnotation
   */
  public function setAppAnnotation(NlpSemanticParsingAppAnnotation $appAnnotation)
  {
    $this->appAnnotation = $appAnnotation;
  }
  /**
   * @return NlpSemanticParsingAppAnnotation
   */
  public function getAppAnnotation()
  {
    return $this->appAnnotation;
  }
  /**
   * @param NlpSemanticParsingModelsMediaAudio
   */
  public function setAudio(NlpSemanticParsingModelsMediaAudio $audio)
  {
    $this->audio = $audio;
  }
  /**
   * @return NlpSemanticParsingModelsMediaAudio
   */
  public function getAudio()
  {
    return $this->audio;
  }
  /**
   * @param AssistantApiCoreTypesCalendarEvent
   */
  public function setCalendarEvent(AssistantApiCoreTypesCalendarEvent $calendarEvent)
  {
    $this->calendarEvent = $calendarEvent;
  }
  /**
   * @return AssistantApiCoreTypesCalendarEvent
   */
  public function getCalendarEvent()
  {
    return $this->calendarEvent;
  }
  /**
   * @param AssistantApiCoreTypesCalendarEventWrapper
   */
  public function setCalendarEventWrapper(AssistantApiCoreTypesCalendarEventWrapper $calendarEventWrapper)
  {
    $this->calendarEventWrapper = $calendarEventWrapper;
  }
  /**
   * @return AssistantApiCoreTypesCalendarEventWrapper
   */
  public function getCalendarEventWrapper()
  {
    return $this->calendarEventWrapper;
  }
  /**
   * @param QualityQrewriteCalendarReference
   */
  public function setCalendarReference(QualityQrewriteCalendarReference $calendarReference)
  {
    $this->calendarReference = $calendarReference;
  }
  /**
   * @return QualityQrewriteCalendarReference
   */
  public function getCalendarReference()
  {
    return $this->calendarReference;
  }
  /**
   * @param QualityGenieComplexQueriesComplexQueriesOutputRewrite
   */
  public function setComplexQueriesRewrite(QualityGenieComplexQueriesComplexQueriesOutputRewrite $complexQueriesRewrite)
  {
    $this->complexQueriesRewrite = $complexQueriesRewrite;
  }
  /**
   * @return QualityGenieComplexQueriesComplexQueriesOutputRewrite
   */
  public function getComplexQueriesRewrite()
  {
    return $this->complexQueriesRewrite;
  }
  /**
   * @param RepositoryWebrefComponentReference
   */
  public function setComponentReference(RepositoryWebrefComponentReference $componentReference)
  {
    $this->componentReference = $componentReference;
  }
  /**
   * @return RepositoryWebrefComponentReference
   */
  public function getComponentReference()
  {
    return $this->componentReference;
  }
  /**
   * @param KnowledgeAnswersIntentQueryCoreference
   */
  public function setCoreference(KnowledgeAnswersIntentQueryCoreference $coreference)
  {
    $this->coreference = $coreference;
  }
  /**
   * @return KnowledgeAnswersIntentQueryCoreference
   */
  public function getCoreference()
  {
    return $this->coreference;
  }
  /**
   * @param NlpSemanticParsingDatetimeDateTime
   */
  public function setDateTime(NlpSemanticParsingDatetimeDateTime $dateTime)
  {
    $this->dateTime = $dateTime;
  }
  /**
   * @return NlpSemanticParsingDatetimeDateTime
   */
  public function getDateTime()
  {
    return $this->dateTime;
  }
  /**
   * @param NlpSemanticParsingModelsMediaCastDeviceAnnotation
   */
  public function setDevice(NlpSemanticParsingModelsMediaCastDeviceAnnotation $device)
  {
    $this->device = $device;
  }
  /**
   * @return NlpSemanticParsingModelsMediaCastDeviceAnnotation
   */
  public function getDevice()
  {
    return $this->device;
  }
  /**
   * @param AssistantApiCoreTypesDeviceId
   */
  public function setDeviceId(AssistantApiCoreTypesDeviceId $deviceId)
  {
    $this->deviceId = $deviceId;
  }
  /**
   * @return AssistantApiCoreTypesDeviceId
   */
  public function getDeviceId()
  {
    return $this->deviceId;
  }
  /**
   * @param AssistantApiCoreTypesDeviceUserIdentity
   */
  public function setDeviceUserIdentity(AssistantApiCoreTypesDeviceUserIdentity $deviceUserIdentity)
  {
    $this->deviceUserIdentity = $deviceUserIdentity;
  }
  /**
   * @return AssistantApiCoreTypesDeviceUserIdentity
   */
  public function getDeviceUserIdentity()
  {
    return $this->deviceUserIdentity;
  }
  /**
   * @param NlpSemanticParsingDatetimeDuration
   */
  public function setDuration(NlpSemanticParsingDatetimeDuration $duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return NlpSemanticParsingDatetimeDuration
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param KnowledgeAnswersIntentQueryFunctionCall
   */
  public function setFuncall(KnowledgeAnswersIntentQueryFunctionCall $funcall)
  {
    $this->funcall = $funcall;
  }
  /**
   * @return KnowledgeAnswersIntentQueryFunctionCall
   */
  public function getFuncall()
  {
    return $this->funcall;
  }
  /**
   * @param AssistantVerticalsHomeautomationProtoHomeAutomationDevice
   */
  public function setHomeAutomationDevice(AssistantVerticalsHomeautomationProtoHomeAutomationDevice $homeAutomationDevice)
  {
    $this->homeAutomationDevice = $homeAutomationDevice;
  }
  /**
   * @return AssistantVerticalsHomeautomationProtoHomeAutomationDevice
   */
  public function getHomeAutomationDevice()
  {
    return $this->homeAutomationDevice;
  }
  /**
   * @param NlpSemanticParsingLocalLocation
   */
  public function setLocation(NlpSemanticParsingLocalLocation $location)
  {
    $this->location = $location;
  }
  /**
   * @return NlpSemanticParsingLocalLocation
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param NlpSemanticParsingModelsMediaMediaAnnotation
   */
  public function setMedia(NlpSemanticParsingModelsMediaMediaAnnotation $media)
  {
    $this->media = $media;
  }
  /**
   * @return NlpSemanticParsingModelsMediaMediaAnnotation
   */
  public function getMedia()
  {
    return $this->media;
  }
  /**
   * @param AssistantApiCoreTypesMessageNotification
   */
  public function setMessageNotification(AssistantApiCoreTypesMessageNotification $messageNotification)
  {
    $this->messageNotification = $messageNotification;
  }
  /**
   * @return AssistantApiCoreTypesMessageNotification
   */
  public function getMessageNotification()
  {
    return $this->messageNotification;
  }
  /**
   * @param NlpSemanticParsingModelsMoneyMoney
   */
  public function setMoney(NlpSemanticParsingModelsMoneyMoney $money)
  {
    $this->money = $money;
  }
  /**
   * @return NlpSemanticParsingModelsMoneyMoney
   */
  public function getMoney()
  {
    return $this->money;
  }
  /**
   * @param NlpSemanticParsingModelsNarrativeNewsNewsProvider
   */
  public function setNarrativeNewsProvider(NlpSemanticParsingModelsNarrativeNewsNewsProvider $narrativeNewsProvider)
  {
    $this->narrativeNewsProvider = $narrativeNewsProvider;
  }
  /**
   * @return NlpSemanticParsingModelsNarrativeNewsNewsProvider
   */
  public function getNarrativeNewsProvider()
  {
    return $this->narrativeNewsProvider;
  }
  /**
   * @param NlpSemanticParsingNumberNumber
   */
  public function setNumber(NlpSemanticParsingNumberNumber $number)
  {
    $this->number = $number;
  }
  /**
   * @return NlpSemanticParsingNumberNumber
   */
  public function getNumber()
  {
    return $this->number;
  }
  /**
   * @param NlpSemanticParsingModelsOnDevice
   */
  public function setOnDevice(NlpSemanticParsingModelsOnDevice $onDevice)
  {
    $this->onDevice = $onDevice;
  }
  /**
   * @return NlpSemanticParsingModelsOnDevice
   */
  public function getOnDevice()
  {
    return $this->onDevice;
  }
  /**
   * @param NlpSemanticParsingModelsPersonPerson
   */
  public function setPerson(NlpSemanticParsingModelsPersonPerson $person)
  {
    $this->person = $person;
  }
  /**
   * @return NlpSemanticParsingModelsPersonPerson
   */
  public function getPerson()
  {
    return $this->person;
  }
  /**
   * @param NlpSemanticParsingPersonalIntelligenceEntity
   */
  public function setPersonalIntelligenceEntity(NlpSemanticParsingPersonalIntelligenceEntity $personalIntelligenceEntity)
  {
    $this->personalIntelligenceEntity = $personalIntelligenceEntity;
  }
  /**
   * @return NlpSemanticParsingPersonalIntelligenceEntity
   */
  public function getPersonalIntelligenceEntity()
  {
    return $this->personalIntelligenceEntity;
  }
  /**
   * @param AssistantProductivityListItem
   */
  public function setProductivityListItem(AssistantProductivityListItem $productivityListItem)
  {
    $this->productivityListItem = $productivityListItem;
  }
  /**
   * @return AssistantProductivityListItem
   */
  public function getProductivityListItem()
  {
    return $this->productivityListItem;
  }
  /**
   * @param NlpSemanticParsingModelsRecurrence
   */
  public function setRecurrence(NlpSemanticParsingModelsRecurrence $recurrence)
  {
    $this->recurrence = $recurrence;
  }
  /**
   * @return NlpSemanticParsingModelsRecurrence
   */
  public function getRecurrence()
  {
    return $this->recurrence;
  }
  /**
   * @param QualityActionsReminder
   */
  public function setReminder(QualityActionsReminder $reminder)
  {
    $this->reminder = $reminder;
  }
  /**
   * @return QualityActionsReminder
   */
  public function getReminder()
  {
    return $this->reminder;
  }
  /**
   * @param KnowledgeAnswersIntentQuerySensitiveArgumentValueGuard
   */
  public function setSensitiveValue(KnowledgeAnswersIntentQuerySensitiveArgumentValueGuard $sensitiveValue)
  {
    $this->sensitiveValue = $sensitiveValue;
  }
  /**
   * @return KnowledgeAnswersIntentQuerySensitiveArgumentValueGuard
   */
  public function getSensitiveValue()
  {
    return $this->sensitiveValue;
  }
  /**
   * @param KnowledgeAnswersSensitivitySensitivity[]
   */
  public function setSensitivity($sensitivity)
  {
    $this->sensitivity = $sensitivity;
  }
  /**
   * @return KnowledgeAnswersSensitivitySensitivity[]
   */
  public function getSensitivity()
  {
    return $this->sensitivity;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantMerchant
   */
  public function setShoppingMerchant(NlpSemanticParsingModelsShoppingAssistantMerchant $shoppingMerchant)
  {
    $this->shoppingMerchant = $shoppingMerchant;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantMerchant
   */
  public function getShoppingMerchant()
  {
    return $this->shoppingMerchant;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantOffer
   */
  public function setShoppingOffer(NlpSemanticParsingModelsShoppingAssistantOffer $shoppingOffer)
  {
    $this->shoppingOffer = $shoppingOffer;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantOffer
   */
  public function getShoppingOffer()
  {
    return $this->shoppingOffer;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantProduct
   */
  public function setShoppingProduct(NlpSemanticParsingModelsShoppingAssistantProduct $shoppingProduct)
  {
    $this->shoppingProduct = $shoppingProduct;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantProduct
   */
  public function getShoppingProduct()
  {
    return $this->shoppingProduct;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantProductExpression
   */
  public function setShoppingProductExpression(NlpSemanticParsingModelsShoppingAssistantProductExpression $shoppingProductExpression)
  {
    $this->shoppingProductExpression = $shoppingProductExpression;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantProductExpression
   */
  public function getShoppingProductExpression()
  {
    return $this->shoppingProductExpression;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantStore
   */
  public function setShoppingStore(NlpSemanticParsingModelsShoppingAssistantStore $shoppingStore)
  {
    $this->shoppingStore = $shoppingStore;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantStore
   */
  public function getShoppingStore()
  {
    return $this->shoppingStore;
  }
  /**
   * @param KnowledgeAnswersIntentQuerySimpleValue
   */
  public function setSimpleValue(KnowledgeAnswersIntentQuerySimpleValue $simpleValue)
  {
    $this->simpleValue = $simpleValue;
  }
  /**
   * @return KnowledgeAnswersIntentQuerySimpleValue
   */
  public function getSimpleValue()
  {
    return $this->simpleValue;
  }
  /**
   * @param QualityActionsTimer
   */
  public function setTimer(QualityActionsTimer $timer)
  {
    $this->timer = $timer;
  }
  /**
   * @return QualityActionsTimer
   */
  public function getTimer()
  {
    return $this->timer;
  }
  /**
   * @param NlpSemanticParsingDatetimeTimeZone
   */
  public function setTimezone(NlpSemanticParsingDatetimeTimeZone $timezone)
  {
    $this->timezone = $timezone;
  }
  /**
   * @return NlpSemanticParsingDatetimeTimeZone
   */
  public function getTimezone()
  {
    return $this->timezone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryArgumentValue::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryArgumentValue');
