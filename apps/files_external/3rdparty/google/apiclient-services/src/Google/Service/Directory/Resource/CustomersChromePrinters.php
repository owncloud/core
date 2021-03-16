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

/**
 * The "printers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $printers = $adminService->printers;
 *  </code>
 */
class Google_Service_Directory_Resource_CustomersChromePrinters extends Google_Service_Resource
{
  /**
   * Creates printers under given Organization Unit.
   * (printers.batchCreatePrinters)
   *
   * @param string $parent Required. The name of the customer. Format:
   * customers/{customer_id}
   * @param Google_Service_Directory_BatchCreatePrintersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_BatchCreatePrintersResponse
   */
  public function batchCreatePrinters($parent, Google_Service_Directory_BatchCreatePrintersRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchCreatePrinters', array($params), "Google_Service_Directory_BatchCreatePrintersResponse");
  }
  /**
   * Deletes printers in batch. (printers.batchDeletePrinters)
   *
   * @param string $parent Required. The name of the customer. Format:
   * customers/{customer_id}
   * @param Google_Service_Directory_BatchDeletePrintersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_BatchDeletePrintersResponse
   */
  public function batchDeletePrinters($parent, Google_Service_Directory_BatchDeletePrintersRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchDeletePrinters', array($params), "Google_Service_Directory_BatchDeletePrintersResponse");
  }
  /**
   * Creates a printer under given Organization Unit. (printers.create)
   *
   * @param string $parent Required. The name of the customer. Format:
   * customers/{customer_id}
   * @param Google_Service_Directory_Printer $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Printer
   */
  public function create($parent, Google_Service_Directory_Printer $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Directory_Printer");
  }
  /**
   * Deletes a `Printer`. (printers.delete)
   *
   * @param string $name Required. The name of the printer to be updated. Format:
   * customers/{customer_id}/chrome/printers/{printer_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_AdminEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Directory_AdminEmpty");
  }
  /**
   * Returns a `Printer` resource (printer's config). (printers.get)
   *
   * @param string $name Required. The name of the printer to retrieve. Format:
   * customers/{customer_id}/chrome/printers/{printer_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Printer
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_Printer");
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
   * @return Google_Service_Directory_ListPrintersResponse
   */
  public function listCustomersChromePrinters($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_ListPrintersResponse");
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
   * @return Google_Service_Directory_ListPrinterModelsResponse
   */
  public function listPrinterModels($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('listPrinterModels', array($params), "Google_Service_Directory_ListPrinterModelsResponse");
  }
  /**
   * Updates a `Printer` resource. (printers.patch)
   *
   * @param string $name The resource name of the Printer object, in the format
   * customers/{customer-id}/printers/{printer-id} (During printer creation leave
   * empty)
   * @param Google_Service_Directory_Printer $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clearMask The list of fields to be cleared. Note, some of
   * the fields are read only and cannot be updated. Values for not specified
   * fields will be patched.
   * @opt_param string updateMask The list of fields to be updated. Note, some of
   * the fields are read only and cannot be updated. Values for not specified
   * fields will be patched.
   * @return Google_Service_Directory_Printer
   */
  public function patch($name, Google_Service_Directory_Printer $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_Printer");
  }
}
