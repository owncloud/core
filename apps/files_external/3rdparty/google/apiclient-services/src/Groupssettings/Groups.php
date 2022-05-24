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

namespace Google\Service\Groupssettings;

class Groups extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "defaultSender" => "default_sender",
  ];
  /**
   * @var string
   */
  public $allowExternalMembers;
  /**
   * @var string
   */
  public $allowGoogleCommunication;
  /**
   * @var string
   */
  public $allowWebPosting;
  /**
   * @var string
   */
  public $archiveOnly;
  /**
   * @var string
   */
  public $customFooterText;
  /**
   * @var string
   */
  public $customReplyTo;
  /**
   * @var string
   */
  public $customRolesEnabledForSettingsToBeMerged;
  /**
   * @var string
   */
  public $defaultMessageDenyNotificationText;
  /**
   * @var string
   */
  public $defaultSender;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $enableCollaborativeInbox;
  /**
   * @var string
   */
  public $favoriteRepliesOnTop;
  /**
   * @var string
   */
  public $includeCustomFooter;
  /**
   * @var string
   */
  public $includeInGlobalAddressList;
  /**
   * @var string
   */
  public $isArchived;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var int
   */
  public $maxMessageBytes;
  /**
   * @var string
   */
  public $membersCanPostAsTheGroup;
  /**
   * @var string
   */
  public $messageDisplayFont;
  /**
   * @var string
   */
  public $messageModerationLevel;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $primaryLanguage;
  /**
   * @var string
   */
  public $replyTo;
  /**
   * @var string
   */
  public $sendMessageDenyNotification;
  /**
   * @var string
   */
  public $showInGroupDirectory;
  /**
   * @var string
   */
  public $spamModerationLevel;
  /**
   * @var string
   */
  public $whoCanAdd;
  /**
   * @var string
   */
  public $whoCanAddReferences;
  /**
   * @var string
   */
  public $whoCanApproveMembers;
  /**
   * @var string
   */
  public $whoCanApproveMessages;
  /**
   * @var string
   */
  public $whoCanAssignTopics;
  /**
   * @var string
   */
  public $whoCanAssistContent;
  /**
   * @var string
   */
  public $whoCanBanUsers;
  /**
   * @var string
   */
  public $whoCanContactOwner;
  /**
   * @var string
   */
  public $whoCanDeleteAnyPost;
  /**
   * @var string
   */
  public $whoCanDeleteTopics;
  /**
   * @var string
   */
  public $whoCanDiscoverGroup;
  /**
   * @var string
   */
  public $whoCanEnterFreeFormTags;
  /**
   * @var string
   */
  public $whoCanHideAbuse;
  /**
   * @var string
   */
  public $whoCanInvite;
  /**
   * @var string
   */
  public $whoCanJoin;
  /**
   * @var string
   */
  public $whoCanLeaveGroup;
  /**
   * @var string
   */
  public $whoCanLockTopics;
  /**
   * @var string
   */
  public $whoCanMakeTopicsSticky;
  /**
   * @var string
   */
  public $whoCanMarkDuplicate;
  /**
   * @var string
   */
  public $whoCanMarkFavoriteReplyOnAnyTopic;
  /**
   * @var string
   */
  public $whoCanMarkFavoriteReplyOnOwnTopic;
  /**
   * @var string
   */
  public $whoCanMarkNoResponseNeeded;
  /**
   * @var string
   */
  public $whoCanModerateContent;
  /**
   * @var string
   */
  public $whoCanModerateMembers;
  /**
   * @var string
   */
  public $whoCanModifyMembers;
  /**
   * @var string
   */
  public $whoCanModifyTagsAndCategories;
  /**
   * @var string
   */
  public $whoCanMoveTopicsIn;
  /**
   * @var string
   */
  public $whoCanMoveTopicsOut;
  /**
   * @var string
   */
  public $whoCanPostAnnouncements;
  /**
   * @var string
   */
  public $whoCanPostMessage;
  /**
   * @var string
   */
  public $whoCanTakeTopics;
  /**
   * @var string
   */
  public $whoCanUnassignTopic;
  /**
   * @var string
   */
  public $whoCanUnmarkFavoriteReplyOnAnyTopic;
  /**
   * @var string
   */
  public $whoCanViewGroup;
  /**
   * @var string
   */
  public $whoCanViewMembership;

  /**
   * @param string
   */
  public function setAllowExternalMembers($allowExternalMembers)
  {
    $this->allowExternalMembers = $allowExternalMembers;
  }
  /**
   * @return string
   */
  public function getAllowExternalMembers()
  {
    return $this->allowExternalMembers;
  }
  /**
   * @param string
   */
  public function setAllowGoogleCommunication($allowGoogleCommunication)
  {
    $this->allowGoogleCommunication = $allowGoogleCommunication;
  }
  /**
   * @return string
   */
  public function getAllowGoogleCommunication()
  {
    return $this->allowGoogleCommunication;
  }
  /**
   * @param string
   */
  public function setAllowWebPosting($allowWebPosting)
  {
    $this->allowWebPosting = $allowWebPosting;
  }
  /**
   * @return string
   */
  public function getAllowWebPosting()
  {
    return $this->allowWebPosting;
  }
  /**
   * @param string
   */
  public function setArchiveOnly($archiveOnly)
  {
    $this->archiveOnly = $archiveOnly;
  }
  /**
   * @return string
   */
  public function getArchiveOnly()
  {
    return $this->archiveOnly;
  }
  /**
   * @param string
   */
  public function setCustomFooterText($customFooterText)
  {
    $this->customFooterText = $customFooterText;
  }
  /**
   * @return string
   */
  public function getCustomFooterText()
  {
    return $this->customFooterText;
  }
  /**
   * @param string
   */
  public function setCustomReplyTo($customReplyTo)
  {
    $this->customReplyTo = $customReplyTo;
  }
  /**
   * @return string
   */
  public function getCustomReplyTo()
  {
    return $this->customReplyTo;
  }
  /**
   * @param string
   */
  public function setCustomRolesEnabledForSettingsToBeMerged($customRolesEnabledForSettingsToBeMerged)
  {
    $this->customRolesEnabledForSettingsToBeMerged = $customRolesEnabledForSettingsToBeMerged;
  }
  /**
   * @return string
   */
  public function getCustomRolesEnabledForSettingsToBeMerged()
  {
    return $this->customRolesEnabledForSettingsToBeMerged;
  }
  /**
   * @param string
   */
  public function setDefaultMessageDenyNotificationText($defaultMessageDenyNotificationText)
  {
    $this->defaultMessageDenyNotificationText = $defaultMessageDenyNotificationText;
  }
  /**
   * @return string
   */
  public function getDefaultMessageDenyNotificationText()
  {
    return $this->defaultMessageDenyNotificationText;
  }
  /**
   * @param string
   */
  public function setDefaultSender($defaultSender)
  {
    $this->defaultSender = $defaultSender;
  }
  /**
   * @return string
   */
  public function getDefaultSender()
  {
    return $this->defaultSender;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }
  /**
   * @param string
   */
  public function setEnableCollaborativeInbox($enableCollaborativeInbox)
  {
    $this->enableCollaborativeInbox = $enableCollaborativeInbox;
  }
  /**
   * @return string
   */
  public function getEnableCollaborativeInbox()
  {
    return $this->enableCollaborativeInbox;
  }
  /**
   * @param string
   */
  public function setFavoriteRepliesOnTop($favoriteRepliesOnTop)
  {
    $this->favoriteRepliesOnTop = $favoriteRepliesOnTop;
  }
  /**
   * @return string
   */
  public function getFavoriteRepliesOnTop()
  {
    return $this->favoriteRepliesOnTop;
  }
  /**
   * @param string
   */
  public function setIncludeCustomFooter($includeCustomFooter)
  {
    $this->includeCustomFooter = $includeCustomFooter;
  }
  /**
   * @return string
   */
  public function getIncludeCustomFooter()
  {
    return $this->includeCustomFooter;
  }
  /**
   * @param string
   */
  public function setIncludeInGlobalAddressList($includeInGlobalAddressList)
  {
    $this->includeInGlobalAddressList = $includeInGlobalAddressList;
  }
  /**
   * @return string
   */
  public function getIncludeInGlobalAddressList()
  {
    return $this->includeInGlobalAddressList;
  }
  /**
   * @param string
   */
  public function setIsArchived($isArchived)
  {
    $this->isArchived = $isArchived;
  }
  /**
   * @return string
   */
  public function getIsArchived()
  {
    return $this->isArchived;
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
   * @param int
   */
  public function setMaxMessageBytes($maxMessageBytes)
  {
    $this->maxMessageBytes = $maxMessageBytes;
  }
  /**
   * @return int
   */
  public function getMaxMessageBytes()
  {
    return $this->maxMessageBytes;
  }
  /**
   * @param string
   */
  public function setMembersCanPostAsTheGroup($membersCanPostAsTheGroup)
  {
    $this->membersCanPostAsTheGroup = $membersCanPostAsTheGroup;
  }
  /**
   * @return string
   */
  public function getMembersCanPostAsTheGroup()
  {
    return $this->membersCanPostAsTheGroup;
  }
  /**
   * @param string
   */
  public function setMessageDisplayFont($messageDisplayFont)
  {
    $this->messageDisplayFont = $messageDisplayFont;
  }
  /**
   * @return string
   */
  public function getMessageDisplayFont()
  {
    return $this->messageDisplayFont;
  }
  /**
   * @param string
   */
  public function setMessageModerationLevel($messageModerationLevel)
  {
    $this->messageModerationLevel = $messageModerationLevel;
  }
  /**
   * @return string
   */
  public function getMessageModerationLevel()
  {
    return $this->messageModerationLevel;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPrimaryLanguage($primaryLanguage)
  {
    $this->primaryLanguage = $primaryLanguage;
  }
  /**
   * @return string
   */
  public function getPrimaryLanguage()
  {
    return $this->primaryLanguage;
  }
  /**
   * @param string
   */
  public function setReplyTo($replyTo)
  {
    $this->replyTo = $replyTo;
  }
  /**
   * @return string
   */
  public function getReplyTo()
  {
    return $this->replyTo;
  }
  /**
   * @param string
   */
  public function setSendMessageDenyNotification($sendMessageDenyNotification)
  {
    $this->sendMessageDenyNotification = $sendMessageDenyNotification;
  }
  /**
   * @return string
   */
  public function getSendMessageDenyNotification()
  {
    return $this->sendMessageDenyNotification;
  }
  /**
   * @param string
   */
  public function setShowInGroupDirectory($showInGroupDirectory)
  {
    $this->showInGroupDirectory = $showInGroupDirectory;
  }
  /**
   * @return string
   */
  public function getShowInGroupDirectory()
  {
    return $this->showInGroupDirectory;
  }
  /**
   * @param string
   */
  public function setSpamModerationLevel($spamModerationLevel)
  {
    $this->spamModerationLevel = $spamModerationLevel;
  }
  /**
   * @return string
   */
  public function getSpamModerationLevel()
  {
    return $this->spamModerationLevel;
  }
  /**
   * @param string
   */
  public function setWhoCanAdd($whoCanAdd)
  {
    $this->whoCanAdd = $whoCanAdd;
  }
  /**
   * @return string
   */
  public function getWhoCanAdd()
  {
    return $this->whoCanAdd;
  }
  /**
   * @param string
   */
  public function setWhoCanAddReferences($whoCanAddReferences)
  {
    $this->whoCanAddReferences = $whoCanAddReferences;
  }
  /**
   * @return string
   */
  public function getWhoCanAddReferences()
  {
    return $this->whoCanAddReferences;
  }
  /**
   * @param string
   */
  public function setWhoCanApproveMembers($whoCanApproveMembers)
  {
    $this->whoCanApproveMembers = $whoCanApproveMembers;
  }
  /**
   * @return string
   */
  public function getWhoCanApproveMembers()
  {
    return $this->whoCanApproveMembers;
  }
  /**
   * @param string
   */
  public function setWhoCanApproveMessages($whoCanApproveMessages)
  {
    $this->whoCanApproveMessages = $whoCanApproveMessages;
  }
  /**
   * @return string
   */
  public function getWhoCanApproveMessages()
  {
    return $this->whoCanApproveMessages;
  }
  /**
   * @param string
   */
  public function setWhoCanAssignTopics($whoCanAssignTopics)
  {
    $this->whoCanAssignTopics = $whoCanAssignTopics;
  }
  /**
   * @return string
   */
  public function getWhoCanAssignTopics()
  {
    return $this->whoCanAssignTopics;
  }
  /**
   * @param string
   */
  public function setWhoCanAssistContent($whoCanAssistContent)
  {
    $this->whoCanAssistContent = $whoCanAssistContent;
  }
  /**
   * @return string
   */
  public function getWhoCanAssistContent()
  {
    return $this->whoCanAssistContent;
  }
  /**
   * @param string
   */
  public function setWhoCanBanUsers($whoCanBanUsers)
  {
    $this->whoCanBanUsers = $whoCanBanUsers;
  }
  /**
   * @return string
   */
  public function getWhoCanBanUsers()
  {
    return $this->whoCanBanUsers;
  }
  /**
   * @param string
   */
  public function setWhoCanContactOwner($whoCanContactOwner)
  {
    $this->whoCanContactOwner = $whoCanContactOwner;
  }
  /**
   * @return string
   */
  public function getWhoCanContactOwner()
  {
    return $this->whoCanContactOwner;
  }
  /**
   * @param string
   */
  public function setWhoCanDeleteAnyPost($whoCanDeleteAnyPost)
  {
    $this->whoCanDeleteAnyPost = $whoCanDeleteAnyPost;
  }
  /**
   * @return string
   */
  public function getWhoCanDeleteAnyPost()
  {
    return $this->whoCanDeleteAnyPost;
  }
  /**
   * @param string
   */
  public function setWhoCanDeleteTopics($whoCanDeleteTopics)
  {
    $this->whoCanDeleteTopics = $whoCanDeleteTopics;
  }
  /**
   * @return string
   */
  public function getWhoCanDeleteTopics()
  {
    return $this->whoCanDeleteTopics;
  }
  /**
   * @param string
   */
  public function setWhoCanDiscoverGroup($whoCanDiscoverGroup)
  {
    $this->whoCanDiscoverGroup = $whoCanDiscoverGroup;
  }
  /**
   * @return string
   */
  public function getWhoCanDiscoverGroup()
  {
    return $this->whoCanDiscoverGroup;
  }
  /**
   * @param string
   */
  public function setWhoCanEnterFreeFormTags($whoCanEnterFreeFormTags)
  {
    $this->whoCanEnterFreeFormTags = $whoCanEnterFreeFormTags;
  }
  /**
   * @return string
   */
  public function getWhoCanEnterFreeFormTags()
  {
    return $this->whoCanEnterFreeFormTags;
  }
  /**
   * @param string
   */
  public function setWhoCanHideAbuse($whoCanHideAbuse)
  {
    $this->whoCanHideAbuse = $whoCanHideAbuse;
  }
  /**
   * @return string
   */
  public function getWhoCanHideAbuse()
  {
    return $this->whoCanHideAbuse;
  }
  /**
   * @param string
   */
  public function setWhoCanInvite($whoCanInvite)
  {
    $this->whoCanInvite = $whoCanInvite;
  }
  /**
   * @return string
   */
  public function getWhoCanInvite()
  {
    return $this->whoCanInvite;
  }
  /**
   * @param string
   */
  public function setWhoCanJoin($whoCanJoin)
  {
    $this->whoCanJoin = $whoCanJoin;
  }
  /**
   * @return string
   */
  public function getWhoCanJoin()
  {
    return $this->whoCanJoin;
  }
  /**
   * @param string
   */
  public function setWhoCanLeaveGroup($whoCanLeaveGroup)
  {
    $this->whoCanLeaveGroup = $whoCanLeaveGroup;
  }
  /**
   * @return string
   */
  public function getWhoCanLeaveGroup()
  {
    return $this->whoCanLeaveGroup;
  }
  /**
   * @param string
   */
  public function setWhoCanLockTopics($whoCanLockTopics)
  {
    $this->whoCanLockTopics = $whoCanLockTopics;
  }
  /**
   * @return string
   */
  public function getWhoCanLockTopics()
  {
    return $this->whoCanLockTopics;
  }
  /**
   * @param string
   */
  public function setWhoCanMakeTopicsSticky($whoCanMakeTopicsSticky)
  {
    $this->whoCanMakeTopicsSticky = $whoCanMakeTopicsSticky;
  }
  /**
   * @return string
   */
  public function getWhoCanMakeTopicsSticky()
  {
    return $this->whoCanMakeTopicsSticky;
  }
  /**
   * @param string
   */
  public function setWhoCanMarkDuplicate($whoCanMarkDuplicate)
  {
    $this->whoCanMarkDuplicate = $whoCanMarkDuplicate;
  }
  /**
   * @return string
   */
  public function getWhoCanMarkDuplicate()
  {
    return $this->whoCanMarkDuplicate;
  }
  /**
   * @param string
   */
  public function setWhoCanMarkFavoriteReplyOnAnyTopic($whoCanMarkFavoriteReplyOnAnyTopic)
  {
    $this->whoCanMarkFavoriteReplyOnAnyTopic = $whoCanMarkFavoriteReplyOnAnyTopic;
  }
  /**
   * @return string
   */
  public function getWhoCanMarkFavoriteReplyOnAnyTopic()
  {
    return $this->whoCanMarkFavoriteReplyOnAnyTopic;
  }
  /**
   * @param string
   */
  public function setWhoCanMarkFavoriteReplyOnOwnTopic($whoCanMarkFavoriteReplyOnOwnTopic)
  {
    $this->whoCanMarkFavoriteReplyOnOwnTopic = $whoCanMarkFavoriteReplyOnOwnTopic;
  }
  /**
   * @return string
   */
  public function getWhoCanMarkFavoriteReplyOnOwnTopic()
  {
    return $this->whoCanMarkFavoriteReplyOnOwnTopic;
  }
  /**
   * @param string
   */
  public function setWhoCanMarkNoResponseNeeded($whoCanMarkNoResponseNeeded)
  {
    $this->whoCanMarkNoResponseNeeded = $whoCanMarkNoResponseNeeded;
  }
  /**
   * @return string
   */
  public function getWhoCanMarkNoResponseNeeded()
  {
    return $this->whoCanMarkNoResponseNeeded;
  }
  /**
   * @param string
   */
  public function setWhoCanModerateContent($whoCanModerateContent)
  {
    $this->whoCanModerateContent = $whoCanModerateContent;
  }
  /**
   * @return string
   */
  public function getWhoCanModerateContent()
  {
    return $this->whoCanModerateContent;
  }
  /**
   * @param string
   */
  public function setWhoCanModerateMembers($whoCanModerateMembers)
  {
    $this->whoCanModerateMembers = $whoCanModerateMembers;
  }
  /**
   * @return string
   */
  public function getWhoCanModerateMembers()
  {
    return $this->whoCanModerateMembers;
  }
  /**
   * @param string
   */
  public function setWhoCanModifyMembers($whoCanModifyMembers)
  {
    $this->whoCanModifyMembers = $whoCanModifyMembers;
  }
  /**
   * @return string
   */
  public function getWhoCanModifyMembers()
  {
    return $this->whoCanModifyMembers;
  }
  /**
   * @param string
   */
  public function setWhoCanModifyTagsAndCategories($whoCanModifyTagsAndCategories)
  {
    $this->whoCanModifyTagsAndCategories = $whoCanModifyTagsAndCategories;
  }
  /**
   * @return string
   */
  public function getWhoCanModifyTagsAndCategories()
  {
    return $this->whoCanModifyTagsAndCategories;
  }
  /**
   * @param string
   */
  public function setWhoCanMoveTopicsIn($whoCanMoveTopicsIn)
  {
    $this->whoCanMoveTopicsIn = $whoCanMoveTopicsIn;
  }
  /**
   * @return string
   */
  public function getWhoCanMoveTopicsIn()
  {
    return $this->whoCanMoveTopicsIn;
  }
  /**
   * @param string
   */
  public function setWhoCanMoveTopicsOut($whoCanMoveTopicsOut)
  {
    $this->whoCanMoveTopicsOut = $whoCanMoveTopicsOut;
  }
  /**
   * @return string
   */
  public function getWhoCanMoveTopicsOut()
  {
    return $this->whoCanMoveTopicsOut;
  }
  /**
   * @param string
   */
  public function setWhoCanPostAnnouncements($whoCanPostAnnouncements)
  {
    $this->whoCanPostAnnouncements = $whoCanPostAnnouncements;
  }
  /**
   * @return string
   */
  public function getWhoCanPostAnnouncements()
  {
    return $this->whoCanPostAnnouncements;
  }
  /**
   * @param string
   */
  public function setWhoCanPostMessage($whoCanPostMessage)
  {
    $this->whoCanPostMessage = $whoCanPostMessage;
  }
  /**
   * @return string
   */
  public function getWhoCanPostMessage()
  {
    return $this->whoCanPostMessage;
  }
  /**
   * @param string
   */
  public function setWhoCanTakeTopics($whoCanTakeTopics)
  {
    $this->whoCanTakeTopics = $whoCanTakeTopics;
  }
  /**
   * @return string
   */
  public function getWhoCanTakeTopics()
  {
    return $this->whoCanTakeTopics;
  }
  /**
   * @param string
   */
  public function setWhoCanUnassignTopic($whoCanUnassignTopic)
  {
    $this->whoCanUnassignTopic = $whoCanUnassignTopic;
  }
  /**
   * @return string
   */
  public function getWhoCanUnassignTopic()
  {
    return $this->whoCanUnassignTopic;
  }
  /**
   * @param string
   */
  public function setWhoCanUnmarkFavoriteReplyOnAnyTopic($whoCanUnmarkFavoriteReplyOnAnyTopic)
  {
    $this->whoCanUnmarkFavoriteReplyOnAnyTopic = $whoCanUnmarkFavoriteReplyOnAnyTopic;
  }
  /**
   * @return string
   */
  public function getWhoCanUnmarkFavoriteReplyOnAnyTopic()
  {
    return $this->whoCanUnmarkFavoriteReplyOnAnyTopic;
  }
  /**
   * @param string
   */
  public function setWhoCanViewGroup($whoCanViewGroup)
  {
    $this->whoCanViewGroup = $whoCanViewGroup;
  }
  /**
   * @return string
   */
  public function getWhoCanViewGroup()
  {
    return $this->whoCanViewGroup;
  }
  /**
   * @param string
   */
  public function setWhoCanViewMembership($whoCanViewMembership)
  {
    $this->whoCanViewMembership = $whoCanViewMembership;
  }
  /**
   * @return string
   */
  public function getWhoCanViewMembership()
  {
    return $this->whoCanViewMembership;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Groups::class, 'Google_Service_Groupssettings_Groups');
