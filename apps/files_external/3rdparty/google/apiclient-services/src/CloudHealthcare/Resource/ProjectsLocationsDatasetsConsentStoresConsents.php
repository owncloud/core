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

namespace Google\Service\CloudHealthcare\Resource;

use Google\Service\CloudHealthcare\ActivateConsentRequest;
use Google\Service\CloudHealthcare\Consent;
use Google\Service\CloudHealthcare\HealthcareEmpty;
use Google\Service\CloudHealthcare\ListConsentRevisionsResponse;
use Google\Service\CloudHealthcare\ListConsentsResponse;
use Google\Service\CloudHealthcare\RejectConsentRequest;
use Google\Service\CloudHealthcare\RevokeConsentRequest;

/**
 * The "consents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google\Service\CloudHealthcare(...);
 *   $consents = $healthcareService->consents;
 *  </code>
 */
class ProjectsLocationsDatasetsConsentStoresConsents extends \Google\Service\Resource
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
   * @param ActivateConsentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Consent
   */
  public function activate($name, ActivateConsentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('activate', [$params], Consent::class);
  }
  /**
   * Creates a new Consent in the parent consent store. (consents.create)
   *
   * @param string $parent Required. Name of the consent store.
   * @param Consent $postBody
   * @param array $optParams Optional parameters.
   * @return Consent
   */
  public function create($parent, Consent $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Consent::class);
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
   * @return HealthcareEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], HealthcareEmpty::class);
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
   * @return HealthcareEmpty
   */
  public function deleteRevision($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('deleteRevision', [$params], HealthcareEmpty::class);
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
   * @return Consent
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Consent::class);
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
   * @return ListConsentsResponse
   */
  public function listProjectsLocationsDatasetsConsentStoresConsents($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListConsentsResponse::class);
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
   * @return ListConsentRevisionsResponse
   */
  public function listRevisions($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('listRevisions', [$params], ListConsentRevisionsResponse::class);
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
   * @param Consent $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The update mask to apply to the
   * resource. For the `FieldMask` definition, see https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask. Only the
   * `user_id`, `policies`, `consent_artifact`, and `metadata` fields can be
   * updated.
   * @return Consent
   */
  public function patch($name, Consent $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Consent::class);
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
   * @param RejectConsentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Consent
   */
  public function reject($name, RejectConsentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reject', [$params], Consent::class);
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
   * @param RevokeConsentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Consent
   */
  public function revoke($name, RevokeConsentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('revoke', [$params], Consent::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsDatasetsConsentStoresConsents::class, 'Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsConsentStoresConsents');
