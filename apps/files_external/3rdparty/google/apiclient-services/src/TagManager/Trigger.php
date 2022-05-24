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

class Trigger extends \Google\Collection
{
  protected $collection_key = 'parameter';
  /**
   * @var string
   */
  public $accountId;
  protected $autoEventFilterType = Condition::class;
  protected $autoEventFilterDataType = 'array';
  protected $checkValidationType = Parameter::class;
  protected $checkValidationDataType = '';
  /**
   * @var string
   */
  public $containerId;
  protected $continuousTimeMinMillisecondsType = Parameter::class;
  protected $continuousTimeMinMillisecondsDataType = '';
  protected $customEventFilterType = Condition::class;
  protected $customEventFilterDataType = 'array';
  protected $eventNameType = Parameter::class;
  protected $eventNameDataType = '';
  protected $filterType = Condition::class;
  protected $filterDataType = 'array';
  /**
   * @var string
   */
  public $fingerprint;
  protected $horizontalScrollPercentageListType = Parameter::class;
  protected $horizontalScrollPercentageListDataType = '';
  protected $intervalType = Parameter::class;
  protected $intervalDataType = '';
  protected $intervalSecondsType = Parameter::class;
  protected $intervalSecondsDataType = '';
  protected $limitType = Parameter::class;
  protected $limitDataType = '';
  protected $maxTimerLengthSecondsType = Parameter::class;
  protected $maxTimerLengthSecondsDataType = '';
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
  protected $selectorType = Parameter::class;
  protected $selectorDataType = '';
  /**
   * @var string
   */
  public $tagManagerUrl;
  protected $totalTimeMinMillisecondsType = Parameter::class;
  protected $totalTimeMinMillisecondsDataType = '';
  /**
   * @var string
   */
  public $triggerId;
  /**
   * @var string
   */
  public $type;
  protected $uniqueTriggerIdType = Parameter::class;
  protected $uniqueTriggerIdDataType = '';
  protected $verticalScrollPercentageListType = Parameter::class;
  protected $verticalScrollPercentageListDataType = '';
  protected $visibilitySelectorType = Parameter::class;
  protected $visibilitySelectorDataType = '';
  protected $visiblePercentageMaxType = Parameter::class;
  protected $visiblePercentageMaxDataType = '';
  protected $visiblePercentageMinType = Parameter::class;
  protected $visiblePercentageMinDataType = '';
  protected $waitForTagsType = Parameter::class;
  protected $waitForTagsDataType = '';
  protected $waitForTagsTimeoutType = Parameter::class;
  protected $waitForTagsTimeoutDataType = '';
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
   * @param Condition[]
   */
  public function setAutoEventFilter($autoEventFilter)
  {
    $this->autoEventFilter = $autoEventFilter;
  }
  /**
   * @return Condition[]
   */
  public function getAutoEventFilter()
  {
    return $this->autoEventFilter;
  }
  /**
   * @param Parameter
   */
  public function setCheckValidation(Parameter $checkValidation)
  {
    $this->checkValidation = $checkValidation;
  }
  /**
   * @return Parameter
   */
  public function getCheckValidation()
  {
    return $this->checkValidation;
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
   * @param Parameter
   */
  public function setContinuousTimeMinMilliseconds(Parameter $continuousTimeMinMilliseconds)
  {
    $this->continuousTimeMinMilliseconds = $continuousTimeMinMilliseconds;
  }
  /**
   * @return Parameter
   */
  public function getContinuousTimeMinMilliseconds()
  {
    return $this->continuousTimeMinMilliseconds;
  }
  /**
   * @param Condition[]
   */
  public function setCustomEventFilter($customEventFilter)
  {
    $this->customEventFilter = $customEventFilter;
  }
  /**
   * @return Condition[]
   */
  public function getCustomEventFilter()
  {
    return $this->customEventFilter;
  }
  /**
   * @param Parameter
   */
  public function setEventName(Parameter $eventName)
  {
    $this->eventName = $eventName;
  }
  /**
   * @return Parameter
   */
  public function getEventName()
  {
    return $this->eventName;
  }
  /**
   * @param Condition[]
   */
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return Condition[]
   */
  public function getFilter()
  {
    return $this->filter;
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
   * @param Parameter
   */
  public function setHorizontalScrollPercentageList(Parameter $horizontalScrollPercentageList)
  {
    $this->horizontalScrollPercentageList = $horizontalScrollPercentageList;
  }
  /**
   * @return Parameter
   */
  public function getHorizontalScrollPercentageList()
  {
    return $this->horizontalScrollPercentageList;
  }
  /**
   * @param Parameter
   */
  public function setInterval(Parameter $interval)
  {
    $this->interval = $interval;
  }
  /**
   * @return Parameter
   */
  public function getInterval()
  {
    return $this->interval;
  }
  /**
   * @param Parameter
   */
  public function setIntervalSeconds(Parameter $intervalSeconds)
  {
    $this->intervalSeconds = $intervalSeconds;
  }
  /**
   * @return Parameter
   */
  public function getIntervalSeconds()
  {
    return $this->intervalSeconds;
  }
  /**
   * @param Parameter
   */
  public function setLimit(Parameter $limit)
  {
    $this->limit = $limit;
  }
  /**
   * @return Parameter
   */
  public function getLimit()
  {
    return $this->limit;
  }
  /**
   * @param Parameter
   */
  public function setMaxTimerLengthSeconds(Parameter $maxTimerLengthSeconds)
  {
    $this->maxTimerLengthSeconds = $maxTimerLengthSeconds;
  }
  /**
   * @return Parameter
   */
  public function getMaxTimerLengthSeconds()
  {
    return $this->maxTimerLengthSeconds;
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
   * @param Parameter
   */
  public function setSelector(Parameter $selector)
  {
    $this->selector = $selector;
  }
  /**
   * @return Parameter
   */
  public function getSelector()
  {
    return $this->selector;
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
   * @param Parameter
   */
  public function setTotalTimeMinMilliseconds(Parameter $totalTimeMinMilliseconds)
  {
    $this->totalTimeMinMilliseconds = $totalTimeMinMilliseconds;
  }
  /**
   * @return Parameter
   */
  public function getTotalTimeMinMilliseconds()
  {
    return $this->totalTimeMinMilliseconds;
  }
  /**
   * @param string
   */
  public function setTriggerId($triggerId)
  {
    $this->triggerId = $triggerId;
  }
  /**
   * @return string
   */
  public function getTriggerId()
  {
    return $this->triggerId;
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
   * @param Parameter
   */
  public function setUniqueTriggerId(Parameter $uniqueTriggerId)
  {
    $this->uniqueTriggerId = $uniqueTriggerId;
  }
  /**
   * @return Parameter
   */
  public function getUniqueTriggerId()
  {
    return $this->uniqueTriggerId;
  }
  /**
   * @param Parameter
   */
  public function setVerticalScrollPercentageList(Parameter $verticalScrollPercentageList)
  {
    $this->verticalScrollPercentageList = $verticalScrollPercentageList;
  }
  /**
   * @return Parameter
   */
  public function getVerticalScrollPercentageList()
  {
    return $this->verticalScrollPercentageList;
  }
  /**
   * @param Parameter
   */
  public function setVisibilitySelector(Parameter $visibilitySelector)
  {
    $this->visibilitySelector = $visibilitySelector;
  }
  /**
   * @return Parameter
   */
  public function getVisibilitySelector()
  {
    return $this->visibilitySelector;
  }
  /**
   * @param Parameter
   */
  public function setVisiblePercentageMax(Parameter $visiblePercentageMax)
  {
    $this->visiblePercentageMax = $visiblePercentageMax;
  }
  /**
   * @return Parameter
   */
  public function getVisiblePercentageMax()
  {
    return $this->visiblePercentageMax;
  }
  /**
   * @param Parameter
   */
  public function setVisiblePercentageMin(Parameter $visiblePercentageMin)
  {
    $this->visiblePercentageMin = $visiblePercentageMin;
  }
  /**
   * @return Parameter
   */
  public function getVisiblePercentageMin()
  {
    return $this->visiblePercentageMin;
  }
  /**
   * @param Parameter
   */
  public function setWaitForTags(Parameter $waitForTags)
  {
    $this->waitForTags = $waitForTags;
  }
  /**
   * @return Parameter
   */
  public function getWaitForTags()
  {
    return $this->waitForTags;
  }
  /**
   * @param Parameter
   */
  public function setWaitForTagsTimeout(Parameter $waitForTagsTimeout)
  {
    $this->waitForTagsTimeout = $waitForTagsTimeout;
  }
  /**
   * @return Parameter
   */
  public function getWaitForTagsTimeout()
  {
    return $this->waitForTagsTimeout;
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
class_alias(Trigger::class, 'Google_Service_TagManager_Trigger');
