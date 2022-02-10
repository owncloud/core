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

namespace Google\Service\Sheets;

class WaterfallChartCustomSubtotal extends \Google\Model
{
  /**
   * @var bool
   */
  public $dataIsSubtotal;
  /**
   * @var string
   */
  public $label;
  /**
   * @var int
   */
  public $subtotalIndex;

  /**
   * @param bool
   */
  public function setDataIsSubtotal($dataIsSubtotal)
  {
    $this->dataIsSubtotal = $dataIsSubtotal;
  }
  /**
   * @return bool
   */
  public function getDataIsSubtotal()
  {
    return $this->dataIsSubtotal;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param int
   */
  public function setSubtotalIndex($subtotalIndex)
  {
    $this->subtotalIndex = $subtotalIndex;
  }
  /**
   * @return int
   */
  public function getSubtotalIndex()
  {
    return $this->subtotalIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WaterfallChartCustomSubtotal::class, 'Google_Service_Sheets_WaterfallChartCustomSubtotal');
