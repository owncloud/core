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

namespace Google\Service\Testing;

class DeviceIpBlock extends \Google\Model
{
  protected $addedDateType = Date::class;
  protected $addedDateDataType = '';
  /**
   * @var string
   */
  public $block;
  /**
   * @var string
   */
  public $form;

  /**
   * @param Date
   */
  public function setAddedDate(Date $addedDate)
  {
    $this->addedDate = $addedDate;
  }
  /**
   * @return Date
   */
  public function getAddedDate()
  {
    return $this->addedDate;
  }
  /**
   * @param string
   */
  public function setBlock($block)
  {
    $this->block = $block;
  }
  /**
   * @return string
   */
  public function getBlock()
  {
    return $this->block;
  }
  /**
   * @param string
   */
  public function setForm($form)
  {
    $this->form = $form;
  }
  /**
   * @return string
   */
  public function getForm()
  {
    return $this->form;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeviceIpBlock::class, 'Google_Service_Testing_DeviceIpBlock');
