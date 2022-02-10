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

namespace Google\Service\TagManager;

class Tag extends \Google\Collection
{
  protected $collection_key = 'teardownTag';
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string[]
   */
  public $blockingRuleId;
  /**
   * @var string[]
   */
  public $blockingTriggerId;
  protected $consentSettingsType = TagConsentSetting::class;
  protected $consentSettingsDataType = '';
  /**
   * @var string
   */
  public $containerId;
  /**
   * @var string
   */
  public $fingerprint;
  /**
   * @var string[]
   */
  public $firingRuleId;
  /**
   * @var string[]
   */
  public $firingTriggerId;
  /**
   * @var bool
   */
  public $liveOnly;
  protected $monitoringMetadataType = Parameter::class;
  protected $monitoringMetadataDataType = '';
  /**
   * @var string
   */
  public $monitoringMetadataTagNameKey;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $notes;
  protected $parameterType = Parameter::class;
  protected $parameterDataType = 'array';
  /**
   * @var string
   */
  public $parentFolderId;
  /**
   * @var string
   */
  public $path;
  /**
   * @var bool
   */
  public $paused;
  protected $priorityType = Parameter::class;
  protected $priorityDataType = '';
  /**
   * @var string
   */
  public $scheduleEndMs;
  /**
   * @var string
   */
  public $scheduleStartMs;
  protected $setupTagType = SetupTag::class;
  protected $setupTagDataType = 'array';
  /**
   * @var string
   */
  public $tagFiringOption;
  /**
   * @var string
   */
  public $tagId;
  /**
   * @var string
   */
  public $tagManagerUrl;
  protected $teardownTagType = TeardownTag::class;
  protected $teardownTagDataType = 'array';
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $workspaceId;

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param string[]
   */
  public function setBlockingRuleId($blockingRuleId)
  {
    $this->blockingRuleId = $blockingRuleId;
  }
  /**
   * @return string[]
   */
  public function getBlockingRuleId()
  {
    return $this->blockingRuleId;
  }
  /**
   * @param string[]
   */
  public function setBlockingTriggerId($blockingTriggerId)
  {
    $this->blockingTriggerId = $blockingTriggerId;
  }
  /**
   * @return string[]
   */
  public function getBlockingTriggerId()
  {
    return $this->blockingTriggerId;
  }
  /**
   * @param TagConsentSetting
   */
  public function setConsentSettings(TagConsentSetting $consentSettings)
  {
    $this->consentSettings = $consentSettings;
  }
  /**
   * @return TagConsentSetting
   */
  public function getConsentSettings()
  {
    return $this->consentSettings;
  }
  /**
   * @param string
   */
  public function setContainerId($containerId)
  {
    $this->containerId = $containerId;
  }
  /**
   * @return string
   */
  public function getContainerId()
  {
    return $this->containerId;
  }
  /**
   * @param string
   */
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return string
   */
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  /**
   * @param string[]
   */
  public function setFiringRuleId($firingRuleId)
  {
    $this->firingRuleId = $firingRuleId;
  }
  /**
   * @return string[]
   */
  public function getFiringRuleId()
  {
    return $this->firingRuleId;
  }
  /**
   * @param string[]
   */
  public function setFiringTriggerId($firingTriggerId)
  {
    $this->firingTriggerId = $firingTriggerId;
  }
  /**
   * @return string[]
   */
  public function getFiringTriggerId()
  {
    return $this->firingTriggerId;
  }
  /**
   * @param bool
   */
  public function setLiveOnly($liveOnly)
  {
    $this->liveOnly = $liveOnly;
  }
  /**
   * @return bool
   */
  public function getLiveOnly()
  {
    return $this->liveOnly;
  }
  /**
   * @param Parameter
   */
  public function setMonitoringMetadata(Parameter $monitoringMetadata)
  {
    $this->monitoringMetadata = $monitoringMetadata;
  }
  /**
   * @return Parameter
   */
  public function getMonitoringMetadata()
  {
    return $this->monitoringMetadata;
  }
  /**
   * @param string
   */
  public function setMonitoringMetadataTagNameKey($monitoringMetadataTagNameKey)
  {
    $this->monitoringMetadataTagNameKey = $monitoringMetadataTagNameKey;
  }
  /**
   * @return string
   */
  public function getMonitoringMetadataTagNameKey()
  {
    return $this->monitoringMetadataTagNameKey;
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
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  /**
   * @return string
   */
  public function getNotes()
  {
    return $this->notes;
  }
  /**
   * @param Parameter[]
   */
  public function setParameter($parameter)
  {
    $this->parameter = $parameter;
  }
  /**
   * @return Parameter[]
   */
  public function getParameter()
  {
    return $this->parameter;
  }
  /**
   * @param string
   */
  public function setParentFolderId($parentFolderId)
  {
    $this->parentFolderId = $parentFolderId;
  }
  /**
   * @return string
   */
  public function getParentFolderId()
  {
    return $this->parentFolderId;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param bool
   */
  public function setPaused($paused)
  {
    $this->paused = $paused;
  }
  /**
   * @return bool
   */
  public function getPaused()
  {
    return $this->paused;
  }
  /**
   * @param Parameter
   */
  public function setPriority(Parameter $priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return Parameter
   */
  public function getPriority()
  {
    return $this->priority;
  }
  /**
   * @param string
   */
  public function setScheduleEndMs($scheduleEndMs)
  {
    $this->scheduleEndMs = $scheduleEndMs;
  }
  /**
   * @return string
   */
  public function getScheduleEndMs()
  {
    return $this->scheduleEndMs;
  }
  /**
   * @param string
   */
  public function setScheduleStartMs($scheduleStartMs)
  {
    $this->scheduleStartMs = $scheduleStartMs;
  }
  /**
   * @return string
   */
  public function getScheduleStartMs()
  {
    return $this->scheduleStartMs;
  }
  /**
   * @param SetupTag[]
   */
  public function setSetupTag($setupTag)
  {
    $this->setupTag = $setupTag;
  }
  /**
   * @return SetupTag[]
   */
  public function getSetupTag()
  {
    return $this->setupTag;
  }
  /**
   * @param string
   */
  public function setTagFiringOption($tagFiringOption)
  {
    $this->tagFiringOption = $tagFiringOption;
  }
  /**
   * @return string
   */
  public function getTagFiringOption()
  {
    return $this->tagFiringOption;
  }
  /**
   * @param string
   */
  public function setTagId($tagId)
  {
    $this->tagId = $tagId;
  }
  /**
   * @return string
   */
  public function getTagId()
  {
    return $this->tagId;
  }
  /**
   * @param string
   */
  public function setTagManagerUrl($tagManagerUrl)
  {
    $this->tagManagerUrl = $tagManagerUrl;
  }
  /**
   * @return string
   */
  public function getTagManagerUrl()
  {
    return $this->tagManagerUrl;
  }
  /**
   * @param TeardownTag[]
   */
  public function setTeardownTag($teardownTag)
  {
    $this->teardownTag = $teardownTag;
  }
  /**
   * @return TeardownTag[]
   */
  public function getTeardownTag()
  {
    return $this->teardownTag;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setWorkspaceId($workspaceId)
  {
    $this->workspaceId = $workspaceId;
  }
  /**
   * @return string
   */
  public function getWorkspaceId()
  {
    return $this->workspaceId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Tag::class, 'Google_Service_TagManager_Tag');
