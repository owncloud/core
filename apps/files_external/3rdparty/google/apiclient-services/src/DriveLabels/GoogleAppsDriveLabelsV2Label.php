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

class GoogleAppsDriveLabelsV2Label extends \Google\Collection
{
  protected $collection_key = 'fields';
  protected $appliedCapabilitiesType = GoogleAppsDriveLabelsV2LabelAppliedCapabilities::class;
  protected $appliedCapabilitiesDataType = '';
  protected $appliedLabelPolicyType = GoogleAppsDriveLabelsV2LabelAppliedLabelPolicy::class;
  protected $appliedLabelPolicyDataType = '';
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
  protected $displayHintsType = GoogleAppsDriveLabelsV2LabelDisplayHints::class;
  protected $displayHintsDataType = '';
  protected $fieldsType = GoogleAppsDriveLabelsV2Field::class;
  protected $fieldsDataType = 'array';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $labelType;
  /**
   * @var string
   */
  public $learnMoreUri;
  protected $lifecycleType = GoogleAppsDriveLabelsV2Lifecycle::class;
  protected $lifecycleDataType = '';
  protected $lockStatusType = GoogleAppsDriveLabelsV2LockStatus::class;
  protected $lockStatusDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $propertiesType = GoogleAppsDriveLabelsV2LabelProperties::class;
  protected $propertiesDataType = '';
  /**
   * @var string
   */
  public $publishTime;
  protected $publisherType = GoogleAppsDriveLabelsV2UserInfo::class;
  protected $publisherDataType = '';
  /**
   * @var string
   */
  public $revisionCreateTime;
  protected $revisionCreatorType = GoogleAppsDriveLabelsV2UserInfo::class;
  protected $revisionCreatorDataType = '';
  /**
   * @var string
   */
  public $revisionId;
  protected $schemaCapabilitiesType = GoogleAppsDriveLabelsV2LabelSchemaCapabilities::class;
  protected $schemaCapabilitiesDataType = '';

  /**
   * @param GoogleAppsDriveLabelsV2LabelAppliedCapabilities
   */
  public function setAppliedCapabilities(GoogleAppsDriveLabelsV2LabelAppliedCapabilities $appliedCapabilities)
  {
    $this->appliedCapabilities = $appliedCapabilities;
  }
  /**
   * @return GoogleAppsDriveLabelsV2LabelAppliedCapabilities
   */
  public function getAppliedCapabilities()
  {
    return $this->appliedCapabilities;
  }
  /**
   * @param GoogleAppsDriveLabelsV2LabelAppliedLabelPolicy
   */
  public function setAppliedLabelPolicy(GoogleAppsDriveLabelsV2LabelAppliedLabelPolicy $appliedLabelPolicy)
  {
    $this->appliedLabelPolicy = $appliedLabelPolicy;
  }
  /**
   * @return GoogleAppsDriveLabelsV2LabelAppliedLabelPolicy
   */
  public function getAppliedLabelPolicy()
  {
    return $this->appliedLabelPolicy;
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
   * @param GoogleAppsDriveLabelsV2LabelDisplayHints
   */
  public function setDisplayHints(GoogleAppsDriveLabelsV2LabelDisplayHints $displayHints)
  {
    $this->displayHints = $displayHints;
  }
  /**
   * @return GoogleAppsDriveLabelsV2LabelDisplayHints
   */
  public function getDisplayHints()
  {
    return $this->displayHints;
  }
  /**
   * @param GoogleAppsDriveLabelsV2Field[]
   */
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  /**
   * @return GoogleAppsDriveLabelsV2Field[]
   */
  public function getFields()
  {
    return $this->fields;
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
   * @param string
   */
  public function setLabelType($labelType)
  {
    $this->labelType = $labelType;
  }
  /**
   * @return string
   */
  public function getLabelType()
  {
    return $this->labelType;
  }
  /**
   * @param string
   */
  public function setLearnMoreUri($learnMoreUri)
  {
    $this->learnMoreUri = $learnMoreUri;
  }
  /**
   * @return string
   */
  public function getLearnMoreUri()
  {
    return $this->learnMoreUri;
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
   * @param GoogleAppsDriveLabelsV2LabelProperties
   */
  public function setProperties(GoogleAppsDriveLabelsV2LabelProperties $properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return GoogleAppsDriveLabelsV2LabelProperties
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
   * @param string
   */
  public function setRevisionCreateTime($revisionCreateTime)
  {
    $this->revisionCreateTime = $revisionCreateTime;
  }
  /**
   * @return string
   */
  public function getRevisionCreateTime()
  {
    return $this->revisionCreateTime;
  }
  /**
   * @param GoogleAppsDriveLabelsV2UserInfo
   */
  public function setRevisionCreator(GoogleAppsDriveLabelsV2UserInfo $revisionCreator)
  {
    $this->revisionCreator = $revisionCreator;
  }
  /**
   * @return GoogleAppsDriveLabelsV2UserInfo
   */
  public function getRevisionCreator()
  {
    return $this->revisionCreator;
  }
  /**
   * @param string
   */
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  /**
   * @return string
   */
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  /**
   * @param GoogleAppsDriveLabelsV2LabelSchemaCapabilities
   */
  public function setSchemaCapabilities(GoogleAppsDriveLabelsV2LabelSchemaCapabilities $schemaCapabilities)
  {
    $this->schemaCapabilities = $schemaCapabilities;
  }
  /**
   * @return GoogleAppsDriveLabelsV2LabelSchemaCapabilities
   */
  public function getSchemaCapabilities()
  {
    return $this->schemaCapabilities;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsDriveLabelsV2Label::class, 'Google_Service_DriveLabels_GoogleAppsDriveLabelsV2Label');
