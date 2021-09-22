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

namespace Google\Service\CloudTalentSolution;

class CustomAttribute extends \Google\Collection
{
  protected $collection_key = 'stringValues';
  public $filterable;
  public $keywordSearchable;
  public $longValues;
  public $stringValues;

  public function setFilterable($filterable)
  {
    $this->filterable = $filterable;
  }
  public function getFilterable()
  {
    return $this->filterable;
  }
  public function setKeywordSearchable($keywordSearchable)
  {
    $this->keywordSearchable = $keywordSearchable;
  }
  public function getKeywordSearchable()
  {
    return $this->keywordSearchable;
  }
  public function setLongValues($longValues)
  {
    $this->longValues = $longValues;
  }
  public function getLongValues()
  {
    return $this->longValues;
  }
  public function setStringValues($stringValues)
  {
    $this->stringValues = $stringValues;
  }
  public function getStringValues()
  {
    return $this->stringValues;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomAttribute::class, 'Google_Service_CloudTalentSolution_CustomAttribute');
