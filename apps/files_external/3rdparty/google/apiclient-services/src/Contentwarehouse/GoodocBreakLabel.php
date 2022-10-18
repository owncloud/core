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

namespace Google\Service\Contentwarehouse;

class GoodocBreakLabel extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "breakLabelType" => "BreakLabelType",
  ];
  /**
   * @var int
   */
  public $breakLabelType;
  /**
   * @var bool
   */
  public $isPrefix;

  /**
   * @param int
   */
  public function setBreakLabelType($breakLabelType)
  {
    $this->breakLabelType = $breakLabelType;
  }
  /**
   * @return int
   */
  public function getBreakLabelType()
  {
    return $this->breakLabelType;
  }
  /**
   * @param bool
   */
  public function setIsPrefix($isPrefix)
  {
    $this->isPrefix = $isPrefix;
  }
  /**
   * @return bool
   */
  public function getIsPrefix()
  {
    return $this->isPrefix;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocBreakLabel::class, 'Google_Service_Contentwarehouse_GoodocBreakLabel');
