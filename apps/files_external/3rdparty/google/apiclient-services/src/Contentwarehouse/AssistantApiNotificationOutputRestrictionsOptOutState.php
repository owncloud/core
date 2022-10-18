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

namespace Google\Service\Contentwarehouse;

class AssistantApiNotificationOutputRestrictionsOptOutState extends \Google\Collection
{
  protected $collection_key = 'categoryState';
  protected $categoryGroupStateType = AssistantApiNotificationOutputRestrictionsOptOutStateCategoryGroupState::class;
  protected $categoryGroupStateDataType = 'array';
  protected $categoryStateType = AssistantApiNotificationOutputRestrictionsOptOutStateCategoryState::class;
  protected $categoryStateDataType = 'array';

  /**
   * @param AssistantApiNotificationOutputRestrictionsOptOutStateCategoryGroupState[]
   */
  public function setCategoryGroupState($categoryGroupState)
  {
    $this->categoryGroupState = $categoryGroupState;
  }
  /**
   * @return AssistantApiNotificationOutputRestrictionsOptOutStateCategoryGroupState[]
   */
  public function getCategoryGroupState()
  {
    return $this->categoryGroupState;
  }
  /**
   * @param AssistantApiNotificationOutputRestrictionsOptOutStateCategoryState[]
   */
  public function setCategoryState($categoryState)
  {
    $this->categoryState = $categoryState;
  }
  /**
   * @return AssistantApiNotificationOutputRestrictionsOptOutStateCategoryState[]
   */
  public function getCategoryState()
  {
    return $this->categoryState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiNotificationOutputRestrictionsOptOutState::class, 'Google_Service_Contentwarehouse_AssistantApiNotificationOutputRestrictionsOptOutState');
