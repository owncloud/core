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

namespace Google\Service\CloudSearch;

class ChatContentExtension extends \Google\Collection
{
  protected $collection_key = 'annotation';
  protected $annotationType = EventAnnotation::class;
  protected $annotationDataType = 'array';
  protected $dynamitePlaceholderMetadataType = ChatConserverDynamitePlaceholderMetadata::class;
  protected $dynamitePlaceholderMetadataDataType = '';
  /**
   * @var string
   */
  public $eventOtrStatus;
  protected $groupLinkSharingModificationEventType = GroupLinkSharingModificationEvent::class;
  protected $groupLinkSharingModificationEventDataType = '';
  protected $hangoutEventType = HangoutEvent::class;
  protected $hangoutEventDataType = '';
  protected $inviteAcceptedEventType = InviteAcceptedEvent::class;
  protected $inviteAcceptedEventDataType = '';
  protected $membershipChangeEventType = MembershipChangeEvent::class;
  protected $membershipChangeEventDataType = '';
  protected $otrChatMessageEventType = OtrChatMessageEvent::class;
  protected $otrChatMessageEventDataType = '';
  protected $otrModificationEventType = OtrModificationEvent::class;
  protected $otrModificationEventDataType = '';
  protected $renameEventType = RenameEvent::class;
  protected $renameEventDataType = '';

  /**
   * @param EventAnnotation[]
   */
  public function setAnnotation($annotation)
  {
    $this->annotation = $annotation;
  }
  /**
   * @return EventAnnotation[]
   */
  public function getAnnotation()
  {
    return $this->annotation;
  }
  /**
   * @param ChatConserverDynamitePlaceholderMetadata
   */
  public function setDynamitePlaceholderMetadata(ChatConserverDynamitePlaceholderMetadata $dynamitePlaceholderMetadata)
  {
    $this->dynamitePlaceholderMetadata = $dynamitePlaceholderMetadata;
  }
  /**
   * @return ChatConserverDynamitePlaceholderMetadata
   */
  public function getDynamitePlaceholderMetadata()
  {
    return $this->dynamitePlaceholderMetadata;
  }
  /**
   * @param string
   */
  public function setEventOtrStatus($eventOtrStatus)
  {
    $this->eventOtrStatus = $eventOtrStatus;
  }
  /**
   * @return string
   */
  public function getEventOtrStatus()
  {
    return $this->eventOtrStatus;
  }
  /**
   * @param GroupLinkSharingModificationEvent
   */
  public function setGroupLinkSharingModificationEvent(GroupLinkSharingModificationEvent $groupLinkSharingModificationEvent)
  {
    $this->groupLinkSharingModificationEvent = $groupLinkSharingModificationEvent;
  }
  /**
   * @return GroupLinkSharingModificationEvent
   */
  public function getGroupLinkSharingModificationEvent()
  {
    return $this->groupLinkSharingModificationEvent;
  }
  /**
   * @param HangoutEvent
   */
  public function setHangoutEvent(HangoutEvent $hangoutEvent)
  {
    $this->hangoutEvent = $hangoutEvent;
  }
  /**
   * @return HangoutEvent
   */
  public function getHangoutEvent()
  {
    return $this->hangoutEvent;
  }
  /**
   * @param InviteAcceptedEvent
   */
  public function setInviteAcceptedEvent(InviteAcceptedEvent $inviteAcceptedEvent)
  {
    $this->inviteAcceptedEvent = $inviteAcceptedEvent;
  }
  /**
   * @return InviteAcceptedEvent
   */
  public function getInviteAcceptedEvent()
  {
    return $this->inviteAcceptedEvent;
  }
  /**
   * @param MembershipChangeEvent
   */
  public function setMembershipChangeEvent(MembershipChangeEvent $membershipChangeEvent)
  {
    $this->membershipChangeEvent = $membershipChangeEvent;
  }
  /**
   * @return MembershipChangeEvent
   */
  public function getMembershipChangeEvent()
  {
    return $this->membershipChangeEvent;
  }
  /**
   * @param OtrChatMessageEvent
   */
  public function setOtrChatMessageEvent(OtrChatMessageEvent $otrChatMessageEvent)
  {
    $this->otrChatMessageEvent = $otrChatMessageEvent;
  }
  /**
   * @return OtrChatMessageEvent
   */
  public function getOtrChatMessageEvent()
  {
    return $this->otrChatMessageEvent;
  }
  /**
   * @param OtrModificationEvent
   */
  public function setOtrModificationEvent(OtrModificationEvent $otrModificationEvent)
  {
    $this->otrModificationEvent = $otrModificationEvent;
  }
  /**
   * @return OtrModificationEvent
   */
  public function getOtrModificationEvent()
  {
    return $this->otrModificationEvent;
  }
  /**
   * @param RenameEvent
   */
  public function setRenameEvent(RenameEvent $renameEvent)
  {
    $this->renameEvent = $renameEvent;
  }
  /**
   * @return RenameEvent
   */
  public function getRenameEvent()
  {
    return $this->renameEvent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChatContentExtension::class, 'Google_Service_CloudSearch_ChatContentExtension');
