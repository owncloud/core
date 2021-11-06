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

namespace Google\Service\CloudAsset;

class ZypperPatch extends \Google\Model
{
  public $category;
  public $patchName;
  public $severity;
  public $summary;

  public function setCategory($category)
  {
    $this->category = $category;
  }
  public function getCategory()
  {
    return $this->category;
  }
  public function setPatchName($patchName)
  {
    $this->patchName = $patchName;
  }
  public function getPatchName()
  {
    return $this->patchName;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  public function getSeverity()
  {
    return $this->severity;
  }
  public function setSummary($summary)
  {
    $this->summary = $summary;
  }
  public function getSummary()
  {
    return $this->summary;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ZypperPatch::class, 'Google_Service_CloudAsset_ZypperPatch');
