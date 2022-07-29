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

class GoogleAppsDriveLabelsV2Field extends \Google\Model
{
  protected $appliedCapabilitiesType = GoogleAppsDriveLabelsV2FieldAppliedCapabilities::class;
  protected $appliedCapabilitiesDataType = '';
  /**
   * @var string
   */
  public $createTime;
  protected $creatorType = GoogleAppsDriveLabelsV2UserInfo::class;
  protected $creatorDataType = '';
  protected $dateOptionsType = GoogleAppsDriveLabelsV2FieldDateOptions::class;
  protected $dateOptionsDataType = '';
  /**
   * @var string
   */
  public $disableTime;
  protected $disablerType = GoogleAppsDriveLabelsV2UserInfo::class;
  protected $disablerDataType = '';
  protected $displayHintsType = GoogleAppsDriveLabelsV2FieldDisplayHints::class;
  protected $displayHintsDataType = '';
  /**
   * @var string
   */
  public $id;
  protected $integerOptionsType = GoogleAppsDriveLabelsV2FieldIntegerOptions::class;
  protected $integerOptionsDataType = '';
  protected $lifecycleType = GoogleAppsDriveLabelsV2Lifecycle::class;
  protected $lifecycleDataType = '';
  protected $lockStatusType = GoogleAppsDriveLabelsV2LockStatus::class;
  protected $lockStatusDataType = '';
  protected $propertiesType = GoogleAppsDriveLabelsV2FieldProperties::class;
  protected $propertiesDataType = '';
  protected $publisherType = GoogleAppsDriveLabelsV2UserInfo::class;
  protected $publisherDataType = '';
  /**
   * @var string
   */
  public $queryKey;
  protected $schemaCapabilitiesType = GoogleAppsDriveLabelsV2FieldSchemaCapabilities::class;
  protected $schemaCapabilitiesDataType = '';
  protected $selectionOptionsType = GoogleAppsDriveLabelsV2FieldSelectionOptions::class;
  protected $selectionOptionsDataType = '';
  protected $textOptionsType = GoogleAppsDriveLabelsV2FieldTextOptions::class;
  protected $textOptionsDataType = '';
  /**
   * @var string
   */
  public $updateTime;
  protected $updaterType = GoogleAppsDriveLabelsV2UserInfo::class;
  protected $updaterDataType = '';
  protected $userOptionsType = GoogleAppsDriveLabelsV2FieldUserOptions::class;
  protected $userOptionsDataType = '';

  /**
   * @param GoogleAppsDriveLabelsV2FieldAppliedCapabilities
   */
  public function setAppliedCapabilities(GoogleAppsDriveLabelsV2FieldAppliedCapabilities $appliedCapabilities)
  {
    $this->appliedCapabilities = $appliedCapabilities;
  }
  /**
   * @return GoogleAppsDriveLabelsV2FieldAppliedCapabilities
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
   * @param GoogleAppsDriveLabelsV2FieldDateOptions
   */
  public function setDateOptions(GoogleAppsDriveLabelsV2FieldDateOptions $dateOptions)
  {
    $this->dateOptions = $dateOptions;
  }
  /**
   * @return GoogleAppsDriveLabelsV2FieldDateOptions
   */
  public function getDateOptions()
  {
    return $this->dateOptions;
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
   * @param GoogleAppsDriveLabelsV2FieldDisplayHints
   */
  public function setDisplayHints(GoogleAppsDriveLabelsV2FieldDisplayHints $displayHints)
  {
    $this->displayHints = $displayHints;
  }
  /**
   * @return GoogleAppsDriveLabelsV2FieldDisplayHints
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
   * @param GoogleAppsDriveLabelsV2FieldIntegerOptions
   */
  public function setIntegerOptions(GoogleAppsDriveLabelsV2FieldIntegerOptions $integerOptions)
  {
    $this->integerOptions = $integerOptions;
  }
  /**
   * @return GoogleAppsDriveLabelsV2FieldIntegerOptions
   */
  public function getIntegerOptions()
  {
    return $this->integerOptions;
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
   * @param GoogleAppsDriveLabelsV2FieldProperties
   */
  public function setProperties(GoogleAppsDriveLabelsV2FieldProperties $properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return GoogleAppsDriveLabelsV2FieldProperties
   */
  public function getProperties()
  {
    return $this->properties;
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
   * @param string
   */
  public function setQueryKey($queryKey)
  {
    $this->queryKey = $queryKey;
  }
  /**
   * @return string
   */
  public function getQueryKey()
  {
    return $this->queryKey;
  }
  /**
   * @param GoogleAppsDriveLabelsV2FieldSchemaCapabilities
   */
  public function setSchemaCapabilities(GoogleAppsDriveLabelsV2FieldSchemaCapabilities $schemaCapabilities)
  {
    $this->schemaCapabilities = $schemaCapabilities;
  }
  /**
   * @return GoogleAppsDriveLabelsV2FieldSchemaCapabilities
   */
  public function getSchemaCapabilities()
  {
    return $this->schemaCapabilities;
  }
  /**
   * @param GoogleAppsDriveLabelsV2FieldSelectionOptions
   */
  public function setSelectionOptions(GoogleAppsDriveLabelsV2FieldSelectionOptions $selectionOptions)
  {
    $this->selectionOptions = $selectionOptions;
  }
  /**
   * @return GoogleAppsDriveLabelsV2FieldSelectionOptions
   */
  public function getSelectionOptions()
  {
    return $this->selectionOptions;
  }
  /**
   * @param GoogleAppsDriveLabelsV2FieldTextOptions
   */
  public function setTextOptions(GoogleAppsDriveLabelsV2FieldTextOptions $textOptions)
  {
    $this->textOptions = $textOptions;
  }
  /**
   * @return GoogleAppsDriveLabelsV2FieldTextOptions
   */
  public function getTextOptions()
  {
    return $this->textOptions;
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
  /**
   * @param GoogleAppsDriveLabelsV2FieldUserOptions
   */
  public function setUserOptions(GoogleAppsDriveLabelsV2FieldUserOptions $userOptions)
  {
    $this->userOptions = $userOptions;
  }
  /**
   * @return GoogleAppsDriveLabelsV2FieldUserOptions
   */
  public function getUserOptions()
  {
    return $this->userOptions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsDriveLabelsV2Field::class, 'Google_Service_DriveLabels_GoogleAppsDriveLabelsV2Field');
