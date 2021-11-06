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

class CompanionSetting extends \Google\Collection
{
  protected $collection_key = 'enabledSizes';
  public $companionsDisabled;
  protected $enabledSizesType = Size::class;
  protected $enabledSizesDataType = 'array';
  public $imageOnly;
  public $kind;

  public function setCompanionsDisabled($companionsDisabled)
  {
    $this->companionsDisabled = $companionsDisabled;
  }
  public function getCompanionsDisabled()
  {
    return $this->companionsDisabled;
  }
  /**
   * @param Size[]
   */
  public function setEnabledSizes($enabledSizes)
  {
    $this->enabledSizes = $enabledSizes;
  }
  /**
   * @return Size[]
   */
  public function getEnabledSizes()
  {
    return $this->enabledSizes;
  }
  public function setImageOnly($imageOnly)
  {
    $this->imageOnly = $imageOnly;
  }
  public function getImageOnly()
  {
    return $this->imageOnly;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CompanionSetting::class, 'Google_Service_Dfareporting_CompanionSetting');
