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

namespace Google\Service\CloudSearch;

class Card extends \Google\Collection
{
  protected $collection_key = 'sections';
  protected $cardActionsType = CardAction::class;
  protected $cardActionsDataType = 'array';
  /**
   * @var string
   */
  public $displayStyle;
  protected $fixedFooterType = FixedFooter::class;
  protected $fixedFooterDataType = '';
  protected $headerType = CardHeader::class;
  protected $headerDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $peekCardHeaderType = CardHeader::class;
  protected $peekCardHeaderDataType = '';
  protected $sectionsType = Section::class;
  protected $sectionsDataType = 'array';

  /**
   * @param CardAction[]
   */
  public function setCardActions($cardActions)
  {
    $this->cardActions = $cardActions;
  }
  /**
   * @return CardAction[]
   */
  public function getCardActions()
  {
    return $this->cardActions;
  }
  /**
   * @param string
   */
  public function setDisplayStyle($displayStyle)
  {
    $this->displayStyle = $displayStyle;
  }
  /**
   * @return string
   */
  public function getDisplayStyle()
  {
    return $this->displayStyle;
  }
  /**
   * @param FixedFooter
   */
  public function setFixedFooter(FixedFooter $fixedFooter)
  {
    $this->fixedFooter = $fixedFooter;
  }
  /**
   * @return FixedFooter
   */
  public function getFixedFooter()
  {
    return $this->fixedFooter;
  }
  /**
   * @param CardHeader
   */
  public function setHeader(CardHeader $header)
  {
    $this->header = $header;
  }
  /**
   * @return CardHeader
   */
  public function getHeader()
  {
    return $this->header;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param CardHeader
   */
  public function setPeekCardHeader(CardHeader $peekCardHeader)
  {
    $this->peekCardHeader = $peekCardHeader;
  }
  /**
   * @return CardHeader
   */
  public function getPeekCardHeader()
  {
    return $this->peekCardHeader;
  }
  /**
   * @param Section[]
   */
  public function setSections($sections)
  {
    $this->sections = $sections;
  }
  /**
   * @return Section[]
   */
  public function getSections()
  {
    return $this->sections;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Card::class, 'Google_Service_CloudSearch_Card');
