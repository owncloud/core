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

namespace Google\Service\Books;

class Notification extends \Google\Collection
{
  protected $collection_key = 'crmExperimentIds';
  protected $internal_gapi_mappings = [
        "docId" => "doc_id",
        "docType" => "doc_type",
        "dontShowNotification" => "dont_show_notification",
        "isDocumentMature" => "is_document_mature",
        "notificationType" => "notification_type",
        "pcampaignId" => "pcampaign_id",
        "showNotificationSettingsAction" => "show_notification_settings_action",
  ];
  /**
   * @var string
   */
  public $body;
  /**
   * @var string[]
   */
  public $crmExperimentIds;
  /**
   * @var string
   */
  public $docId;
  /**
   * @var string
   */
  public $docType;
  /**
   * @var bool
   */
  public $dontShowNotification;
  /**
   * @var string
   */
  public $iconUrl;
  /**
   * @var bool
   */
  public $isDocumentMature;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $notificationGroup;
  /**
   * @var string
   */
  public $notificationType;
  /**
   * @var string
   */
  public $pcampaignId;
  /**
   * @var string
   */
  public $reason;
  /**
   * @var bool
   */
  public $showNotificationSettingsAction;
  /**
   * @var string
   */
  public $targetUrl;
  /**
   * @var string
   */
  public $timeToExpireMs;
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setBody($body)
  {
    $this->body = $body;
  }
  /**
   * @return string
   */
  public function getBody()
  {
    return $this->body;
  }
  /**
   * @param string[]
   */
  public function setCrmExperimentIds($crmExperimentIds)
  {
    $this->crmExperimentIds = $crmExperimentIds;
  }
  /**
   * @return string[]
   */
  public function getCrmExperimentIds()
  {
    return $this->crmExperimentIds;
  }
  /**
   * @param string
   */
  public function setDocId($docId)
  {
    $this->docId = $docId;
  }
  /**
   * @return string
   */
  public function getDocId()
  {
    return $this->docId;
  }
  /**
   * @param string
   */
  public function setDocType($docType)
  {
    $this->docType = $docType;
  }
  /**
   * @return string
   */
  public function getDocType()
  {
    return $this->docType;
  }
  /**
   * @param bool
   */
  public function setDontShowNotification($dontShowNotification)
  {
    $this->dontShowNotification = $dontShowNotification;
  }
  /**
   * @return bool
   */
  public function getDontShowNotification()
  {
    return $this->dontShowNotification;
  }
  /**
   * @param string
   */
  public function setIconUrl($iconUrl)
  {
    $this->iconUrl = $iconUrl;
  }
  /**
   * @return string
   */
  public function getIconUrl()
  {
    return $this->iconUrl;
  }
  /**
   * @param bool
   */
  public function setIsDocumentMature($isDocumentMature)
  {
    $this->isDocumentMature = $isDocumentMature;
  }
  /**
   * @return bool
   */
  public function getIsDocumentMature()
  {
    return $this->isDocumentMature;
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
  public function setNotificationGroup($notificationGroup)
  {
    $this->notificationGroup = $notificationGroup;
  }
  /**
   * @return string
   */
  public function getNotificationGroup()
  {
    return $this->notificationGroup;
  }
  /**
   * @param string
   */
  public function setNotificationType($notificationType)
  {
    $this->notificationType = $notificationType;
  }
  /**
   * @return string
   */
  public function getNotificationType()
  {
    return $this->notificationType;
  }
  /**
   * @param string
   */
  public function setPcampaignId($pcampaignId)
  {
    $this->pcampaignId = $pcampaignId;
  }
  /**
   * @return string
   */
  public function getPcampaignId()
  {
    return $this->pcampaignId;
  }
  /**
   * @param string
   */
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  /**
   * @return string
   */
  public function getReason()
  {
    return $this->reason;
  }
  /**
   * @param bool
   */
  public function setShowNotificationSettingsAction($showNotificationSettingsAction)
  {
    $this->showNotificationSettingsAction = $showNotificationSettingsAction;
  }
  /**
   * @return bool
   */
  public function getShowNotificationSettingsAction()
  {
    return $this->showNotificationSettingsAction;
  }
  /**
   * @param string
   */
  public function setTargetUrl($targetUrl)
  {
    $this->targetUrl = $targetUrl;
  }
  /**
   * @return string
   */
  public function getTargetUrl()
  {
    return $this->targetUrl;
  }
  /**
   * @param string
   */
  public function setTimeToExpireMs($timeToExpireMs)
  {
    $this->timeToExpireMs = $timeToExpireMs;
  }
  /**
   * @return string
   */
  public function getTimeToExpireMs()
  {
    return $this->timeToExpireMs;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Notification::class, 'Google_Service_Books_Notification');
