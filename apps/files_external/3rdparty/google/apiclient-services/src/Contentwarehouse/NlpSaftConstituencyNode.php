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

class NlpSaftConstituencyNode extends \Google\Collection
{
  protected $collection_key = 'child';
  /**
   * @var int[]
   */
  public $child;
  /**
   * @var string
   */
  public $label;
  protected $phraseType = NlpSaftPhrase::class;
  protected $phraseDataType = '';

  /**
   * @param int[]
   */
  public function setChild($child)
  {
    $this->child = $child;
  }
  /**
   * @return int[]
   */
  public function getChild()
  {
    return $this->child;
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
   * @param NlpSaftPhrase
   */
  public function setPhrase(NlpSaftPhrase $phrase)
  {
    $this->phrase = $phrase;
  }
  /**
   * @return NlpSaftPhrase
   */
  public function getPhrase()
  {
    return $this->phrase;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSaftConstituencyNode::class, 'Google_Service_Contentwarehouse_NlpSaftConstituencyNode');
