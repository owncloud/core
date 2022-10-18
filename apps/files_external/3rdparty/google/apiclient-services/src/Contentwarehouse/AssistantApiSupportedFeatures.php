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

class AssistantApiSupportedFeatures extends \Google\Model
{
  /**
   * @var bool
   */
  public $aaeNotificationSourceSupported;
  protected $acpSupportType = AssistantApiAssistantContinuedPresenceSupport::class;
  protected $acpSupportDataType = '';
  protected $actionV2SupportedFeaturesType = AssistantApiActionV2SupportedFeatures::class;
  protected $actionV2SupportedFeaturesDataType = '';
  /**
   * @var bool
   */
  public $alarmTimerManagerApiSupported;
  protected $appControlSupportType = AssistantApiAppControlSupport::class;
  protected $appControlSupportDataType = '';
  /**
   * @var bool
   */
  public $assistantExploreSupported;
  /**
   * @var bool
   */
  public $assistantForKidsSupported;
  /**
   * @var bool
   */
  public $bypassDiDcCheckForComms;
  /**
   * @var bool
   */
  public $bypassMsgNotificationDismissal;
  /**
   * @var bool
   */
  public $client1mProvidersSupported;
  /**
   * @var bool
   */
  public $clientOpResultBatchingSupported;
  /**
   * @var bool
   */
  public $crossDeviceBroadcastSupported;
  /**
   * @var string
   */
  public $crossDeviceBroadcastVersion;
  /**
   * @var bool
   */
  public $csatVisualOverlaySupported;
  /**
   * @var string
   */
  public $duoClientApiFeatures;
  /**
   * @var bool
   */
  public $duoGroupCallingSupported;
  protected $fitnessFeatureSupportType = AssistantApiFitnessFeatureSupport::class;
  protected $fitnessFeatureSupportDataType = '';
  protected $fluidActionsSupportType = AssistantApiFluidActionsSupport::class;
  protected $fluidActionsSupportDataType = '';
  /**
   * @var bool
   */
  public $funtimeSupported;
  /**
   * @var bool
   */
  public $gdiSupported;
  /**
   * @var bool
   */
  public $gearheadNotificationSourceSupported;
  /**
   * @var bool
   */
  public $hasPhysicalRadio;
  /**
   * @var bool
   */
  public $immersiveCanvasConfirmationMessageSupported;
  protected $immersiveCanvasSupportType = AssistantApiImmersiveCanvasSupport::class;
  protected $immersiveCanvasSupportDataType = '';
  /**
   * @var bool
   */
  public $inDialogAccountLinkingSupported;
  /**
   * @var bool
   */
  public $isPairedPhoneContactUploadNeededForComms;
  /**
   * @var bool
   */
  public $isPairedPhoneNeededForComms;
  /**
   * @var string
   */
  public $launchKeyboardSupported;
  /**
   * @var bool
   */
  public $lensSupported;
  /**
   * @var bool
   */
  public $liveCardsSupported;
  /**
   * @var bool
   */
  public $mapsDialogsSupported;
  /**
   * @var bool
   */
  public $masqueradeModeSupported;
  protected $mediaControlSupportType = AssistantApiMediaControlSupport::class;
  protected $mediaControlSupportDataType = '';
  /**
   * @var string
   */
  public $mediaSessionDetection;
  /**
   * @var bool
   */
  public $meetSupported;
  /**
   * @var bool
   */
  public $noInputResponseSupported;
  /**
   * @var bool
   */
  public $opaOnSearchSupported;
  /**
   * @var bool
   */
  public $parentalControlsSupported;
  /**
   * @var bool
   */
  public $persistentDisplaySupported;
  /**
   * @var bool
   */
  public $privacyAwareLockscreenSupported;
  /**
   * @var bool
   */
  public $remoteCloudCastingEnabled;
  /**
   * @var bool
   */
  public $serverGeneratedFeedbackChipsEnabled;
  /**
   * @var bool
   */
  public $shLockScreenSupported;
  protected $signInMethodType = AssistantApiSignInMethod::class;
  protected $signInMethodDataType = '';
  /**
   * @var bool
   */
  public $sleepSensingSupported;
  /**
   * @var bool
   */
  public $smartspaceCrossDeviceTimerSupported;
  /**
   * @var bool
   */
  public $soliGestureDetectionSupported;
  protected $suggestionsSupportType = AssistantApiSuggestionsSupport::class;
  protected $suggestionsSupportDataType = '';
  protected $sunriseFeaturesSupportType = AssistantApiSunriseFeaturesSupport::class;
  protected $sunriseFeaturesSupportDataType = '';
  /**
   * @var bool
   */
  public $tapToReadOptimizationSupported;
  /**
   * @var bool
   */
  public $thirdPartyGuiSupported;
  protected $transactionFeaturesSupportType = AssistantApiTransactionFeaturesSupport::class;
  protected $transactionFeaturesSupportDataType = '';
  /**
   * @var string
   */
  public $transactionsVersion;
  /**
   * @var bool
   */
  public $usesSeparateFullViewer;
  /**
   * @var bool
   */
  public $viewReminderHubPageNotSupported;
  /**
   * @var bool
   */
  public $warmWelcomeTutorialSupported;
  /**
   * @var bool
   */
  public $webBrowserSupported;
  /**
   * @var bool
   */
  public $whatsNextSupported;
  /**
   * @var bool
   */
  public $zoomSupported;

  /**
   * @param bool
   */
  public function setAaeNotificationSourceSupported($aaeNotificationSourceSupported)
  {
    $this->aaeNotificationSourceSupported = $aaeNotificationSourceSupported;
  }
  /**
   * @return bool
   */
  public function getAaeNotificationSourceSupported()
  {
    return $this->aaeNotificationSourceSupported;
  }
  /**
   * @param AssistantApiAssistantContinuedPresenceSupport
   */
  public function setAcpSupport(AssistantApiAssistantContinuedPresenceSupport $acpSupport)
  {
    $this->acpSupport = $acpSupport;
  }
  /**
   * @return AssistantApiAssistantContinuedPresenceSupport
   */
  public function getAcpSupport()
  {
    return $this->acpSupport;
  }
  /**
   * @param AssistantApiActionV2SupportedFeatures
   */
  public function setActionV2SupportedFeatures(AssistantApiActionV2SupportedFeatures $actionV2SupportedFeatures)
  {
    $this->actionV2SupportedFeatures = $actionV2SupportedFeatures;
  }
  /**
   * @return AssistantApiActionV2SupportedFeatures
   */
  public function getActionV2SupportedFeatures()
  {
    return $this->actionV2SupportedFeatures;
  }
  /**
   * @param bool
   */
  public function setAlarmTimerManagerApiSupported($alarmTimerManagerApiSupported)
  {
    $this->alarmTimerManagerApiSupported = $alarmTimerManagerApiSupported;
  }
  /**
   * @return bool
   */
  public function getAlarmTimerManagerApiSupported()
  {
    return $this->alarmTimerManagerApiSupported;
  }
  /**
   * @param AssistantApiAppControlSupport
   */
  public function setAppControlSupport(AssistantApiAppControlSupport $appControlSupport)
  {
    $this->appControlSupport = $appControlSupport;
  }
  /**
   * @return AssistantApiAppControlSupport
   */
  public function getAppControlSupport()
  {
    return $this->appControlSupport;
  }
  /**
   * @param bool
   */
  public function setAssistantExploreSupported($assistantExploreSupported)
  {
    $this->assistantExploreSupported = $assistantExploreSupported;
  }
  /**
   * @return bool
   */
  public function getAssistantExploreSupported()
  {
    return $this->assistantExploreSupported;
  }
  /**
   * @param bool
   */
  public function setAssistantForKidsSupported($assistantForKidsSupported)
  {
    $this->assistantForKidsSupported = $assistantForKidsSupported;
  }
  /**
   * @return bool
   */
  public function getAssistantForKidsSupported()
  {
    return $this->assistantForKidsSupported;
  }
  /**
   * @param bool
   */
  public function setBypassDiDcCheckForComms($bypassDiDcCheckForComms)
  {
    $this->bypassDiDcCheckForComms = $bypassDiDcCheckForComms;
  }
  /**
   * @return bool
   */
  public function getBypassDiDcCheckForComms()
  {
    return $this->bypassDiDcCheckForComms;
  }
  /**
   * @param bool
   */
  public function setBypassMsgNotificationDismissal($bypassMsgNotificationDismissal)
  {
    $this->bypassMsgNotificationDismissal = $bypassMsgNotificationDismissal;
  }
  /**
   * @return bool
   */
  public function getBypassMsgNotificationDismissal()
  {
    return $this->bypassMsgNotificationDismissal;
  }
  /**
   * @param bool
   */
  public function setClient1mProvidersSupported($client1mProvidersSupported)
  {
    $this->client1mProvidersSupported = $client1mProvidersSupported;
  }
  /**
   * @return bool
   */
  public function getClient1mProvidersSupported()
  {
    return $this->client1mProvidersSupported;
  }
  /**
   * @param bool
   */
  public function setClientOpResultBatchingSupported($clientOpResultBatchingSupported)
  {
    $this->clientOpResultBatchingSupported = $clientOpResultBatchingSupported;
  }
  /**
   * @return bool
   */
  public function getClientOpResultBatchingSupported()
  {
    return $this->clientOpResultBatchingSupported;
  }
  /**
   * @param bool
   */
  public function setCrossDeviceBroadcastSupported($crossDeviceBroadcastSupported)
  {
    $this->crossDeviceBroadcastSupported = $crossDeviceBroadcastSupported;
  }
  /**
   * @return bool
   */
  public function getCrossDeviceBroadcastSupported()
  {
    return $this->crossDeviceBroadcastSupported;
  }
  /**
   * @param string
   */
  public function setCrossDeviceBroadcastVersion($crossDeviceBroadcastVersion)
  {
    $this->crossDeviceBroadcastVersion = $crossDeviceBroadcastVersion;
  }
  /**
   * @return string
   */
  public function getCrossDeviceBroadcastVersion()
  {
    return $this->crossDeviceBroadcastVersion;
  }
  /**
   * @param bool
   */
  public function setCsatVisualOverlaySupported($csatVisualOverlaySupported)
  {
    $this->csatVisualOverlaySupported = $csatVisualOverlaySupported;
  }
  /**
   * @return bool
   */
  public function getCsatVisualOverlaySupported()
  {
    return $this->csatVisualOverlaySupported;
  }
  /**
   * @param string
   */
  public function setDuoClientApiFeatures($duoClientApiFeatures)
  {
    $this->duoClientApiFeatures = $duoClientApiFeatures;
  }
  /**
   * @return string
   */
  public function getDuoClientApiFeatures()
  {
    return $this->duoClientApiFeatures;
  }
  /**
   * @param bool
   */
  public function setDuoGroupCallingSupported($duoGroupCallingSupported)
  {
    $this->duoGroupCallingSupported = $duoGroupCallingSupported;
  }
  /**
   * @return bool
   */
  public function getDuoGroupCallingSupported()
  {
    return $this->duoGroupCallingSupported;
  }
  /**
   * @param AssistantApiFitnessFeatureSupport
   */
  public function setFitnessFeatureSupport(AssistantApiFitnessFeatureSupport $fitnessFeatureSupport)
  {
    $this->fitnessFeatureSupport = $fitnessFeatureSupport;
  }
  /**
   * @return AssistantApiFitnessFeatureSupport
   */
  public function getFitnessFeatureSupport()
  {
    return $this->fitnessFeatureSupport;
  }
  /**
   * @param AssistantApiFluidActionsSupport
   */
  public function setFluidActionsSupport(AssistantApiFluidActionsSupport $fluidActionsSupport)
  {
    $this->fluidActionsSupport = $fluidActionsSupport;
  }
  /**
   * @return AssistantApiFluidActionsSupport
   */
  public function getFluidActionsSupport()
  {
    return $this->fluidActionsSupport;
  }
  /**
   * @param bool
   */
  public function setFuntimeSupported($funtimeSupported)
  {
    $this->funtimeSupported = $funtimeSupported;
  }
  /**
   * @return bool
   */
  public function getFuntimeSupported()
  {
    return $this->funtimeSupported;
  }
  /**
   * @param bool
   */
  public function setGdiSupported($gdiSupported)
  {
    $this->gdiSupported = $gdiSupported;
  }
  /**
   * @return bool
   */
  public function getGdiSupported()
  {
    return $this->gdiSupported;
  }
  /**
   * @param bool
   */
  public function setGearheadNotificationSourceSupported($gearheadNotificationSourceSupported)
  {
    $this->gearheadNotificationSourceSupported = $gearheadNotificationSourceSupported;
  }
  /**
   * @return bool
   */
  public function getGearheadNotificationSourceSupported()
  {
    return $this->gearheadNotificationSourceSupported;
  }
  /**
   * @param bool
   */
  public function setHasPhysicalRadio($hasPhysicalRadio)
  {
    $this->hasPhysicalRadio = $hasPhysicalRadio;
  }
  /**
   * @return bool
   */
  public function getHasPhysicalRadio()
  {
    return $this->hasPhysicalRadio;
  }
  /**
   * @param bool
   */
  public function setImmersiveCanvasConfirmationMessageSupported($immersiveCanvasConfirmationMessageSupported)
  {
    $this->immersiveCanvasConfirmationMessageSupported = $immersiveCanvasConfirmationMessageSupported;
  }
  /**
   * @return bool
   */
  public function getImmersiveCanvasConfirmationMessageSupported()
  {
    return $this->immersiveCanvasConfirmationMessageSupported;
  }
  /**
   * @param AssistantApiImmersiveCanvasSupport
   */
  public function setImmersiveCanvasSupport(AssistantApiImmersiveCanvasSupport $immersiveCanvasSupport)
  {
    $this->immersiveCanvasSupport = $immersiveCanvasSupport;
  }
  /**
   * @return AssistantApiImmersiveCanvasSupport
   */
  public function getImmersiveCanvasSupport()
  {
    return $this->immersiveCanvasSupport;
  }
  /**
   * @param bool
   */
  public function setInDialogAccountLinkingSupported($inDialogAccountLinkingSupported)
  {
    $this->inDialogAccountLinkingSupported = $inDialogAccountLinkingSupported;
  }
  /**
   * @return bool
   */
  public function getInDialogAccountLinkingSupported()
  {
    return $this->inDialogAccountLinkingSupported;
  }
  /**
   * @param bool
   */
  public function setIsPairedPhoneContactUploadNeededForComms($isPairedPhoneContactUploadNeededForComms)
  {
    $this->isPairedPhoneContactUploadNeededForComms = $isPairedPhoneContactUploadNeededForComms;
  }
  /**
   * @return bool
   */
  public function getIsPairedPhoneContactUploadNeededForComms()
  {
    return $this->isPairedPhoneContactUploadNeededForComms;
  }
  /**
   * @param bool
   */
  public function setIsPairedPhoneNeededForComms($isPairedPhoneNeededForComms)
  {
    $this->isPairedPhoneNeededForComms = $isPairedPhoneNeededForComms;
  }
  /**
   * @return bool
   */
  public function getIsPairedPhoneNeededForComms()
  {
    return $this->isPairedPhoneNeededForComms;
  }
  /**
   * @param string
   */
  public function setLaunchKeyboardSupported($launchKeyboardSupported)
  {
    $this->launchKeyboardSupported = $launchKeyboardSupported;
  }
  /**
   * @return string
   */
  public function getLaunchKeyboardSupported()
  {
    return $this->launchKeyboardSupported;
  }
  /**
   * @param bool
   */
  public function setLensSupported($lensSupported)
  {
    $this->lensSupported = $lensSupported;
  }
  /**
   * @return bool
   */
  public function getLensSupported()
  {
    return $this->lensSupported;
  }
  /**
   * @param bool
   */
  public function setLiveCardsSupported($liveCardsSupported)
  {
    $this->liveCardsSupported = $liveCardsSupported;
  }
  /**
   * @return bool
   */
  public function getLiveCardsSupported()
  {
    return $this->liveCardsSupported;
  }
  /**
   * @param bool
   */
  public function setMapsDialogsSupported($mapsDialogsSupported)
  {
    $this->mapsDialogsSupported = $mapsDialogsSupported;
  }
  /**
   * @return bool
   */
  public function getMapsDialogsSupported()
  {
    return $this->mapsDialogsSupported;
  }
  /**
   * @param bool
   */
  public function setMasqueradeModeSupported($masqueradeModeSupported)
  {
    $this->masqueradeModeSupported = $masqueradeModeSupported;
  }
  /**
   * @return bool
   */
  public function getMasqueradeModeSupported()
  {
    return $this->masqueradeModeSupported;
  }
  /**
   * @param AssistantApiMediaControlSupport
   */
  public function setMediaControlSupport(AssistantApiMediaControlSupport $mediaControlSupport)
  {
    $this->mediaControlSupport = $mediaControlSupport;
  }
  /**
   * @return AssistantApiMediaControlSupport
   */
  public function getMediaControlSupport()
  {
    return $this->mediaControlSupport;
  }
  /**
   * @param string
   */
  public function setMediaSessionDetection($mediaSessionDetection)
  {
    $this->mediaSessionDetection = $mediaSessionDetection;
  }
  /**
   * @return string
   */
  public function getMediaSessionDetection()
  {
    return $this->mediaSessionDetection;
  }
  /**
   * @param bool
   */
  public function setMeetSupported($meetSupported)
  {
    $this->meetSupported = $meetSupported;
  }
  /**
   * @return bool
   */
  public function getMeetSupported()
  {
    return $this->meetSupported;
  }
  /**
   * @param bool
   */
  public function setNoInputResponseSupported($noInputResponseSupported)
  {
    $this->noInputResponseSupported = $noInputResponseSupported;
  }
  /**
   * @return bool
   */
  public function getNoInputResponseSupported()
  {
    return $this->noInputResponseSupported;
  }
  /**
   * @param bool
   */
  public function setOpaOnSearchSupported($opaOnSearchSupported)
  {
    $this->opaOnSearchSupported = $opaOnSearchSupported;
  }
  /**
   * @return bool
   */
  public function getOpaOnSearchSupported()
  {
    return $this->opaOnSearchSupported;
  }
  /**
   * @param bool
   */
  public function setParentalControlsSupported($parentalControlsSupported)
  {
    $this->parentalControlsSupported = $parentalControlsSupported;
  }
  /**
   * @return bool
   */
  public function getParentalControlsSupported()
  {
    return $this->parentalControlsSupported;
  }
  /**
   * @param bool
   */
  public function setPersistentDisplaySupported($persistentDisplaySupported)
  {
    $this->persistentDisplaySupported = $persistentDisplaySupported;
  }
  /**
   * @return bool
   */
  public function getPersistentDisplaySupported()
  {
    return $this->persistentDisplaySupported;
  }
  /**
   * @param bool
   */
  public function setPrivacyAwareLockscreenSupported($privacyAwareLockscreenSupported)
  {
    $this->privacyAwareLockscreenSupported = $privacyAwareLockscreenSupported;
  }
  /**
   * @return bool
   */
  public function getPrivacyAwareLockscreenSupported()
  {
    return $this->privacyAwareLockscreenSupported;
  }
  /**
   * @param bool
   */
  public function setRemoteCloudCastingEnabled($remoteCloudCastingEnabled)
  {
    $this->remoteCloudCastingEnabled = $remoteCloudCastingEnabled;
  }
  /**
   * @return bool
   */
  public function getRemoteCloudCastingEnabled()
  {
    return $this->remoteCloudCastingEnabled;
  }
  /**
   * @param bool
   */
  public function setServerGeneratedFeedbackChipsEnabled($serverGeneratedFeedbackChipsEnabled)
  {
    $this->serverGeneratedFeedbackChipsEnabled = $serverGeneratedFeedbackChipsEnabled;
  }
  /**
   * @return bool
   */
  public function getServerGeneratedFeedbackChipsEnabled()
  {
    return $this->serverGeneratedFeedbackChipsEnabled;
  }
  /**
   * @param bool
   */
  public function setShLockScreenSupported($shLockScreenSupported)
  {
    $this->shLockScreenSupported = $shLockScreenSupported;
  }
  /**
   * @return bool
   */
  public function getShLockScreenSupported()
  {
    return $this->shLockScreenSupported;
  }
  /**
   * @param AssistantApiSignInMethod
   */
  public function setSignInMethod(AssistantApiSignInMethod $signInMethod)
  {
    $this->signInMethod = $signInMethod;
  }
  /**
   * @return AssistantApiSignInMethod
   */
  public function getSignInMethod()
  {
    return $this->signInMethod;
  }
  /**
   * @param bool
   */
  public function setSleepSensingSupported($sleepSensingSupported)
  {
    $this->sleepSensingSupported = $sleepSensingSupported;
  }
  /**
   * @return bool
   */
  public function getSleepSensingSupported()
  {
    return $this->sleepSensingSupported;
  }
  /**
   * @param bool
   */
  public function setSmartspaceCrossDeviceTimerSupported($smartspaceCrossDeviceTimerSupported)
  {
    $this->smartspaceCrossDeviceTimerSupported = $smartspaceCrossDeviceTimerSupported;
  }
  /**
   * @return bool
   */
  public function getSmartspaceCrossDeviceTimerSupported()
  {
    return $this->smartspaceCrossDeviceTimerSupported;
  }
  /**
   * @param bool
   */
  public function setSoliGestureDetectionSupported($soliGestureDetectionSupported)
  {
    $this->soliGestureDetectionSupported = $soliGestureDetectionSupported;
  }
  /**
   * @return bool
   */
  public function getSoliGestureDetectionSupported()
  {
    return $this->soliGestureDetectionSupported;
  }
  /**
   * @param AssistantApiSuggestionsSupport
   */
  public function setSuggestionsSupport(AssistantApiSuggestionsSupport $suggestionsSupport)
  {
    $this->suggestionsSupport = $suggestionsSupport;
  }
  /**
   * @return AssistantApiSuggestionsSupport
   */
  public function getSuggestionsSupport()
  {
    return $this->suggestionsSupport;
  }
  /**
   * @param AssistantApiSunriseFeaturesSupport
   */
  public function setSunriseFeaturesSupport(AssistantApiSunriseFeaturesSupport $sunriseFeaturesSupport)
  {
    $this->sunriseFeaturesSupport = $sunriseFeaturesSupport;
  }
  /**
   * @return AssistantApiSunriseFeaturesSupport
   */
  public function getSunriseFeaturesSupport()
  {
    return $this->sunriseFeaturesSupport;
  }
  /**
   * @param bool
   */
  public function setTapToReadOptimizationSupported($tapToReadOptimizationSupported)
  {
    $this->tapToReadOptimizationSupported = $tapToReadOptimizationSupported;
  }
  /**
   * @return bool
   */
  public function getTapToReadOptimizationSupported()
  {
    return $this->tapToReadOptimizationSupported;
  }
  /**
   * @param bool
   */
  public function setThirdPartyGuiSupported($thirdPartyGuiSupported)
  {
    $this->thirdPartyGuiSupported = $thirdPartyGuiSupported;
  }
  /**
   * @return bool
   */
  public function getThirdPartyGuiSupported()
  {
    return $this->thirdPartyGuiSupported;
  }
  /**
   * @param AssistantApiTransactionFeaturesSupport
   */
  public function setTransactionFeaturesSupport(AssistantApiTransactionFeaturesSupport $transactionFeaturesSupport)
  {
    $this->transactionFeaturesSupport = $transactionFeaturesSupport;
  }
  /**
   * @return AssistantApiTransactionFeaturesSupport
   */
  public function getTransactionFeaturesSupport()
  {
    return $this->transactionFeaturesSupport;
  }
  /**
   * @param string
   */
  public function setTransactionsVersion($transactionsVersion)
  {
    $this->transactionsVersion = $transactionsVersion;
  }
  /**
   * @return string
   */
  public function getTransactionsVersion()
  {
    return $this->transactionsVersion;
  }
  /**
   * @param bool
   */
  public function setUsesSeparateFullViewer($usesSeparateFullViewer)
  {
    $this->usesSeparateFullViewer = $usesSeparateFullViewer;
  }
  /**
   * @return bool
   */
  public function getUsesSeparateFullViewer()
  {
    return $this->usesSeparateFullViewer;
  }
  /**
   * @param bool
   */
  public function setViewReminderHubPageNotSupported($viewReminderHubPageNotSupported)
  {
    $this->viewReminderHubPageNotSupported = $viewReminderHubPageNotSupported;
  }
  /**
   * @return bool
   */
  public function getViewReminderHubPageNotSupported()
  {
    return $this->viewReminderHubPageNotSupported;
  }
  /**
   * @param bool
   */
  public function setWarmWelcomeTutorialSupported($warmWelcomeTutorialSupported)
  {
    $this->warmWelcomeTutorialSupported = $warmWelcomeTutorialSupported;
  }
  /**
   * @return bool
   */
  public function getWarmWelcomeTutorialSupported()
  {
    return $this->warmWelcomeTutorialSupported;
  }
  /**
   * @param bool
   */
  public function setWebBrowserSupported($webBrowserSupported)
  {
    $this->webBrowserSupported = $webBrowserSupported;
  }
  /**
   * @return bool
   */
  public function getWebBrowserSupported()
  {
    return $this->webBrowserSupported;
  }
  /**
   * @param bool
   */
  public function setWhatsNextSupported($whatsNextSupported)
  {
    $this->whatsNextSupported = $whatsNextSupported;
  }
  /**
   * @return bool
   */
  public function getWhatsNextSupported()
  {
    return $this->whatsNextSupported;
  }
  /**
   * @param bool
   */
  public function setZoomSupported($zoomSupported)
  {
    $this->zoomSupported = $zoomSupported;
  }
  /**
   * @return bool
   */
  public function getZoomSupported()
  {
    return $this->zoomSupported;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSupportedFeatures::class, 'Google_Service_Contentwarehouse_AssistantApiSupportedFeatures');
