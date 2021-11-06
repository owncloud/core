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

namespace Google\Service\ServiceManagement;

class Enum extends \Google\Collection
{
  protected $collection_key = 'options';
  protected $enumvalueType = EnumValue::class;
  protected $enumvalueDataType = 'array';
  public $name;
  protected $optionsType = Option::class;
  protected $optionsDataType = 'array';
  protected $sourceContextType = SourceContext::class;
  protected $sourceContextDataType = '';
  public $syntax;

  /**
   * @param EnumValue[]
   */
  public function setEnumvalue($enumvalue)
  {
    $this->enumvalue = $enumvalue;
  }
  /**
   * @return EnumValue[]
   */
  public function getEnumvalue()
  {
    return $this->enumvalue;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Option[]
   */
  public function setOptions($options)
  {
    $this->options = $options;
  }
  /**
   * @return Option[]
   */
  public function getOptions()
  {
    return $this->options;
  }
  /**
   * @param SourceContext
   */
  public function setSourceContext(SourceContext $sourceContext)
  {
    $this->sourceContext = $sourceContext;
  }
  /**
   * @return SourceContext
   */
  public function getSourceContext()
  {
    return $this->sourceContext;
  }
  public function setSyntax($syntax)
  {
    $this->syntax = $syntax;
  }
  public function getSyntax()
  {
    return $this->syntax;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Enum::class, 'Google_Service_ServiceManagement_Enum');
