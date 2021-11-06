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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2PredictRequest extends \Google\Model
{
  public $filter;
  public $labels;
  public $pageSize;
  public $pageToken;
  public $params;
  protected $userEventType = GoogleCloudRetailV2UserEvent::class;
  protected $userEventDataType = '';
  public $validateOnly;

  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  public function getFilter()
  {
    return $this->filter;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }
  public function getPageSize()
  {
    return $this->pageSize;
  }
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  public function getPageToken()
  {
    return $this->pageToken;
  }
  public function setParams($params)
  {
    $this->params = $params;
  }
  public function getParams()
  {
    return $this->params;
  }
  /**
   * @param GoogleCloudRetailV2UserEvent
   */
  public function setUserEvent(GoogleCloudRetailV2UserEvent $userEvent)
  {
    $this->userEvent = $userEvent;
  }
  /**
   * @return GoogleCloudRetailV2UserEvent
   */
  public function getUserEvent()
  {
    return $this->userEvent;
  }
  public function setValidateOnly($validateOnly)
  {
    $this->validateOnly = $validateOnly;
  }
  public function getValidateOnly()
  {
    return $this->validateOnly;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2PredictRequest::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2PredictRequest');
