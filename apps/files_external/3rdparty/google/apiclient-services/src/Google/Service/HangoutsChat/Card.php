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

class Google_Service_HangoutsChat_Card extends Google_Collection
{
  protected $collection_key = 'sections';
  protected $cardActionsType = 'Google_Service_HangoutsChat_CardAction';
  protected $cardActionsDataType = 'array';
  protected $headerType = 'Google_Service_HangoutsChat_CardHeader';
  protected $headerDataType = '';
  public $name;
  protected $sectionsType = 'Google_Service_HangoutsChat_Section';
  protected $sectionsDataType = 'array';

  /**
   * @param Google_Service_HangoutsChat_CardAction[]
   */
  public function setCardActions($cardActions)
  {
    $this->cardActions = $cardActions;
  }
  /**
   * @return Google_Service_HangoutsChat_CardAction[]
   */
  public function getCardActions()
  {
    return $this->cardActions;
  }
  /**
   * @param Google_Service_HangoutsChat_CardHeader
   */
  public function setHeader(Google_Service_HangoutsChat_CardHeader $header)
  {
    $this->header = $header;
  }
  /**
   * @return Google_Service_HangoutsChat_CardHeader
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
   * @param Google_Service_HangoutsChat_Section[]
   */
  public function setSections($sections)
  {
    $this->sections = $sections;
  }
  /**
   * @return Google_Service_HangoutsChat_Section[]
   */
  public function getSections()
  {
    return $this->sections;
  }
}
