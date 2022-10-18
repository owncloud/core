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

namespace Google\Service\DisplayVideo;

class BulkUpdateLineItemsRequest extends \Google\Collection
{
  protected $collection_key = 'lineItemIds';
  /**
   * @var string[]
   */
  public $lineItemIds;
  protected $targetLineItemType = LineItem::class;
  protected $targetLineItemDataType = '';
  /**
   * @var string
   */
  public $updateMask;

  /**
   * @param string[]
   */
  public function setLineItemIds($lineItemIds)
  {
    $this->lineItemIds = $lineItemIds;
  }
  /**
   * @return string[]
   */
  public function getLineItemIds()
  {
    return $this->lineItemIds;
  }
  /**
   * @param LineItem
   */
  public function setTargetLineItem(LineItem $targetLineItem)
  {
    $this->targetLineItem = $targetLineItem;
  }
  /**
   * @return LineItem
   */
  public function getTargetLineItem()
  {
    return $this->targetLineItem;
  }
  /**
   * @param string
   */
  public function setUpdateMask($updateMask)
  {
    $this->updateMask = $updateMask;
  }
  /**
   * @return string
   */
  public function getUpdateMask()
  {
    return $this->updateMask;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BulkUpdateLineItemsRequest::class, 'Google_Service_DisplayVideo_BulkUpdateLineItemsRequest');
