<?php
/**
 * Defines a DNS domain
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\DNS;

/**
 * The Domain class represents a single domain
 *
 * Note that the `Subdomain` class is defined in this same file because of
 * mutual dependencies.
 *
 * @api
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */
class Domain extends Object
{

    public $id;
    public $accountId;
    public $ttl;
    public $updated;
    public $emailAddress;
    public $created;
    public $name;
    public $comment;

    protected static $json_name = FALSE;
    protected static $json_collection_name = 'domains';
    protected static $url_resource = 'domains';

    protected $_create_keys = array(
        'name',
        'emailAddress',
        'ttl',
        'comment'
    );

    protected $_update_keys = array(
        'emailAddress',
        'ttl',
        'comment'
    );

    private $records = array();
    private $subdomains = array();

    /**
     * returns a Record object
     *
     * Note that this method is available at the DNS level, but only for
     * PTR records.
     *
     * @return Record
     */
    public function Record($info = null)
    {
        return new Record($this, $info);
    }

    /**
     * returns a Collection of Record objects
     *
     * @param array $filter query-string parameters
     * @return \OpenCloud\Collection
     */
    public function RecordList($filter = array())
    {
        return $this->Parent()->Collection('\OpenCloud\DNS\Record', null, $this, $filter);
    }

    /**
     * returns a Subdomain object (child of current domain)
     *
     */
    public function Subdomain($info = array())
    {
        return new Subdomain($this, $info);
    }

    /**
     * returns a Collection of subdomains
     *
     * The subdomains are all `DNS:Domain` objects that are children of
     * the current domain.
     *
     * @param array $filter key/value pairs for query string parameters
     * return \OpenCloud\Collection
     */
    public function SubdomainList($filter = array())
    {
        return $this->Parent()->Collection('\OpenCloud\DNS\Subdomain', null, $this);
    }

    /**
     * Adds a new record to the list (for multiple record creation)
     *
     * @api
     * @param Record $rec the record to add
     * @return integer the number of records
     */
    public function AddRecord(Record $record)
    {
        $this->records[] = $record;
        return count($this->records);
    }

    /**
     * adds a new subdomain (for multiple subdomain creation)
     *
     * @api
     * @param Subdomain $subd the subdomain to add
     * @return integer the number of subdomains
     */
    public function AddSubdomain(Subdomain $subdomain)
    {
        $this->subdomains[] = $subdomain;
        return count($this->subdomains);
    }

    /**
     * returns changes since a specified date/time
     *
     * @param string $since the date or time
     * @return DNS\Changes
     */
    public function Changes($since = null)
    {
        if (isset($since)) {
            $url = $this->Url('changes', array('since' => $since));
        } else {
            $url = $this->Url('changes');
        }

        // perform the request
        return $this->Service()->SimpleRequest($url);
    }

    /**
     * exports the domain
     *
     * @return AsyncResponse
     */
    public function Export()
    {
        $url = $this->Url('export');
        return $this->Service()->AsyncRequest($url);
    }

    /**
     * clones the domain to the specified target domain
     *
     * @param string $newdomain the new domain to create from this domain
     * @param boolean $sub to clone subdomains as well
     * @param boolean $comments Replace occurrences of the reference domain
     *  name with the new domain name in comments
     * @param boolean $email Replace occurrences of the reference domain
     *  name with the new domain name in email addresses on the cloned
     *  (new) domain.
     * @param boolean $records Replace occurrences of the reference domain
     *  name with the new domain name in data fields (of records) on the
     *  cloned (new) domain. Does not affect NS records.
     * @return AsyncResponse
     */
    public function CloneDomain(
            $newdomain,
            $sub=TRUE,
            $comments=TRUE,
            $email=TRUE,
            $records=TRUE)
    {
        $param = array(
            'cloneName' => $newdomain,
            'cloneSubdomains' => $sub,
            'modifyComment' => $comments,
            'modifyEmailAddress' => $email,
            'modifyRecordData' => $records
        );
        $url = $this->Url('clone', $param);
        return $this->Service()->AsyncRequest($url, 'POST');
    }

    /**
     * handles creation of multiple records at Create()
     *
     * @api
     * @return \stdClass
     */
    protected function CreateJson()
    {
        $object = parent::CreateJson();

        // add records, if any
        if (count($this->records) > 0) {
            $recordsObject = new \stdClass;
            $recordsObject->records = array();
            foreach($this->records as $record) {
                $recordObject = new \stdClass;
                foreach($record->CreateKeys() as $key) {
                    if (isset($record->$key)) {
                        $recordObject->$key = $record->$key;
                    }
                }
                $recordsObject->records[] = $recordObject;
            }
            $object->domains[0]->recordsList = $recordsObject;
        }

        // add subdomains, if any
        if (count($this->subdomains) > 0) {
            $subdomainsObject = new \stdClass;
            $subdomainsObject->domains = array();
            foreach($this->subdomains as $subdomain) {
                $subdomainObject = new \stdClass;
                foreach($subdomain->CreateKeys() as $key) {
                    if (isset($subdomain->$key)) {
                        $subdomainObject->$key = $subdomain->$key;
                    }
                }
                $subdomainsObject->domains[] = $subdomainObject;
            }
            $object->domains[0]->subdomains = $subdomainsObject;
        }

        return $object;
    }

}
