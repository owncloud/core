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

class Google_Service_SecurityCommandCenter_Finding extends Google_Model
{
  public $canonicalName;
  public $category;
  public $createTime;
  public $eventTime;
  public $externalUri;
  public $name;
  public $parent;
  public $resourceName;
  protected $securityMarksType = 'Google_Service_SecurityCommandCenter_SecurityMarks';
  protected $securityMarksDataType = '';
  public $severity;
  public $sourceProperties;
  public $state;

  public function setCanonicalName($canonicalName)
  {
    $this->canonicalName = $canonicalName;
  }
  public function getCanonicalName()
  {
    return $this->canonicalName;
  }
  public function setCategory($category)
  {
    $this->category = $category;
  }
  public function getCategory()
  {
    return $this->category;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setEventTime($eventTime)
  {
    $this->eventTime = $eventTime;
  }
  public function getEventTime()
  {
    return $this->eventTime;
  }
  public function setExternalUri($externalUri)
  {
    $this->externalUri = $externalUri;
  }
  public function getExternalUri()
  {
    return $this->externalUri;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  public function getParent()
  {
    return $this->parent;
  }
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  public function getResourceName()
  {
    return $this->resourceName;
  }
  /**
   * @param Google_Service_SecurityCommandCenter_SecurityMarks
   */
  public function setSecurityMarks(Google_Service_SecurityCommandCenter_SecurityMarks $securityMarks)
  {
    $this->securityMarks = $securityMarks;
  }
  /**
   * @return Google_Service_SecurityCommandCenter_SecurityMarks
   */
  public function getSecurityMarks()
  {
    return $this->securityMarks;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  public function getSeverity()
  {
    return $this->severity;
  }
  public function setSourceProperties($sourceProperties)
  {
    $this->sourceProperties = $sourceProperties;
  }
  public function getSourceProperties()
  {
    return $this->sourceProperties;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
