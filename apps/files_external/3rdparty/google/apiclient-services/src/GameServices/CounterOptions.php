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

namespace Google\Service\GameServices;

class CounterOptions extends \Google\Collection
{
  protected $collection_key = 'customFields';
  protected $customFieldsType = CustomField::class;
  protected $customFieldsDataType = 'array';
  public $field;
  public $metric;

  /**
   * @param CustomField[]
   */
  public function setCustomFields($customFields)
  {
    $this->customFields = $customFields;
  }
  /**
   * @return CustomField[]
   */
  public function getCustomFields()
  {
    return $this->customFields;
  }
  public function setField($field)
  {
    $this->field = $field;
  }
  public function getField()
  {
    return $this->field;
  }
  public function setMetric($metric)
  {
    $this->metric = $metric;
  }
  public function getMetric()
  {
    return $this->metric;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CounterOptions::class, 'Google_Service_GameServices_CounterOptions');
