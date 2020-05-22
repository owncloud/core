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

class Google_Service_Apigee_GoogleCloudApigeeV1MenuItemData extends Google_Model
{
  public $draft;
  public $isNested;
  public $menuItemId;
  public $menuTypeId;
  public $modified;
  public $modifiedBy;
  public $name;
  public $pageId;
  public $priority;
  public $url;

  public function setDraft($draft)
  {
    $this->draft = $draft;
  }
  public function getDraft()
  {
    return $this->draft;
  }
  public function setIsNested($isNested)
  {
    $this->isNested = $isNested;
  }
  public function getIsNested()
  {
    return $this->isNested;
  }
  public function setMenuItemId($menuItemId)
  {
    $this->menuItemId = $menuItemId;
  }
  public function getMenuItemId()
  {
    return $this->menuItemId;
  }
  public function setMenuTypeId($menuTypeId)
  {
    $this->menuTypeId = $menuTypeId;
  }
  public function getMenuTypeId()
  {
    return $this->menuTypeId;
  }
  public function setModified($modified)
  {
    $this->modified = $modified;
  }
  public function getModified()
  {
    return $this->modified;
  }
  public function setModifiedBy($modifiedBy)
  {
    $this->modifiedBy = $modifiedBy;
  }
  public function getModifiedBy()
  {
    return $this->modifiedBy;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPageId($pageId)
  {
    $this->pageId = $pageId;
  }
  public function getPageId()
  {
    return $this->pageId;
  }
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  public function getPriority()
  {
    return $this->priority;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}
