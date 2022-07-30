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

namespace Google\Service\Drive;

class ModifyLabelsResponse extends \Google\Collection
{
  protected $collection_key = 'modifiedLabels';
  /**
   * @var string
   */
  public $kind;
  protected $modifiedLabelsType = Label::class;
  protected $modifiedLabelsDataType = 'array';

  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Label[]
   */
  public function setModifiedLabels($modifiedLabels)
  {
    $this->modifiedLabels = $modifiedLabels;
  }
  /**
   * @return Label[]
   */
  public function getModifiedLabels()
  {
    return $this->modifiedLabels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ModifyLabelsResponse::class, 'Google_Service_Drive_ModifyLabelsResponse');
