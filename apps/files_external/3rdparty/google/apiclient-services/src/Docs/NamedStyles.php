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

namespace Google\Service\Docs;

class NamedStyles extends \Google\Collection
{
  protected $collection_key = 'styles';
  protected $stylesType = NamedStyle::class;
  protected $stylesDataType = 'array';

  /**
   * @param NamedStyle[]
   */
  public function setStyles($styles)
  {
    $this->styles = $styles;
  }
  /**
   * @return NamedStyle[]
   */
  public function getStyles()
  {
    return $this->styles;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NamedStyles::class, 'Google_Service_Docs_NamedStyles');
