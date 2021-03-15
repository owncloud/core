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
 * The "consents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google_Service_CloudHealthcare(...);
 *   $consents = $healthcareService->consents;
 *  </code>
 */
class Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsConsentStoresConsents extends Google_Service_Resource
{
  /**
   * Activates the latest revision of the specified Consent by committing a new
   * revision with `state` updated to `ACTIVE`. If the latest revision of the
   * specified Consent is in the `ACTIVE` state, no new revision is committed. A
   * FAILED_PRECONDITION error occurs if the latest revision of the specified
   * Consent is in the `REJECTED` or `REVOKED` state. (consents.activate)
   *
   * @param string $name Required. The resource name of the Consent to activate,
   * of the form `projects/{project_id}/locations/{location_id}/datasets/{dataset_
   * id}/consentStores/{consent_store_id}/consents/{consent_id}`. An
   * INVALID_ARGUMENT error occurs if `revision_id` is specified in the name.
   * @param Google_Service_CloudHealthcare_ActivateConsentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Consent
   */
  public function activate($name, Google_Service_CloudHealthcare_ActivateConsentRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('activate', array($params), "Google_Service_CloudHealthcare_Consent");
  }
  /**
   * Creates a new Consent in the parent consent store. (consents.create)
   *
   * @param string $parent Required. Name of the consent store.
   * @param Google_Service_CloudHealthcare_Consent $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Consent
   */
  public function create($parent, Google_Service_CloudHealthcare_Consent $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudHealthcare_Consent");
  }
  /**
   * Deletes the Consent and its revisions. To keep a record of the Consent but
   * mark it inactive, see [RevokeConsent]. To delete a revision of a Consent, see
   * [DeleteConsentRevision]. This operation does not delete the related Consent
   * artifact. (consents.delete)
   *
   * @param string $name Required. The resource name of the Consent to delete, of
   * the form `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}
   * /consentStores/{consent_store_id}/consents/{consent_id}`. An INVALID_ARGUMENT
   * error occurs if `revision_id` is specified in the name.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HealthcareEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudHealthcare_HealthcareEmpty");
  }
  /**
   * Deletes the specified revision of a Consent. An INVALID_ARGUMENT error occurs
   * if the specified revision is the latest revision. (consents.deleteRevision)
   *
   * @param string $name Required. The resource name of the Consent revision to
   * delete, of the form `projects/{project_id}/locations/{location_id}/datasets/{
   * dataset_id}/consentStores/{consent_store_id}/consents/{consent_id}@{revision_
   * id}`. An INVALID_ARGUMENT error occurs if `revision_id` is not specified in
   * the name.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HealthcareEmpty
   */
  public function deleteRevision($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('deleteRevision', array($params), "Google_Service_CloudHealthcare_HealthcareEmpty");
  }
  /**
   * Gets the specified revision of a Consent, or the latest revision if
   * `revision_id` is not specified in the resource name. (consents.get)
   *
   * @param string $name Required. The resource name of the Consent to retrieve,
   * of the form `projects/{project_id}/locations/{location_id}/datasets/{dataset_
   * id}/consentStores/{consent_store_id}/consents/{consent_id}`. In order to
   * retrieve a previous revision of the Consent, also provide the revision ID: `p
   * rojects/{project_id}/locations/{location_id}/datasets/{dataset_id}/consentSto
   * res/{consent_store_id}/consents/{consent_id}@{revision_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Consent
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudHealthcare_Consent");
  }
  /**
   * Lists the Consent in the given consent store, returning each Consent's latest
   * revision. (consents.listProjectsLocationsDatasetsConsentStoresConsents)
   *
   * @param string $parent Required. Name of the consent store to retrieve
   * Consents from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Restricts the Consents returned to those
   * matching a filter. The following syntax is available: * A string field value
   * can be written as text inside quotation marks, for example `"query text"`.
   * The only valid relational operation for text fields is equality (`=`), where
   * text is searched within the field, rather than having the field be equal to
   * the text. For example, `"Comment = great"` returns messages with `great` in
   * the comment field. * A number field value can be written as an integer, a
   * decimal, or an exponential. The valid relational operators for number fields
   * are the equality operator (`=`), along with the less than/greater than
   * operators (`<`, `<=`, `>`, `>=`). Note that there is no inequality (`!=`)
   * operator. You can prepend the `NOT` operator to an expression to negate it. *
   * A date field value must be written in `yyyy-mm-dd` form. Fields with date and
   * time use the RFC3339 time format. Leading zeros are required for one-digit
   * months and days. The valid relational operators for date fields are the
   * equality operator (`=`) , along with the less than/greater than operators
   * (`<`, `<=`, `>`, `>=`). Note that there is no inequality (`!=`) operator. You
   * can prepend the `NOT` operator to an expression to negate it. * Multiple
   * field query expressions can be combined in one query by adding `AND` or `OR`
   * operators between the expressions. If a boolean operator appears within a
   * quoted string, it is not treated as special, it's just another part of the
   * character string to be matched. You can prepend the `NOT` operator to an
   * expression to negate it. The fields available for filtering are: - user_id.
   * For example, `filter='user_id="user123"'`. - consent_artifact - state -
   * revision_create_time - metadata. For example,
   * `filter=Metadata(\"testkey\")=\"value\"` or
   * `filter=HasMetadata(\"testkey\")`.
   * @opt_param int pageSize Optional. Limit on the number of Consents to return
   * in a single response. If not specified, 100 is used. May not be larger than
   * 1000.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * the previous List request, if any.
   * @return Google_Service_CloudHealthcare_ListConsentsResponse
   */
  public function listProjectsLocationsDatasetsConsentStoresConsents($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudHealthcare_ListConsentsResponse");
  }
  /**
   * Lists the revisions of the specified Consent in reverse chronological order.
   * (consents.listRevisions)
   *
   * @param string $name Required. The resource name of the Consent to retrieve
   * revisions for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Restricts the revisions returned to those
   * matching a filter. The following syntax is available: * A string field value
   * can be written as text inside quotation marks, for example `"query text"`.
   * The only valid relational operation for text fields is equality (`=`), where
   * text is searched within the field, rather than having the field be equal to
   * the text. For example, `"Comment = great"` returns messages with `great` in
   * the comment field. * A number field value can be written as an integer, a
   * decimal, or an exponential. The valid relational operators for number fields
   * are the equality operator (`=`), along with the less than/greater than
   * operators (`<`, `<=`, `>`, `>=`). Note that there is no inequality (`!=`)
   * operator. You can prepend the `NOT` operator to an expression to negate it. *
   * A date field value must be written in `yyyy-mm-dd` form. Fields with date and
   * time use the RFC3339 time format. Leading zeros are required for one-digit
   * months and days. The valid relational operators for date fields are the
   * equality operator (`=`) , along with the less than/greater than operators
   * (`<`, `<=`, `>`, `>=`). Note that there is no inequality (`!=`) operator. You
   * can prepend the `NOT` operator to an expression to negate it. * Multiple
   * field query expressions can be combined in one query by adding `AND` or `OR`
   * operators between the expressions. If a boolean operator appears within a
   * quoted string, it is not treated as special, it's just another part of the
   * character string to be matched. You can prepend the `NOT` operator to an
   * expression to negate it. Fields available for filtering are: - user_id. For
   * example, `filter='user_id="user123"'`. - consent_artifact - state -
   * revision_create_time - metadata. For example,
   * `filter=Metadata(\"testkey\")=\"value\"` or
   * `filter=HasMetadata(\"testkey\")`.
   * @opt_param int pageSize Optional. Limit on the number of revisions to return
   * in a single response. If not specified, 100 is used. May not be larger than
   * 1000.
   * @opt_param string pageToken Optional. Token to retrieve the next page of
   * results or empty if there are no more results in the list.
   * @return Google_Service_CloudHealthcare_ListConsentRevisionsResponse
   */
  public function listRevisions($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('listRevisions', array($params), "Google_Service_CloudHealthcare_ListConsentRevisionsResponse");
  }
  /**
   * Updates the latest revision of the specified Consent by committing a new
   * revision with the changes. A FAILED_PRECONDITION error occurs if the latest
   * revision of the specified Consent is in the `REJECTED` or `REVOKED` state.
   * (consents.patch)
   *
   * @param string $name Resource name of the Consent, of the form `projects/{proj
   * ect_id}/locations/{location_id}/datasets/{dataset_id}/consentStores/{consent_
   * store_id}/consents/{consent_id}`. Cannot be changed after creation.
   * @param Google_Service_CloudHealthcare_Consent $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The update mask to apply to the
   * resource. For the `FieldMask` definition, see https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask. Only the
   * `user_id`, `policies`, `consent_artifact`, and `metadata` fields can be
   * updated.
   * @return Google_Service_CloudHealthcare_Consent
   */
  public function patch($name, Google_Service_CloudHealthcare_Consent $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudHealthcare_Consent");
  }
  /**
   * Rejects the latest revision of the specified Consent by committing a new
   * revision with `state` updated to `REJECTED`. If the latest revision of the
   * specified Consent is in the `REJECTED` state, no new revision is committed. A
   * FAILED_PRECONDITION error occurs if the latest revision of the specified
   * Consent is in the `ACTIVE` or `REVOKED` state. (consents.reject)
   *
   * @param string $name Required. The resource name of the Consent to reject, of
   * the form `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}
   * /consentStores/{consent_store_id}/consents/{consent_id}`. An INVALID_ARGUMENT
   * error occurs if `revision_id` is specified in the name.
   * @param Google_Service_CloudHealthcare_RejectConsentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Consent
   */
  public function reject($name, Google_Service_CloudHealthcare_RejectConsentRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('reject', array($params), "Google_Service_CloudHealthcare_Consent");
  }
  /**
   * Revokes the latest revision of the specified Consent by committing a new
   * revision with `state` updated to `REVOKED`. If the latest revision of the
   * specified Consent is in the `REVOKED` state, no new revision is committed. A
   * FAILED_PRECONDITION error occurs if the latest revision of the given consent
   * is in `DRAFT` or `REJECTED` state. (consents.revoke)
   *
   * @param string $name Required. The resource name of the Consent to revoke, of
   * the form `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}
   * /consentStores/{consent_store_id}/consents/{consent_id}`. An INVALID_ARGUMENT
   * error occurs if `revision_id` is specified in the name.
   * @param Google_Service_CloudHealthcare_RevokeConsentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Consent
   */
  public function revoke($name, Google_Service_CloudHealthcare_RevokeConsentRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('revoke', array($params), "Google_Service_CloudHealthcare_Consent");
  }
}
