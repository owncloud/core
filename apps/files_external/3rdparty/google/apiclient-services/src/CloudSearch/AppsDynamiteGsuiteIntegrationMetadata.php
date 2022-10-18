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

class AppsDynamiteGsuiteIntegrationMetadata extends \Google\Collection
{
  protected $collection_key = 'indexableTexts';
  protected $activityFeedDataType = AppsDynamiteSharedActivityFeedAnnotationData::class;
  protected $activityFeedDataDataType = '';
  protected $assistantDataType = AppsDynamiteSharedAssistantAnnotationData::class;
  protected $assistantDataDataType = '';
  protected $calendarEventDataType = AppsDynamiteSharedCalendarEventAnnotationData::class;
  protected $calendarEventDataDataType = '';
  protected $callDataType = AppsDynamiteSharedCallAnnotationData::class;
  protected $callDataDataType = '';
  /**
   * @var string
   */
  public $clientType;
  /**
   * @var string[]
   */
  public $indexableTexts;
  protected $tasksDataType = AppsDynamiteSharedTasksAnnotationData::class;
  protected $tasksDataDataType = '';

  /**
   * @param AppsDynamiteSharedActivityFeedAnnotationData
   */
  public function setActivityFeedData(AppsDynamiteSharedActivityFeedAnnotationData $activityFeedData)
  {
    $this->activityFeedData = $activityFeedData;
  }
  /**
   * @return AppsDynamiteSharedActivityFeedAnnotationData
   */
  public function getActivityFeedData()
  {
    return $this->activityFeedData;
  }
  /**
   * @param AppsDynamiteSharedAssistantAnnotationData
   */
  public function setAssistantData(AppsDynamiteSharedAssistantAnnotationData $assistantData)
  {
    $this->assistantData = $assistantData;
  }
  /**
   * @return AppsDynamiteSharedAssistantAnnotationData
   */
  public function getAssistantData()
  {
    return $this->assistantData;
  }
  /**
   * @param AppsDynamiteSharedCalendarEventAnnotationData
   */
  public function setCalendarEventData(AppsDynamiteSharedCalendarEventAnnotationData $calendarEventData)
  {
    $this->calendarEventData = $calendarEventData;
  }
  /**
   * @return AppsDynamiteSharedCalendarEventAnnotationData
   */
  public function getCalendarEventData()
  {
    return $this->calendarEventData;
  }
  /**
   * @param AppsDynamiteSharedCallAnnotationData
   */
  public function setCallData(AppsDynamiteSharedCallAnnotationData $callData)
  {
    $this->callData = $callData;
  }
  /**
   * @return AppsDynamiteSharedCallAnnotationData
   */
  public function getCallData()
  {
    return $this->callData;
  }
  /**
   * @param string
   */
  public function setClientType($clientType)
  {
    $this->clientType = $clientType;
  }
  /**
   * @return string
   */
  public function getClientType()
  {
    return $this->clientType;
  }
  /**
   * @param string[]
   */
  public function setIndexableTexts($indexableTexts)
  {
    $this->indexableTexts = $indexableTexts;
  }
  /**
   * @return string[]
   */
  public function getIndexableTexts()
  {
    return $this->indexableTexts;
  }
  /**
   * @param AppsDynamiteSharedTasksAnnotationData
   */
  public function setTasksData(AppsDynamiteSharedTasksAnnotationData $tasksData)
  {
    $this->tasksData = $tasksData;
  }
  /**
   * @return AppsDynamiteSharedTasksAnnotationData
   */
  public function getTasksData()
  {
    return $this->tasksData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteGsuiteIntegrationMetadata::class, 'Google_Service_CloudSearch_AppsDynamiteGsuiteIntegrationMetadata');
