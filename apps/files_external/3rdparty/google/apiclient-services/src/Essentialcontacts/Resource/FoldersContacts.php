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

namespace Google\Service\Essentialcontacts\Resource;

use Google\Service\Essentialcontacts\GoogleCloudEssentialcontactsV1ComputeContactsResponse;
use Google\Service\Essentialcontacts\GoogleCloudEssentialcontactsV1Contact;
use Google\Service\Essentialcontacts\GoogleCloudEssentialcontactsV1ListContactsResponse;
use Google\Service\Essentialcontacts\GoogleCloudEssentialcontactsV1SendTestMessageRequest;
use Google\Service\Essentialcontacts\GoogleProtobufEmpty;

/**
 * The "contacts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $essentialcontactsService = new Google\Service\Essentialcontacts(...);
 *   $contacts = $essentialcontactsService->contacts;
 *  </code>
 */
class FoldersContacts extends \Google\Service\Resource
{
  /**
   * Lists all contacts for the resource that are subscribed to the specified
   * notification categories, including contacts inherited from any parent
   * resources. (contacts.compute)
   *
   * @param string $parent Required. The name of the resource to compute contacts
   * for. Format: organizations/{organization_id}, folders/{folder_id} or
   * projects/{project_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string notificationCategories The categories of notifications to
   * compute contacts for. If ALL is included in this list, contacts subscribed to
   * any notification category will be returned.
   * @opt_param int pageSize Optional. The maximum number of results to return
   * from this request. Non-positive values are ignored. The presence of
   * `next_page_token` in the response indicates that more results might be
   * available. If not specified, the default page_size is 100.
   * @opt_param string pageToken Optional. If present, retrieves the next batch of
   * results from the preceding call to this method. `page_token` must be the
   * value of `next_page_token` from the previous response. The values of other
   * method parameters should be identical to those in the previous call.
   * @return GoogleCloudEssentialcontactsV1ComputeContactsResponse
   */
  public function compute($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('compute', [$params], GoogleCloudEssentialcontactsV1ComputeContactsResponse::class);
  }
  /**
   * Adds a new contact for a resource. (contacts.create)
   *
   * @param string $parent Required. The resource to save this contact for.
   * Format: organizations/{organization_id}, folders/{folder_id} or
   * projects/{project_id}
   * @param GoogleCloudEssentialcontactsV1Contact $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudEssentialcontactsV1Contact
   */
  public function create($parent, GoogleCloudEssentialcontactsV1Contact $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudEssentialcontactsV1Contact::class);
  }
  /**
   * Deletes a contact. (contacts.delete)
   *
   * @param string $name Required. The name of the contact to delete. Format:
   * organizations/{organization_id}/contacts/{contact_id},
   * folders/{folder_id}/contacts/{contact_id} or
   * projects/{project_id}/contacts/{contact_id}
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets a single contact. (contacts.get)
   *
   * @param string $name Required. The name of the contact to retrieve. Format:
   * organizations/{organization_id}/contacts/{contact_id},
   * folders/{folder_id}/contacts/{contact_id} or
   * projects/{project_id}/contacts/{contact_id}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudEssentialcontactsV1Contact
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudEssentialcontactsV1Contact::class);
  }
  /**
   * Lists the contacts that have been set on a resource.
   * (contacts.listFoldersContacts)
   *
   * @param string $parent Required. The parent resource name. Format:
   * organizations/{organization_id}, folders/{folder_id} or projects/{project_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of results to return
   * from this request. Non-positive values are ignored. The presence of
   * `next_page_token` in the response indicates that more results might be
   * available. If not specified, the default page_size is 100.
   * @opt_param string pageToken Optional. If present, retrieves the next batch of
   * results from the preceding call to this method. `page_token` must be the
   * value of `next_page_token` from the previous response. The values of other
   * method parameters should be identical to those in the previous call.
   * @return GoogleCloudEssentialcontactsV1ListContactsResponse
   */
  public function listFoldersContacts($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudEssentialcontactsV1ListContactsResponse::class);
  }
  /**
   * Updates a contact. Note: A contact's email address cannot be changed.
   * (contacts.patch)
   *
   * @param string $name The identifier for the contact. Format:
   * {resource_type}/{resource_id}/contacts/{contact_id}
   * @param GoogleCloudEssentialcontactsV1Contact $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. The update mask applied to the
   * resource. For the `FieldMask` definition, see https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask
   * @return GoogleCloudEssentialcontactsV1Contact
   */
  public function patch($name, GoogleCloudEssentialcontactsV1Contact $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudEssentialcontactsV1Contact::class);
  }
  /**
   * Allows a contact admin to send a test message to contact to verify that it
   * has been configured correctly. (contacts.sendTestMessage)
   *
   * @param string $resource Required. The name of the resource to send the test
   * message for. All contacts must either be set directly on this resource or
   * inherited from another resource that is an ancestor of this one. Format:
   * organizations/{organization_id}, folders/{folder_id} or projects/{project_id}
   * @param GoogleCloudEssentialcontactsV1SendTestMessageRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function sendTestMessage($resource, GoogleCloudEssentialcontactsV1SendTestMessageRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('sendTestMessage', [$params], GoogleProtobufEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FoldersContacts::class, 'Google_Service_Essentialcontacts_Resource_FoldersContacts');
