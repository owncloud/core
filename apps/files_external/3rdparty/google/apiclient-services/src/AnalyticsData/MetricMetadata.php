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

namespace Google\Service\AnalyticsData;

class MetricMetadata extends \Google\Collection
{
  protected $collection_key = 'deprecatedApiNames';
  public $apiName;
  public $blockedReasons;
  public $category;
  public $customDefinition;
  public $deprecatedApiNames;
  public $description;
  public $expression;
  public $type;
  public $uiName;

  public function setApiName($apiName)
  {
    $this->apiName = $apiName;
  }
  public function getApiName()
  {
    return $this->apiName;
  }
  public function setBlockedReasons($blockedReasons)
  {
    $this->blockedReasons = $blockedReasons;
  }
  public function getBlockedReasons()
  {
    return $this->blockedReasons;
  }
  public function setCategory($category)
  {
    $this->category = $category;
  }
  public function getCategory()
  {
    return $this->category;
  }
  public function setCustomDefinition($customDefinition)
  {
    $this->customDefinition = $customDefinition;
  }
  public function getCustomDefinition()
  {
    return $this->customDefinition;
  }
  public function setDeprecatedApiNames($deprecatedApiNames)
  {
    $this->deprecatedApiNames = $deprecatedApiNames;
  }
  public function getDeprecatedApiNames()
  {
    return $this->deprecatedApiNames;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setExpression($expression)
  {
    $this->expression = $expression;
  }
  public function getExpression()
  {
    return $this->expression;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUiName($uiName)
  {
    $this->uiName = $uiName;
  }
  public function getUiName()
  {
    return $this->uiName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MetricMetadata::class, 'Google_Service_AnalyticsData_MetricMetadata');
