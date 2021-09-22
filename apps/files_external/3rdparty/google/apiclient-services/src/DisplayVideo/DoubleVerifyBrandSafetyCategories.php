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

namespace Google\Service\DisplayVideo;

class DoubleVerifyBrandSafetyCategories extends \Google\Collection
{
  protected $collection_key = 'avoidedMediumSeverityCategories';
  public $avoidUnknownBrandSafetyCategory;
  public $avoidedHighSeverityCategories;
  public $avoidedMediumSeverityCategories;

  public function setAvoidUnknownBrandSafetyCategory($avoidUnknownBrandSafetyCategory)
  {
    $this->avoidUnknownBrandSafetyCategory = $avoidUnknownBrandSafetyCategory;
  }
  public function getAvoidUnknownBrandSafetyCategory()
  {
    return $this->avoidUnknownBrandSafetyCategory;
  }
  public function setAvoidedHighSeverityCategories($avoidedHighSeverityCategories)
  {
    $this->avoidedHighSeverityCategories = $avoidedHighSeverityCategories;
  }
  public function getAvoidedHighSeverityCategories()
  {
    return $this->avoidedHighSeverityCategories;
  }
  public function setAvoidedMediumSeverityCategories($avoidedMediumSeverityCategories)
  {
    $this->avoidedMediumSeverityCategories = $avoidedMediumSeverityCategories;
  }
  public function getAvoidedMediumSeverityCategories()
  {
    return $this->avoidedMediumSeverityCategories;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DoubleVerifyBrandSafetyCategories::class, 'Google_Service_DisplayVideo_DoubleVerifyBrandSafetyCategories');
