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

namespace Google\Service\Forms;

class Request extends \Google\Model
{
  protected $createItemType = CreateItemRequest::class;
  protected $createItemDataType = '';
  protected $deleteItemType = DeleteItemRequest::class;
  protected $deleteItemDataType = '';
  protected $moveItemType = MoveItemRequest::class;
  protected $moveItemDataType = '';
  protected $updateFormInfoType = UpdateFormInfoRequest::class;
  protected $updateFormInfoDataType = '';
  protected $updateItemType = UpdateItemRequest::class;
  protected $updateItemDataType = '';
  protected $updateSettingsType = UpdateSettingsRequest::class;
  protected $updateSettingsDataType = '';

  /**
   * @param CreateItemRequest
   */
  public function setCreateItem(CreateItemRequest $createItem)
  {
    $this->createItem = $createItem;
  }
  /**
   * @return CreateItemRequest
   */
  public function getCreateItem()
  {
    return $this->createItem;
  }
  /**
   * @param DeleteItemRequest
   */
  public function setDeleteItem(DeleteItemRequest $deleteItem)
  {
    $this->deleteItem = $deleteItem;
  }
  /**
   * @return DeleteItemRequest
   */
  public function getDeleteItem()
  {
    return $this->deleteItem;
  }
  /**
   * @param MoveItemRequest
   */
  public function setMoveItem(MoveItemRequest $moveItem)
  {
    $this->moveItem = $moveItem;
  }
  /**
   * @return MoveItemRequest
   */
  public function getMoveItem()
  {
    return $this->moveItem;
  }
  /**
   * @param UpdateFormInfoRequest
   */
  public function setUpdateFormInfo(UpdateFormInfoRequest $updateFormInfo)
  {
    $this->updateFormInfo = $updateFormInfo;
  }
  /**
   * @return UpdateFormInfoRequest
   */
  public function getUpdateFormInfo()
  {
    return $this->updateFormInfo;
  }
  /**
   * @param UpdateItemRequest
   */
  public function setUpdateItem(UpdateItemRequest $updateItem)
  {
    $this->updateItem = $updateItem;
  }
  /**
   * @return UpdateItemRequest
   */
  public function getUpdateItem()
  {
    return $this->updateItem;
  }
  /**
   * @param UpdateSettingsRequest
   */
  public function setUpdateSettings(UpdateSettingsRequest $updateSettings)
  {
    $this->updateSettings = $updateSettings;
  }
  /**
   * @return UpdateSettingsRequest
   */
  public function getUpdateSettings()
  {
    return $this->updateSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Request::class, 'Google_Service_Forms_Request');
