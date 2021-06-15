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

class Google_Service_SQLAdmin_InsightsConfig extends Google_Model
{
  public $queryInsightsEnabled;
  public $queryPlansPerMinute;
  public $queryStringLength;
  public $recordApplicationTags;
  public $recordClientAddress;

  public function setQueryInsightsEnabled($queryInsightsEnabled)
  {
    $this->queryInsightsEnabled = $queryInsightsEnabled;
  }
  public function getQueryInsightsEnabled()
  {
    return $this->queryInsightsEnabled;
  }
  public function setQueryPlansPerMinute($queryPlansPerMinute)
  {
    $this->queryPlansPerMinute = $queryPlansPerMinute;
  }
  public function getQueryPlansPerMinute()
  {
    return $this->queryPlansPerMinute;
  }
  public function setQueryStringLength($queryStringLength)
  {
    $this->queryStringLength = $queryStringLength;
  }
  public function getQueryStringLength()
  {
    return $this->queryStringLength;
  }
  public function setRecordApplicationTags($recordApplicationTags)
  {
    $this->recordApplicationTags = $recordApplicationTags;
  }
  public function getRecordApplicationTags()
  {
    return $this->recordApplicationTags;
  }
  public function setRecordClientAddress($recordClientAddress)
  {
    $this->recordClientAddress = $recordClientAddress;
  }
  public function getRecordClientAddress()
  {
    return $this->recordClientAddress;
  }
}
