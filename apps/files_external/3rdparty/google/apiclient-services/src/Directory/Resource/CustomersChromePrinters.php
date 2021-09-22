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

namespace Google\Service\Directory\Resource;

use Google\Service\Directory\AdminEmpty;
use Google\Service\Directory\BatchCreatePrintersRequest;
use Google\Service\Directory\BatchCreatePrintersResponse;
use Google\Service\Directory\BatchDeletePrintersRequest;
use Google\Service\Directory\BatchDeletePrintersResponse;
use Google\Service\Directory\ListPrinterModelsResponse;
use Google\Service\Directory\ListPrintersResponse;
use Google\Service\Directory\Printer;

/**
 * The "printers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google\Service\Directory(...);
 *   $printers = $adminService->printers;
 *  </code>
 */
class CustomersChromePrinters extends \Google\Service\Resource
{
  /**
   * Creates printers under given Organization Unit.
   * (printers.batchCreatePrinters)
   *
   * @param string $parent Required. The name of the customer. Format:
   * customers/{customer_id}
   * @param BatchCreatePrintersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchCreatePrintersResponse
   */
  public function batchCreatePrinters($parent, BatchCreatePrintersRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchCreatePrinters', [$params], BatchCreatePrintersResponse::class);
  }
  /**
   * Deletes printers in batch. (printers.batchDeletePrinters)
   *
   * @param string $parent Required. The name of the customer. Format:
   * customers/{customer_id}
   * @param BatchDeletePrintersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchDeletePrintersResponse
   */
  public function batchDeletePrinters($parent, BatchDeletePrintersRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchDeletePrinters', [$params], BatchDeletePrintersResponse::class);
  }
  /**
   * Creates a printer under given Organization Unit. (printers.create)
   *
   * @param string $parent Required. The name of the customer. Format:
   * customers/{customer_id}
   * @param Printer $postBody
   * @param array $optParams Optional parameters.
   * @return Printer
   */
  public function create($parent, Printer $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Printer::class);
  }
  /**
   * Deletes a `Printer`. (printers.delete)
   *
   * @param string $name Required. The name of the printer to be updated. Format:
   * customers/{customer_id}/chrome/printers/{printer_id}
   * @param array $optParams Optional parameters.
   * @return AdminEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], AdminEmpty::class);
  }
  /**
   * Returns a `Printer` resource (printer's config). (printers.get)
   *
   * @param string $name Required. The name of the printer to retrieve. Format:
   * customers/{customer_id}/chrome/printers/{printer_id}
   * @param array $optParams Optional parameters.
   * @return Printer
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Printer::class);
  }
  /**
   * List printers configs. (printers.listCustomersChromePrinters)
   *
   * @param string $parent Required. The name of the customer who owns this
   * collection of printers. Format: customers/{customer_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Search query. Search syntax is shared between this
   * api and Admin Console printers pages.
   * @opt_param string orgUnitId Organization Unit that we want to list the
   * printers for. When org_unit is not present in the request then all printers
   * of the customer are returned (or filtered). When org_unit is present in the
   * request then only printers available to this OU will be returned (owned or
   * inherited). You may see if printer is owned or inherited for this OU by
   * looking at Printer.org_unit_id.
   * @opt_param int pageSize The maximum number of objects to return. The service
   * may return fewer than this value.
   * @opt_param string pageToken A page token, received from a previous call.
   * @return ListPrintersResponse
   */
  public function listCustomersChromePrinters($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPrintersResponse::class);
  }
  /**
   * Lists the supported printer models. (printers.listPrinterModels)
   *
   * @param string $parent Required. The name of the customer who owns this
   * collection of printers. Format: customers/{customer_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filer to list only models by a given manufacturer in
   * format: "manufacturer:Brother". Search syntax is shared between this api and
   * Admin Console printers pages.
   * @opt_param int pageSize The maximum number of objects to return. The service
   * may return fewer than this value.
   * @opt_param string pageToken A page token, received from a previous call.
   * @return ListPrinterModelsResponse
   */
  public function listPrinterModels($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('listPrinterModels', [$params], ListPrinterModelsResponse::class);
  }
  /**
   * Updates a `Printer` resource. (printers.patch)
   *
   * @param string $name The resource name of the Printer object, in the format
   * customers/{customer-id}/printers/{printer-id} (During printer creation leave
   * empty)
   * @param Printer $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clearMask The list of fields to be cleared. Note, some of
   * the fields are read only and cannot be updated. Values for not specified
   * fields will be patched.
   * @opt_param string updateMask The list of fields to be updated. Note, some of
   * the fields are read only and cannot be updated. Values for not specified
   * fields will be patched.
   * @return Printer
   */
  public function patch($name, Printer $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Printer::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomersChromePrinters::class, 'Google_Service_Directory_Resource_CustomersChromePrinters');
