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

class Google_Service_HangoutsChat_GoogleAppsCardV1Card extends Google_Collection
{
  protected $collection_key = 'sections';
  protected $cardActionsType = 'Google_Service_HangoutsChat_GoogleAppsCardV1CardAction';
  protected $cardActionsDataType = 'array';
  public $displayStyle;
  protected $fixedFooterType = 'Google_Service_HangoutsChat_GoogleAppsCardV1CardFixedFooter';
  protected $fixedFooterDataType = '';
  protected $headerType = 'Google_Service_HangoutsChat_GoogleAppsCardV1CardHeader';
  protected $headerDataType = '';
  public $name;
  protected $peekCardHeaderType = 'Google_Service_HangoutsChat_GoogleAppsCardV1CardHeader';
  protected $peekCardHeaderDataType = '';
  protected $sectionsType = 'Google_Service_HangoutsChat_GoogleAppsCardV1Section';
  protected $sectionsDataType = 'array';

  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1CardAction[]
   */
  public function setCardActions($cardActions)
  {
    $this->cardActions = $cardActions;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1CardAction[]
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
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1CardFixedFooter
   */
  public function setFixedFooter(Google_Service_HangoutsChat_GoogleAppsCardV1CardFixedFooter $fixedFooter)
  {
    $this->fixedFooter = $fixedFooter;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1CardFixedFooter
   */
  public function getFixedFooter()
  {
    return $this->fixedFooter;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1CardHeader
   */
  public function setHeader(Google_Service_HangoutsChat_GoogleAppsCardV1CardHeader $header)
  {
    $this->header = $header;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1CardHeader
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
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1CardHeader
   */
  public function setPeekCardHeader(Google_Service_HangoutsChat_GoogleAppsCardV1CardHeader $peekCardHeader)
  {
    $this->peekCardHeader = $peekCardHeader;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1CardHeader
   */
  public function getPeekCardHeader()
  {
    return $this->peekCardHeader;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1Section[]
   */
  public function setSections($sections)
  {
    $this->sections = $sections;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1Section[]
   */
  public function getSections()
  {
    return $this->sections;
  }
}
