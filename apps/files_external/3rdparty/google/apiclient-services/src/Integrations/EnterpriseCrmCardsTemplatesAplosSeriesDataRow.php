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

namespace Google\Service\Integrations;

class EnterpriseCrmCardsTemplatesAplosSeriesDataRow extends \Google\Model
{
  protected $xType = EnterpriseCrmCardsCellValue::class;
  protected $xDataType = '';
  protected $yType = EnterpriseCrmCardsCellValue::class;
  protected $yDataType = '';

  /**
   * @param EnterpriseCrmCardsCellValue
   */
  public function setX(EnterpriseCrmCardsCellValue $x)
  {
    $this->x = $x;
  }
  /**
   * @return EnterpriseCrmCardsCellValue
   */
  public function getX()
  {
    return $this->x;
  }
  /**
   * @param EnterpriseCrmCardsCellValue
   */
  public function setY(EnterpriseCrmCardsCellValue $y)
  {
    $this->y = $y;
  }
  /**
   * @return EnterpriseCrmCardsCellValue
   */
  public function getY()
  {
    return $this->y;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmCardsTemplatesAplosSeriesDataRow::class, 'Google_Service_Integrations_EnterpriseCrmCardsTemplatesAplosSeriesDataRow');
