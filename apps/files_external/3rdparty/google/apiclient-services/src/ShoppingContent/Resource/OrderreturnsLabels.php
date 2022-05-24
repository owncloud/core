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

namespace Google\Service\ShoppingContent\Resource;

use Google\Service\ShoppingContent\ReturnShippingLabel;

/**
 * The "labels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $labels = $contentService->labels;
 *  </code>
 */
class OrderreturnsLabels extends \Google\Service\Resource
{
  /**
   * Links a return shipping label to a return id. You can only create one return
   * label per return id. Since the label is sent to the buyer, the linked return
   * label cannot be updated or deleted. If you try to create multiple return
   * shipping labels for a single return id, every create request except the first
   * will fail. (labels.create)
   *
   * @param string $merchantId Required. The merchant the Return Shipping Label
   * belongs to.
   * @param string $returnId Required. Provide the Google-generated merchant order
   * return ID.
   * @param ReturnShippingLabel $postBody
   * @param array $optParams Optional parameters.
   * @return ReturnShippingLabel
   */
  public function create($merchantId, $returnId, ReturnShippingLabel $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'returnId' => $returnId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ReturnShippingLabel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderreturnsLabels::class, 'Google_Service_ShoppingContent_Resource_OrderreturnsLabels');
