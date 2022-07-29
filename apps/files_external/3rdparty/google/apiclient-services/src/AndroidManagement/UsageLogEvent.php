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

namespace Google\Service\AndroidManagement;

class UsageLogEvent extends \Google\Model
{
  protected $adbShellCommandEventType = AdbShellCommandEvent::class;
  protected $adbShellCommandEventDataType = '';
  protected $adbShellInteractiveEventType = AdbShellInteractiveEvent::class;
  protected $adbShellInteractiveEventDataType = '';
  protected $appProcessStartEventType = AppProcessStartEvent::class;
  protected $appProcessStartEventDataType = '';
  protected $certAuthorityInstalledEventType = CertAuthorityInstalledEvent::class;
  protected $certAuthorityInstalledEventDataType = '';
  protected $certAuthorityRemovedEventType = CertAuthorityRemovedEvent::class;
  protected $certAuthorityRemovedEventDataType = '';
  protected $certValidationFailureEventType = CertValidationFailureEvent::class;
  protected $certValidationFailureEventDataType = '';
  protected $connectEventType = ConnectEvent::class;
  protected $connectEventDataType = '';
  protected $cryptoSelfTestCompletedEventType = CryptoSelfTestCompletedEvent::class;
  protected $cryptoSelfTestCompletedEventDataType = '';
  protected $dnsEventType = DnsEvent::class;
  protected $dnsEventDataType = '';
  /**
   * @var string
   */
  public $eventId;
  /**
   * @var string
   */
  public $eventTime;
  /**
   * @var string
   */
  public $eventType;
  protected $filePulledEventType = FilePulledEvent::class;
  protected $filePulledEventDataType = '';
  protected $filePushedEventType = FilePushedEvent::class;
  protected $filePushedEventDataType = '';
  protected $keyDestructionEventType = KeyDestructionEvent::class;
  protected $keyDestructionEventDataType = '';
  protected $keyGeneratedEventType = KeyGeneratedEvent::class;
  protected $keyGeneratedEventDataType = '';
  protected $keyImportEventType = KeyImportEvent::class;
  protected $keyImportEventDataType = '';
  protected $keyIntegrityViolationEventType = KeyIntegrityViolationEvent::class;
  protected $keyIntegrityViolationEventDataType = '';
  protected $keyguardDismissAuthAttemptEventType = KeyguardDismissAuthAttemptEvent::class;
  protected $keyguardDismissAuthAttemptEventDataType = '';
  protected $keyguardDismissedEventType = KeyguardDismissedEvent::class;
  protected $keyguardDismissedEventDataType = '';
  protected $keyguardSecuredEventType = KeyguardSecuredEvent::class;
  protected $keyguardSecuredEventDataType = '';
  protected $logBufferSizeCriticalEventType = LogBufferSizeCriticalEvent::class;
  protected $logBufferSizeCriticalEventDataType = '';
  protected $loggingStartedEventType = LoggingStartedEvent::class;
  protected $loggingStartedEventDataType = '';
  protected $loggingStoppedEventType = LoggingStoppedEvent::class;
  protected $loggingStoppedEventDataType = '';
  protected $mediaMountEventType = MediaMountEvent::class;
  protected $mediaMountEventDataType = '';
  protected $mediaUnmountEventType = MediaUnmountEvent::class;
  protected $mediaUnmountEventDataType = '';
  protected $osShutdownEventType = OsShutdownEvent::class;
  protected $osShutdownEventDataType = '';
  protected $osStartupEventType = OsStartupEvent::class;
  protected $osStartupEventDataType = '';
  protected $remoteLockEventType = RemoteLockEvent::class;
  protected $remoteLockEventDataType = '';
  protected $wipeFailureEventType = WipeFailureEvent::class;
  protected $wipeFailureEventDataType = '';

  /**
   * @param AdbShellCommandEvent
   */
  public function setAdbShellCommandEvent(AdbShellCommandEvent $adbShellCommandEvent)
  {
    $this->adbShellCommandEvent = $adbShellCommandEvent;
  }
  /**
   * @return AdbShellCommandEvent
   */
  public function getAdbShellCommandEvent()
  {
    return $this->adbShellCommandEvent;
  }
  /**
   * @param AdbShellInteractiveEvent
   */
  public function setAdbShellInteractiveEvent(AdbShellInteractiveEvent $adbShellInteractiveEvent)
  {
    $this->adbShellInteractiveEvent = $adbShellInteractiveEvent;
  }
  /**
   * @return AdbShellInteractiveEvent
   */
  public function getAdbShellInteractiveEvent()
  {
    return $this->adbShellInteractiveEvent;
  }
  /**
   * @param AppProcessStartEvent
   */
  public function setAppProcessStartEvent(AppProcessStartEvent $appProcessStartEvent)
  {
    $this->appProcessStartEvent = $appProcessStartEvent;
  }
  /**
   * @return AppProcessStartEvent
   */
  public function getAppProcessStartEvent()
  {
    return $this->appProcessStartEvent;
  }
  /**
   * @param CertAuthorityInstalledEvent
   */
  public function setCertAuthorityInstalledEvent(CertAuthorityInstalledEvent $certAuthorityInstalledEvent)
  {
    $this->certAuthorityInstalledEvent = $certAuthorityInstalledEvent;
  }
  /**
   * @return CertAuthorityInstalledEvent
   */
  public function getCertAuthorityInstalledEvent()
  {
    return $this->certAuthorityInstalledEvent;
  }
  /**
   * @param CertAuthorityRemovedEvent
   */
  public function setCertAuthorityRemovedEvent(CertAuthorityRemovedEvent $certAuthorityRemovedEvent)
  {
    $this->certAuthorityRemovedEvent = $certAuthorityRemovedEvent;
  }
  /**
   * @return CertAuthorityRemovedEvent
   */
  public function getCertAuthorityRemovedEvent()
  {
    return $this->certAuthorityRemovedEvent;
  }
  /**
   * @param CertValidationFailureEvent
   */
  public function setCertValidationFailureEvent(CertValidationFailureEvent $certValidationFailureEvent)
  {
    $this->certValidationFailureEvent = $certValidationFailureEvent;
  }
  /**
   * @return CertValidationFailureEvent
   */
  public function getCertValidationFailureEvent()
  {
    return $this->certValidationFailureEvent;
  }
  /**
   * @param ConnectEvent
   */
  public function setConnectEvent(ConnectEvent $connectEvent)
  {
    $this->connectEvent = $connectEvent;
  }
  /**
   * @return ConnectEvent
   */
  public function getConnectEvent()
  {
    return $this->connectEvent;
  }
  /**
   * @param CryptoSelfTestCompletedEvent
   */
  public function setCryptoSelfTestCompletedEvent(CryptoSelfTestCompletedEvent $cryptoSelfTestCompletedEvent)
  {
    $this->cryptoSelfTestCompletedEvent = $cryptoSelfTestCompletedEvent;
  }
  /**
   * @return CryptoSelfTestCompletedEvent
   */
  public function getCryptoSelfTestCompletedEvent()
  {
    return $this->cryptoSelfTestCompletedEvent;
  }
  /**
   * @param DnsEvent
   */
  public function setDnsEvent(DnsEvent $dnsEvent)
  {
    $this->dnsEvent = $dnsEvent;
  }
  /**
   * @return DnsEvent
   */
  public function getDnsEvent()
  {
    return $this->dnsEvent;
  }
  /**
   * @param string
   */
  public function setEventId($eventId)
  {
    $this->eventId = $eventId;
  }
  /**
   * @return string
   */
  public function getEventId()
  {
    return $this->eventId;
  }
  /**
   * @param string
   */
  public function setEventTime($eventTime)
  {
    $this->eventTime = $eventTime;
  }
  /**
   * @return string
   */
  public function getEventTime()
  {
    return $this->eventTime;
  }
  /**
   * @param string
   */
  public function setEventType($eventType)
  {
    $this->eventType = $eventType;
  }
  /**
   * @return string
   */
  public function getEventType()
  {
    return $this->eventType;
  }
  /**
   * @param FilePulledEvent
   */
  public function setFilePulledEvent(FilePulledEvent $filePulledEvent)
  {
    $this->filePulledEvent = $filePulledEvent;
  }
  /**
   * @return FilePulledEvent
   */
  public function getFilePulledEvent()
  {
    return $this->filePulledEvent;
  }
  /**
   * @param FilePushedEvent
   */
  public function setFilePushedEvent(FilePushedEvent $filePushedEvent)
  {
    $this->filePushedEvent = $filePushedEvent;
  }
  /**
   * @return FilePushedEvent
   */
  public function getFilePushedEvent()
  {
    return $this->filePushedEvent;
  }
  /**
   * @param KeyDestructionEvent
   */
  public function setKeyDestructionEvent(KeyDestructionEvent $keyDestructionEvent)
  {
    $this->keyDestructionEvent = $keyDestructionEvent;
  }
  /**
   * @return KeyDestructionEvent
   */
  public function getKeyDestructionEvent()
  {
    return $this->keyDestructionEvent;
  }
  /**
   * @param KeyGeneratedEvent
   */
  public function setKeyGeneratedEvent(KeyGeneratedEvent $keyGeneratedEvent)
  {
    $this->keyGeneratedEvent = $keyGeneratedEvent;
  }
  /**
   * @return KeyGeneratedEvent
   */
  public function getKeyGeneratedEvent()
  {
    return $this->keyGeneratedEvent;
  }
  /**
   * @param KeyImportEvent
   */
  public function setKeyImportEvent(KeyImportEvent $keyImportEvent)
  {
    $this->keyImportEvent = $keyImportEvent;
  }
  /**
   * @return KeyImportEvent
   */
  public function getKeyImportEvent()
  {
    return $this->keyImportEvent;
  }
  /**
   * @param KeyIntegrityViolationEvent
   */
  public function setKeyIntegrityViolationEvent(KeyIntegrityViolationEvent $keyIntegrityViolationEvent)
  {
    $this->keyIntegrityViolationEvent = $keyIntegrityViolationEvent;
  }
  /**
   * @return KeyIntegrityViolationEvent
   */
  public function getKeyIntegrityViolationEvent()
  {
    return $this->keyIntegrityViolationEvent;
  }
  /**
   * @param KeyguardDismissAuthAttemptEvent
   */
  public function setKeyguardDismissAuthAttemptEvent(KeyguardDismissAuthAttemptEvent $keyguardDismissAuthAttemptEvent)
  {
    $this->keyguardDismissAuthAttemptEvent = $keyguardDismissAuthAttemptEvent;
  }
  /**
   * @return KeyguardDismissAuthAttemptEvent
   */
  public function getKeyguardDismissAuthAttemptEvent()
  {
    return $this->keyguardDismissAuthAttemptEvent;
  }
  /**
   * @param KeyguardDismissedEvent
   */
  public function setKeyguardDismissedEvent(KeyguardDismissedEvent $keyguardDismissedEvent)
  {
    $this->keyguardDismissedEvent = $keyguardDismissedEvent;
  }
  /**
   * @return KeyguardDismissedEvent
   */
  public function getKeyguardDismissedEvent()
  {
    return $this->keyguardDismissedEvent;
  }
  /**
   * @param KeyguardSecuredEvent
   */
  public function setKeyguardSecuredEvent(KeyguardSecuredEvent $keyguardSecuredEvent)
  {
    $this->keyguardSecuredEvent = $keyguardSecuredEvent;
  }
  /**
   * @return KeyguardSecuredEvent
   */
  public function getKeyguardSecuredEvent()
  {
    return $this->keyguardSecuredEvent;
  }
  /**
   * @param LogBufferSizeCriticalEvent
   */
  public function setLogBufferSizeCriticalEvent(LogBufferSizeCriticalEvent $logBufferSizeCriticalEvent)
  {
    $this->logBufferSizeCriticalEvent = $logBufferSizeCriticalEvent;
  }
  /**
   * @return LogBufferSizeCriticalEvent
   */
  public function getLogBufferSizeCriticalEvent()
  {
    return $this->logBufferSizeCriticalEvent;
  }
  /**
   * @param LoggingStartedEvent
   */
  public function setLoggingStartedEvent(LoggingStartedEvent $loggingStartedEvent)
  {
    $this->loggingStartedEvent = $loggingStartedEvent;
  }
  /**
   * @return LoggingStartedEvent
   */
  public function getLoggingStartedEvent()
  {
    return $this->loggingStartedEvent;
  }
  /**
   * @param LoggingStoppedEvent
   */
  public function setLoggingStoppedEvent(LoggingStoppedEvent $loggingStoppedEvent)
  {
    $this->loggingStoppedEvent = $loggingStoppedEvent;
  }
  /**
   * @return LoggingStoppedEvent
   */
  public function getLoggingStoppedEvent()
  {
    return $this->loggingStoppedEvent;
  }
  /**
   * @param MediaMountEvent
   */
  public function setMediaMountEvent(MediaMountEvent $mediaMountEvent)
  {
    $this->mediaMountEvent = $mediaMountEvent;
  }
  /**
   * @return MediaMountEvent
   */
  public function getMediaMountEvent()
  {
    return $this->mediaMountEvent;
  }
  /**
   * @param MediaUnmountEvent
   */
  public function setMediaUnmountEvent(MediaUnmountEvent $mediaUnmountEvent)
  {
    $this->mediaUnmountEvent = $mediaUnmountEvent;
  }
  /**
   * @return MediaUnmountEvent
   */
  public function getMediaUnmountEvent()
  {
    return $this->mediaUnmountEvent;
  }
  /**
   * @param OsShutdownEvent
   */
  public function setOsShutdownEvent(OsShutdownEvent $osShutdownEvent)
  {
    $this->osShutdownEvent = $osShutdownEvent;
  }
  /**
   * @return OsShutdownEvent
   */
  public function getOsShutdownEvent()
  {
    return $this->osShutdownEvent;
  }
  /**
   * @param OsStartupEvent
   */
  public function setOsStartupEvent(OsStartupEvent $osStartupEvent)
  {
    $this->osStartupEvent = $osStartupEvent;
  }
  /**
   * @return OsStartupEvent
   */
  public function getOsStartupEvent()
  {
    return $this->osStartupEvent;
  }
  /**
   * @param RemoteLockEvent
   */
  public function setRemoteLockEvent(RemoteLockEvent $remoteLockEvent)
  {
    $this->remoteLockEvent = $remoteLockEvent;
  }
  /**
   * @return RemoteLockEvent
   */
  public function getRemoteLockEvent()
  {
    return $this->remoteLockEvent;
  }
  /**
   * @param WipeFailureEvent
   */
  public function setWipeFailureEvent(WipeFailureEvent $wipeFailureEvent)
  {
    $this->wipeFailureEvent = $wipeFailureEvent;
  }
  /**
   * @return WipeFailureEvent
   */
  public function getWipeFailureEvent()
  {
    return $this->wipeFailureEvent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsageLogEvent::class, 'Google_Service_AndroidManagement_UsageLogEvent');
