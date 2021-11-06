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

namespace Google\Service\Dfareporting;

class CreativeAssetSelection extends \Google\Collection
{
  protected $collection_key = 'rules';
  public $defaultAssetId;
  protected $rulesType = Rule::class;
  protected $rulesDataType = 'array';

  public function setDefaultAssetId($defaultAssetId)
  {
    $this->defaultAssetId = $defaultAssetId;
  }
  public function getDefaultAssetId()
  {
    return $this->defaultAssetId;
  }
  /**
   * @param Rule[]
   */
  public function setRules($rules)
  {
    $this->rules = $rules;
  }
  /**
   * @return Rule[]
   */
  public function getRules()
  {
    return $this->rules;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeAssetSelection::class, 'Google_Service_Dfareporting_CreativeAssetSelection');
