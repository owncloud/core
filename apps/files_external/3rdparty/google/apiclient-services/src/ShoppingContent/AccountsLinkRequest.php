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

namespace Google\Service\ShoppingContent;

class AccountsLinkRequest extends \Google\Collection
{
  protected $collection_key = 'services';
  public $action;
  public $linkType;
  public $linkedAccountId;
  protected $paymentServiceProviderLinkInfoType = PaymentServiceProviderLinkInfo::class;
  protected $paymentServiceProviderLinkInfoDataType = '';
  public $services;

  public function setAction($action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  public function setLinkType($linkType)
  {
    $this->linkType = $linkType;
  }
  public function getLinkType()
  {
    return $this->linkType;
  }
  public function setLinkedAccountId($linkedAccountId)
  {
    $this->linkedAccountId = $linkedAccountId;
  }
  public function getLinkedAccountId()
  {
    return $this->linkedAccountId;
  }
  /**
   * @param PaymentServiceProviderLinkInfo
   */
  public function setPaymentServiceProviderLinkInfo(PaymentServiceProviderLinkInfo $paymentServiceProviderLinkInfo)
  {
    $this->paymentServiceProviderLinkInfo = $paymentServiceProviderLinkInfo;
  }
  /**
   * @return PaymentServiceProviderLinkInfo
   */
  public function getPaymentServiceProviderLinkInfo()
  {
    return $this->paymentServiceProviderLinkInfo;
  }
  public function setServices($services)
  {
    $this->services = $services;
  }
  public function getServices()
  {
    return $this->services;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsLinkRequest::class, 'Google_Service_ShoppingContent_AccountsLinkRequest');
