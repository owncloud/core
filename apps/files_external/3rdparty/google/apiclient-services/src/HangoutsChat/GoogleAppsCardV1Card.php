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

namespace Google\Service\HangoutsChat;

class GoogleAppsCardV1Card extends \Google\Collection
{
  protected $collection_key = 'sections';
  protected $cardActionsType = GoogleAppsCardV1CardAction::class;
  protected $cardActionsDataType = 'array';
  public $displayStyle;
  protected $fixedFooterType = GoogleAppsCardV1CardFixedFooter::class;
  protected $fixedFooterDataType = '';
  protected $headerType = GoogleAppsCardV1CardHeader::class;
  protected $headerDataType = '';
  public $name;
  protected $peekCardHeaderType = GoogleAppsCardV1CardHeader::class;
  protected $peekCardHeaderDataType = '';
  protected $sectionsType = GoogleAppsCardV1Section::class;
  protected $sectionsDataType = 'array';

  /**
   * @param GoogleAppsCardV1CardAction[]
   */
  public function setCardActions($cardActions)
  {
    $this->cardActions = $cardActions;
  }
  /**
   * @return GoogleAppsCardV1CardAction[]
   */
  public function getCardActions()
  {
    return $this->cardActions;
  }
  public function setDisplayStyle($displayStyle)
  {
    $this->displayStyle = $displayStyle;
  }
  public function getDisplayStyle()
  {
    return $this->displayStyle;
  }
  /**
   * @param GoogleAppsCardV1CardFixedFooter
   */
  public function setFixedFooter(GoogleAppsCardV1CardFixedFooter $fixedFooter)
  {
    $this->fixedFooter = $fixedFooter;
  }
  /**
   * @return GoogleAppsCardV1CardFixedFooter
   */
  public function getFixedFooter()
  {
    return $this->fixedFooter;
  }
  /**
   * @param GoogleAppsCardV1CardHeader
   */
  public function setHeader(GoogleAppsCardV1CardHeader $header)
  {
    $this->header = $header;
  }
  /**
   * @return GoogleAppsCardV1CardHeader
   */
  public function getHeader()
  {
    return $this->header;
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
   * @param GoogleAppsCardV1CardHeader
   */
  public function setPeekCardHeader(GoogleAppsCardV1CardHeader $peekCardHeader)
  {
    $this->peekCardHeader = $peekCardHeader;
  }
  /**
   * @return GoogleAppsCardV1CardHeader
   */
  public function getPeekCardHeader()
  {
    return $this->peekCardHeader;
  }
  /**
   * @param GoogleAppsCardV1Section[]
   */
  public function setSections($sections)
  {
    $this->sections = $sections;
  }
  /**
   * @return GoogleAppsCardV1Section[]
   */
  public function getSections()
  {
    return $this->sections;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCardV1Card::class, 'Google_Service_HangoutsChat_GoogleAppsCardV1Card');
