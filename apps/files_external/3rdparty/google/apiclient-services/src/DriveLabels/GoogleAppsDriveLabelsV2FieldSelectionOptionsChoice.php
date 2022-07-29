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

namespace Google\Service\DriveLabels;

class GoogleAppsDriveLabelsV2FieldSelectionOptionsChoice extends \Google\Model
{
  protected $appliedCapabilitiesType = GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceAppliedCapabilities::class;
  protected $appliedCapabilitiesDataType = '';
  /**
   * @var string
   */
  public $createTime;
  protected $creatorType = GoogleAppsDriveLabelsV2UserInfo::class;
  protected $creatorDataType = '';
  /**
   * @var string
   */
  public $disableTime;
  protected $disablerType = GoogleAppsDriveLabelsV2UserInfo::class;
  protected $disablerDataType = '';
  protected $displayHintsType = GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceDisplayHints::class;
  protected $displayHintsDataType = '';
  /**
   * @var string
   */
  public $id;
  protected $lifecycleType = GoogleAppsDriveLabelsV2Lifecycle::class;
  protected $lifecycleDataType = '';
  protected $lockStatusType = GoogleAppsDriveLabelsV2LockStatus::class;
  protected $lockStatusDataType = '';
  protected $propertiesType = GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceProperties::class;
  protected $propertiesDataType = '';
  /**
   * @var string
   */
  public $publishTime;
  protected $publisherType = GoogleAppsDriveLabelsV2UserInfo::class;
  protected $publisherDataType = '';
  protected $schemaCapabilitiesType = GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceSchemaCapabilities::class;
  protected $schemaCapabilitiesDataType = '';
  /**
   * @var string
   */
  public $updateTime;
  protected $updaterType = GoogleAppsDriveLabelsV2UserInfo::class;
  protected $updaterDataType = '';

  /**
   * @param GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceAppliedCapabilities
   */
  public function setAppliedCapabilities(GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceAppliedCapabilities $appliedCapabilities)
  {
    $this->appliedCapabilities = $appliedCapabilities;
  }
  /**
   * @return GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceAppliedCapabilities
   */
  public function getAppliedCapabilities()
  {
    return $this->appliedCapabilities;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param GoogleAppsDriveLabelsV2UserInfo
   */
  public function setCreator(GoogleAppsDriveLabelsV2UserInfo $creator)
  {
    $this->creator = $creator;
  }
  /**
   * @return GoogleAppsDriveLabelsV2UserInfo
   */
  public function getCreator()
  {
    return $this->creator;
  }
  /**
   * @param string
   */
  public function setDisableTime($disableTime)
  {
    $this->disableTime = $disableTime;
  }
  /**
   * @return string
   */
  public function getDisableTime()
  {
    return $this->disableTime;
  }
  /**
   * @param GoogleAppsDriveLabelsV2UserInfo
   */
  public function setDisabler(GoogleAppsDriveLabelsV2UserInfo $disabler)
  {
    $this->disabler = $disabler;
  }
  /**
   * @return GoogleAppsDriveLabelsV2UserInfo
   */
  public function getDisabler()
  {
    return $this->disabler;
  }
  /**
   * @param GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceDisplayHints
   */
  public function setDisplayHints(GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceDisplayHints $displayHints)
  {
    $this->displayHints = $displayHints;
  }
  /**
   * @return GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceDisplayHints
   */
  public function getDisplayHints()
  {
    return $this->displayHints;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param GoogleAppsDriveLabelsV2Lifecycle
   */
  public function setLifecycle(GoogleAppsDriveLabelsV2Lifecycle $lifecycle)
  {
    $this->lifecycle = $lifecycle;
  }
  /**
   * @return GoogleAppsDriveLabelsV2Lifecycle
   */
  public function getLifecycle()
  {
    return $this->lifecycle;
  }
  /**
   * @param GoogleAppsDriveLabelsV2LockStatus
   */
  public function setLockStatus(GoogleAppsDriveLabelsV2LockStatus $lockStatus)
  {
    $this->lockStatus = $lockStatus;
  }
  /**
   * @return GoogleAppsDriveLabelsV2LockStatus
   */
  public function getLockStatus()
  {
    return $this->lockStatus;
  }
  /**
   * @param GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceProperties
   */
  public function setProperties(GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceProperties $properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceProperties
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param string
   */
  public function setPublishTime($publishTime)
  {
    $this->publishTime = $publishTime;
  }
  /**
   * @return string
   */
  public function getPublishTime()
  {
    return $this->publishTime;
  }
  /**
   * @param GoogleAppsDriveLabelsV2UserInfo
   */
  public function setPublisher(GoogleAppsDriveLabelsV2UserInfo $publisher)
  {
    $this->publisher = $publisher;
  }
  /**
   * @return GoogleAppsDriveLabelsV2UserInfo
   */
  public function getPublisher()
  {
    return $this->publisher;
  }
  /**
   * @param GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceSchemaCapabilities
   */
  public function setSchemaCapabilities(GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceSchemaCapabilities $schemaCapabilities)
  {
    $this->schemaCapabilities = $schemaCapabilities;
  }
  /**
   * @return GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceSchemaCapabilities
   */
  public function getSchemaCapabilities()
  {
    return $this->schemaCapabilities;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param GoogleAppsDriveLabelsV2UserInfo
   */
  public function setUpdater(GoogleAppsDriveLabelsV2UserInfo $updater)
  {
    $this->updater = $updater;
  }
  /**
   * @return GoogleAppsDriveLabelsV2UserInfo
   */
  public function getUpdater()
  {
    return $this->updater;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsDriveLabelsV2FieldSelectionOptionsChoice::class, 'Google_Service_DriveLabels_GoogleAppsDriveLabelsV2FieldSelectionOptionsChoice');
