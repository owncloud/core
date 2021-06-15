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

class Google_Service_Keep_ListItem extends Google_Collection
{
  protected $collection_key = 'childListItems';
  public $checked;
  protected $childListItemsType = 'Google_Service_Keep_ListItem';
  protected $childListItemsDataType = 'array';
  protected $textType = 'Google_Service_Keep_TextContent';
  protected $textDataType = '';

  public function setChecked($checked)
  {
    $this->checked = $checked;
  }
  public function getChecked()
  {
    return $this->checked;
  }
  /**
   * @param Google_Service_Keep_ListItem[]
   */
  public function setChildListItems($childListItems)
  {
    $this->childListItems = $childListItems;
  }
  /**
   * @return Google_Service_Keep_ListItem[]
   */
  public function getChildListItems()
  {
    return $this->childListItems;
  }
  /**
   * @param Google_Service_Keep_TextContent
   */
  public function setText(Google_Service_Keep_TextContent $text)
  {
    $this->text = $text;
  }
  /**
   * @return Google_Service_Keep_TextContent
   */
  public function getText()
  {
    return $this->text;
  }
}
