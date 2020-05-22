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

class Google_Service_SystemsManagement_ZypperSettings extends Google_Collection
{
  protected $collection_key = 'severities';
  public $categories;
  public $excludes;
  public $exclusivePatches;
  public $severities;
  public $withOptional;
  public $withUpdate;

  public function setCategories($categories)
  {
    $this->categories = $categories;
  }
  public function getCategories()
  {
    return $this->categories;
  }
  public function setExcludes($excludes)
  {
    $this->excludes = $excludes;
  }
  public function getExcludes()
  {
    return $this->excludes;
  }
  public function setExclusivePatches($exclusivePatches)
  {
    $this->exclusivePatches = $exclusivePatches;
  }
  public function getExclusivePatches()
  {
    return $this->exclusivePatches;
  }
  public function setSeverities($severities)
  {
    $this->severities = $severities;
  }
  public function getSeverities()
  {
    return $this->severities;
  }
  public function setWithOptional($withOptional)
  {
    $this->withOptional = $withOptional;
  }
  public function getWithOptional()
  {
    return $this->withOptional;
  }
  public function setWithUpdate($withUpdate)
  {
    $this->withUpdate = $withUpdate;
  }
  public function getWithUpdate()
  {
    return $this->withUpdate;
  }
}
